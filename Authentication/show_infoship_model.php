<?php 
    session_start();
    require_once '../db/connect.php';
    if(isset($_SESSION["username"])){ 
        $username = $_SESSION["username"];
    }
    $sql = "SELECT * FROM info_ship WHERE username = '".$username."'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $fullname = $row['fullname'];
            $phonenumber = $row['phonenumber'];
            $address = $row['address'];
            echo '<input class="form-check-input" type="radio" name="address" id="address" value="' . $fullname . ' - '. $phonenumber . ' - ' . $address . '" data-id="' . $id . '">';
            echo '<label class="form-check-label" for="address">' . $fullname . ' - ' . $phonenumber . ' -<b> ' . $address . '</b></label><br>';
        }
    }
    $conn->close();
?>