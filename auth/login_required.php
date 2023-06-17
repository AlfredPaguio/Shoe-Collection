<?php
session_start();


if (!isset($_SESSION['login_user'])) {

    header("Location: ./login.php");
    die();
} else {
    $user_data_json = $_SESSION['user_data'];

    // Convert the JSON data to an array
    $user_data = json_decode($user_data_json, true);

    // Access the user's ID, role, and other details
    $user_id = $user_data['userid'];
    $user_role = $user_data['role'];
    $user_email = $user_data['email'];
    $user_first_name = $user_data['first_name'];
    $user_last_name = $user_data['last_name'];
    $user_gender = $user_data['gender'];

    $user_imgpath = $user_data['imgpath'];
   

    $user_date_created = $user_data['date_created'];
}