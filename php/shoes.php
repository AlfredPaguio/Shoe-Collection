<?php

if (isset($_GET['id'])) {
    
    

    $id = $_GET['id'];

    $sql = "SELECT * FROM shoes WHERE id=$id";

    include "auth/connection.php";
    include "auth/login_required.php";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("location: ../shoelist.php");
    }
}


if (isset($_POST['add_shoes'])) {


    include "../auth/connection.php";
    include "../auth/login_required.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $brand = validate($_POST['brand']);
    $color = validate($_POST['color']);
    $size = $_POST['size'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $image_name = 'default.jpg';
    if (isset($_FILES['image'])) {

        $img_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];

        if ($error === 0) {

            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {

                $new_img_name = uniqid("Shoe-", true) . '.' . $img_ex_lc;

                $img_upload_path = '../assets/img/shoes_uploads/' . $new_img_name;
                if (!(is_dir('../assets/img/shoes_uploads/'))) {
                    mkdir('..assets/img/shoes_uploads/', 0777, true);
                }
                if ((is_dir($img_upload_path))) {
                    unlink($img_upload_path);
                }
                move_uploaded_file($tmp_name, $img_upload_path);
                $image_name = $new_img_name;

            }

        }

    }



    if (!(empty($name))) {
        #  $query = "INSERT INTO `users`(`email`, `password`, `first_name`, `last_name`, `gender`, `role`) VALUES (?, ?, ?, ?, ?, '1')";
        $query = "INSERT INTO `shoes` (`name`, `brand`, `color`, `size`, `price`, `quantity`, `imgpath`, `owner_id`) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($con, $query);
        // Bind the input parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "sssidisi", $name, $brand, $color, $size, $price, $quantity, $image_name, $user_id);

        // Execute the prepared statement

        if (!$result = mysqli_stmt_execute($stmt)) {
            header("location: ../shoelist.php?error=Unknown Error");
        } else {
            header("Location: ../shoelist.php?success=Shoe successfully created");
        }

        // Close the connection
        mysqli_close($con);

    }

}


