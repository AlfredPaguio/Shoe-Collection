<!DOCTYPE html>
<html lang="en">
<?php
include "auth/login_required.php";

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Collection</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/admin.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
        integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
        crossorigin="anonymous"></script>
</head>

<body style="background-color: #eee;">

    <!--Main Navigation-->
    <header>
        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <span class="navbar-brand text-light" href="#">
                    <strong>Shoe Collection </strong>
                </span>


                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row">

                    <!-- Avatar -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                            id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <img src="./assets/img/uploads/<?php echo $user_imgpath ?>" class="rounded-circle"
                                height="22" alt="" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><span class="dropdown-item">
                                    <?= $user_first_name, " ", $user_last_name ?>
                                </span></li>
                            <hr class="m-0">
                            <li><a class="dropdown-item" href="./profileForm.php">My profile</a></li>
                            <li><a class="dropdown-item" href="../auth/logoutsession.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

        <div class="container" style="margin-top: 58px; background-color: #eee;">


            <div class="row pt-5">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <div>
                            <img src="../assets/img/uploads/<?= $user_imgpath ?>"
                                alt="avatar" class="rounded-circle img-fluid shadow" style="width: 150px;">
                                <a class="btn btn-info" style="position: absolute;" ><i class="fa-solid fa-edit" ></i></a>
                            </div>
                            
                            <h5 class="my-3"><?= $user_first_name, " ", $user_last_name ?></h5>
                            <p class="text-muted mb-1"><?= $_SESSION['login_userrole'] ?></p>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-primary">Follow</button>
                                <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $user_first_name, " ", $user_last_name ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $user_email ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Gender</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $user_gender ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Date Created</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $user_date_created  ?></p>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                   

                </div>
            </div>
        </div>
   

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>

</body>

</html>