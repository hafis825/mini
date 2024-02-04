<?php
    include "config.php";

    
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $volunteer = mysqli_real_escape_string($conn, $_POST['volunteer']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $hours = mysqli_real_escape_string($conn, $_POST['hours']);
    $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);
   

   $sql = "UPDATE todo SET volunteer='$volunteer', location='$location', hours='$hours', event_date='$event_date' WHERE id='$id'";
   $qry = mysqli_query($conn,$sql); 
   if (!$qry) {
       echo "ไม่สามารถเพิ่มข้อมูลได้";
       header("location: update_volunteer.php");
   }else { 
        // เพิ่มข้อมูลเรียบร้อยแล้ว
        header("location: volunteer.php");
   }

   mysqli_close($conn);

?>