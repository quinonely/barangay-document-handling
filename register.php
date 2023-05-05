<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="img/seal_icon.png">
    <link rel="stylesheet" href="css/form.css"> <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration | Barangay 837</title>
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
<div class="bgded overlay" style="background-image:url('img/heading.jpg');"> 
<?php require_once("modules/nav.php"); get_navbar(); 
if (isset($_SESSION['acc_id'])) {
        echo '<script>alert("Already logged in.");</script>';
        print '<script>window.location.assign("index.php");</script>';
}

?>
 	<!-- ################################################################################################ -->
    <div id="breadcrumb" class="hoc clear">
     <h6 class="heading" style="font-size:45px;">Registration</h6>
  </div>
</div>
</div>
 	<!-- ################################################################################################ -->

<div class="wrapper row3">
<main class="hoc container clear">

      <div class="sectiontitle">
      <h2 class="heading underline font-x2" style="font-size:40px;">Barangay 837 Registration</h2>
      <br> </br>
      <p class="centerpara">Please fill the form accordingly below.</p>
<br> </br>
<form id="register" action="services/register.php" method="post">
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>

<table class="tableform">
        <tr class="tableform">
        <td class="tableform">
          <label for="fname"><h3 class="heading" style="font-size:25px; color:#263094;">First Name</h3></label>
          <br>
          <input type="text" id="fname" name="fname" placeholder="First Name" class="textminquiry" required></td>
        <td class="tableform">
          <label for="sname"><h3 class="heading" style="font-size:25px; color:#263094;">Last Name</h3></label>
          <br>
          <input type="text" id="sname " name="sname" placeholder="Last Name" class="textminquiry" required></td>
        </tr>

        <tr class="tableform">
        <td class="tableform">
          <label for="sex"><h3 class="heading" style="font-size:25px; color:#263094;">Sex</h3></label>
          <br>
          <select id="sex" name="sex" class="selectminquiry" required>
            <option value="">Please choose an option</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select></td>
        <td class="tableform">
        <label for="civil_status"><h3 class="heading" style="font-size:25px; color:#263094;">Civil Status</h3></label>
          <br>
          <select id="civil_status" name="civil_status" class="selectminquiry" required>
        <option value="">Please choose an option</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Divorced">Divorced</option>
        <option value="Widowed">Widowed</option>
      </select></td>
        </tr>

        <tr class="tableform">
        <td class="tableform">
          <label for="address"><h3 class="heading" style="font-size:25px; color:#263094;">Home Address</h3></label>
          <br>
          <input type="text" id="address" name="address" placeholder="Home Address" class="textminquiry" required></td>
        <td class="tableform">
          <label for="birthday"><h3 class="heading" style="font-size:25px; color:#263094;">Birthday</h3></label>
          <br>
          <input type="date" id="birthday" name="birthday" class="birthinput" required></td>
        </tr>

        <tr class="tableform">
        <td class="tableform">
          <label for="number"><h3 class="heading" style="font-size:25px; color:#263094;">Contact Number</h3></label>
          <br>
          <input type="text" id="number" name="number" placeholder="Contact Number" maxlength="100" class="textminquiry" required></td>
        <td class="tableform">
          <label for="email"><h3 class="heading" style="font-size:25px; color:#263094;">Email</h3></label>
          <br>
          <input type="text" id="email" name="email" placeholder="Email" class="textminquiry" required></td>
        </tr>

      </table>
        <br>
          <label for="username"><h3 class="heading" style="font-size:25px; color:#263094;">Username</h3></label>
          <br>
          <input type="text" id="username" name="username" placeholder="Username" class="textminquiry">

        
          <br>
          <label for="password"><h3 class="heading" style="font-size:25px; color:#263094;">Password</h3></label>
          <br>
          <input type="password" id="password" name="password" placeholder="Password" class="textminquiry">

        <br>
          <label for="cpassword"><h3 class="heading" style="font-size:25px; color:#263094;">Confirm your password</h3></label>
          <br>
          <input type="password" id="cpassword" name="cpassword" placeholder="Confirm your password" class="textminquiry">

          <br> <br>
          <table class="cont">
          <tr class="cont">
          <td class="cont">
          <input type="checkbox" value="Data" class="datacheck" id="data"></td>
          <td class="cont">
          <p class="inlinetext">Upon checking the box and upon submission of data, you consent to submitting your personal information into the barangay database.</p></td>
          </tr>
          </table>
          <br>
          <br>
<script>
const checkbox = document.getElementById("data");
const form = document.getElementById("register");

form.addEventListener("submit", function(event) {
  if (!checkbox.checked) {
    event.preventDefault();
    alert("Please check the box to submit your personal information into the barangay database.");
  }
});

</script>

          <center><h3 class="heading" style="font-size:20px; color:#263094;">Already have an account? <a href="login.php">Login now.</a></h3></center>
        <br>
        <input type="submit" name="submit" value="Submit" class="btn"> &nbsp;&nbsp;&nbsp;
        <input type="reset" value="Reset" class="btn inverse">
    </form>
    </main>

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