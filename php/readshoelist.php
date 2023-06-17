<?php  

include "./auth/connection.php";

$sql = "SELECT * FROM shoes ORDER BY date_modified DESC";
$result = mysqli_query($con, $sql);


