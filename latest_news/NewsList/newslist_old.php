<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
session_start();
require "db.con.php";
if (isset($_SESSION['id'])) {
  $sql = "SELECT UserRole FROM users WHERE UserID = " . $_SESSION['id'];
  $role = mysqli_fetch_assoc(mysqli_query($conn, $sql))['UserRole'];
  if ($role == 'student') {
    $sql = 'SELECT * FROM normal_user WHERE UserID = ' . $_SESSION['id'];
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      $tp = $row['NormalUserTP'];
      $name = $row['NormalUserName'];
      $gender = $row['NormalUserGender'];
      $age = $row['NormalUserAge'];
      $address = $row['NormalUserAddress'];
      $description = $row["NormalUserDescription"];
    }
    $returnHome = "onclick = \"" . "location.href = '../../home/user/userhomepage.php'\"";
    //echo $returnHome;
  } else if ($role == 'admin') {
    $sql = 'SELECT * FROM `admin` WHERE UserID = ' . $_SESSION['id'];
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      $tp = $row['AdminTP'];
      $name = $row['AdminName'];
      $gender = $row['AdminGender'];
      $age = $row['AdminAge'];
      $address = $row['AdminAddress'];
      $description = $row["AdminDescription"];
    }
    $returnHome = "onclick = \"" . "location.href = '../../home/admin/adminpage.php'\"";
  } else if ($role == 'consultor') {
    $sql = 'SELECT * FROM consultor WHERE UserID = ' . $_SESSION['id'];
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      $tp = $row['ConsultorTP'];
      $name = $row['ConsultorName'];
      $gender = $row['ConsultorGender'];
      $age = $row['ConsultorAge'];
      $address = $row['ConsultorAddress'];
      $description = $row["ConsultorDescription"];
    }
    $returnHome = "onclick = \"" . "location.href = '../../home/consultor/consultorpage.php'\"";
  }
} else {
  $role = "guests";
  $name = "Guest";
  $returnHome = "onclick = \"" . "location.href = '../../home/user/guesthomepage.php'\"";
  //echo $returnHome;
}
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HYFC | News List</title>
  <link rel="stylesheet" href="newslist_old.css">
  <link rel="icon" href="HFYCIcon.png">
  <link rel="stylesheet" href="../sidebartemplate.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>

