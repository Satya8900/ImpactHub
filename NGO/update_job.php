<!doctype html>
<html lang="en">

<head>
       <!-- Required meta tags -->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <link rel="icon" type="image/x-icon" href="../Assets/logo/logoJpg-photoaidcom-cropped.jpg">

       <link rel="stylesheet" href="../css/style.css">
       <link rel="stylesheet" href="../css/Utility.css">
       <link rel="stylesheet" href="ngo.css">

       <!-- Bootstrap CSS -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
              crossorigin="anonymous">
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
              integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
              crossorigin="anonymous"></script>

       <!-- FontAwesome Icons -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />

       <title>ImpactHub</title>
</head>

<?php
session_start();
       if(isset($_SESSION['ac_type']))
       {
          if($_SESSION['ac_type']=="ngo" && isset($_GET['action']) && isset($_GET['id']))
          {   
              include '../connection.php';
              $job_id = $_GET['id'];

              if($_SERVER["REQUEST_METHOD"]=="POST")
              {
                     $job_title =$_POST['job_title'];
                     $job_type =$_POST['job_type'];
                     $Job_location =$_POST['Job_location'];
                     $category =$_POST['Category'];
                     $job_tym =$_POST['job_tym'];
                     $tym_typ =$_POST['tym_typ'];
                     $job_thumb =$_FILES['job_thumb']['tmp_name'];

                     if(!empty($job_thumb))
                     {
                            $job_thumb_encoded = base64_encode(file_get_contents($job_thumb));
                            $update = "UPDATE `job_information` SET `Title`='$job_title',`type`='$job_type',`Location`='$Job_location',`category`='$category',`Duration`='$job_tym',`Duration_in`='$tym_typ',`thumb`='$job_thumb_encoded' WHERE `Job_id`= '$job_id'";
                     }
                     else
                     {
                            $update = "UPDATE `job_information` SET `Title`='$job_title',`type`='$job_type',`Location`='$Job_location',`category`='$category',`Duration`='$job_tym',`Duration_in`='$tym_typ' WHERE `Job_id`= '$job_id'";
                     }

                     mysqli_query($conn,$update);
                     header("location:ngo_loggedin.php");
              }
              
              if($_GET['action']=="update")
              { 
                     $id = $_SESSION['id'];

                     $select_job = "SELECT `Title`, `type`, `Location`, `category`, `Duration`, `Duration_in`, `thumb` FROM `job_information` WHERE `Job_id` = '$job_id'";
                     $retrived_job_result = mysqli_query($conn,$select_job); 
                     $job_result = mysqli_fetch_assoc($retrived_job_result);
                     
                     $select_ngo = "SELECT `ngo_name` FROM `ngo_credential` WHERE `ngo_id` = '$id' ";
                     $retrived_ngo_result = mysqli_query($conn,$select_ngo);
                     $ngo_result = mysqli_fetch_assoc($retrived_ngo_result);
?>

<body id="bootstrap-override">
       <!-- navbar start   -->
       <!-- Image and text -->
       <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
              <div class="container-fluid">
                     <a class="navbar-brand" href="#">
                            <img src="../Assets/logo/logoNpng.png" alt="ImpactHub" height="35px" width="35px">
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
                                                        href="../index.html">Home</a>
                                          </li>
                                          <li class="nav-item">
                                                 <a class="nav-link active" aria-current="page"
                                                        href="../Volunteer.html">Volunteer</a>
                                          </li>
                                          <li class="nav-item">
                                                 <a class="nav-link active" aria-current="page"
                                                        href="../ngo.html">Ngos</a>
                                          </li>
                                          <li class="nav-item">
                                                 <a class="nav-link active" aria-current="page"
                                                        href="../aboutus.html">AboutUs</a>
                                          </li>
                                          <li class="nav-item">
                                                 <a class="nav-link active" aria-current="page"
                                                        href="../contactus.html">ContactUs</a>
                                          </li>
                                          <li class="nav-item dropdown">
                                                 <a class="nav-link dropdown-toggle active" href="#" role="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        LogIn/JoinUs
                                                 </a>
                                                 <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="../login.php">LogIn</a></li>
                                                        <li><a class="dropdown-item" onclick="toast()">SingUp</a> </li>
                                                 </ul>
                                          </li>
                                          <li class="nav-item active">
                                                 <a class="nav-link py-0" href="../Donation/donation.html">
                                                        <button type="button" id="donatebtn"
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
                            <a href="../signUp-ngo.php">
                                   <button class="btn btn-outline-primary donatebtn">NGO</button>
                            </a>
                            <a href="../signUp-vol.php">
                                   <button class="btn btn-outline-primary donatebtn">Volunteer</button>
                            </a>
                     </div>
              </div>
       </div>

       <div class="user-name">
              <p><i class="fas fa-user"></i> <?php echo $ngo_result['ngo_name'] ?></p>
       </div>
       <div class="container-fluid">
              <section class="container">
                     <header>-: UPDATE JOB :-</header>
                     <form action="" method="POST" enctype="multipart/form-data" class="form">
                            <div class="input-box">
                                   <label for="job_title">Job Title :</label>
                                   <input type="text" id="job_title" name="job_title" value="<?php echo $job_result['Title'] ?>" placeholder="Enter Your Job Title"
                                          required />
                            </div>
                            <div class="gender-box column">
                                   <h3 id="gender-box-h3">Job Type :</h3>
                                   <div class="gender-option">
                                          <div class="gender">
                                                 <input type="radio" id="check-remote" name="job_type" value="Remote" 
                                                 <?php if ($job_result['type']=="Remote"){ echo 'checked="checked"'; } ?> required>
                                                 <label for="check-remote">Remote</label>
                                          </div>
                                          <div class="gender">
                                                 <input type="radio" id="check-Onsite" name="job_type" value="Onsite"
                                                 <?php if ($job_result['type']=="Onsite"){ echo 'checked="checked"'; } ?> >
                                                 <label for="check-Onsite">Onsite</label>
                                          </div>
                                   </div>
                            </div>
                            <div class="input-box address">
                                   <label for="Job_location">Job Location :</label>
                                   <input id="Job_location" name="Job_location" type="text" value="<?php echo $job_result['Location'] ?>"
                                          placeholder="Enter Job Location" required />
                                   <div class="column">
                                          <div class="select-box">
                                                 <select name="Category" required>

                                                        <option value="">Select Job Category
                                                        </option>
                                                        <option value="Women Empowerment"
                                                        <?php if ($job_result['category']=="Women Empowerment"){ echo 'selected'; } ?> >
                                                               Women
                                                               Empowerment</option>
                                                        <option value="Children"
                                                        <?php if ($job_result['category']=="Children"){ echo 'selected'; } ?> >Children
                                                        </option>
                                                        <option value="Health"
                                                        <?php if ($job_result['category']=="Health"){ echo 'selected'; } ?> >Health
                                                        </option>
                                                        <option value="Animal Welfare"
                                                        <?php if ($job_result['category']=="Animal Welfare"){ echo 'selected'; } ?> >
                                                               Animal Welfare
                                                        </option>
                                                        <option value="Community Development"
                                                        <?php if ($job_result['category']=="Community Development"){ echo 'selected'; } ?> >
                                                               Community
                                                               Development</option>
                                                        <option value="LGBTQ+"
                                                        <?php if ($job_result['category']=="LGBTQ+"){ echo 'selected'; } ?> >LGBTQ+
                                                        </option>
                                                        <option value="Education & Literacy"
                                                        <?php if ($job_result['category']=="Education & Literacy"){ echo 'selected'; } ?> >
                                                               Education &
                                                               Literacy</option>
                                                        <option value="Person With Disability"
                                                        <?php if ($job_result['category']=="Person With Disability"){ echo 'selected'; } ?> >
                                                               Person With
                                                               Disability</option>
                                                        <option value="Senior Citizens"
                                                        <?php if ($job_result['category']=="Senior Citizens"){ echo 'selected'; } ?> >
                                                               Senior Citizens
                                                        </option>
                                                        <option value="Environmental Sustainability"
                                                        <?php if ($job_result['category']=="Environmental Sustainability"){ echo 'selected'; } ?> >
                                                               Environmental Sustainability
                                                        </option>
                                                        <option value="Disaster Relief"
                                                        <?php if ($job_result['category']=="Disaster Relief"){ echo 'selected'; } ?> >
                                                               Disaster Relief
                                                        </option>
                                                        <option value="Youth Development"
                                                        <?php if ($job_result['category']=="Youth Development"){ echo 'selected'; } ?> >
                                                               Youth
                                                               Development</option>
                                                        <option value="Others"
                                                        <?php if ($job_result['category']=="Others"){ echo 'selected'; } ?> >Others
                                                        </option>
                                                 </select>
                                          </div>
                                   </div>
                                   <div class="input-box">

                                          <label for="job_tym">Job Duration :</label>
                                   </div>
                                   <div class="column">
                                          <input id="job_tym" type="number" name="job_tym" placeholder="Job Duration"
                                          value="<?php echo $job_result['Duration'] ?>" required />
                                          <div class="select-box">
                                                 <select name="tym_typ" required>
                                                        <option value="Hour"
                                                        <?php if ($job_result['Duration_in']=="Hour"){ echo 'selected'; } ?> >Hour</option>
                                                        <option value="Day"
                                                        <?php if ($job_result['Duration_in']=="Day"){ echo 'selected'; } ?> >Day</option>
                                                        <option value="Month"
                                                        <?php if ($job_result['Duration_in']=="Month"){ echo 'selected'; } ?> >Month</option>
                                                 </select>
                                          </div>
                                   </div>
                                   <div class="input-box">
                                          <label for="inputGroupFile01">Job Thumbnail Image
                                                 :</label>
                                   </div>
                                   <input type="file" accept="image/*" class="form-control" name="job_thumb" id="inputGroupFile01" >
                            </div>
                            <button name="submitbtn" type="submit">Submit</button>
                     </form>
              </section>
       </div>

       <footer class="bg-body-tertiary text-center text-lg-start">
              <!-- Copyright -->
              <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
                     © 2024 Copyright:
                     <a class="text-body" href="../index.html">ImpactHub</a>
              </div>
              <!-- Copyright -->
       </footer>
       <script src="../script.js"></script>

</body>

</html>

<?php
              }
              elseif($_GET['action']=="delete")
              {
                     $delete_job = "DELETE FROM `job_information` WHERE `Job_id`= '$job_id'";
                     $delete_app = "DELETE FROM `job_applications` WHERE `job_id` = '$job_id'";
                     mysqli_query($conn,$delete_job);
                     mysqli_query($conn,$delete_app);
                     
                     header("location:ngo_loggedin.php");
              }
    }
    else
    {
       header("location:ngo_loggedin.php");
    }
 }
 else
 {
       header("location:../index.html");
 }    
?>