<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/png" href="img/seal_icon.png">
    <link rel="stylesheet" href="css/form.css"> <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barangay Indigency Fill Form | Barangay 837</title>
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>

<?php 
    require_once 'services/db.php';
?>

<div class="bgded overlay" style="background-image:url('img/heading.jpg');"> 
<?php require_once("modules/nav.php"); get_navbar(); 
    if (!isset($_SESSION['acc_id'])) {
      echo '<script>alert("You must be logged in order to access this part of the page.");</script>';
      print '<script>window.location.assign("login.php");</script>';
  }
?>
</div>
 	<!-- ################################################################################################ -->
   <div id="breadcrumb" class="hoc clear">
     <h6 class="heading" style="font-size:45px;">Barangay Indigency</h6>
  </div>
</div>
</div>
 	<!-- ################################################################################################ -->
 <div class="wrapper row3">
<main class="hoc container clear">

      <div class="sectiontitle">
      <h2 class="heading underline font-x2" style="font-size:40px;">Barangay Indigency Fill Form</h2>
      <br> </br>
      <p class="centerpara">Please fill the form accordingly below.</p>
<br> </br>
<form id="indigency" action="services/brgy_indigency.php" method="POST">
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
          <label for="address"><h3 class="heading" style="font-size:25px; color:#263094;">Home Address</h3></label>
          <br>
          <input type="text" id="address" name="address" placeholder="Home Address" class="textminquiry" required></td>
        <td class="tableform">
        <label for="purpose"><h3 class="heading" style="font-size:25px; color:#263094;">Purpose</h3></label>
          <br>
          <select id="purpose" name="purpose" class="selectminquiry" required onchange="toggleOtherPurpose()">
        <option value="">Please choose an option</option>
        <option value="Employment">Employment</option>
        <option value="Business">Business</option>
        <option value="Loan">Loan</option>
        <option value="Travel">Travel</option>
        <option value="Legal">Legal</option>
        <option value="Other">Other</option>
      </select></td>
        </tr>
        </tr>
    </table>
    <br>
    <br>
    <div id="otherPurposeField" style="display: none;">
    <label for="hidden_purpose"><h3 class="heading" style="font-size:25px; color:#263094;">Other Purpose</h3></label>
      <br>
      <input type="text" id="hidden_purpose" name="hidden_purpose" placeholder="Other Purpose" class="textminquiry">
      <br>
    </div>

<script>
function toggleOtherPurpose() {
    var otherPurposeField = document.getElementById("otherPurposeField");
    var purposeSelect = document.getElementById("purpose");
    var hiddenPurposeInput = document.getElementById("hidden_purpose");

    if (purposeSelect.value == "Other") {
        otherPurposeField.style.display = "block";
        hiddenPurposeInput.setAttribute("required", "required");
    } else {
        otherPurposeField.style.display = "none";
        hiddenPurposeInput.removeAttribute("required");
    }
}
</script>
          <label for="contact_num"><h3 class="heading" style="font-size:25px; color:#263094;">Contact Number</h3></label>
          <br>
          <input type="text" id="contact_num" name="contact_num" placeholder="Your contact number" class="textminquiry">
          <br>
          <label for="pickup"><h3 class="heading" style="font-size:25px; color:#263094;">Pickup</h3></label>
          <br>
          <select id="pickup" name="pickup" class="selectminquiry" required>
        <option value="">Please choose an option</option>
        <option value="Myself">Myself</option>
        <option value="Authorized Person">Authorized Person</option>
        <option value="Grab/Lalamove/Etc">Grab/Lalamove/Etc</option>
      </select><br><br><br>
    <br>
    <table class="cont">
          <tr class="cont">
          <td class="cont">
          <input type="checkbox" value="Data" class="datacheck" id="data"></td>
          <td class="cont">
          <p class="inlinetext">Upon checking the box and upon submission of data, you consent to submitting your personal information into the barangay database.</p></td>
          </tr>
          </table>

          <br> </br>

          <input type="submit" value="Submit" class="btn"> &nbsp;&nbsp;&nbsp;
          <button type="reset" value="Reset" onclick="clearInputs()" class="btn inverse">Reset</button>

</form>
</main>
<script>
  function clearInputs() {
    document.getElementById("Indigency").reset();
  }
</script>
 <script>
const checkbox = document.getElementById("data");
const form = document.getElementById("indigency");

form.addEventListener("submit", function(event) {
  if (!checkbox.checked) {
    event.preventDefault();
    alert("Please check the box to submit your personal information into the barangay database.");
  }
});

</script>
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