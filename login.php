<!DOCTYPE html>
<html lang="en">
<?php


include "auth/connection.php";
session_start();

if (isset($_SESSION['login_user'])) {
    header("Location: index.html");
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    $myemail = mysqli_real_escape_string($con, $_POST['email']);
    $mypassword = mysqli_real_escape_string($con, $_POST['password']);
    //$hashed_password = password_hash($mypassword, PASSWORD_BCRYPT);

    $sql = "SELECT * FROM users WHERE email = '$myemail'";
    //   $sql = "SELECT userid,role FROM users WHERE username = '$myemail' and password = '$mypassword'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //$active = $row['active'];
    $hashed_password = $row['password'];
    if (!password_verify($mypassword, $hashed_password)) {
        $error = "Your email or password is invalid";
        header("location: login.php?error=$error");
        return;
    }
    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row



    if ($count == 1) {

        $_SESSION['login_user'] = $myemail;

        $user_data = array(
            'userid' => $row['userid'],
            'role' => $row['role'],
            'email' => $row['email'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'gender' => $row['gender'],
            'imgpath' => $row['imgpath'],
            'date_created' => $row['date_created']
        );

        // Convert the array to JSON
        $user_data_json = json_encode($user_data);

        // Store the JSON data in a session variable
        $_SESSION['user_data'] = $user_data_json;

        // Set the user's role based on their role ID
        if (($row['role']) == 0) {

            $_SESSION['login_userrole'] = 'Administrator';
        } else if (($row['role']) == 1) {

            $_SESSION['login_userrole'] = 'Regular Member';
        } else {
            $_SESSION['login_userrole'] = $row['role'];
        }

        header("location: index.php");
    } else {
        $error = "Your username or password is invalid";
        header("location: login.php?error=$error");
    }
}




?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Collection - Login</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
</head>

<body>

    <!--Main Navigation-->
    <header>
        <style>
            #intro {
                background-image: url('/assets/img/background.jpg');
                height: 100vh;
            }

            /* Height for devices larger than 576px */
            @media (min-width: 992px) {
                #intro {
                    margin-top: -58.59px;
                }
            }

            .navbar .nav-link {
                color: #fff !important;
            }
        </style>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a class="navbar-brand nav-link" target="_blank" href="#">
                    <strong>Shoe Collection</strong>
                </a>
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarExample01">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    </ul>

                    <ul class="navbar-nav d-flex flex-row">
                        <!-- Icons -->
                        
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link" href="https://web.facebook.com/migsestores" rel="nofollow"
                                target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link" href="https://www.instagram.com/migggyestores/" rel="nofollow" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->

        <!-- Background image -->
        <div id="intro" class="bg-image shadow-2-strong">
            <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-md-8">

                            <form class="bg-white rounded shadow-5-strong p-5" method="post">
                                <!-- Email input -->
                                <h2 class="text-uppercase text-center mb-5">Login</h2>
                                <?php if (isset($_GET['error'])) { ?>
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="alert alert-danger " id="errorAlert" role="alert">
                                                <?php echo $_GET['error']; ?>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if (isset($_GET['success'])) { ?>
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="alert alert-success " id="successAlert" role="alert">
                                                <?php echo $_GET['success']; ?>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="form-outline mb-4">
                                    <input type="email" id="email" name="email" class="form-control" />
                                    <label class="form-label" for="email">Email address</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="password" name="password" class="form-control" />
                                    <label class="form-label" for="password">Password</label>
                                </div>

                                <!-- 2 column grid layout for inline styling -->
                                <div class="row mb-4">
                                    <div class="col d-flex justify-content-center">
                                        <!-- Checkbox -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="rememberMe"
                                                checked />

                                            <label class="form-check-label" for="rememberMe">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>


                                </div>

                                <!-- Submit button -->
                                <button type="submit" name="signin" class="btn btn-primary btn-block">Sign in</button>
                                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a
                                        href="./registerForm.php" class="fw-bold text-body"><u>Register here</u></a></p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->
    </header>
    <!--Main Navigation-->

    <!--Footer-->
    <footer class="bg-light text-lg-start">

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <div class="text-center py-3 align-items-center">
                <p>Follow me on social media</p>
                
                <a href="https://web.facebook.com/migsestores" class="btn btn-primary m-1" role="button" rel="nofollow"
                    target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/migggyestores/" class="btn btn-primary m-1" role="button" rel="nofollow" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>

            </div>
            © 2023 Copyright:
            <a class="text-dark" href="#">estoresmiguel.infinityfreeapp.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!--Footer-->

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <script>
        // Retrieve the email and password input elements
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');

        // Retrieve the checkbox element
        const rememberMeCheckbox = document.getElementById('rememberMe');

        // Check if the user has previously checked the "Remember me" checkbox
        if (localStorage.getItem('rememberMe') === 'true') {
            // Retrieve the stored email and password values and fill the input fields
            const storedEmail = localStorage.getItem('email');
            const storedPassword = localStorage.getItem('password');
            emailInput.value = storedEmail;
            passwordInput.value = storedPassword;
            rememberMeCheckbox.checked = true;
        }

        // Add an event listener to the "Remember me" checkbox
        rememberMeCheckbox.addEventListener('change', function () {
            if (this.checked) {
                // Store the email and password values in the local storage
                localStorage.setItem('rememberMe', 'true');
                localStorage.setItem('email', emailInput.value);
                localStorage.setItem('password', passwordInput.value);
            } else {
                // Remove the email and password values from the local storage
                localStorage.removeItem('rememberMe');
                localStorage.removeItem('email');
                localStorage.removeItem('password');
            }
        });
    </script>
</body>

</html>