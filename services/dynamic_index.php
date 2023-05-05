<?php
require_once 'db.php';
$sql = "SELECT * FROM index_page WHERE id=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
}

    if(isset($_POST['save1'])){
        $main_info = $_POST['main_info'];
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "../img/" . $filename;

        if (move_uploaded_file($tempname, $folder)) {
            $image = "img/".$filename;
        } else {
            $image =  $row['main_photo'];
        }

        $filename2 = $_FILES["image2"]["name"];
        $tempname2 = $_FILES["image2"]["tmp_name"];
        $folder2 = "../img/" . $filename2;

        if (move_uploaded_file($tempname2, $folder2)) {
            $image2 = "img/".$filename2;
        } else {
            $image2 = $row['gallery1'];
        }

        $filename3 = $_FILES["image3"]["name"];
        $tempname3 = $_FILES["image3"]["tmp_name"];
        $folder3 = "../img/" . $filename3;

        if (move_uploaded_file($tempname3, $folder3)) {
            $image3 = "img/".$filename3;
        } else {
            $image3 = $row['gallery2'];
        }

        $filename4 = $_FILES["image4"]["name"];
        $tempname4 = $_FILES["image4"]["tmp_name"];
        $folder4 = "../img/" . $filename4;

        if (move_uploaded_file($tempname4, $folder4)) {
            $image4 = "img/".$filename4;
        } else {
            $image4 = $row['gallery3'];
        }


        $sql = "UPDATE index_page SET main_photo='$image', gallery1='$image2', gallery2='$image3', gallery3='$image4', main_info='$main_info' WHERE id=1";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Successfully uploaded and edited MAIN INFORMATION.');</script>";
            echo "<script>window.location.assign('../index_a.php');</script>";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if(isset($_POST['save2'])){
        # INPUTS 
        $table_info1 = $_POST['table_info1'];
            $table_info2 = $_POST['table_info2'];
            $table_info3 = $_POST['table_info3'];
            $table_info_d1 = $_POST['table_info_d1'];
            $table_info_d2 = $_POST['table_info_d2'];
            $table_info_d3 = $_POST['table_info_d3'];
    
            # PHOTOS
            $filename5 = $_FILES["image5"]["name"];
            $tempname5 = $_FILES["image5"]["tmp_name"];
            $folder5 = "../img/" . $filename5;
    
            if (move_uploaded_file($tempname5, $folder5)) {
                $image5 = "img/".$filename5;
            } else {
                $image5 = $row['table_pic1'];
            }
    
            $filename6 = $_FILES["image6"]["name"];
            $tempname6 = $_FILES["image6"]["tmp_name"];
            $folder6 = "../img/" . $filename6;
    
            if (move_uploaded_file($tempname6, $folder6)) {
                $image6 = "img/".$filename6;
            } else {
                $image6 = $row['table_pic2'];
            }
    
            $filename7 = $_FILES["image7"]["name"];
            $tempname7 = $_FILES["image7"]["tmp_name"];
            $folder7 = "../img/" . $filename7;
    
            if (move_uploaded_file($tempname7, $folder7)) {
                $image7 = "img/".$filename7;
            } else {
                $image7 = $row['table_pic3'];
            }
            
            $sql = "UPDATE index_page SET table_info1='$table_info1', table_info2='$table_info2', table_info3='$table_info3', table_info_d1='$table_info_d1', table_info_d2='$table_info_d2', 
            table_info_d3='$table_info_d3', table_pic1='$image5', table_pic2='$image6', table_pic3='$image7' WHERE id=1";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Successfully uploaded and edited TABLE INFORMATION.');</script>";
                echo "<script>window.location.assign('../index_a.php');</script>";
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        if(isset($_POST['save3'])){
            # INPUTS 
            $address = $_POST['address'];
            $contact = $_POST['contact'];
            $socmed = $_POST['socmed'];
            $socmed_link = $_POST['socmed_link'];
    
            $sql = "UPDATE index_page SET address = '$address', contact = '$contact', socmed='$socmed', socmed_link='$socmed_link' WHERE id=1";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Successfully edited CONTACT US.');</script>";
                echo "<script>window.location.assign('../index_a.php');</script>";
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
?>