<?php
    include "config.php";
    session_start();

    

   $volunteer = $_POST['volunteer'];
   $location = $_POST['location'];
   $hours = $_POST['hours'];
   $event_date = $_POST['event_date'];
   $username = $_SESSION['username'];
   
   
   $sql = "INSERT INTO todo VALUES  (0,'$volunteer','$location','$hours','$event_date','$username')"; 
   $qry = mysqli_query($conn,$sql);
   if (!$qry) {
       // ไม่สามารถเพิ่มข้อมูลได้
       header("location: add_volunteer.php");
   }else { 
        // เพิ่มข้อมูลเรียบร้อยแล้ว
        header("location: volunteer.php");
   }



?>