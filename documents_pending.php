<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang='en'>
<head>
<link rel="shortcut icon" type="image/png" href="img/seal_icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pending Documents | Barangay 837</title>
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>
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
     <h6 class="heading" style="font-size:45px;">Documents</h6>
  </div>
</div>
</div>
    <!--------- TABLE START ------------->
    <!-- ################################################################################################ -->

<div class="wrapper row3" style="background-color:#263094;">
<br>
<br>
<div class="wrap-border">
    <br>
    <center>
      <h2 class="heading font-x2" style="font-size:40px;">All Pending Documents</h2>
    </center>



<table style="width:100%; font-size:17px; padding:10px; border-radius:10px;">
<tr>
        <th class="colored-cont">Application Date</th>
        <th class="colored-cont">Document Type</th>
        <th class="colored-cont">Name</th>
        <th class="colored-cont">Status</th>
        <th class="colored-cont">Actions</th>
    </tr>
    <?php 
require_once 'services/db.php';
$user_id = $_SESSION['acc_id'];

$sql = "SELECT * from doc_req INNER JOIN documents ON doc_req.doc_id = documents.doc_id WHERE doc_req.status='Pending'";

$result = mysqli_query($conn, $sql); // execute the query

while ($row = mysqli_fetch_array($result)) { // fetch data from the mysqli_result object
    echo "<tr class='row-cont'>";
    echo '<td class="std-cont">' . $row['application_date'] . '</td>';
    echo '<td class="std-cont">' . $row['doc_type'] . '</td>';
    echo '<td class="std-cont">' . $row['last_name'] . ", " . $row['first_name'] . '</td>';
    echo '<td class="std-cont">' . $row['status'] . '</td>';
    echo '<td class="std-cont"> <a class="btn" href="edit_document.php?doc_id='. $row['doc_id'] .'&doc_type=' . $row['doc_type'] . '">Edit</a>&nbsp;&nbsp;';
    echo '<a class="btn" href="view_document.php?doc_id=' . $row['doc_id'] . '&doc_type=' . $row['doc_type'] . '">View</a></td>';
    echo "</tr>";
}
?>


</table>
</div>
<br> </br>
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
