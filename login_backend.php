<?php

    include 'connection.php';

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
       $mob_mail = $_POST['mob_mail'];
       $password = $_POST['password'];
       
       $select = "SELECT `vol_id`,`password`,`ac_type` FROM `volunteer_credential` WHERE `mob_num`='$mob_mail' OR `e_mail`='$mob_mail' UNION ALL SELECT `ngo_id`,`password`,`ac_type` FROM `ngo_credential` WHERE `mob_num`='$mob_mail' OR `e_mail`='$mob_mail'";
       $result = mysqli_query($conn,$select);
       $row=mysqli_num_rows($result);
       $retrived_data = mysqli_fetch_assoc($result);

       if($row==1 AND password_verify($password,$retrived_data['password']))
       { 
            session_start();
            if($retrived_data['ac_type']=="volunteer")
            {
                $_SESSION['id']=$retrived_data['vol_id'];
                $_SESSION['ac_type']=$retrived_data['ac_type'];
                header("location:Volunteer/vol_loggedin.php");
            }
            elseif($retrived_data['ac_type']=="ngo")
            {
                $_SESSION['id']=$retrived_data['vol_id'];
                $_SESSION['ac_type']=$retrived_data['ac_type'];
                $vol_id = $retrived_data['vol_id'];
               
                $img_encodeed=mysqli_query($conn,"SELECT `pan_pic` FROM `ngo_credential` WHERE `ngo_id`= '$vol_id'");
                $img_decoded=base64_decode(implode(mysqli_fetch_assoc($img_encodeed)));
                file_put_contents ("NGO\image\pan_card.png",$img_decoded);

                header("location:NGO/ngo_loggedin.php");
            }
       }
       else
       {
           header("location:login.php?status=invalid");
       }
    }
    else
    {
        header("location:login.php");
    }

?>