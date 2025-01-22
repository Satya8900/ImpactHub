<!doctype html>
<html lang="en">

<head>
       <!-- Required meta tags -->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


       <link rel="icon" type="image/x-icon" href="Assets/logo/logoJpg-photoaidcom-cropped.jpg">

       <link rel="stylesheet" href="css/style.css">
       <link rel="stylesheet" href="css/Utility.css">
       <link rel="stylesheet" href="css/login.css">

       <!-- Bootstrap CSS -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
              crossorigin="anonymous">
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
              integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
              crossorigin="anonymous"></script>

       <title>ImpactHub</title>
</head>

<body id="bootstrap-override">
       <!-- navbar start   -->
       <!-- Image and text -->
       <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
              <div class="container-fluid">
                     <a class="navbar-brand" href="#">
                            <img src="Assets/logo/logoNpng.png" alt="ImpactHub" height="35px" width="35px">
                            ImpactHub
                     </a>
                     <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                            aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                                   <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ImpactHub</h5>
                                   <button type="button" id="close-btn" class="btn-close" data-bs-dismiss="offcanvas"
                                          aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                   <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                          <li class="nav-item">
                                                 <a class="nav-link active logo-clr-txt" aria-current="page"
                                                        href="index.html">Home</a>
                                          </li>
                                          <li class="nav-item">
                                                 <a class="nav-link active" aria-current="page"
                                                        href="Volunteer.html">Volunteer</a>
                                          </li>
                                          <li class="nav-item">
                                                 <a class="nav-link active" aria-current="page" href="ngo.html">Ngos</a>
                                          </li>
                                          <li class="nav-item">
                                                 <a class="nav-link active" aria-current="page"
                                                        href="aboutus.html">AboutUs</a>
                                          </li>
                                          <li class="nav-item">
                                                 <a class="nav-link active" aria-current="page"
                                                        href="contactus.html">ContactUs</a>
                                          </li>
                                          <li class="nav-item dropdown">
                                                 <a class="nav-link dropdown-toggle active open" href="#" role="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        LogIn/JoinUs
                                                 </a>
                                                 <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="login.php">LogIn</a></li>
                                                        <li><a class="dropdown-item" onclick="toast()">SingUp</a> </li>
                                                 </ul>
                                          </li>
                                          <li class="nav-item active">
                                                 <a class="nav-link py-0" href="Donation/donation.html">
                                                        <button type="button"
                                                               class="btn btn-outline-primary donatebtn">Donate</button>
                                                 </a>
                                          </li>
                                   </ul>
                            </div>
                     </div>
              </div>
       </nav>
       <!-- navbar end -->

       <!-- toast start -->
       <div id="toast-id" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-body text-capitalize">
                     <div class="d-flex justify-content-between">
                            <h5>Hello,Who Are You ?</h5>
                            <button onclick="toastclose()" type="button" class="btn-close" data-bs-dismiss="toast"
                                   aria-label="Close"></button>
                     </div>
                     <div id="btn" class="mt-2 pt-2 border-top">
                            <a href="signUp-ngo.php">
                                   <button class="btn btn-outline-primary donatebtn">NGO</button>
                            </a>
                            <a href="signUp-vol.php">
                                   <button class="btn btn-outline-primary donatebtn">Volunteer</button>
                            </a>
                     </div>
              </div>
       </div>

       <div class="login">
              <form class="form" action="login_backend.php" method="POST" id="login">
                     <h1 class="form__title">LogIn</h1>
                     <div class="form__message form__message--error"></div>
                     <div class="form__input-group">
                            <input type="text" name="mob_mail" class="form__input" required autofocus placeholder="Mobile Number/E-mail Address">
                            <div class="form__input-error-message"></div>
                     </div>
                     <div class="form__input-group">
                            <input type="password" name="password" class="form__input" required autofocus placeholder="Password">
                            <div class="form__input-error-message"></div>
                     </div>
                     
                     <button class="form__button" type="submit">Login</button>
                     <p class="form__text">
                            <!-- <a href="#" class="form__link">Forgot your password?</a> -->
                     </p>
                     <p class="form__text">
                            <a class="form__link" onclick="toast()" id="linkCreateAccount">You Don't have an account?
                                   Create new account</a>
                     </p>
              </form>
       </div>

       <footer class="bg-body-tertiary text-center text-lg-start">
              <!-- Copyright -->
              <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
                     © 2024 Copyright:
                     <a class="text-body" href="index.html">ImpactHub</a>
              </div>
              <!-- Copyright -->
       </footer>
       <script src="script.js"></script>

<?php
       if(isset($_GET['status']))
       {
              if($_GET['status']=="true")
              {
              ?> 
                     <script>
                        window.alert("SignedUp Successfully! Please LogIn.");
                     </script>
              <?php   
              }
              elseif($_GET['status']=="invalid") 
              {
              ?> 
                     <script>
                        window.alert("Invalid Login Credential! Try Again.");
                     </script>
              <?php       
              }
       }
?>

</body>

</html>