<body>

  <input type="checkbox" id="check" checked=checked>
  <!--header area start-->
  <header>
    <label for="check">
      <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
      <h3>HEREFORYOU <span>CONSULTATION</span></h3>
    </div>
    <div class="right_area">
      <?php
      if (isset($_SESSION['id'])) {
        echo '<form style="--i: 1.8s" action="../../m_connection/logout.con.php" method="post">
        <button type="submit" name="logout-submit" class="logout_btn"><i class="fas fa-power-off"></i>Logout</button>';
      } else {
        echo '<button type="submit" name="logout-submit" class="logout_btn" onclick="location.href = ' . "'" . '../../logsignsys/login/login.php' . "'" . '"' . '><i class="fas fa-sign-in-alt"></i>Sign In</button><br>
              <button type="submit" name="logout-submit" class="logout_btn" onclick="location.href = ' . "'" . '../../logsignsys/signup/student_registerv2.php' . "'" . '"' . '><i class="fas fa-user-alt"></i>Register</button>';
      }
      ?>
      </form>
    </div>
  </header>
  <!--header area end-->
  <!--mobile navigation bar start-->
  <div class="mobile_nav">
    <div class="nav_bar">
      <?php
      if (isset($_SESSION['id'])) {
        if (file_exists('../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".jpg")) {
          echo "<img src='" . '../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".jpg" . "' alt='profile_image' class='mobile_profile_image' $returnHome>";
        } else if (file_exists('../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".png")) {
          echo "<img src='" . '../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".png" . "' alt='profile_image' class='mobile_profile_image' $returnHome>";
        } else if (file_exists('../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".jpeg")) {
          echo "<img src='" . '../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".jpeg" . "' alt='profile_image' class='mobile_profile_image' $returnHome>";
        } else {
          echo "<img src= '../../profile_upload_pic/avatar.png' alt='user-pic' class='mobile_profile_image' $returnHome>";
        }
      } else {
        echo "<img src= '../../profile_upload_pic/avatar.png' alt='user-pic' class='mobile_profile_image' $returnHome>";
      }
      ?>
      <i class="fa fa-bars nav_btn"></i>
    </div>
    <div class="mobile_nav_items">
      <?php
      require '../../sidebar_template.php';
      ?>
    </div>
  </div>
  <!--mobile navigation bar end-->
  <!--sidebar start-->
  <div class="sidebar">
    <div class="profile_info">
      <?php
      if (isset($_SESSION['id'])) {
        if (file_exists('../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".jpg")) {
          echo "<img src='" . '../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".jpg" . "' alt='profile_image' class='profile_image' $returnHome>";
        } else if (file_exists('../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".png")) {
          echo "<img src='" . '../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".png" . "' alt='profile_image' class='profile_image' $returnHome>";
        } else if (file_exists('../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".jpeg")) {
          echo "<img src='" . '../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".jpeg" . "' alt='profile_image' class='profile_image' $returnHome>";
        } else {
          echo "<img src= '../../profile_upload_pic/avatar.png' alt='user-pic' class='profile_image' $returnHome>";
        }
      } else {
        echo "<img src= '../../profile_upload_pic/avatar.png' alt='user-pic' class='profile_image' $returnHome>";
      }
      ?>
      <h4><?php echo $name; ?></h4>
    </div>
    <?php
    require '../../sidebar_template.php';
    ?>
  </div>
  <!--sidebar end-->

  <div class="content">
    <div class="page-msg">
      <h1>Latest News Page</h1>
      <h2>Read the latest updates and news brought to you by HFYC</h2>
    </div>

    <div class="mainlist">
      <?php
      $sql = 'SELECT * FROM news_data';
      $result = mysqli_query($conn, $sql);
      $resultrows = mysqli_num_rows($result);

      if ($resultrows > 0) {

        $index = 0; // Define variable for store the indexes 
        $tablecount = 0;
        while ($row = mysqli_fetch_assoc($result)) {

          if ($index % 1 == 0)  // Check modulus (%) of $index. Open tr if the modulus is 0

            echo '<a class="gridlist" 
                  href ="../NewsDisplay/Display_News.php?NewsID=' . $row['NewsID'] . '"
                  type="newsdisplay" 
                  name="newsdisplay" 
                  id="newsdisplay" 
                  style="background-image: url(../Uploaded_Files/newsthumb' . $row['NewsID'] . '.jpg);">';

          echo '<br><br><br><br><br><br><br><br><br><br>';
          echo '<h2>' . $row['NewsTitle'] . '</h2>';

          $index++;
          // Increment the value of $index
          if ($index % 1 == 0)  echo '</a>'; // Check modulus (%) of $index. Close tr if the modulus is 0
        }
      } else {

        echo '<tr>';
        echo '<td><img class="error-img" style="align-items:center; "src="searching.gif" alt="Searching Image" /></td>';
        echo '<tr/>';
        echo '<tr>';
        echo '<td><h2 style="background-color:white; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;">There are currently no available consultation slots</h2></td>';
        echo '<tr/>';
      }

      mysqli_free_result($result);
      mysqli_close($conn);

      ?>
    </div>

  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $('.nav_btn').click(function() {
        $('.mobile_nav_items').toggleClass('active');
      });
    });
  </script>
  <footer>
    <h3>Get in Touch</h3>
    <p>Email or call us if you have any questions</p>
    <p>Email: <strong>contact@hfyc.test</strong></p>
    <p>Phone:
      <strong>+601131313131</strong>
    </p>
    <p class="social-media">
      <a href="https://www.facebook.com/Here4U-Consultation-104752271688960"><i class="fab fa-facebook" onclick=""></i></a>
      <a href="https://twitter.com/Here4uC"><i class="fab fa-twitter"></i></a>
      <a href="https://discord.gg/8VDjdcyZDS"><i class="fab fa-discord"></i></a>
      <a href="https://tinyurl.com/2sueavzs"><i class="fab fa-microsoft"></i></a>
      <a href="https://www.instagram.com/here4u_consultation/"><i class="fab fa-instagram"></i></a>
    </p>
  </footer>
</body>

</html>