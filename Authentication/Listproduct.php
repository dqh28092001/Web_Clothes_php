<?php
    require_once '../db/connect.php';
$response = '';
if (isset($_POST['searchValue'])) {
    $searchValue = mysqli_real_escape_string($conn, $_POST['searchValue']);
} else {
    $searchValue = ''; 
}
$sql_count = "SELECT COUNT(*) as total FROM product p
              INNER JOIN category c ON p.catalogcode = c.id
              WHERE p.name LIKE '%$searchValue%' 
              AND p.status = 0 
              AND c.status = 0";
$result_count = mysqli_query($conn, $sql_count);
$row_count = mysqli_fetch_assoc($result_count);
$total_items = $row_count['total'];

$items_per_page = 8;
//cell làm tròn
$total_pages = ceil($total_items / $items_per_page);
$page = isset($_POST['page']) && is_numeric($_POST['page']) ? intval($_POST['page']) : 1;
$offset = ($page - 1) * $items_per_page;

$sql = "SELECT p.*, c.status as catelogystatus
        FROM product p
        INNER JOIN category c ON p.catalogcode = c.id
        WHERE p.name LIKE '%$searchValue%' 
        AND p.status = 0 
        AND c.status = 0
        LIMIT $offset, $items_per_page";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $status = $row['status'];
        $image = $row['image'];
        $name = $row['name'];
        $price = $row['price'];
        $formattedPrice = number_format($price, 2, '.', ',');
        $id = $row['id'];
        $category_status = $row['catelogystatus'];
        if($status ==0 and $category_status ==0){
        $response .= '<div class="col-md-3">';
        $response .= '<div class="card mb-4 product-wap rounded-0">';
        $response .= '<div class="card rounded-0">';
        $response .= '<img style="padding:5px" class="card-img  rounded-0 img-fluid" src="../Public/img/' . $image . '">';
        $response .= '<div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">';
        $response .= '<ul class="list-unstyled">';
        $response .= '<li><a class="btn btn-success text-white mt-2" href="../Views/DetailProduct.php?id=' . $id . '"><i class="far fa-eye"></i></a></li>';
        $response .= '</ul>';
        $response .= '</div>';
        $response .= '</div>';
        $response .= '<div class="card-body">';
        $response .= '<p  class="h3 text-decoration-none"><strong>' . $name . '</strong></p>';
        $response .= '<ul class="list-unstyled d-flex justify-content-center mb-1">';
        $response .= '<p class="text-center mb-0">' . '$' . $formattedPrice . '</p>';
        $response .= '</div>';
        $response .= '</div>';
        $response .= '</div>';
        }
    }
}else{
    $response .= 'Không Có Sản Phẩm';
}
$conn->close();
$response = array(
    'products' => $response,
    'total_pages' => $total_pages 
);
echo json_encode($response);
?>
