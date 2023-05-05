<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
        <link rel="shortcut icon" type="image/png" href="img/seal_icon.png">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"content="width=device-width, initial-scale=1.0">
        <title>Modify Frontpage | Barangay 837</title>
        <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<?php 
require_once 'services/db.php';
require_once 'services/dynamic_index.php';

$sql = "SELECT * FROM officials WHERE visibility = 'Yes'";
$result = $conn->query($sql);
$offs = array();

while ($row = mysqli_fetch_assoc($result)) {
    $offs[] = $row;
}

$sql = "SELECT * FROM index_page WHERE id=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
}
?>
<body>
<div class="bgded" style="background-image: url('<?php echo $row['main_photo']; ?>');">

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
     <div class="d-inline-block">
<form method="POST" enctype="multipart/form-data" action="services/dynamic_index.php">
<input class="btn btn-main" type="file" id="image" name="image">
  </div>
    </header>
  <!--- End Navigation---->
  <div id="pageintro" class="hoc clear"> 
    <!------------------------------ PAGE INTRODUCTION ------------------------------------------------------>
    <article>
      <br>
      <br>
      <br>
      <br>
      <br>
            </div>
    </article>
</div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <section id="introblocks">
      <ul class="nospace group btmspace-80">
        <li class="one_third first">
          <figure><a class="imgover" href="#img1"><img src="<?php echo $row['gallery1']; ?>" alt=""></a>
          	<a href="#" class="lightbox" id="img1"><span style="background-image:url('img/main_upload.jpg');"></span></a>
            <br> <input class="btn btn-main" type="file" id="image2" name="image2">
          </figure>
        </li>
        <li class="one_third">
          <figure><a class="imgover" href="#img2"><img src="<?php echo $row['gallery2']; ?>" alt=""></a>
          	<a href="#" class="lightbox" id="img2"><span style="background-image:url('img/main_upload.jpg');"></span></a>
            <br> <input class="btn btn-main" type="file" id="image3" name="image3">
          </figure>
        </li>
        <li class="one_third">
          <figure><a class="imgover" href="#img3"><img src="<?php echo $row['gallery3']; ?>" alt=""></a>
          	<a href="#" class="lightbox" id="img3"><span style="background-image:url('img/main_upload.jpg');"></span></a>
            <br> <input class="btn btn-main" type="file" id="image4" name="image4">
          </figure>
        </li>
      </ul>
    </section>
<!-- ################################################################################################ -->
<div class="wrapper row3">
	<main class="hoc container clear">
      <div class="sectiontitle">
      <h2 class="heading underline font-x2">Barangay 837, Zone 91</h2>
      <br> </br>
      <br> </br>
      <?php
      $sql = "SELECT * FROM index_page WHERE id=1";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
      }
      ?>
      <textarea class="messageform" id="main_info" name="main_info" maxlength="255" placeholder="Put the starting information for the barangay here. It is recommended for it to be concise as possible as this is a short introduction."><?php echo $row['main_info']; ?></textarea>
      <br><input type="submit" class="btn btn-main" id="save1" name="save1" value="Save" ></input> 
      </form>
      <br>
    </div>
    </main>
  </div>
<!-- ################################################################################################ -->
<main class="hoc container clear">
<form method="POST" action="services/dynamic_index.php" enctype="multipart/form-data">
  <table class="cont" style="table-layout:fixed;">
    <tr class="cont">
    <td class="cont">
      <br> <br> <br>
      <?php
      $sql = "SELECT * FROM index_page WHERE id=1";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
      }
      ?>
      <input type="text" id="table_info1" name="table_info1" class="textminquiry" value="<?php echo $row['table_info1']; ?>" placeholder="This is a title for a piece of information about the barangay."><br>
      <textarea class="messageform" maxlength="255" id="table_info_d1" name="table_info_d1" placeholder="Explain more of this piece of information."><?php echo $row['table_info_d1']; ?></textarea>
    </td>
    <td class="cont">
    <img src="<?php echo $row['table_pic1']; ?>" style="width:100%;">
      <br> <center><input class="btn btn-main" type="file" id="image5" name="image5"></center>
    </td>
  </tr>
</table>

