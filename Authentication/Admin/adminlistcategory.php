<?php
require_once '../../db/connect.php';
$selectedValue = isset($_POST['selectedValue']) ? $_POST['selectedValue'] : null;
$searchValue = isset($_POST['searchValue']) ? $_POST['searchValue'] : null;
$sql = "SELECT * FROM category"; 
$where = [];
if ($selectedValue !== null) {
    $where[] = "status= '$selectedValue'";
}
if ($searchValue !== null) {
    $searchValue = mysqli_real_escape_string($conn, $searchValue);
    $where[] = "(name LIKE '%$searchValue%' OR trademark LIKE '%$searchValue%')";
}
if (!empty($where)) {
    $sql .= " WHERE " . implode(" AND ", $where);
}
$result = mysqli_query($conn, $sql); 
$response = "";
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $name = $row['name'];
        $trademark = $row['trademark'];
        $status = $row['status'];
        $datecreated = $row['datecreated'];
        if ($status == 0) {
            $statusText = "Mở Bán";
            $statusColor = "green"; 
        } else if ($status == 1) {
            $statusText = "Dự Kiến";
            $statusColor = "blue"; 
        } else {
            $statusText = "Unknown";
            $statusColor = "gray"; 
        }
        $response .= '<tr>';
        $response .= '<td>'.$id.'</td>';
        $response .= '<td>'.$name.'</td>';
        $response .= '<td>'.$trademark.'</td>';
        $response .= '<td>'.$datecreated.'</td>';
        $response .= '<td style="color: ' . $statusColor . ';">' . $statusText . '</td>';
        $response .= '<td>';
        $response .= '<button class="btn btn-danger delete-btn" data-id="'.$id.'">Xoá</button>';
        $response .= '<a class="btn btn-success ml-3 edit-btn" href="../Admin/adminupdatecategory.php?id='.$id.'">Sửa</a>';
        $response .= '</td>';
        $response .= '</tr>';
    }
}
$conn->close();
echo $response;
?>
