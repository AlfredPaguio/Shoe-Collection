<?php  

include "./auth/connection.php";

$sql = "SELECT COUNT(`id`) AS 'shoe_count' FROM `shoes` ORDER BY date_modified DESC";
$shoe = mysqli_fetch_array( mysqli_query($con, $sql));


$sql = "SELECT COUNT(`userid`) AS 'user_count' FROM `users` WHERE NOT userid = '0'";
$user = mysqli_fetch_array(mysqli_query($con, $sql));


