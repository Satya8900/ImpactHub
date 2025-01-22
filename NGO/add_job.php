<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{      
       session_start();
       $id = $_SESSION['id'];
       $job_title =$_POST['job_title'];
       $job_type =$_POST['job_type'];
       $Job_location =$_POST['Job_location'];
       $category =$_POST['Category'];
       $job_tym =$_POST['job_tym'];
       $tym_typ =$_POST['tym_typ'];
       $job_thumb =$_FILES['job_thumb']['tmp_name'];

       $job_thumb_encoded = base64_encode(file_get_contents($job_thumb));

       include '../connection.php';
       $insert = "INSERT INTO `job_information` (`Job_id`, `ngo_id`, `Title`, `type`, `Location`, `category`, `Duration`, `Duration_in`, `thumb`, `c_date`) VALUES (NULL, '$id', '$job_title', '$job_type', '$Job_location', '$category', '$job_tym', '$tym_typ', '$job_thumb_encoded', current_timestamp())";
       mysqli_query($conn,$insert);
       header("location:ngo_loggedin.php");
}
else
{
       header("location:ngo_loggedin.php");
}

?>