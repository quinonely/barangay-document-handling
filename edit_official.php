<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="img/seal_icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Officials | Barangay 837</title>
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>

<?php 
require_once 'services/db.php';
$official_id = $_GET['official_id'];

$sql = "SELECT * FROM officials WHERE official_id = '$official_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
}

?>
<div class="bgded overlay" style="background-image:url('img/heading.jpg');"> 
<?php require_once("modules/nav.php"); get_navbar(); 
if (!isset($_SESSION['acc_id'])) {
  echo '<script>alert("You must be logged in order to access this part of the page.");</script>';
  print '<script>window.location.assign("login.php");</script>';
}

if(!$_SESSION['acc_privilege'] == 'Admin'){
print '<script>alert("Sorry. You are not authorized to access this page.");</script>';
print '<script>window.location.assign("index.php");</script>';  
}

?>
 	<!-- ################################################################################################ -->
    <div id="breadcrumb" class="hoc clear">
     <h6 class="heading" style="font-size:45px;">Edit Official</h6>
  </div>
</div>
</div>
 	<!-- ################################################################################################ -->
<div class="wrapper row3">
<main class="hoc container clear">

      <div class="sectiontitle">
      <h2 class="heading underline font-x2" style="font-size:40px;">Editing Official</h2><br><br>
<br> </br>

<form id="official" method="POST" enctype="multipart/form-data" action="edit_official.php?official_id=<?php echo $official_id ?>">
<center><h3 class="heading" style="font-size:30px; color:#263094;">Picture</h3></center>
<br>
<center><img src="<?php echo $row['image']; ?>" style="width:200px"></center><br>
<input class="btn btn-main" type="file" id="image" name="image">
<br>
      <table class="tableform">
        <tr class="tableform">
        <td class="tableform">
          <label for="fname"><h3 class="heading" style="font-size:25px; color:#263094;">First Name</h3></label>
          <br>
          <input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo $row['first_name']; ?>" class="textminquiry" ></td>
        <td class="tableform">
          <label for="lname"><h3 class="heading" style="font-size:25px; color:#263094;">Last Name</h3></label>
          <br>
          <input type="text" id="lname" name="lname" placeholder="Last Name" value="<?php echo $row['last_name']; ?>" class="textminquiry" ></td>
        </tr>

        <tr class="tableform">
        <td class="tableform">
          <label for="position"><h3 class="heading" style="font-size:25px; color:#263094;">Position</h3></label>
          <br>
          <input type="text" id="position" name="position" placeholder="Position" value="<?php echo $row['position']; ?>" class="textminquiry" ></td>
        <td class="tableform">
        <label for="suffix"><h3 class="heading" style="font-size:25px; color:#263094;">Suffix</h3></label>
          <br>
          <select id="suffix" name="suffix" class="selectminquiry" >
        <option value="">Please choose an option</option>
        <option value="Mr" <?php if ($row['suffix'] == 'Mr') {echo 'selected';} ?>>Mr.</option>
        <option value="Ms" <?php if ($row['suffix'] == 'Ms') {echo 'selected';} ?>>Ms.</option>
        <option value="Mrs" <?php if ($row['suffix'] == 'Mrs') {echo 'selected';} ?>>Mrs.</option>
      </select></td>
        </tr>

        <tr class="tableform">
        <td class="tableform">
          <label for="email"><h3 class="heading" style="font-size:25px; color:#263094;">Email</h3></label>
          <br>
          <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Email" class="textminquiry" ></td>
        <td class="tableform">
        <label for="phone_num"><h3 class="heading" style="font-size:25px; color:#263094;">Contact No.</h3></label>
          <br>
          <input type="number" id="phone_num" name="phone_num" value="<?php echo $row['phone_num']; ?>" placeholder="Contact Number" class="textminquiry" ></td>
        </tr>
        </table>

        <br>
          <label for="short_desc"><h3 class="heading" style="font-size:25px; color:#263094;">Short Description</h3></label>
          <br>
          <input type="text" id="short_desc" name="short_desc" value="<?php echo $row['short_desc']; ?>" placeholder="Short Description ex. Punong Barangay" class="textminquiry">

          <br> </br>

          <input type="submit" value="Submit" class="btn"> &nbsp;&nbsp;&nbsp;
          <input type="reset" value="Reset" onclick="clearInputs()" class="btn inverse">&nbsp;&nbsp;&nbsp;
          <a class="btn" href="index_a.php">Back</a>

</form>
</main>
<script>
  function clearInputs() {
    document.getElementById("official").reset();
  }
</script>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'services/db.php';

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
    $sql = "UPDATE officials SET position='$position', short_desc='$short_desc', first_name='$fname', last_name='$lname', image='$image', suffix='$suffix', email='$email', 
    phone_num='$phone_num' WHERE official_id='$official_id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Edited official successfully.');</script>";
    echo "<meta http-equiv='refresh' content='0'>";
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>

<br>
</div>
<!-- ################################################################################################ -->
<div class="bgded overlay row4" style="background-image:url('images/home/heading.jpg');">
  <footer id="footer" class="hoc clear"> 
    <div class="center btmspace-50">
      <h6 class="heading">Barangay 837</h6>
      <p class="nospace">All Rights Reserved &copy; 2023 Brgy. 837, Pandacan Manila by Cuba</p>
    </div>
</div>
<!-- ################################################################################################ -->
</body>
</html>

