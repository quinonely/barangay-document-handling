<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" type="image/png" href="img/seal_icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Official | Barangay 837</title>
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>

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
     <h6 class="heading" style="font-size:45px;">Add Official</h6>
  </div>
</div>
</div>
 	<!-- ################################################################################################ -->
<div class="wrapper row3">
	<main class="hoc container clear">

      <div class="sectiontitle">
      <h2 class="heading underline font-x2" style="font-size:40px;">Official Fill Form</h2>
      <br> </br>
      <p class="centerpara">Please fill the form accordingly below.</p>
<br> </br>
<br>
<form id="official" action="services/add_official.php" method="POST">
<center><h3 class="heading" style="font-size:30px; color:#263094;">Picture</h3></center>
<br>
<input class="btn btn-main" type="file" id="image" name="image">
<br>
      <table class="tableform">
        <tr class="tableform">
        <td class="tableform">
          <label for="fname"><h3 class="heading" style="font-size:25px; color:#263094;">First Name</h3></label>
          <br>
          <input type="text" id="fname" name="fname" placeholder="First Name" class="textminquiry" required></td>
        <td class="tableform">
          <label for="lname"><h3 class="heading" style="font-size:25px; color:#263094;">Last Name</h3></label>
          <br>
          <input type="text" id="lname" name="lname" placeholder="Last Name" class="textminquiry" required></td>
        </tr>

        <tr class="tableform">
        <td class="tableform">
          <label for="position"><h3 class="heading" style="font-size:25px; color:#263094;">Position</h3></label>
          <br>
          <input type="text" id="position" name="position" placeholder="Position" class="textminquiry" required></td>
        <td class="tableform">
        <label for="suffix"><h3 class="heading" style="font-size:25px; color:#263094;">Suffix</h3></label>
          <br>
          <select id="suffix" name="suffix" class="selectminquiry" required>
        <option value="">Please choose an option</option>
        <option value="Mr">Mr.</option>
        <option value="Ms">Ms.</option>
        <option value="Mrs">Mrs.</option>
      </select></td>
        </tr>

        <tr class="tableform">
        <td class="tableform">
          <label for="email"><h3 class="heading" style="font-size:25px; color:#263094;">Email</h3></label>
          <br>
          <input type="text" id="email" name="email" placeholder="Email" class="textminquiry" required></td>
        <td class="tableform">
        <label for="phone_num"><h3 class="heading" style="font-size:25px; color:#263094;">Contact No.</h3></label>
          <br>
          <input type="number" id="phone_num" name="phone_num" placeholder="Contact Number" maxlength="100" class="textminquiry" required></td>
        </tr>
        </table>

        <br>
          <label for="short_desc"><h3 class="heading" style="font-size:25px; color:#263094;">Short Description</h3></label>
          <br>
          <input type="text" id="short_desc" name="short_desc" placeholder="Short Description ex. Punong Barangay" class="textminquiry">

        <br>
        <br>
        <br>
          <table class="cont">
          <tr class="cont">
          <td class="cont">
          <input type="checkbox" value="Data" class="datacheck" id="data"></td>
          <td class="cont">
          <p class="inlinetext">Upon checking the box and upon submission of data, you consent to submitting the personal information into the barangay database.</p></td>
          </tr>
          </table>

          <br> </br>

          <input type="submit" value="Submit" class="btn"> &nbsp;&nbsp;&nbsp;
          <button type="reset" value="Reset" onclick="clearInputs()" class="btn inverse">Reset</button>&nbsp;&nbsp;&nbsp;
          <a class="btn" href="index_a.php">Back</a>

</form>
</main>
<script>
  function clearInputs() {
    document.getElementById("official").reset();
  }
</script>
<script>
const checkbox = document.getElementById("data");
const form = document.getElementById("official");

form.addEventListener("submit", function(event) {
  if (!checkbox.checked) {
    event.preventDefault();
    alert("Please check the box to submit your personal information into the barangay database.");
  }
});

</script>
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
