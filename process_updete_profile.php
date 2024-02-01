<?php
   
   include 'config.php';
   session_start();

   $fullname = $_POST['fullname'];
   $depname = $_POST['depname'];
   $gpa = $_POST['gpa'];
   

   $username = $_SESSION['username'];
   //uploadfile
   $file = $_FILES['avatar']['name'];
   $folder_name = "images/";
   $new_file = $username."_".$file;
   $base_name = $folder_name.$new_file ;
   $ext_name = strtolower(pathinfo($base_name,PATHINFO_EXTENSION));
   $file_image = getimagesize($_FILES['avatar']['tmp_name']);
   $file_size = $_FILES['avatar']['size'];
   if($file_image == false){
    echo "คุณไม่ได้ส่งรูปภาพ";
    }elseif ($ext_name != "jpg" && $ext_name != "jpeg" && $ext_name != "png") {
        echo "คุณไม่ได้ส่งรูปภาพนามสกุล jpg /jpeg/";
    }elseif($file_size > 300000){
        echo "คุณส่งรูปภาพใหญ่เกิน 300KB";
    }else{
        move_uploaded_file($_FILES['avatar']['tmp_name'],$base_name);  
        $sql1 = "UPDATE profile SET fullname = '$fullname', depname = '$depname',gpa = '$gpa',photo = '$new_file' WHERE username = '$username'"; 
        $qry1 = mysqli_query($conn,$sql1);
        if (!$qry1) {
            echo "ปรับปรุงข้อมูลไม่สำเร็จ";
            header("location: update_profile.php");
        }else {
            echo "ปรับปรุงข้อมูลสำเร็จ";
            header("location: profile.php");
        }  

    }