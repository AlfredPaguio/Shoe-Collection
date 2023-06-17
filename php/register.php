<?php

if (isset($_POST['register'])) {
    include "../auth/connection.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $email = validate($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: ../registerForm.php?error=Invalid email address");
    }
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $first_name = validate($_POST['firstName']);
    $last_name = validate($_POST['lastName']);
    $gender = validate($_POST['gender']);

    //$userdata = 'name='.$name.'&='.$email;
    if (empty($email)) {
        header("location: ../registerForm.php?error=Email is required");
    } else {

        //$query = "INSERT INTO `users`(`username`, `password`, `role`) VALUES ('".$name."','".$password."','1')";

        // Prepare the statement with placeholders for the input values
        $query = "INSERT INTO `users`(`email`, `password`, `first_name`, `last_name`, `gender`, `role`) VALUES (?, ?, ?, ?, ?, '1')";
        $stmt = mysqli_prepare($con, $query);
        // Bind the input parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "sssss", $email, $hashed_password, $first_name, $last_name, $gender);

        // Execute the prepared statement

        if (!$result = mysqli_stmt_execute($stmt)) {
            header("location: ../registerForm.php?error=Unknown Error");
        } else {
            header("Location: ../login.php?success=Account successfully created");
        }

        // Close the connection
        mysqli_close($con);

    }
}



if (isset($_POST['add_user'])) {
    include "../auth/connection.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $email = validate($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: ../usermanager.php?error=Invalid email address");
    }
    $password = $_POST['password'];
    $role = $_POST['role'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $first_name = validate($_POST['firstName']);
    $last_name = validate($_POST['lastName']);
    $gender = validate($_POST['gender']);

    //$userdata = 'name='.$name.'&='.$email;
    if (empty($email)) {
        header("location: ../usermanager.php?error=Email is required");
    } else {

        //$query = "INSERT INTO `users`(`username`, `password`, `role`) VALUES ('".$name."','".$password."','1')";

        // Prepare the statement with placeholders for the input values
        $query = "INSERT INTO `users`(`email`, `password`, `first_name`, `last_name`, `gender`, `role`) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        // Bind the input parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "sssssi", $email, $hashed_password, $first_name, $last_name, $gender, $role);

        // Execute the prepared statement

        if (!$result = mysqli_stmt_execute($stmt)) {
            header("location: ../usermanager.php?error=Unknown Error");
        } else {
            header("Location: ../usermanager.php?success=Account successfully created");
        }

        // Close the connection
        mysqli_close($con);

    }

}


?>