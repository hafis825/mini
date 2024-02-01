<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniProject | Home</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
    header {
        /* border: 1px solid red; */
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(211, 211, 211, 1);
    }


    .body {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .body-info {
        margin-top: 2rem;
        text-align: auto;
        padding: 1rem;
        max-width: 600px;
        max-height: 250px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 15px;
        /* overflow-y: scroll; */
    }

    .dropdown #user {
        color: #ff5733;
    }

    
</style>

<body>
    <section class="header">
        <div class="head-menu">
            <strong>วิทยาลัยการอาชีพปัตตานี</strong>
        </div>
        <ul class="nav-links">
            <li class="current"><a href="index.php">หน้าแรก</a></li>
            <div class="dropdown">
                    <button class="dropbtn">
                        ประวัติส่วนตัว
                        <i class="fa fa-caret-down"></i>
                    </button>
                <div class="dropdown-content">
                    <a href="profile.php">ประวัติส่วนตัว</a>
                    <a href="update_profile.php">เพิ่มข้อมูลประวัติส่วนตัว</a>
                </div>
            </div>
            <div class="dropdown">
                    <button class="dropbtn">
                        กิจกรรมจิตอาสา
                        <i class="fa fa-caret-down"></i>
                    </button>
                <div class="dropdown-content">
                    <a href="volunteer.php">กิจกรรมจิตอาสา</a>
                    <a href="update_volunteer.php">เพิ่มข้อมูลกิจกรรมจิตอาสา</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn" id="user">
                        <?php echo $_SESSION['username']; ?>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="logout.php">ออกจากระบบ</a>
                </div>
            </div>

        </ul>


    </section>



    <section class="body">
        <div class="body-info">
            ยินดีต้อนรับ ผู้เข้าชมเว็บไซต์ ทุกท่าน
        </div>
    </section>







    <!-- <div class="footer">
        <p><b>66309010012@Abdulhafis Waemusor</b></p>
        <p><i>6 Yarang, ChabangTiko, Muang, Pattani, 94000</i></p>
    </div> -->
</body>

</html>