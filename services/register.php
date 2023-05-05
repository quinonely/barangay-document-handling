<?php

require_once 'db.php';

if(isset($_POST['submit'])){

    //sanitize and validate input
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $sname = mysqli_real_escape_string($conn, $_POST['sname']);
    $sex = ($_POST['sex'] === 'Male' || $_POST['sex'] === 'Female') ? $_POST['sex'] : null;
    $civil_status = ($_POST['civil_status'] === 'Single' || $_POST['civil_status'] === 'Married' || $_POST['civil_status'] === 'Divorced') ? $_POST['civil_status'] : null;
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $birthday = $_POST['birthday'];
    $number = preg_replace("/[^0-9]/", "", $_POST['number']); //remove non-numeric characters
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    //perform validation checks
    $error = array();
    if($password !== $cpassword){
        echo '<script>alert("Passwords do not match.");</script>';
        print "<script>window.location.assign('../register.php');</script>";
    } else {
    }

    //check if username already exists in the database
    $query_check = "SELECT * FROM accs WHERE username='$username' AND acc_privilege='User'";
    $result_check = mysqli_query($conn, $query_check);
    if(mysqli_num_rows($result_check) > 0) {
        echo '<script>alert("Username already exists.");</script>';
        print "<script>window.location.assign('../register.php');</script>";
        exit();
    }

    //encrypt the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    //if there are errors, print them in JavaScript
    if(!empty($error)){
        echo '<script>';
        foreach($error as $message){
            echo 'alert("'.$message.'");';
        }
        echo '</script>';
    } else {
        $query = "INSERT INTO accs (first_name, last_name, sex, civil_stat, address, birthdate, phone_num, email, username, password, acc_privilege) VALUES ('$fname', '$sname', '$sex', '$civil_status', '$address', '$birthday', '$number', '$email', '$username', '$password_hash', 'User')";

        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Successfully registered.');</script>";
            print "<script>window.location.assign('../login.php');</script>";
            exit();
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
