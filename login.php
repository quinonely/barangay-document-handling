<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="img/seal_icon.png">
    <link rel="stylesheet" href="css/form.css"> <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Barangay 837</title>
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
     <h6 class="heading" style="font-size:45px;">Login</h6>
  </div>
</div>
</div>
 	<!-- ################################################################################################ -->
<div class="wrapper row3">
<main class="hoc container clear">

      <div class="sectiontitle">
      <h2 class="heading underline font-x2" style="font-size:40px;">Barangay 837 Login</h2>
      <br> </br>
      <p class="centerpara">Please fill the form accordingly below.</p>
<br> </br>
    <form action="services/login.php" method="post">
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
          <label for="username"><h3 class="heading" style="font-size:25px; color:#263094;">Username</h3></label>
          <br>
          <input type="text" id="username" name="username" placeholder="Username" class="textminquiry" required></td>
        <td class="tableform">
          <label for="password"><h3 class="heading" style="font-size:25px; color:#263094;">Password</h3></label>
          <br>
          <input type="password" id="password" name="password" placeholder="Password" class="textminquiry" required></td>
        </tr>
    </table>
    <br>
        <center><h3 class="heading" style="font-size:20px; color:#263094;">Don't have an account? <a href="register.php">Register now.</a></h3></center>
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