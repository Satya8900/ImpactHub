<?php
session_start();
       if(isset($_SESSION['ac_type']))
       {
              if($_SESSION['ac_type']=="volunteer" && isset($_GET['action']) && isset($_GET['id']))
              {
                     include '../connection.php';
                     $id = $_GET['id'];
                     $vol_id = $_SESSION['id'];

                     if($_GET['action']=="apply")
                     {
                            $select_ngo_id = "SELECT `ngo_id` FROM `job_information` WHERE `Job_id` = '$id'";
                            $retrived_ngo_id = mysqli_query($conn,$select_ngo_id);
                            $fetched_ngo_id = mysqli_fetch_assoc($retrived_ngo_id);
                            $ngo_id = $fetched_ngo_id['ngo_id'];

                            $insert_app = "INSERT INTO `job_applications` (`app_id`, `job_id`, `vol_id`, `ngo_id`, `status`, `c_date`) VALUES (NULL, '$id', '$vol_id', '$ngo_id', 'Pending', current_timestamp())";
                            mysqli_query($conn,$insert_app);

                            header("location:vol_loggedin.php");
                     }
                     elseif($_GET['action']=="Cancel")
                     {
                            $delete_app = "DELETE FROM `job_applications` WHERE `app_id` = '$id'";
                            mysqli_query($conn,$delete_app);

                            header("location:vol_loggedin.php");
                     }
              }
              else
              {
                     header("location:vol_loggedin.php");
              }
       }
       else
       {
              header("location:../index.html");
       }    
?>