<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="deleteaccount.css">
    <title>HFYC | Delete Account</title>
</head>

<body>
    <main>
        <div class="del-account">
            <h1>Delete Account</h1>
            <h4>Please firstly verify your ownership of the account by inputting the correct current password.</h4>
            <h4>The "Delete Account" option will be available after the verification.</h4>
        </div>

        <div class="main-del-content">
            <form method="post" class="del-account-form">
                <label for="CurrentPassword" class="current">Current Password</label><br>
                <input type="password" id="CurrentPassword" name="CurrentPassword" required><br>
                <div class="btn-pwd">
                    <button type="submit" name='btnVerify' class="btnVerify">Verify Ownership</button>
                    <button class="fas fa-eye" type="button" onclick="showPwd()"></button>
                </div>
                <p><b>Are you sure you want to delete your account?</b></p>
                <p><b>If yes, please click on the "Delete Account" button below.</b></p>
                <center>
                    <button type='submit' name='btnDelete' id='btnDelete' class="del-account-btn" disabled>Delete Account</button>
                </center>
            </form>
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

<script>
    function showPwd() {
        var x = document.getElementById("CurrentPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<?php
require "../../../m_connection/db.con.php";
session_start();

if (isset($_SESSION['id'])) {
    $sql = 'SELECT UserPassword FROM users WHERE UserID = ' . $_SESSION['id'];
    $result = mysqli_query($conn, $sql);
    $password_check = mysqli_fetch_array($result)[0];

    if (isset($_POST['btnVerify'])) {
        $password = $_POST['CurrentPassword'];
        if (password_verify($password, $password_check)) {
            echo "<script defer>
            document.getElementById('btnDelete').disabled = false;
            document.getElementsByName('btnVerify')[0].disabled = true;
            </script>";
        } else {
            echo "<script>
            alert('Password Does Not Match. Please Retry.');
            </script>";
        }
    }

    if(isset($_POST['btnDelete'])){
        $sql = "DELETE FROM users WHERE UserID = ".$_SESSION['id'];
        $sql2 = "DELETE FROM normal_user WHERE UserID = ".$_SESSION['id'];

        if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
            echo "<script>
            alert('Account Has Been Deleted Successfully');
            </script>";
        }else{
            echo "<script>
            alert('Something Has Went Wrong. Please Try Again');
            </script>";
        }
    }
}
?>

</html>