<br>

 <table class="cont" style="table-layout:fixed;">
    <tr class="cont">
    <td class="cont">
    <img src="<?php echo $row['table_pic2']; ?>" style="width:100%;">
      <br> <center><input class="btn btn-main" type="file" id="image6" name="image6"></center>
    </td>
    <td class="cont">
    <br> <br> <br>
    <?php
      $sql = "SELECT * FROM index_page WHERE id=1";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
      }
      ?>
    <input type="text" id="table_info2" name="table_info2" class="textminquiry" value="<?php echo $row['table_info2']; ?>" placeholder="This is a title for a piece of information about the barangay."><br>
      <textarea class="messageform" maxlength="255" id="table_info_d2" name="table_info_d2" placeholder="Explain more of this piece of information."><?php echo $row['table_info_d2']; ?></textarea>
    </td>
  </tr>
</table>

<br>

  <table class="cont" style="table-layout:fixed;">
    <tr class="cont">
    <td class="cont">
    <br> <br> <br>
    <?php
      $sql = "SELECT * FROM index_page WHERE id=1";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
      }
      ?>
    <input type="text" id="table_info3" name="table_info3" class="textminquiry" value="<?php echo $row['table_info3']; ?>" placeholder="This is a title for a piece of information about the barangay."><br>
      <textarea class="messageform" maxlength="255" id="table_info_d3" name="table_info_d3" placeholder="Explain more of this piece of information."><?php echo $row['table_info_d3']; ?></textarea>
    </td>
    <td class="cont">
    <img src="<?php echo $row['table_pic3']; ?>" style="width:100%;">
      <br> <center><input class="btn btn-main" type="file" id="image7" name="image7"></center>
    </td>
  </tr>
</table>
<br><center><input type="submit" class="btn btn-main" id="save2" name="save2" value="Save" ></input> </center>
</form>
<br> <br> <br>
</main>
<!-- ################################################################################################ -->
<br>
<br>
    <br>
    <center>
      <h2 class="heading font-x2" style="font-size:40px;">All Officials</h2>
      <a class="btn" href="add_official.php">Add Official</a><br><br>
