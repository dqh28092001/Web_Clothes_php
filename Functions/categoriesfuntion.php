<?php 

include('../db/connect.php');

function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='0' ";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}

?>
