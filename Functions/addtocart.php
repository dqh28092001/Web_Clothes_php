<?php
session_start();
include('../db/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = array();

    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        $id = $_POST["id"];
        $prod_qty = $_POST["prod_qty"];

        if (empty($prod_qty)) {
            $response['message'] = 'Vui Lòng Nhập Số Lượng';
        } else {
            $sqlQuantity = "SELECT * FROM products WHERE user_id = ?";
            $stmtQuantity = $con->prepare($sqlQuantity);
            $stmtQuantity->bind_param("i", $user_id);
            $stmtQuantity->execute();
            $resultQuantity = $stmtQuantity->get_result();

            if ($resultQuantity && $resultQuantity->num_rows > 0) {
                $row = $resultQuantity->fetch_assoc();
                $availableQuantity = $row['prod_qty'];
                
                $sqlCartQuantity = "SELECT SUM(prod_qty) as total_quantity FROM carts WHERE username = ? AND prod_id = ?";
                $stmtCartQuantity = $con->prepare($sqlCartQuantity);
                $stmtCartQuantity->bind_param("si", $username, $user_id);
                $stmtCartQuantity->execute();
                $resultCartQuantity = $stmtCartQuantity->get_result();
                $rowCartQuantity = $resultCartQuantity->fetch_assoc();
                $totalCartQuantity = $rowCartQuantity['total_quantity'];

                if (($totalCartQuantity + $quantity) <= $availableQuantity) {

                    $sqlUserAndProduct = "SELECT * FROM carts WHERE username = ? AND prod_id = ?";
                    $stmtUserAndProduct = $conn->prepare($sqlUserAndProduct);
                    $stmtUserAndProduct->bind_param("si", $username, $user_id);
                    $stmtUserAndProduct->execute();
                    $resultUserAndProduct = $stmtUserAndProduct->get_result();

                    if ($resultUserAndProduct && $resultUserAndProduct->num_rows > 0) {
                        $sql = "UPDATE carts SET prod_qty = prod_qty + ? WHERE username = ? AND prod_id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("isi", $prod_qty, $username, $user_id);
                    } else {
                        $sql = "INSERT INTO cart (username, prod_id, prod_qty) VALUES (?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("sii", $username, $user_id, $prod_qty);
                    }

                    if ($stmt->execute() && $stmt->affected_rows > 0) {
                        $response['message'] = 'true';
                    } else {
                        $response['message'] = 'Thất Bại';
                    }
                } else {
                    $response['message'] = 'Số Lượng Hàng Không Đủ';
                }
            } else {
                $response['message'] = 'Không Tìm Thấy Sản Phẩm';
            }
        }
    } else {
        $response['message'] = 'Vui Lòng Đăng Nhập';
    }

    echo json_encode($response);
    exit;
}

$con->close();
?>