<style>
/* Switch */
.switch {position: relative;display: inline-block;width: 60px;height: 34px;}
/* Hide default HTML checkbox */
.switch input {opacity: 0;width: 0;height: 0;}
/* The slider */
.slider {position: absolute;cursor: pointer;top: 0;left: 0;right: 0;bottom: 0;background-color: #ccc;-webkit-transition: .4s;transition: .4s;}
.slider:before {position: absolute;content: "";height: 26px;width: 26px;left: 4px;bottom: 4px;background-color: white;-webkit-transition: .4s;transition: .4s;}
input:checked + .slider {background-color: #263094!important;}
input:focus + .slider {box-shadow: 0 0 1px #263094;}
input:checked + .slider:before {-webkit-transform: translateX(26px);-ms-transform: translateX(26px);transform: translateX(26px);}
 /* Rounded sliders */
.slider.round {border-radius: 34px;}
.slider.round:before {border-radius: 50%;}
</style>
    </center>
     <table style="width:100%; font-size:17px; padding:10px; border-radius:10px;">
<tr>
        <th class="colored-cont">Photo</th>
        <th class="colored-cont">Name</th>
        <th class="colored-cont">Position</th>
        <th class="colored-cont">Contact Number</th>
        <th class="colored-cont">Actions</th>
        <th class="colored-cont">Visibility</th>
    </tr>
<?php 
require_once 'services/db.php';

$sql = "SELECT * from officials";

$result = mysqli_query($conn, $sql); // execute the query

while ($row = mysqli_fetch_array($result)) { 
    echo "<tr class='row-cont'>";
    echo '<td class="std-cont"><img src="' . $row['image'] . '" style="width:100px"></td>';
    echo '<td class="std-cont">' . $row['first_name'] . "&nbsp;" . $row['last_name'] . '</td>';
    echo '<td class="std-cont">' . $row['position'] . '</td>';
    echo '<td class="std-cont">' . $row['phone_num'] . '</td>';
    echo '<td class="std-cont"><a class="btn" href="view_official.php?official_id=' . $row['official_id'] . '">View</a>&nbsp;&nbsp;';
    echo '<a class="btn" href="edit_official.php?official_id=' . $row['official_id'] . '">Edit</a></td>';
    echo '<td class="std-cont"><label class="switch">
    <input type="checkbox" id="'.$row["official_id"].'" onchange="visibilityFunction(\''.$row["official_id"].'\', this.checked ? \'visible\' : \'hidden\')"'.($row['visibility'] === 'Yes' ? ' checked' : '').'>
    <span class="slider round"></span>
  </label></td>';  
    echo "</tr>";
}
?>

<script>
function visibilityFunction(official_id, current_visibility) {
  current_visibility = current_visibility === 'visible' ? 'Yes' : 'No'; // convert 'visible'/'hidden' to 'Yes'/'No'
  var r = confirm("You will be changing this official's visibility on the index page. Confirm?");
  if (r == true) {
    window.location.href = "services/visibility.php?official_id=" + official_id + "&visibility=" + current_visibility;
  }
}
</script>


</table>
<br> </br>
<br>

<div class="sectiontitle">
  <p class="nospace font-xs">Barangay 837 Active Officials</p>
  <p class="heading underline font-x2">List of Barangay Officials</p>
</div>
<div class="wrap-color">
  <ul id="latest" class="nospace group">

    <?php
    $count = 0;
    foreach ($offs as $off) {
      $count++;
      $is_first_in_three = ($count % 3 == 1);
      if ($is_first_in_three) :
    ?>
        <!---- If it is first in the row then, ---->
        <li class="one_third first">
          <article><a class="imgover" href="#"><img src="<?php echo $off['image'] ?>" alt=""></a>
            <div class="excerpt">
              <h6 style="color:#263094; font-size:29px;"><?php echo $off['first_name'] . " " . $off['last_name'] ?></h6>
              <p style="font-size:17px;"><?php echo $off['short_desc'] ?></p>
              <p>Barangay 837, Zone 91, District VI</p>
            </div>
          </article>
        </li>
      <?php else : ?>
        <!----- If it is the second or third in the row then,---->
        <li class="one_third">
          <article><a class="imgover" href="#"><img src="<?php echo $off['image'] ?>" alt=""></a>
            <div class="excerpt">
              <h6 style="color:#263094; font-size:29px;"><?php echo $off['first_name'] . " " . $off['last_name'] ?></h6>
              <p style="font-size:17px;"><?php echo $off['short_desc'] ?></p>
              <p>Barangay 837, Zone 91, District VI</p>
            </div>
          </article>
        </li>
      <?php endif;
    }
    ?>
  </ul>
</div>

    <!-- ################################################################################################ -->
  </section>
</div>
</div>
</div>
<!-- ################################################################################################ -->

<div class="wrapper row3" style="background-color:#263094;">
	<main class="hoc container clear">

      <div class="sectiontitle">
      <?php
      $sql = "SELECT * FROM index_page WHERE id=1";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
      }
      ?>
      <h2 class="heading underline font-x2" style="color:white; font-size:39px;">Contact Us</h2>
      <br> </br>
      <form action="services/dynamic_index.php" method="POST">
      <input type="text" id="address" name="address" class="textminquiry" value="<?php echo $row['address']; ?>" placeholder="Address of the Barangay"><br>
      <input type="number" id="contact" name="contact" class="textminquiry" value="<?php echo $row['contact']; ?>" placeholder="Contact Number of Barangay"><br>
      <input type="text" id="socmed" name="socmed" class="textminquiry" value="<?php echo $row['socmed']; ?>" placeholder="Name of the Social Platform"><br>
      <input type="text" id="socmed_link" name="socmed_link" class="textminquiry"value="<?php echo $row['socmed_link']; ?>" placeholder="Link of the Social Platform"><br>
      <br><center><input type="submit" class="btn-main" style="color:#263094; font-weight:bold;" id="save3" name="save3" value="Save" ></input> </center>
      </form>
      <br> 

            </br>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d965.2810855631066!2d121.01228001962721!3d14.59198979696514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9c2491ea96f%3A0x7b7548c20c402171!2sBrgy.%20837%2C%20Pandacan%2C%20Manila%2C%201011%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1682754910112!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div> 
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