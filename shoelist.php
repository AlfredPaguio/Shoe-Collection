<!DOCTYPE html>
<html lang="en">
<?php
include "auth/login_required.php";
include "php/readshoelist.php"

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

<body>

    <!--Main Navigation-->
    <header>

        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
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
    <main style="margin-top: 58px" >


        <div class="container-fluid">
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

                        <div class="alert alert-success" role="alert">
                            <?php echo $_GET['success']; ?>
                        </div>

                    </div>
                </div>
            <?php } ?>



            <?php include('modals/addShoesModal.php') ?>
            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#add_shoes">
                <i class="fa-solid fa-add"></i> Add Shoes
            </button>

            <div class="row row-cols-1 row-cols-md-2 g-4 pt-2">


                <?php $i = 0;
                while ($rows = mysqli_fetch_assoc($result)) {
                    $i++;
                    ?>
                    <a class="col ms-3" href="../shoeinfo.php?id=<?= $rows['id'] ?>">
                        <div class="card">
                            <img src="./assets/img/shoes_uploads/<?php if (isset($rows['imgpath'])) {
                                echo $rows['imgpath'];
                            } else {
                                echo "default.jpg";
                            } ?>"
                            class="card-img-top" alt="Hollywood Sign on The Hill" />
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $rows['brand'] ?>
                                </h5>
                                <p class="card-text">
                                    <?= $rows['name'] ?>
                                </p>
                            </div>
                        </div>
                    </a>
                <?php } ?>
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

        $('#image').on('change', () => {
            var file = $('#image').prop('files')[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = () => $("#image-preview").attr("src", reader.result);

                reader.readAsDataURL(file);
            }
        });
        $('#imageclick').on('click', () => $('#image').trigger('click'));




    </script>


</body>

</html>