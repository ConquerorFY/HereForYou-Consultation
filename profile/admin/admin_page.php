<!DOCTYPE html>

<?php
require "../../m_connection/db.con.php";
session_start();

if (isset($_SESSION['id'])) {
    $sql = 'SELECT * FROM `admin` WHERE UserID = ' . $_SESSION['id'];
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $tp = $row['AdminTP'];
        $name = $row['AdminName'];
        $gender = $row['AdminGender'];
        $age = $row['AdminAge'];
        $email = $row['AdminEmail'];
        $address = $row['AdminAddress'];
        $description = $row["AdminDescription"];
    }
}
?>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>HYFC Admin Page</title>
    <link rel="stylesheet" href="testdel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>

<body>

    <!--wrapper start-->
    <div class="wrapper">
        <!--header menu start-->
        <div class="header">
            <div class="header-menu">
                <div class="title">HYFC <span>Admin Page</span></div>
                <div class="sidebar-btn">
                    <i class="fas fa-bars"></i>
                </div>
                <ul>
                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                    <li><a href="#"><i class="fas fa-bell"></i></a></li>
                    <li><a href="#"><i class="fas fa-power-off"></i></a></li>
                </ul>
            </div>
        </div>
        <!--header menu end-->
        <!--sidebar start-->
        <div class="sidebar">
            <div class="sidebar-menu">
                <center class="profile">
                    <img src="profile_image.jpg" alt="">
                    <p><?php echo $name; ?></p>
                </center>
                <li class="item">
                    <a href="#" class="menu-btn">
                        <i class="fas fa-desktop"></i><span>Dashboard</span>
                    </a>
                </li>
                <li class="item" id="profile">
                    <a href="#profile" class="menu-btn">
                        <i class="fas fa-user-circle"></i><span>Profile <i class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu">
                        <a href="#"><i class="fas fa-image"></i><span>Picture</span></a>
                        <a href="#"><i class="fas fa-address-card"></i><span>Info</span></a>
                    </div>
                </li>
                <li class="item" id="messages">
                    <a href="#messages" class="menu-btn">
                        <i class="fas fa-envelope"></i><span>Messages <i class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu">
                        <a href="#"><i class="fas fa-envelope"></i><span>New</span></a>
                        <a href="#"><i class="fas fa-envelope-square"></i><span>Sent</span></a>
                        <a href="#"><i class="fas fa-exclamation-circle"></i><span>Spam</span></a>
                    </div>
                </li>
                <li class="item" id="settings">
                    <a href="#settings" class="menu-btn">
                        <i class="fas fa-cog"></i><span>Settings <i class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu">
                        <a href="#"><i class="fas fa-lock"></i><span>Password</span></a>
                        <a href="#"><i class="fas fa-language"></i><span>Language</span></a>
                    </div>
                </li>
                <li class="item">
                    <a href="#" class="menu-btn">
                        <i class="fas fa-info-circle"></i><span>About</span>
                    </a>
                </li>
            </div>
        </div>
        <!--sidebar end-->
        <!--main container start-->
        <div class="main-container">
            <div class="card">
                <p>Welcome to HereForYou Consultation Admin Page</p>
            </div>
            <div class="card">
                <p>Insert total number of registered admin here</p>
            </div>
            <div class="card">
                <p>Insert total number of registered users here</p>
            </div>
            <div class="card">
                <p>Insert total number of registered consultors here</p>
            </div>
        </div>
        <!--main container end-->
    </div>
    <!--wrapper end-->

    <script type="text/javascript">
        $(document).ready(function() {
            $(".sidebar-btn").click(function() {
                $(".wrapper").toggleClass("collapse");
            });
        });
    </script>

</body>

</html>