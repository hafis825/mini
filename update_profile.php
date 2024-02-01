<?php 
    include 'config.php';
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
            margin: 0 auto;
            max-width: 550px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 5px;
    }

    input[type=text],
    input[type=file] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            outline: none;
            border-radius: 5px;
    }

    .container {
            padding: 16px;
    }

    .container a {
            color: #292929;
    }


    .btn {
            background-color: #292929;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
            transition: 0.3s;
    }

    .dropdown #color {
        color: #fff;
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
            <li><a href="index.php">หน้าแรก</a></li>
            <div class="dropdown">
                    <button class="dropbtn" id="color">
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



    <header>
        <div class="header-info">
            <h1>เพิ่มข้อมูล/แก้ไขประวัติส่วนตัว</h1>
        </div>
    </header>

    <section class="body-info">
        <div class="container">
            <form action="process_updete_profile.php" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="uname"><b>ชื่อ - สกุล</b></label>
                    <input type="text" name="fullname" placeholder="ชื่อ - สกุล">
                </div>

                <div class="input-group">
                    <label for="psw"><b>สาขาวิชา</b></label>
                    <input type="text" name="depname" placeholder="สาขาวิชา">
                </div>

                <div class="input-group">
                    <label for="psw"><b>เกรดเฉลี่ย</b></label>
                    <input type="text" name="gpa" placeholder="เกรดเฉลี่ย">
                </div>

                <div class="input-group">
                    <label for="psw"><b>รูปภาพ</b></label>
                    <input type="file" name="avatar" >
                </div>


                <div class="input-group">
                    <button type="submit" class="btn">เพิ่มข้อมูล/แก้ไข</button>

                </div>
            </form>
        </div>
    </section>







    <!-- <div class="footer">
        <p><b>66309010012@Abdulhafis Waemusor</b></p>
        <p><i>6 Yarang, ChabangTiko, Muang, Pattani, 94000</i></p>
    </div> -->
</body>

</html>