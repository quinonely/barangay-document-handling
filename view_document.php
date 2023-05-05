<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="img/seal_icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Document | Barangay 837</title>
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>

<?php 
require_once 'services/db.php';

$doc_id = $_GET['doc_id'];
$doc_type = $_GET['doc_type'];

$sql = "SELECT * FROM documents WHERE doc_id = '$doc_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
}

$random_number = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
$control_number = "837-" . str_pad($doc_id, 4, '0', STR_PAD_LEFT);

?>
<div class="bgded overlay" style="background-image:url('img/heading.jpg');"> 
<?php require_once("modules/nav.php"); get_navbar(); 
if (!isset($_SESSION['acc_id'])) {
  echo '<script>alert("You must be logged in order to access this part of the page.");</script>';
  print '<script>window.location.assign("login.php");</script>';
}

?>
 	<!-- ################################################################################################ -->
    <div id="breadcrumb" class="hoc clear">
     <h6 class="heading" style="font-size:45px;">View Document</h6>
  </div>
</div>
</div>
 	<!-- ################################################################################################ -->
<div class="wrapper row3">
<main class="hoc container clear">

      <div class="sectiontitle">
      <h2 class="heading underline font-x2" style="font-size:40px;">Viewing Document</h2><br><br>
      <p class="centerpara">Document Type: <?php echo $doc_type;?></p>
      <p class="centerpara">Control Number: <?php echo $control_number;?></p>
<br> </br>

<form action="" method="POST">
<br>
<center><h3 class="heading" style="font-size:30px; color:#263094;">Personal Details</h3></center>
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
      </table>

        <br>
          <label for="address"><h3 class="heading" style="font-size:25px; color:#263094;">Home Address</h3></label>
          <br>
          <input type="text" id="address" name="address" class="textminquiry" value="<?php echo $row['address']; ?>" readonly>

          <br>
          <label for="contact_num"><h3 class="heading" style="font-size:25px; color:#263094;">Contact Number</h3></label>
          <br>
          <input type="text" id="contact_num" name="contact_num" value="<?php echo $row['contact_num']; ?>" class="textminquiry" readonly>
          <br>
          <label for="pickup"><h3 class="heading" style="font-size:25px; color:#263094;">Pickup</h3></label>
          <br>
          <input type="text" id="pickup" name="pickup"  value="<?php echo $row['pickup']; ?>" class="textminquiry" readonly><br><br>


