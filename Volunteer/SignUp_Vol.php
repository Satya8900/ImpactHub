<?php

    include '../connection.php';

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
       $v_name = $_POST['name'];
       $email = $_POST['email'];
       $mob_num = $_POST['mob_num'];
       $password = $_POST['password'];
       $c_password = $_POST['c_password'];
       
       $select = "SELECT `e_mail`,`mob_num` FROM `volunteer_credential` WHERE `e_mail`= '$email' OR `mob_num`= '$mob_num' UNION ALL SELECT `e_mail`,`mob_num` FROM `ngo_credential` WHERE `e_mail`= '$email' OR `mob_num`= '$mob_num'";
       $result = mysqli_query($conn,$select);
       $row=mysqli_num_rows($result);

       if($password==$c_password and $row<1)
       {    
            // Encryption using blowfish
            $hash_pass = password_hash($password,PASSWORD_BCRYPT);

            $insert = "INSERT INTO `volunteer_credential` (`vol_id`, `vol_name`, `e_mail`, `mob_num`, `password`, `ac_type`, `c_date`) VALUES (NULL, '$v_name', '$email', '$mob_num', '$hash_pass', 'volunteer', current_timestamp())";
            mysqli_query($conn,$insert);
            header("location:../login.php?status=true");   
        }
        else
        {
            header("location:../signUp-vol.php?status=true");
        }
    }
    else
    {
        header("location:../signUp-vol.php");
    }

?>