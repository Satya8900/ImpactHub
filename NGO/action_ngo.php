<?php
session_start();
       if(isset($_SESSION['ac_type']))
       {
              if($_SESSION['ac_type']=="ngo" && isset($_GET['action']) && isset($_GET['id']))
              {
                     include '../connection.php';
                     $id = $_GET['id'];

                     if($_GET['action']=="approve")
                     {
                            $update_status = "UPDATE `job_applications` SET `status`='Approved' WHERE `app_id`= '$id'";
                            mysqli_query($conn,$update_status);

                            header("location:ngo_loggedin.php");
                     }
                     elseif($_GET['action']=="reject")
                     {
                            $update_status = "UPDATE `job_applications` SET `status`='Rejected' WHERE `app_id`= '$id'";
                            mysqli_query($conn,$update_status);

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