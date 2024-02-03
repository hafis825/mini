<?php
    include "config.php";
    session_start();

    

   $volunteer = $_POST['volunteer'];
   $location = $_POST['location'];
   $hours = $_POST['hours'];
   $event_date = $_POST['event_date'];
   $username = $_SESSION['username'];
   
   
   $sql = "INSERT INTO todo VALUES  (0,'$volunteer','$location','$hours','$event_date','$username')"; 

   //$sql = "UPDATE todo SET volunteer = '$volunteer', location = '$location', hours = '$hours', event_date = '$event_date' WHERE username = '$username'"; 
   $qry = mysqli_query($conn,$sql);
   if (!$qry) {
       echo "ไม่สามารถเพิ่มข้อมูลได้";
       header("location: update_volunteer.php");
   }else { 
   
        echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
        header("location: volunteer.php");
   }



?>