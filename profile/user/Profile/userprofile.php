<!DOCTYPE html>
<?php
require "../../../m_connection/db.con.php";
session_start();

if (isset($_SESSION['id'])) {
    $sql = 'SELECT * FROM normal_user WHERE UserID = ' . $_SESSION['id'];
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $tp = $row['NormalUserTP'];
        $name = $row['NormalUserName'];
        $gender = $row['NormalUserGender'];
        $age = $row['NormalUserAge'];
        $email = $row['NormalUserEmail'];
        $address = $row['NormalUserAddress'];
        $description = $row["NormalUserDescription"];
    }
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="userprofile.css">
    <title>HFYC | Profile Page</title>
</head>

<body>
    <main>
        <div class="profile-username">
            <h1>Welcome to <?php echo $_SESSION['username'] ?> Profile</h1>
        </div>

        <div class="profile-picture-box">
            <?php
            if (file_exists('../../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".jpg")) {
                echo "<img src='" . '../../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".jpg" . "' alt='user-pic' class='profile-picture'>";
            } else if (file_exists('../../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".png")) {
                echo "<img src='" . '../../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".png" . "' alt='user-pic' class='profile-picture'>";
            } else if (file_exists('../../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".jpeg")) {
                echo "<img src='" . '../../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".jpeg" . "' alt='user-pic' class='profile-picture'>";
            } else {
                echo "<img src= '../../../profile_upload_pic/avatar.png' alt='user-pic' class='profile-picture'>";
            }
            ?>
        </div>

        <div class="profile-content">

            <table class="profile-table">
                <tbody>
                    <tr>
                        <th>TP Number:</th>
                        <td><?php echo $tp ?></td>
                    </tr>
                    <tr>
                        <th>Real Name:</th>
                        <td><?php echo $name ?></td>
                    </tr>
                    <tr>
                        <th>Gender:</th>
                        <td><?php echo $gender ?></td>
                    </tr>
                    <tr>
                        <th>Age:</th>
                        <td><?php echo $age ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?php echo $email ?></td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td><?php echo $address ?></td>
                    </tr>
                    <tr>
                        <th>Description:</th>
                        <td><?php echo $description ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="profile-buttons">
            <button class="btn-edit-profile" onclick="editprofile()"><b><i>Edit Profile</i></b></button>
            <button class="btn-edit-pwd" onclick="editpwd()"><b><i>Edit Password</i></b></button>
            <button class="btn-del-profile" onclick="delprofile()"><b><i>Delete Profile</i></b></button>
        </div>
    </main>
</body>

<footer>
    <h3>Get in Touch</h3>
    <p>Email or call us if you have any questions</p>
    <p>Email: <strong>contact@hfyc.test</strong></p>
    <p>Phone:
        <strong>+601131313131</strong>
    </p>
    <p class="social-media">
        <a href="#"><i class="fab fa-facebook" onclick=""></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-discord"></i></a>
        <a href="#"><i class="fab fa-microsoft"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
    </p>
</footer>

<!-- Add links for redirect later.-->
<script>
    function editprofile() {
        location.href = "../EditProfile/editprofile.php";
    }

    function editpwd() {
        location.href = "../EditPwd/editpassword.php";
    }

    function delprofile() {
        location.href = "../Delete/deleteaccount.php";
    }
</script>

</html>