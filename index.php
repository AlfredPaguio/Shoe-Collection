<!DOCTYPE html>
<html lang="en">
<?php
include "auth/login_required.php";
include "php/readdashboard.php"
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

<body style="background-image: url(/assets/img/white_background.jpg);">

    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" style="background-image: url(/assets/img/background.jpg);"
            class="collapse d-lg-block sidebar collapse bg-white">
            <div class="position-sticky flex-column">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="./index.php" class="list-group-item list-group-item-action py-2 ripple active">
                        <i class="fas fa-chart-area fa-fw me-3"></i><span>Dashboard</span>
                    </a>

                    <a href="./shoelist.php" class="list-group-item list-group-item-action py-2 ripple"><i
                            class="fas fa-chart-bar fa-fw me-3"></i><span>Shoe Lists</span></a>



                </div>
                <?php if (($_SESSION['login_userrole'] == "Administrator")) { ?>

                    <div class="list-group list-group-flush mx-3 mt-4">
                        <span>Admin Panel</span>
                        <hr class="m-0">
                        <a href="./usermanager.php" class="list-group-item list-group-item-action py-2 ripple"><i
                                class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
                    </div>
                <?php } ?>
            </div>
        </nav>
        <!-- Sidebar -->

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
                <a class="navbar-brand" href="#">
                    <strong>Shoe Collection</strong>
                </a>


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

    <!--Main layout-->
    <main style="margin-top: 58px">
        <div class="container pt-4">


            <!--Section: Statistics with subtitles-->
            <section>
                <div class="row">
                    <div class="col-xl-6 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between p-md-1">
                                    <div class="d-flex flex-row">
                                        <div class="align-self-center">
                                           <img src="/assets/img/migs.svg" class="text-info" alt="" srcset="" style="height: 60px; width:48px;">
                                           

                                        </div>
                                        <div>
                                            <h4>Total Shoes:</h4>
                                            <p class="mb-0">My collection of shoes</p>
                                        </div>
                                    </div>
                                    <div class="align-self-center">
                                        <h2 class="h1 mb-0">
                                            <?= $shoe["shoe_count"] ?>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between p-md-1">
                                    <div class="d-flex flex-row">
                                        <div class="align-self-center">
                                            <i class="fas fa-users text-info fa-3x me-4"></i>
                                        </div>
                                        <div>
                                            <h4>Total Users:</h4>
                                            <p class="mb-0">Registered users in my website</p>
                                        </div>
                                    </div>
                                    <div class="align-self-center">
                                        <h2 class="h1 mb-0">
                                            <?= $user["user_count"] ?>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </section>
            <!--Section: Statistics with subtitles-->




        </div>

    </main>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <script type="text/javascript" src="assets/js/admin.js"></script>
</body>

</html>