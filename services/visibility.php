<?php
session_start();

session_start();
if (!isset($_SESSION['acc_id'])) {
        echo '<script>alert("You must be logged in order to access this part of the page.");</script>';
        print '<script>window.location.assign("login.php");</script>';
}


if(!($_SESSION['acc_privilege'] == 'Admin')){
    print '<script>alert("Sorry. You are not authorized to access this page.");</script>';
    print '<script>window.location.assign("index.php");</script>';
    }

# PROCESS VISIBILITY CHANGE
if($_SERVER['REQUEST_METHOD'] == "GET") {
    $conn = mysqli_connect("localhost", "root", "", "brgy") or die(mysqli_error());
    $official_id = $_GET['official_id'];
    $result = mysqli_query($conn, "SELECT visibility FROM officials WHERE official_id='$official_id'");
    
    if (!$result) {
        echo mysqli_error($conn);
    } else {
        $visibility = mysqli_fetch_assoc($result)['visibility'];

        if($visibility == 'No') {
            mysqli_query($conn, "UPDATE officials SET visibility='Yes' WHERE official_id='$official_id'");
        } elseif($visibility == 'Yes') {
            mysqli_query($conn, "UPDATE officials SET visibility='No' WHERE official_id='$official_id'");
        }

        header("location:../index_a.php");
    }
}
?>
