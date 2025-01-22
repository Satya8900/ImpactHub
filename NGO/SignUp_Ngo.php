<?php

    include '../connection.php';

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
       $n_name = $_POST['name'];
       $email = $_POST['email'];
       $mob_num = $_POST['mob_num'];
       $aadhar_num = $_POST['aadhar_num'];
       $pan_num = $_POST['pan_num'];
       $pan_pic_info = $_FILES['pan_pic']['tmp_name'];
       $password = $_POST['password'];
       $c_password = $_POST['c_password'];
       
       $select = "SELECT `e_mail`,`mob_num` FROM `volunteer_credential` WHERE `e_mail`= '$email' OR `mob_num`= '$mob_num' UNION ALL SELECT `e_mail`,`mob_num` FROM `ngo_credential` WHERE `e_mail`= '$email' OR `mob_num`= '$mob_num'";
       $result = mysqli_query($conn,$select);
       $row = mysqli_num_rows($result);

       if($password==$c_password and $row<1)
          {  
            $pan_pic = base64_encode(file_get_contents($pan_pic_info));  

            // Encryption using blowfish 
            $hash_pass = password_hash($password,PASSWORD_BCRYPT);

            $insert = "INSERT INTO `ngo_credential` (`ngo_id`, `ngo_name`, `e_mail`, `mob_num`, `aadhar_num`, `pan_num`, `pan_pic`, `password`, `ac_type`, `c_date`) VALUES (NULL, '$n_name', '$email', '$mob_num', '$aadhar_num', '$pan_num', '$pan_pic', '$hash_pass', 'ngo', current_timestamp())";
            mysqli_query($conn,$insert);
            header("location:../login.php?status=true");   
          }
        else
          {
            header("location:../signUp-ngo.php?status=true");
          }
    }
    else
    {
      header("location:../signUp-ngo.php");
    }
    
?>