<?php if ($doc_type == 'ID') {?> 
        <table class="tableform">
        <tr class="tableform">
        <td class="tableform">
          <label for="birthdate"><h3 class="heading" style="font-size:25px; color:#263094;">Birthday</h3></label>
          <br>
          <input type="date" id="birthdate" name="birthdate" class="birthinput" value="<?php echo $row['birthdate']; ?>" readonly></td>

        <td class="tableform">
          <label for="birthplace"><h3 class="heading" style="font-size:25px; color:#263094;">Place of Birth</h3></label>
          <br>
          <input type="text" id="birthplace" name="birthplace" class="textminquiry" value="<?php echo $row['birthplace']; ?>" readonly></td>
        </tr>

        <tr class="tableform">
        <td class="tableform">
          <label for="weight"><h3 class="heading" style="font-size:25px; color:#263094;">Weight</h3></label>
          <br>
          <input type="number" id="weight" name="weight" class="textminquiry" value="<?php echo $row['weight']; ?>" readonly></td>

        <td class="tableform">
          <label for="height"><h3 class="heading" style="font-size:25px; color:#263094;">Height</h3></label>
          <br>
          <input type="number" id="height" name="height" class="textminquiry" value="<?php echo $row['height']; ?>" readonly></td>
        </tr>

        <tr class="tableform">
        <td class="tableform">
          <label for="civil_status"><h3 class="heading" style="font-size:25px; color:#263094;">Civil Status</h3></label>
          <br>
          <input type="text" id="civil_status" name="civil_status" class="textminquiry" value="<?php echo $row['civil_status']; ?>" readonly></td>

        <td class="tableform">
          <label for="tin"><h3 class="heading" style="font-size:25px; color:#263094;">TIN</h3></label>
          <br>
          <input type="number" id="tin" name="tin" class="textminquiry" value="<?php echo $row['tin']; ?>" readonly></td>
        </tr>
      </table>

        <br>
          <label for="SSSno"><h3 class="heading" style="font-size:25px; color:#263094;">SSS/GSIS No.</h3></label>
          <br>
          <input type="number" id="SSSno" name="SSSno" class="textminquiry" value="<?php echo $row['SSSno']; ?>" readonly>

          <br>
          <center><h3 class="heading" style="font-size:30px; color:#263094;">Emergency Contact Information</h3></center>
          <br>

        <table class="tableform">
        <tr class="tableform">
        <td class="tableform">
          <label for="ec_name"><h3 class="heading" style="font-size:25px; color:#263094;">Contact Name</h3></label>
          <br>
          <input type="text" id="ec_name" name="ec_name" class="textminquiry" value="<?php echo $row['ec_name']; ?>" readonly></td>

        <td class="tableform">
          <label for="ec_address"><h3 class="heading" style="font-size:25px; color:#263094;">Contact Address</h3></label>
          <br>
          <input type="text" id="ec_address" name="ec_address" class="textminquiry" value="<?php echo $row['ec_address']; ?>" readonly></td>
        </tr>
      </table>

      <br>
          <label for="ec_contact"><h3 class="heading" style="font-size:25px; color:#263094;">Contact Number</h3></label>
          <br>
          <input type="text" id="ec_contact" name="ec_contact" class="textminquiry" value="<?php echo $row['ec_contact']; ?>" readonly></td>

<?php } else if ($doc_type == 'Clearance') { ?>

        <br>
          <label for="purpose"><h3 class="heading" style="font-size:25px; color:#263094;">Purpose</h3></label>
          <br>
          <input type="text" id="purpose" name="purpose" class="textminquiry" value="<?php echo $row['purpose']; ?>" readonly>

<?php } else if ($doc_type == 'Indigency') { ?>

        <br>
          <label for="purpose"><h3 class="heading" style="font-size:25px; color:#263094;">Purpose</h3></label>
          <br>
          <input type="text" id="purpose" name="purpose" class="textminquiry" value="<?php echo $row['purpose']; ?>" readonly>

<?php } else if ($doc_type == 'Certificate') { ?>

       <br>
          <label for="purpose"><h3 class="heading" style="font-size:25px; color:#263094;">Purpose</h3></label>
          <br>
          <input type="text" id="purpose" name="purpose" class="textminquiry" value="<?php echo $row['purpose']; ?>" readonly>   

<?php } ?>

    <br> <br> <br>
<?php if ($_SESSION['acc_privilege'] == 'Admin'){ ?>
        <input type="hidden" name="doc_type" value="<?php echo $doc_type; ?>">
        <input type="hidden" name="doc_id" value="<?php echo $doc_id; ?>">
        <button type="submit" class="btn" name="approve_submit"> Approve </button> &nbsp; &nbsp;
        <button type="submit" class= "btn" name="deny_submit"> Deny </button>&nbsp; &nbsp;
        <button type="submit" class="btn" name="pending_submit"> Pending </button>&nbsp; &nbsp;
<?php } ?>
</form>
</main>
<?php
if ($_SESSION['acc_privilege'] == 'Admin') {
    $doc_id = $_GET['doc_id'];
    require_once 'services/db.php';

    if(isset($_POST['approve_submit'])) {
        $update_query = "UPDATE doc_req SET status='Approved' WHERE doc_id='$doc_id'";
        mysqli_query($conn, $update_query);
        mysqli_close($conn);
        echo "<script>alert('Changed to approved successfully.');</script>";
        exit();
    } elseif(isset($_POST['deny_submit'])) {
        $update_query = "UPDATE doc_req SET status='Denied' WHERE doc_id='$doc_id'";
        mysqli_query($conn, $update_query);
        mysqli_close($conn);
        echo "<script>alert('Changed to denied successfully.');</script>";
        exit();
    } elseif(isset($_POST['pending_submit'])) {
        $update_query = "UPDATE doc_req SET status='Pending' WHERE doc_id='$doc_id'";
        mysqli_query($conn, $update_query);
        mysqli_close($conn);
        echo "<script>alert('Changed to pending successfully.');</script>";
        exit();
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