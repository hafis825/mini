<?php
    include "config.php";

    
   $volunteer = $_POST['volunteer'];
   $location = $_POST['location'];
   $hours = $_POST['hours'];
   $event_date = $_POST['event_date'];
   $id = $_POST['id'];
   

    $sql = "UPDATE todo SET volunteer='$volunteer', location='$location', hours='$hours', event_date='$event_date' WHERE id='$id'";
    $qry = mysqli_query($conn, $sql); 
    
    if (!$qry) {
        // อัปเดตข้อมูลไม่สำเร็จ
        header("location: update_volunteer.php");
    } else { 
        // อัปเดตข้อมูลเรียบร้อยแล้ว
        header("location: volunteer.php");
    }
    
    mysqli_close($conn);

?>
