<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="img/seal_icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Document | Barangay 837</title>
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>

<?php 
require_once 'services/db.php';
$doc_type = $_GET['doc_type'];
$doc_id = $_GET['doc_id'];

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
     <h6 class="heading" style="font-size:45px;">Edit Document</h6>
  </div>
</div>
</div>
 	<!-- ################################################################################################ -->
<div class="wrapper row3">
<main class="hoc container clear">

      <div class="sectiontitle">
      <h2 class="heading underline font-x2" style="font-size:40px;">Editing Document</h2><br><br>
      <p class="centerpara">Document Type: <?php echo $doc_type;?></p>
      <p class="centerpara">Control Number: <?php echo $control_number;?></p>
<br> </br>

<form id="edit" method="POST" action="edit_document.php?doc_id=<?php echo $doc_id ?>&doc_type=<?php echo $doc_type ?>">
<table class="tableform">
<tr class="tableform">
<td class="tableform">
   <label for="first_name"><h3 class="heading" style="font-size:25px; color:#263094;">First Name:</label></h3>
   <br>
    <input type="text" name="first_name" class="textminquiry" id="first_name" value="<?php echo $row['first_name']; ?>"></td>
    <td class="tableform">
    <label for="last_name"><h3 class="heading" style="font-size:25px; color:#263094;">Last Name:</label></h3>
    <br>
    <input type="text" name="last_name" class="textminquiry" id="last_name" value="<?php echo $row['last_name']; ?>"></td>
     </tr>
</table>

<br>
    <label for="address"><h3 class="heading" style="font-size:25px; color:#263094;">Home Address:</label></h3>
    <br>
    <input type="text" name="address" class="textminquiry" id="address" value="<?php echo $row['address']; ?>">
<br>

<br>
          <label for="contact_num"><h3 class="heading" style="font-size:25px; color:#263094;">Contact Number</h3></label>
          <br>
          <input type="text" id="contact_num" name="contact_num" value="<?php echo $row['contact_num']; ?>" class="textminquiry">
          <br>
          <label for="pickup"><h3 class="heading" style="font-size:25px; color:#263094;">Pickup</h3></label>
          <br>
          <select id="pickup" name="pickup" class="selectminquiry">
        <option value="">Please choose an option</option>
        <option value="Myself" <?php if ($row['pickup'] == 'Myself') {echo 'selected';} ?>>Myself</option>
        <option value="Authorized Person" <?php if ($row['pickup'] == 'Authorized Person') {echo 'selected';} ?>>Authorized Person</option>
        <option value="Grab/Lalamove/Etc" <?php if ($row['pickup'] == 'Grab/Lalamove/Etc') {echo 'selected';} ?>>Grab/Lalamove/Etc</option>
      </select><br><br>

    <?php if ($doc_type == 'ID') {?> 

<table class="tableform">
<tr class="tableform">
<td class="tableform">
    <label for="birthdate"><h3 class="heading" style="font-size:25px; color:#263094;">Birthdate:</label></h3>
    <br>
    <input type="date" name="birthdate" class="textminquiry" id="birthdate" value="<?php echo $row['birthdate']; ?>">
    </td>
    
    <td class="tableform">
    <label for="birthplace"><h3 class="heading" style="font-size:25px; color:#263094;">Place of Birth:</label></h3>
    <br>
    <input type="text" name="birthplace" class="textminquiry" id="birthplace" value="<?php echo $row['birthplace']; ?>"></td>

    </tr>

    <tr class="tableform">
    <td class="tableform">
    <label for="weight"><h3 class="heading" style="font-size:25px; color:#263094;">Weight (kg):</label></h3>
    <br>
    <input type="number" name="weight" class="textminquiry" id="weight" value="<?php echo $row['weight']; ?>"></td>
    
    <td class="tableform">
    <label for="height"><h3 class="heading" style="font-size:25px; color:#263094;">Height (ft):</label></h3>
    <br>
    <input type="number" name="height" class="textminquiry" id="height" value="<?php echo $row['height']; ?>"><td>

    </tr>
    
    <tr class="tableform">
    <td class="tableform">
    <label for="civil_status"><h3 class="heading" style="font-size:25px; color:#263094;">Civil Status:</label><br></h3>
    <select name="civil_status" class="textminquiry" id="civil_status">
    <option value="">Select</option>
    <option value="Single" <?php if ($row['civil_status'] == 'Single') {echo 'selected';} ?>>Single</option>
    <option value="Married" <?php if ($row['civil_status'] == 'Married') {echo 'selected';} ?>>Married</option>
    <option value="Divorced" <?php if ($row['civil_status'] == 'Divorced') {echo 'selected';} ?>>Divorced</option>
    <option value="Widowed" <?php if ($row['civil_status'] == 'Widowed') {echo 'selected';} ?>>Widowed</option>
    </select></td>

    <td class="tableform">
    <label for="tin"><h3 class="heading" style="font-size:25px; color:#263094;">TIN:</label></h3>
    <input type="text" class="textminquiry" name="tin" id="tin" value="<?php echo $row['tin']; ?>">
    </td>

    </tr>

    <tr class="tableform">
    <td class="tableform">
    
    <label for="SSSno"><h3 class="heading" style="font-size:25px; color:#263094;">SSS/GSIS:</label></h3>
    <input type="text" class="textminquiry" name="SSSno" id="SSSno" value="<?php echo $row['SSSno']; ?>"></td>
    
    <td class="tableform">
    <label for="ec_name"><h3 class="heading" style="font-size:25px; color:#263094;">Emergency Contact Name:</label></h3>
    <input type="text" name="ec_name" class="textminquiry" id="ec_name" value="<?php echo $row['ec_name']; ?>">
    
    </tr>

    <tr class="tableform">
    <td class="tableform">
    <label for="ec_address"><h3 class="heading" style="font-size:25px; color:#263094;">Emergency Contact Address:</label></h3>
    <input type="text" name="ec_address" class="textminquiry" id="ec_address" value="<?php echo $row['ec_address']; ?>">
    </td>
    
    <td class="tableform">
    <label for="ec_contact"><h3 class="heading" style="font-size:25px; color:#263094;">Emergency Contact Phone Number:</label></h3>
    <input type="number" name="ec_contact" class="textminquiry" id="ec_contact" value="<?php echo $row['ec_contact']; ?>"></td>
    </table>

    <?php } else if ($doc_type == 'Clearance') { ?>
    
    <br>
    <label for="purpose"><h3 class="heading" style="font-size:25px; color:#263094;">Purpose:</label></h3>
    <input type="text" name="purpose" class="textminquiry" id="purpose" value="<?php echo $row['purpose']; ?>">
    
    <?php } else if ($doc_type == 'Indigency') { ?>

    <label for="purpose"><h3 class="heading" style="font-size:25px; color:#263094;">Purpose:</label></h3>
    <input type="text" class="textminquiry" name="purpose" id="purpose" value="<?php echo $row['purpose']; ?>">
    
    <?php } else if ($doc_type == 'Certificate') { ?>

    <label for="purpose"><h3 class="heading" style="font-size:25px; color:#263094;">Purpose:</label></h3>
    <input type="text" name="purpose" class="textminquiry" id="purpose" value="<?php echo $row['purpose']; ?>">
    
    <?php } ?>

    <br>
    <br>
    <input type="submit" value="Submit" class="btn"> &nbsp;&nbsp;&nbsp;
    <button type="reset" value="Reset" onclick="clearInputs()" class="btn inverse">Reset</button>

