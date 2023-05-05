<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'db.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $position = $_POST['position'];
    $suffix = $_POST['suffix'];
    $email = $_POST['email'];
    $phone_num = $_POST['phone_num'];
    $short_desc = $_POST['short_desc'];
    $ec_address = $_POST['ec_address'];
    $ec_contact = $_POST['ec_contact'];
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../img/" . $filename;

    if (move_uploaded_file($tempname, $folder)) {
        $image = "img/".$filename;
    } else {
        $image = "img/blank.png";
    }

    // Insert into documents table
    $sql = "INSERT INTO officials (position, short_desc, first_name, last_name, image, suffix, email, phone_num, visibility) 
            VALUES ('$position', '$short_desc', '$fname', '$lname', '$image', '$suffix', '$email', '$phone_num', 'No')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Added official successfully.');</script>";
    echo "<script>window.location.assign('../add_official.php');</script>";
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>

<br>