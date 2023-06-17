<?php

if (isset($_POST['edit_user'])) {
        include "../auth/connection.php";
        include "../auth/login_required.php";

        function validate($data)
        {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }
        $userid = $_POST['id'];
        $email = validate($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("location: ../usermanager.php?error=Invalid email address");
        }



        $role = $_POST['role'];
        $first_name = validate($_POST['firstName']);
        $last_name = validate($_POST['lastName']);
        $gender = validate($_POST['gender']);

        $image_name = 'default.png';
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
                               // $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                $new_img_name =  $userid. '.' . $img_ex_lc;
                                $img_upload_path = '../assets/img/uploads/' . $new_img_name;
                                if (!(is_dir('../assets/img/uploads/'))) {
                                        mkdir('..assets/img/uploads/', 0777, true);
                                }
                                if ((is_dir($img_upload_path))) {
                                        unlink($img_upload_path);
                                }
                                move_uploaded_file($tmp_name, $img_upload_path);
                                $image_name = $new_img_name;
                                $user_imgpath = $new_img_name;

                        }

                }

        }


        //$userdata = 'name='.$name.'&='.$email;
        if (empty($email)) {
                header("location: ../usermanager.php?error=Email is required");
        } else {

                //  $sql = "UPDATE users  SET username='$name', password='$password', role='$role'  WHERE userid=$id ";
                $query = "UPDATE `users` SET `email` = ?, `first_name` = ?, `last_name` = ?, `gender` = ?, `role` = ?, `imgpath` = ? WHERE userid=$userid";
                $stmt = mysqli_prepare($con, $query);
                // Bind the input parameters to the prepared statement
                mysqli_stmt_bind_param($stmt, "ssssis", $email, $first_name, $last_name, $gender, $role, $image_name);


                $result = mysqli_stmt_execute($stmt);
                if ($result) {
                        header("Location: ../usermanager.php?success=Successfully Updated");
                } else {
                        header("Location: ../usermanager.php?id=$id&error=unknown error occurred");
                }
        }
} else {
        header("Location: ../usermanager.php");
}




if (isset($_GET['id'])) {
        include "../auth/connection.php";

        function validate($data)
        {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }

        $id = validate($_GET['id']);

        $sql = "SELECT * FROM users WHERE userid=$id";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
        } else {
                header("Location: ../usermanager.php");
        }


}  