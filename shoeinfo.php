<!DOCTYPE html>
<html lang="en">
<?php

include "php/shoes.php"

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
</head>

<body style="background-image: url(/assets/img/white_background.jpg);">

    <!--Main Navigation-->
    <header>

        <!-- Sidebar -->
        <nav id="sidebarMenu" style="background-image: url(/assets/img/background.jpg);"  class="collapse d-lg-block sidebar collapse bg-white">
            <div class="position-sticky flex-column">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="./index.php" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-chart-area fa-fw me-3"></i><span>Dashboard</span>
                    </a>

                    <a href="./shoelist.php" class="list-group-item list-group-item-action py-2 ripple active"><i
                            class="fas fa-chart-bar fa-fw me-3"></i><span>Shoe Lists</span></a>



                    
                </div>
                <?php if (($_SESSION['login_userrole'] == "Administrator")) { ?>

                    <div class="list-group list-group-flush mx-3 mt-4 ">
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
    <main>
        <div class="container" style="margin-top: 58px;">


            <div class="row pt-5">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <div class="bg-image  hover-overlay ripple mb-4">
                                <img src="./assets/img/shoes_uploads/<?php if (isset($row['imgpath'])) {
                                    echo $row['imgpath'];
                                } else {
                                    echo "default.jpg";
                                } ?>" class="w-100" style="max-height:250px;" id="image-preview" />
                                <a id="imageclick">
                                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <p class="text-white mb-0"><i class="fa-solid fa-edit pe-none"></i>Edit
                                                Image</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <h5 class="my-3">
                                <?= $row["name"] ?>
                            </h5>
                            
                        </div>
                    </div>


                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Size</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">  <?= $row["size"] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Brand</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">  <?= $row["brand"] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Color</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">  <?= $row["color"] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Quantity</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">  <?= $row["quantity"] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Price</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">  <?= $row["price"] ?></p>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </main>


    <!-- MDB -->
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

        });

        function editUser(x) {
            $('#user_' + x).modal('show');
        }

        function deleteUser(x) {
            $('#deleteuser_' + x).modal('show');
        }




    </script>


</body>

</html>