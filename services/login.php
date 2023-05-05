<?php
require_once 'db.php';
session_start();
$errors = [];
ini_set('display_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $select = "SELECT * FROM accs WHERE username = ?";
    $stmt = mysqli_prepare($conn, $select);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            if($row['acc_privilege'] == 'Admin'){
                $_SESSION['acc_privilege'] = 'Admin';
                $_SESSION['admin'] = true;
                $_SESSION['acc_id'] = $row['acc_id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                header('location:../index.php');
                exit;
            }elseif($row['acc_privilege'] == 'User'){
                $_SESSION['acc_privilege'] = 'User';
                $_SESSION['user'] = true;
                $_SESSION['acc_id'] = $row['acc_id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                header('location:../index.php');
                exit;
            }
        }else{
            echo '<script>alert("Incorrect username or password!");</script>';
            print "<script>window.location.assign('../login.php');</script>";
        }
    }else{
        echo '<script>alert("Incorrect username or password!");</script>';
        print "<script>window.location.assign('../login.php');</script>";
    }
}
?>
