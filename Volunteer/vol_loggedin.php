<!doctype html>
<html lang="en">

<head>
       <!-- Required meta tags -->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <link rel="icon" type="image/x-icon" href="../Assets/logo/logoJpg-photoaidcom-cropped.jpg">

       <link rel="stylesheet" href="../css/style.css">
       <link rel="stylesheet" href="../css/Utility.css">
       <link rel="stylesheet" href="../NGO/ngo.css">

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
    if($_SESSION['ac_type']=="volunteer")
    {
       $id = $_SESSION['id'];

       include '../connection.php';

       $select_job = "SELECT `job_information`.`Job_id`, `job_information`.`Title`, `job_information`.`type`, `job_information`.`Location`, `job_information`.`category`, `job_information`.`Duration`, `job_information`.`Duration_in`, `job_information`.`thumb`, `ngo_credential`.`ngo_name` FROM `job_information` INNER JOIN `ngo_credential` ON `job_information`.`ngo_id`=`ngo_credential`.`ngo_id`";
       $retrived_job_result = mysqli_query($conn,$select_job);

       $select_vol = "SELECT `vol_name` FROM `volunteer_credential` WHERE `vol_id` = '$id' ";
       $retrived_vol_result = mysqli_query($conn,$select_vol);
       $vol_result = mysqli_fetch_assoc($retrived_vol_result);

       $select_app = "SELECT `job_applications`.`app_id`,`job_information`.`Title`,`ngo_credential`.`ngo_name`,`job_information`.`Duration`,`job_information`.`Duration_in`,`job_information`.`type`,`job_information`.`Location`,`ngo_credential`.`e_mail`,`ngo_credential`.`mob_num`,`job_applications`.`status` FROM `job_information` INNER JOIN `job_applications`ON `job_information`.`Job_id` = `job_applications`.`job_id` INNER JOIN `ngo_credential` ON `job_applications`.`ngo_id` = `ngo_credential`.`ngo_id` WHERE `vol_id`='$id' ";
       $retrived_app_result = mysqli_query($conn,$select_app);

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
              <p><i class="fas fa-user"></i> <?php echo $vol_result['vol_name'] ?></p>
       </div>
       <div class="container-fluid">
              <div class="accordion " id="accordionPanelsStayOpenExample">
                     <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                   <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                          data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                          aria-controls="panelsStayOpen-collapseTwo">
                                          My Applications:
                                   </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                   aria-labelledby="panelsStayOpen-headingTwo">
                                   <div class="accordion-body">
                                          <section class="bg-light">
                                                 <h3 class="pb-2">Job Applications</h3>
                                                 <div class="table-responsive" id="no-more-tables">
                                                        <table class="table bg-white">
                                                               <thead class="bg-dark text-light">
                                                                      <tr>
                                                                             <th>Application ID</th>
                                                                             <th>Job Title</th>
                                                                             <th>NGO Name</th>
                                                                             <th>Duration</th>
                                                                             <th>Location</th>
                                                                             <th>NGO Email</th>
                                                                             <th>NGO Phone No</th>
                                                                             <th>Action</th>
                                                                      </tr>
                                                               </thead>
                                                               <tbody>
                                                                      <?php
                                                                             while($app_result=mysqli_fetch_assoc($retrived_app_result))
                                                                             {
                                                                      ?>
                                                                      <tr>
                                                                             <td data-title="Application ID">#<?php echo $app_result['app_id'] ?></td>
                                                                             <td data-title="Job Title"><?php echo $app_result['Title'] ?></td>
                                                                             <td data-title="NGO Name"><?php echo $app_result['ngo_name'] ?></td>
                                                                             <td data-title="Duration"><?php echo $app_result['Duration'] ?> <?php echo $app_result['Duration_in'] ?></td>
                                                                             <td data-title="Location"><?php 
                                                                                    if($app_result['type']=="Onsite"){
                                                                                           echo $app_result['type'] ?>-<?php echo $app_result['Location'];
                                                                                    }
                                                                                    else{
                                                                                           echo $app_result['type'];
                                                                                    }
                                                                             ?></td>
                                                                             <td data-title="NGO Email"><?php
                                                                                    if($app_result['status']=="Pending"){
                                                                                           echo "Waiting For Approval";
                                                                                    }
                                                                                    elseif($app_result['status']=="Approved"){
                                                                                           echo $app_result['e_mail'];
                                                                                    }
                                                                                    elseif($app_result['status']=="Rejected"){
                                                                                           echo "Application Rejected";
                                                                                    }
                                                                             ?></td>
                                                                             <td data-title="NGO Phone No"><?php
                                                                                    if($app_result['status']=="Pending"){
                                                                                           echo "Waiting For Approval";
                                                                                    }
                                                                                    elseif($app_result['status']=="Approved"){
                                                                                           echo $app_result['mob_num'];
                                                                                    }
                                                                                    elseif($app_result['status']=="Rejected"){
                                                                                           echo "Application Rejected";
                                                                                    }
                                                                             ?></td>
                                                                             <td data-title="Action">
                                                                                    <a href="action_vol.php?action=Cancel&id=<?php echo $app_result['app_id'] ?>"><button type="button"
                                                                                           class="btn btn-outline-danger"
                                                                                           title="Cancel Application"><i
                                                                                                  class="fa-solid fa-trash-can"></i></button></a>
                                                                             </td>
                                                                      </tr>
                                                                      <?php
                                                                             }
                                                                      ?>
                                                               </tbody>
                                                        </table>
                                                 </div>
                                          </section>
                                   </div>
                            </div>
                     </div>
                     <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                   <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                          data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                          aria-controls="panelsStayOpen-collapseOne">
                                          Job Opportunities:
                                   </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                   aria-labelledby="panelsStayOpen-headingOne">
                                   <div class="accordion-body">

                                          <div id="explr" class="row row-cols-1 row-cols-md-3 g-4">
                                                 <!-- Card-1 Start  -->
                                                 <?php                                           
                                                  while($job_result = mysqli_fetch_assoc($retrived_job_result))
                                                 {
                                                        $job_id = $job_result['Job_id'];
                                                        $select_check_app = "SELECT `app_id` FROM `job_applications` WHERE `job_id`= '$job_id' AND `vol_id`= '$id'";
                                                        $check_app = mysqli_query($conn,$select_check_app);
                                                        if(mysqli_num_rows($check_app)==0)
                                                        {
                                                 ?>
                                                 <div class="col">
                                                        <div class="card h-100">
                                                               <img src="data:image/png;base64,<?php echo $job_result['thumb'] ?>"
                                                                      class="card-img-top" style="height:40%;"
                                                                      alt="Content Writing Volunteer">
                                                               <div class="card-body">
                                                                      <h5 class="card-title pb-4"><?php echo $job_result['Title'] ?></h5>
                                                                      <div class="card-info"><img
                                                                                    class="card-info-icon-category"
                                                                                    src="../Assets/images/category.png"
                                                                                    alt="">
                                                                             <p><?php echo $job_result['category'] ?></p>
                                                                      </div>
                                                                      <div class="card-info"><img class="card-info-icon"
                                                                                    src="../Assets/images/clock.png"
                                                                                    alt="">
                                                                             <p><?php echo $job_result['Duration'] ?> <?php echo $job_result['Duration_in'] ?></p>
                                                                      </div>
                                                                      <div class="card-info"><img class="card-info-icon"
                                                                                    src="../Assets/images/location.png"
                                                                                    alt="">
                                                                             <p><?php 
                                                                             if($job_result['type']=="Onsite"){
                                                                                    echo $job_result['type'] ?>-<?php echo $job_result['Location'];
                                                                             }
                                                                             else{
                                                                                    echo $job_result['type'];
                                                                             }
                                                                              ?></p>
                                                                      </div>
                                                                      <div class="card-info"><img class="card-info-icon"
                                                                                    src="../Assets/images/ngo.png"
                                                                                    alt="">
                                                                             <p><?php echo $job_result['ngo_name'] ?></p>
                                                                      </div>
                                                                      <a href="action_vol.php?action=apply&id=<?php echo $job_result['Job_id'] ?>"><button type="button"
                                                                             class="btn btn-outline-success"
                                                                             title="Update Job">Apply Now</button></a>
                                                               </div>

                                                        </div>
                                                 </div>
                                                 <?php
                                                        }
                                                 }
                                                 ?>
                                          </div>

                                   </div>
                            </div>
                     </div>
              </div>
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
    else
    {
       header("location:../NGO/ngo_loggedin.php");
    }
 }
 else
 {
       header("location:../index.html");
 }    
?>