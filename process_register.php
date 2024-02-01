<?php 
    session_start();
    include('config.php');

    $errors = array();

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

    
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        $user_check_query = "SELECT * FROM account WHERE username = '$username'  ";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) {
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password);

            $sql = "INSERT INTO account (id,username, password, level) VALUES (0,'$username', '$password', 'student')";
            mysqli_query($conn, $sql);

            $sql2 = "INSERT INTO profile (id,username) VALUES (0,'$username')"; 
            mysqli_query($conn,$sql2);

            $sql3 = "INSERT INTO todo (id,username) VALUES (0,'$username')"; 
            mysqli_query($conn,$sql3);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        } 
    
    }


?>