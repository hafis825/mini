<?php
   include "config.php";
   session_start();

   if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
   }

   $username = $_SESSION['username'];
   $sql = "SELECT * FROM todo WHERE username = '$username' "; 
   $qry = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniProject | volunteer</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    header {
        display: flex;
        justify-content: center;
        align-items: center;
    }


    .dropdown #color {
        color: #fff;
    }

    .dropdown #user {
        color: #ff5733;
    }

    table {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-spacing: 1;
        border-collapse: collapse;
        background-color: rgba(211, 211, 211, 1);
        border-radius: 6px;
        overflow: hidden;
        max-width: 650px;
        width: 100%;
        margin: 0 auto;
        position: relative;

        * {
            position: relative
        }

        td,
        th {
            padding-left: 8px
        }

        thead tr {
            height: 60px;
            background: #707070;
            font-size: 16px;
        }

        tbody tr {
            height: 48px;
            border-bottom: 1px solid #E3F1D5;

            &:last-child {
                border: 0;
            }
        }

        td,
        th {
            text-align: left;

            &.l {
                text-align: right
            }

            &.c {
                text-align: center
            }

            &.r {
                text-align: center
            }
        }

        .table-a a{
            color: #ff5733;
            font-size: 18px;
            text-decoration: none;
            padding: 8px; 
        }
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
                <button class="dropbtn" id="color">
                    กิจกรรมจิตอาสา
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="volunteer.php">กิจกรรมจิตอาสา</a>
                    <a href="add_volunteer.php">เพิ่มข้อมูลกิจกรรมจิตอาสา</a>
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
            <h1>กิจกรรมจิตอาสา</h1>
        </div>
    </header>



    <table>
        <thead>
            <tr>
                <th>กิจกรรม</th>
                <th>สถานที่</th>
                <th>จำนวนชั่วโมง</th>
                <th>วันเดือนปี</th>
                <th style="text-align: center;">ดำเนินการ</th>
            </tr>
        </thead>
        <?php while($result = mysqli_fetch_array($qry,MYSQLI_ASSOC) ){?>
        <tbody>
            <tr>
                <td>
                    <?php echo $result['volunteer'];?>
                </td>
                <td>
                    <?php echo $result['location'];?>
                <td>
                    <?php echo $result['hours'];?>
                </td>
                <td>
                    <?php echo $result['event_date'];?>
                </td>
                <td style="text-align: center;">

                    <div class="table-a">
                        <a href="JavaScript:if(confirm('Confirm Edit?')==true){window.location='update_volunteer.php?id=<?php echo $result["id"];?>';}" title="แก้ไข">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                        <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='delete.php?id=<?php echo $result["id"];?>';}" title="ลบ">
                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                    </div>
                </td>

            </tr>
        </tbody>
        <?php } ?>
    </table>
    <?php mysqli_close($conn); ?>

    <!-- <div class="footer">
        <p><b>66309010012@Abdulhafis Waemusor</b></p>
        <p><i>6 Yarang, ChabangTiko, Muang, Pattani, 94000</i></p>
    </div> -->
</body>

</html>