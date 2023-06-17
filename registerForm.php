<!DOCTYPE html>
<html lang="en">

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
        background-image: url(https://mdbootstrap.com/img/new/fluid/city/008.jpg);
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
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">


          </ul>

          <ul class="navbar-nav d-flex flex-row">
            <!-- Icons -->
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://www.youtube.com/" rel="nofollow" target="_blank">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://web.facebook.com/migsestores" rel="nofollow" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://twitter.com/" rel="nofollow" target="_blank">
                <i class="fab fa-twitter"></i>
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
          <div class="row d-flex justify-content-center align-items-center pb-5 pt-5" style="margin-top: 58px;">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
              <div class="card" style="border-radius: 15px;">
                <div class="card-body p-5">
                  <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                  <form method="POST" action="./php/register.php">
                    <?php if (isset($_GET['error'])) { ?>
                      <div class="row">
                        <div class="col-12">

                          <div class="alert alert-danger " id="errorAlert" role="alert">
                            <?php echo $_GET['error']; ?>
                          </div>

                        </div>
                      </div>
                    <?php } ?>
                    <div class="row">
                      <div class="col-md-6 mb-4">

                        <div class="form-outline">
                          <input type="text" id="firstName" name="firstName" class="form-control form-control-lg"
                            required />
                          <label class="form-label" for="firstName">First Name</label>
                        </div>

                      </div>
                      <div class="col-md-6 mb-4">

                        <div class="form-outline">
                          <input type="text" id="lastName" name="lastName" class="form-control form-control-lg"
                            required />
                          <label class="form-label" for="lastName">Last Name</label>
                        </div>

                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4 d-flex align-items-center">

                        <div class="form-outline w-100">
                          <input type="email" id="email" name="email" class="form-control form-control-lg" required />
                          <label class="form-label" for="email">Your Email</label>
                        </div>

                      </div>
                      <div class="col-md-6 mb-4">

                        <h6 class="mb-2 pb-1">Gender: </h6>

                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="gender" id="maleGender" value="Male"  checked />
                          <label class="form-check-label" for="maleGender">Male</label>
                        </div>

                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="Female"
                            />
                          <label class="form-check-label" for="femaleGender">Female</label>

                        </div>



                      </div>
                    </div>



                    <div class="form-outline mb-4">
                      <input type="password" id="password" name="password" class="form-control form-control-lg"
                        required />
                      <label class="form-label" for="password">Password</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="confirmPassword" name="confirmPassword"
                        class="form-control form-control-lg" required />
                      <label class="form-label" for="confirmPassword">Repeat your password</label>
                    </div>


                    <div class="d-flex justify-content-center">
                      <button type="submit" name="register"
                        class="btn btn-success btn-block btn-lg gradient-custom-4">Register</button>
                    </div>

                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="./login.php"
                        class="fw-bold text-body"><u>Login here</u></a></p>

                  </form>

                </div>
              </div>
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
        <a href="https://www.youtube.com/" class="btn btn-primary m-1" role="button" rel="nofollow" target="_blank">
          <i class="fab fa-youtube"></i>
        </a>
        <a href="https://web.facebook.com/migsestores" class="btn btn-primary m-1" role="button" rel="nofollow"
          target="_blank">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://twitter.com/" class="btn btn-primary m-1" role="button" rel="nofollow" target="_blank">
          <i class="fab fa-twitter"></i>
        </a>

      </div>
      © 2020 Copyright:
      <a class="text-dark" href="#">website.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!--Footer-->

  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
  <script>
    var password = document.getElementById("password")
    var confirmPassword = document.getElementById("confirmPassword");

    function validatePassword() {
      if (password.value != confirmPassword.value) {
        confirmPassword.setCustomValidity("Passwords do not match");
      } else {
        confirmPassword.setCustomValidity("");
      }
    }

    password.onchange = validatePassword;
    confirmPassword.onkeyup = validatePassword;
  </script>

</body>

</html>