</form>
</main>
<script>
  function clearInputs() {
    document.getElementById("edit").reset();
  }
</script>

<?php
# check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'services/db.php';
  
    if ($doc_type == 'ID') {
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $birthplace = $_POST['birthplace'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $civil_status = $_POST['civil_status'];
    $tin = $_POST['tin'];
    $SSSno = $_POST['SSSno'];
    $ec_name = $_POST['ec_name'];
    $ec_address = $_POST['ec_address'];
    $ec_contact = $_POST['ec_contact'];
    $contact_num = $_POST['contact_num'];
    $pickup = $_POST['pickup'];

    $sql = "UPDATE documents SET first_name='$first_name', last_name='$last_name', address='$address', birthdate='$birthdate', birthplace='$birthplace', weight='$weight', 
    height= '$height', civil_status='$civil_status', tin='$tin', SSSno='$SSSno', ec_name='$ec_name', ec_address='$ec_address', ec_contact='$ec_contact', contact_num='$contact_num', pickup='$pickup' WHERE doc_id=$doc_id AND doc_type='$doc_type'";
    
    } else if ($doc_type == 'Clearance') { 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $purpose = $_POST['purpose'];
    $contact_num = $_POST['contact_num'];
    $pickup = $_POST['pickup'];
    $sql = "UPDATE documents SET first_name='$first_name', last_name='$last_name', address='$address', purpose='$purpose', contact_num='$contact_num', pickup='$pickup' WHERE doc_id=$doc_id AND doc_type='$doc_type'";

    } else if ($doc_type == 'Indigency') { 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $purpose = $_POST['purpose'];
    $contact_num = $_POST['contact_num'];
    $pickup = $_POST['pickup'];
    $sql = "UPDATE documents SET first_name='$first_name', last_name='$last_name', address='$address', purpose='$purpose', contact_num='$contact_num', pickup='$pickup' WHERE doc_id=$doc_id AND doc_type='$doc_type'";

    } else if ($doc_type == 'Certificate') { 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $purpose = $_POST['purpose'];
    $contact_num = $_POST['contact_num'];
    $pickup = $_POST['pickup'];
    $sql = "UPDATE documents SET first_name='$first_name', last_name='$last_name', address='$address', purpose='$purpose', contact_num='$contact_num', pickup='$pickup' WHERE doc_id=$doc_id AND doc_type='$doc_type'";
    
    } 
        
    if ($conn->query($sql) === TRUE) {
     echo "<script>alert('Successfully edited.');</script>";
     echo "<meta http-equiv='refresh' content='0'>";
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  
    $conn->close();
  }
  
?>
</body>
</html>
