<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="img/seal_icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Official | Barangay 837</title>
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>

<?php 
require_once 'services/db.php';
$official_id = $_GET['official_id'];

$sql = "SELECT * FROM officials WHERE official_id = $official_id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
}
?>

<div class="bgded overlay" style="background-image:url('img/heading.jpg');"> 
<?php require_once("modules/nav.php"); get_navbar(); 
if (!isset($_SESSION['acc_id'])) {
  echo '<script>alert("You must be logged in order to access this part of the page.");</script>';
  print '<script>window.location.assign("login.php");</script>';
}
if(!($_SESSION['acc_privilege'] == 'Admin')){
print '<script>alert("Sorry. You are not authorized to access this page.");</script>';
print '<script>window.location.assign("index.php");</script>';
}
?>
 	<!-- ################################################################################################ -->
    <div id="breadcrumb" class="hoc clear">
     <h6 class="heading" style="font-size:45px;">View Official</h6>
  </div>
</div>
</div>
 	<!-- ################################################################################################ -->
<div class="wrapper row3">
<main class="hoc container clear">

      <div class="sectiontitle">
      <h2 class="heading underline font-x2" style="font-size:40px;">Viewing Official</h2><br><br>
<br> </br>

<form action="" method="POST">
<br>
<center><h3 class="heading" style="font-size:30px; color:#263094;">Picture</h3></center><br>
<center><img src="<?php echo $row['image']; ?>" style="width:200px"></center>
<br>
      <table class="tableform">
        <tr class="tableform">
        <td class="tableform">
          <label for="first_name"><h3 class="heading" style="font-size:25px; color:#263094;">First Name</h3></label>
          <br>
          <input type="text" id="first_name" name="first_name" class="textminquiry" value="<?php echo $row['first_name']; ?>" readonly></td>
        <td class="tableform">
          <label for="last_name"><h3 class="heading" style="font-size:25px; color:#263094;">Last Name</h3></label>
          <br>
          <input type="text" id="last_name" name="last_name"  class="textminquiry" value="<?php echo $row['last_name']; ?>" readonly></td>
        </tr>

        <tr class="tableform">
        <td class="tableform">
          <label for="position"><h3 class="heading" style="font-size:25px; color:#263094;">Position</h3></label>
          <br>
          <input type="text" id="position" name="position" value="<?php echo $row['last_name']; ?>" class="textminquiry" readonly></td>
        <td class="tableform">
        <label for="suffix"><h3 class="heading" style="font-size:25px; color:#263094;">Suffix</h3></label>
        <br>
        <input type="text" id="suffix" name="suffix" class="textminquiry" value="<?php echo $row['suffix']; ?>" readonly></td>
        </tr>

        <tr class="tableform">
        <td class="tableform">
          <label for="email"><h3 class="heading" style="font-size:25px; color:#263094;">Email</h3></label>
          <br>
          <input type="text" id="email" name="email" class="textminquiry" value="<?php echo $row['email']; ?>" readonly></td>
        <td class="tableform">
        <label for="phone_num"><h3 class="heading" style="font-size:25px; color:#263094;">Contact No.</h3></label>
          <br>
          <input type="number" id="phone_num" name="phone_num" class="textminquiry" value="<?php echo $row['phone_num']; ?>" readonly></td>
        </tr>
        </table>

        <br>
          <label for="short_desc"><h3 class="heading" style="font-size:25px; color:#263094;">Short Description</h3></label>
          <br>
          <input type="text" id="short_desc" name="short_desc" value="<?php echo $row['short_desc']; ?>"  class="textminquiry" readonly>

        <br>
        <br>

        <a class="btn" href="index_a.php">Back</a>
</form>
</main>
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