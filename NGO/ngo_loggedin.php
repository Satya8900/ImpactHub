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
    if($_SESSION['ac_type']=="ngo")
    {
       $id = $_SESSION['id'];

       include '../connection.php';

       $select_job = "SELECT `Job_id`, `Title`, `type`, `Location`, `category`, `Duration`, `Duration_in`, `thumb` FROM `job_information` WHERE `ngo_id` = '$id'";
       $retrived_job_result = mysqli_query($conn,$select_job);

       $select_ngo = "SELECT `ngo_name` FROM `ngo_credential` WHERE `ngo_id` = '$id' ";
       $retrived_ngo_result = mysqli_query($conn,$select_ngo);
       $ngo_result = mysqli_fetch_assoc($retrived_ngo_result);

       $select_app ="SELECT `job_applications`.`app_id`,`job_information`.`Title`,`volunteer_credential`.`vol_name`,`volunteer_credential`.`e_mail`,`volunteer_credential`.`mob_num`,`job_information`.`Duration`,`job_information`.`Duration_in`,`job_applications`.`status` FROM `volunteer_credential` INNER JOIN `job_applications`ON `volunteer_credential`.`vol_id`=`job_applications`.`vol_id` INNER JOIN `job_information`ON `job_applications`.`job_id`=`job_information`.`Job_id` WHERE `job_applications`.`ngo_id`= '$id'";
       $retrived_app_result= mysqli_query($conn,$select_app);
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
              <div class="accordion " id="accordionPanelsStayOpenExample">
                     <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                   <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                          data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                          aria-controls="panelsStayOpen-collapseThree">
                                          Posted Jobs:
                                   </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                   aria-labelledby="panelsStayOpen-headingThree">
                                   <div class="accordion-body">
                                          <div id="explr" class="row row-cols-1 row-cols-md-3 g-4">
                                                 <!-- Card Start  -->
                                          <?php                                           
                                                  while($job_result = mysqli_fetch_assoc($retrived_job_result))
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
                                                                             <p><?php echo $ngo_result['ngo_name'] ?></p>
                                                                      </div>
                                                                     <a href="update_job.php?action=update&id=<?php echo $job_result['Job_id'] ?>"><button type="button"
                                                                             class="btn btn-outline-success"
                                                                             title="Update Job"><i
                                                                                    class="fa-solid fa-pen-to-square"></i></button></a>
                                                                      <a href="update_job.php?action=delete&id=<?php echo $job_result['Job_id'] ?>"><button type="button"
                                                                             class="btn btn-outline-danger"
                                                                             title="Delete Job"><i
                                                                                    class="fa-solid fa-trash-can"></i></button></a>
                                                               </div>

                                                        </div>
                                                 </div>
                                          <?php
                                                 }
                                          ?>
                                          </div>
                                   </div>
                            </div>
                     </div>
                     <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                   <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                          data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                          aria-controls="panelsStayOpen-collapseTwo">
                                          Received Applications:
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
                                                                             <th>Volunteer Name</th>
                                                                             <th>Duration</th>
                                                                             <th>Volunteer Email</th>
                                                                             <th>Volunteer PhoneNo</th>
                                                                             <th>Status</th>
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
                                                                             <td data-title="Volunteer Name"><?php echo $app_result['vol_name'] ?></td>
                                                                             <td data-title="Duration"><?php echo $app_result['Duration'] ?> <?php echo $app_result['Duration_in'] ?></td>
                                                                             <td data-title="Volunteer Email"><?php echo $app_result['e_mail'] ?></td>
                                                                             <td data-title="Volunteer PhoneNo"><?php echo $app_result['mob_num'] ?></td>
                                                                             <td data-title="Status"><?php echo $app_result['status'] ?></td>
                                                                             <td data-title="Action">
                                                                                    <a href="action_ngo.php?action=approve&id=<?php echo $app_result['app_id'] ?>"><button
                                                                                           type="button"
                                                                                           class="btn btn-outline-success"
                                                                                           title="Approve"><i
                                                                                                  class="fa-solid fa-square-check"></i></button></a>
                                                                                    <a href="action_ngo.php?action=reject&id=<?php echo $app_result['app_id'] ?>"><button type="button"
                                                                                           class="btn btn-outline-danger"
                                                                                           title="Reject"><i
                                                                                                  class="fa-solid fa-circle-xmark"></i></button></a>
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
                                          New Requirement:
                                   </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                   aria-labelledby="panelsStayOpen-headingOne">
                                   <div class="accordion-body">

                                          <section class="container">
                                                 <header>-: NEW JOB :-</header>
                                                 <form action="add_job.php" method="POST" enctype="multipart/form-data" class="form">
                                                        <div class="input-box">
                                                               <label for="job_title">Job Title :</label>
                                                               <input type="text" id="job_title" name="job_title"
                                                                      placeholder="Enter Your Job Title" required />
                                                        </div>
                                                        <div class="gender-box column">
                                                               <h3 id="gender-box-h3">Job Type :</h3>
                                                               <div class="gender-option">
                                                                      <div class="gender">
                                                                             <input type="radio" id="check-remote"
                                                                                    name="job_type" value="Remote"
                                                                                    required>
                                                                             <label for="check-remote">Remote</label>
                                                                      </div>
                                                                      <div class="gender">
                                                                             <input type="radio" id="check-Onsite"
                                                                                    name="job_type" value="Onsite">
                                                                             <label for="check-Onsite">Onsite</label>
                                                                      </div>
                                                               </div>
                                                        </div>
                                                        <div class="input-box address">
                                                               <label for="Job_location">Job Location :</label>
                                                               <input id="Job_location" name="Job_location" type="text"
                                                                      placeholder="Enter Job Location" required />
                                                               <div class="column">
                                                                      <div class="select-box">
                                                                             <select name="Category" required>

                                                                                    <option value="">Select Job Category
                                                                                    </option>
                                                                                    <option value="Women Empowerment">
                                                                                           Women
                                                                                           Empowerment</option>
                                                                                    <option value="Children">Children
                                                                                    </option>
                                                                                    <option value="Health">Health
                                                                                    </option>
                                                                                    <option value="Animal Welfare">
                                                                                           Animal Welfare
                                                                                    </option>
                                                                                    <option
                                                                                           value="Community Development">
                                                                                           Community
                                                                                           Development</option>
                                                                                    <option value="LGBTQ+">LGBTQ+
                                                                                    </option>
                                                                                    <option
                                                                                           value="Education & Literacy">
                                                                                           Education &
                                                                                           Literacy</option>
                                                                                    <option
                                                                                           value="Person With Disability">
                                                                                           Person With
                                                                                           Disability</option>
                                                                                    <option value="Senior Citizens">
                                                                                           Senior Citizens
                                                                                    </option>
                                                                                    <option
                                                                                           value="Environmental Sustainability">
                                                                                           Environmental Sustainability
                                                                                    </option>
                                                                                    <option value="Disaster Relief">
                                                                                           Disaster Relief
                                                                                    </option>
                                                                                    <option value="Youth Development">
                                                                                           Youth
                                                                                           Development</option>
                                                                                    <option value="Others">Others
                                                                                    </option>
                                                                             </select>
                                                                      </div>
                                                               </div>
                                                               <div class="input-box">

                                                                      <label for="job_tym">Job Duration :</label>
                                                               </div>
                                                               <div class="column">
                                                                      <input id="job_tym" type="number" name="job_tym"
                                                                             placeholder="Job Duration" required />
                                                                      <div class="select-box">
                                                                             <select name="tym_typ" required>
                                                                                    <option selected value="Hour">Hour</option>
                                                                                    <option value="Day">Day</option>
                                                                                    <option value="Month">Month</option>
                                                                             </select>
                                                                      </div>
                                                               </div>
                                                               <div class="input-box">
                                                                      <label for="inputGroupFile01">Job Thumbnail Image
                                                                             :</label>
                                                               </div>
                                                               <input type="file" accept="image/*" class="form-control" name="job_thumb"
                                                                      required id="inputGroupFile01">
                                                        </div>
                                                        <button type="submit">Submit</button>
                                                 </form>
                                          </section>

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
       header("location:../Volunteer/vol_loggedin.php");
    }
 }
 else
 {
       header("location:../index.html");
 }    
?>