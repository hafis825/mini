<?php
   include "config.php";
   session_start();

   $username = $_SESSION['username'];

   $sql = "SELECT * FROM profile WHERE username = '$username'"; 
   $qry = mysqli_query($conn,$sql);
   $result = mysqli_fetch_array($qry); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniProject | Profile</title>
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
        text-align: center;
        padding: 1rem;
        max-width: 550px;
        max-height: 300px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 15px;

        & img {
            max-width: 250px;
            max-height: 150px;
        }
    }

    .dropdown #color {
        color: #fff;
    }

    .dropdown #user {
        color: #ff5733;
    }

    table tr {
        font-size: 21px;
        margin: 1rem;
    }

    table td {
        color: #4682B4;
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
            <h1>ประวัติส่วนตัว</h1>
        </div>
    </header>

    <div class="body-info">
        <img src="images/<?php echo $result['photo'];?>" alt="profile">
            <table>
                <tr style="align-items: center;font-size: 21px;">
                    <th>ชื่อ - สกุล</th>
                    <td>
                        <?php echo $result['fullname'];?>
                    </td>
                </tr>

                <tr style="align-items:event_date center;font-size: 21px;">
                    <th>สาขาวิชา</th>
                    <td>
                        <?php echo $result['depname'];?>
                    </td>
                </tr>

                <tr style="align-items: center;font-size: 21px;">
                    <th>เกรดเฉลี่ย</th>
                    <td>
                        <?php echo $result['gpa'];?>
                    </td>
                </tr>
            </table>
        <?php mysqli_close($conn); ?>
    </div>






    <!-- <div class="footer">
        <p><b>66309010012@Abdulhafis Waemusor</b></p>
        <p><i>6 Yarang, ChabangTiko, Muang, Pattani, 94000</i></p>
    </div> -->
</body>

</html>