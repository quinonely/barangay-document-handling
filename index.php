<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
        <link rel="shortcut icon" type="image/png" href="img/seal_icon.png">
        <title>Home | Barangay 837</title>
        <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
<?php 
require_once 'services/db.php';
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
<div class="bgded overlay" style="background-image: url('<?php echo $row['main_photo']; ?>');">
<?php require_once("modules/nav.php"); get_navbar(); ?>
  <div id="pageintro" class="hoc clear"> 
    <!------------------------------ PAGE INTRODUCTION ------------------------------------------------------>
    <article>
      <br>
      <br>
      <br>
      <h4 class="heading">Barangay 837</h3>
      <p class="second-heading">City of Manila</p>
      <footer>
        <ul class="nospace inline pushright">
          <li><a class="btn btn-main" href="login.php">Get Started</a></li>
        </ul>
      </footer>
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
          	<a href="#" class="lightbox" id="img1"><span style="background-image:url('<?php echo $row['gallery1']; ?>');"></span></a>
          </figure>
        </li>
        <li class="one_third">
          <figure><a class="imgover" href="#img2"><img src="<?php echo $row['gallery2']; ?>" alt=""></a>
          	<a href="#" class="lightbox" id="img2"><span style="background-image:url('<?php echo $row['gallery2']; ?>');"></span></a>
          </figure>
        </li>
        <li class="one_third">
          <figure><a class="imgover" href="#img3"><img src="<?php echo $row['gallery3']; ?>" alt=""></a>
          	<a href="#" class="lightbox" id="img3"><span style="background-image:url('<?php echo $row['gallery3']; ?>');"></span></a>
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
      <p class="centerpara"><?php echo $row['main_info']; ?></p>
      <br>
      <p class="centerpara"><a href="https://www.philatlas.com/luzon/ncr/manila/barangay-837.html">
      MORE INFORMATION</a></p>
    </div>
    </main>
  </div>
<!-- ################################################################################################ -->
<main class="hoc container clear">

  <table class="cont" style="table-layout:fixed;">
    <tr class="cont">
    <td class="cont">
      <br> <br> <br>
      <h6 class="heading font-x2" style="color:#263094;"><?php echo $row['table_info1']; ?></h6>
      <p class="fl_left" style="font-size:18px; line-height:1.4em;"><?php echo $row['table_info_d1']; ?></p>
    </td>
    <td class="cont">
      <img src="<?php echo $row['table_pic1']; ?>" style="width:100%;">
    </td>
  </tr>
</table>

<br>

 <table class="cont" style="table-layout:fixed;">
    <tr class="cont">
    <td class="cont">
    <img src="<?php echo $row['table_pic2']; ?>" style="width:100%;">
    </td>
    <td class="cont">
    <br> <br> <br>
      <h6 class="heading font-x2" style="color:#263094; text-align:right;"><?php echo $row['table_info2']; ?></h6>
      <p class="fl_left" style="font-size:18px; line-height:1.4em; text-align:right;"><?php echo $row['table_info_d2']; ?></p>
    </td>
  </tr>
</table>

<br>

  <table class="cont" style="table-layout:fixed;">
    <tr class="cont">
    <td class="cont">
    <br> <br> <br>
      <h6 class="heading font-x2" style="color:#263094;"><?php echo $row['table_info3']; ?></h6>
      <p class="fl_left" style="font-size:18px; line-height:1.4em;"><?php echo $row['table_info_d3']; ?></p>
    </td>
    <td class="cont">
    <img src="<?php echo $row['table_pic3']; ?>" style="width:100%;">
    </td>
  </tr>
</table>
<br> <br> <br>

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
</section>
</div>
</div>
</div>
<!-- ################################################################################################ -->

<div class="wrapper row3" style="background-color:#263094;">
	<main class="hoc container clear">

      <div class="sectiontitle">
      <h2 class="heading underline font-x2" style="color:white; font-size:39px;">Contact Us</h2>
      <br> </br>
      <p class="centerpara" style="color:white;">Address: <?php echo $row['address']; ?><br>Contact Number: <?php echo $row['contact']; ?><br><br>Barangay 837 shares a common border with Barangay 839 and Barangay 838.</p> 
      <br> <br>
      <center>
      <a href="<?php echo $row['socmed_link']; ?>" class="btn-main" style="color:white; font-weight:bold;"><?php echo $row['socmed']; ?></a>
      </center>
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