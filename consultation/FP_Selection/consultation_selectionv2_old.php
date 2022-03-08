<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
session_start();
require "../../m_connection/db.con.php";
if (isset($_SESSION['id'])) {
    $sql = 'SELECT * FROM normal_user WHERE UserID = ' . $_SESSION['id'];
    $result = mysqli_query($conn, $sql);
    $role = "student";
    while ($row = mysqli_fetch_assoc($result)) {
        $tp = $row['NormalUserTP'];
        $name = $row['NormalUserName'];
        $gender = $row['NormalUserGender'];
        $age = $row['NormalUserAge'];
        $address = $row['NormalUserAddress'];
        $description = $row["NormalUserDescription"];
    }
    $returnHome = "onclick = \"" . "location.href = '../../home/user/userhomepage.php'\"";
} else {
    echo "<script>
    alert('Please login as Student to continue!');
    location.href = document.referrer;
    </script>";
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HYFC Consultation Selection Page</title>
    <link rel="stylesheet" href="styleservicev2.css">
    <link rel="stylesheet" href="../sidebartemplate.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>

<body>
    <div class='wrapper'>
        <input type="checkbox" id="check" checked>
        <!--header area start-->
        <header>
            <label for="check">
                <i class="fas fa-bars" id="sidebar_btn"></i>
            </label>
            <div class="left_area">
                <h3>HEREFORYOU <span>CONSULTATION</span></h3>
            </div>
            <div class="right_area">
                <form style="--i: 1.8s" action="../../m_connection/logout.con.php" method="post">
                    <button type="submit" name="logout-submit" class="logout_btn"><i class="fas fa-power-off"></i>Logout</button>
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
            <section>
                <!--
            Consultation Types: Mental Health, Careers, Further Studies, Academic , Fitness, Life
            -->
                <div class="overlay">
                    <h1>Consultation Selection</h1>
                    <div>
                        <img src='mental_health.png' alt='mental-health'>
                        <a href="../SP_ConsultorDetails/consultordetailsv2.php?type=mental">Mental Health Consultation</a>
                    </div>

                    <div>
                        <img src='careers.jpg' alt='careers'>
                        <a href="../SP_ConsultorDetails/consultordetailsv2.php?type=career">Career Consultation</a>
                    </div>

                    <div>
                        <img src='further_studies.jpg' alt='further-studies'>
                        <a href="../SP_ConsultorDetails/consultordetailsv2.php?type=further">Further Studies Consultation</a>
                    </div>

                    <div>
                        <img src='academic.jpg' alt='academic'>
                        <a href="../SP_ConsultorDetails/consultordetailsv2.php?type=academic">Academic Consultation</a>
                    </div>

                    <div>
                        <img src='fitness.png' alt='fitness'>
                        <a href="../SP_ConsultorDetails/consultordetailsv2.php?type=fitness">Fitness Consultation</a>
                    </div>

                    <div>
                        <img src='life.jpg' alt='life'>
                        <a href="../SP_ConsultorDetails/consultordetailsv2.php?type=life">Life Consultation</a>
                    </div>
                </div>
            </section>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.nav_btn').click(function() {
                    $('.mobile_nav_items').toggleClass('active');
                });
            });
        </script>
        <script>
            for (let i = 0; i < 6; i++) {
                document.querySelectorAll(".overlay div")[i].onmouseenter = function() {
                    document.querySelectorAll(".overlay a")[i].style.width = "max-content";
                    var blur = [...[...document.querySelectorAll(".overlay div")].slice(0, i), ...[...document.querySelectorAll(".overlay div")].slice(i + 1)]
                    blur.forEach((i) => i.style.filter = "blur(10px)");

                }
                document.querySelectorAll(".overlay div")[i].onmouseleave = function() {
                    var element = document.querySelector("div.overlay");
                    var check = window.getComputedStyle(element).getPropertyValue("flex-wrap");
                    if (check == 'wrap') {
                        document.querySelectorAll(".overlay a")[i].style.width = "max-content";
                    } else {
                        document.querySelectorAll(".overlay a")[i].style.width = "min-content";
                    }
                    var noblur = [...[...document.querySelectorAll(".overlay div")].slice(0, i), ...[...document.querySelectorAll(".overlay div")].slice(i + 1)]
                    noblur.forEach((i) => i.style.filter = "blur(0px)");
                }
            }
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
    </div>
</body>

</html>