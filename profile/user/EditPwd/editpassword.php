<!DOCTYPE html>

<?php
require "../../../m_connection/db.con.php";
session_start();

if (isset($_SESSION['id'])) {
    $sql = 'SELECT UserPassword FROM users WHERE UserID = ' . $_SESSION['id'];
    $result = mysqli_query($conn, $sql);
    $password_check = mysqli_fetch_array($result)[0];
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="editpassword.css">
    <title>HFYC | Edit Password</title>
</head>

<body>
    <main>
        <div class="edit-password">
            <h1>Edit Password</h1>
            <h2>Please input your current password to verify that you are the owner of this account.</h2>
            <h2>After that, input your new password.</h2>
        </div>

        <form method="post" class="edit-password-form">
            <label for="CurrentPassword" class="current">Insert Current Password</label><br>
            <input type="password" id="CurrentPassword" name="CurrentPassword" required><br>
            <center class="btn-currentpwd">
                <button type="submit" id="VerifyPassword" name='btnVerify' class="btnVerify">Verify Ownership</button>
                <button type="button" class="fas fa-eye" onclick="showPwd()"></button>
            </center><br>
            <label for="NewPassword" class="New">Insert New Password </label><br>
            <input type="password" id="NewPassword" name="NewPassword" disabled><br>
            <label for="RepNewPassword" class="New">Insert New Password Again</label><br>
            <input type="password" id="RepNewPassword" name="RepNewPassword" disabled><br>
            <center class="btn-newpwd">
                <button type="submit" id="ResetPassword" class="btnChange" name='btnChange' disabled>Reset Password</button>
                <button type="button" class="fas fa-eye" onclick="showPwd2()"></button>
            </center>
        </form>
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

    function showPwd2() {
        var x = document.getElementById("NewPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<?php
if (isset($_SESSION['id'])) {
    if (isset($_POST['btnVerify'])) {
        $password = $_POST['CurrentPassword'];
        if (password_verify($password, $password_check)) {
            echo "<script>
        document.getElementById('NewPassword').disabled = false;
        document.getElementById('RepNewPassword').disabled = false;
        document.getElementById('NewPassword').required = true;
        document.getElementById('RepNewPassword').required = true;
        document.getElementById('ResetPassword').disabled = false;
        document.getElementById('CurrentPassword').value = '';
        document.getElementById('CurrentPassword').disabled = true;
        document.getElementById('VerifyPassword').disabled = true;
        </script>";
        } else {
            echo "<script>
        alert('Verification Process Failed. Please Retry.');
        location.href = './editpassword.php';
        </script>";
        }
    }

    if (isset($_GET['error']) && $_GET['error'] = 'pwdmismatch') {
        echo "<script>
    document.getElementById('NewPassword').disabled = false;
    document.getElementById('RepNewPassword').disabled = false;
    document.getElementById('NewPassword').required = true;
    document.getElementById('RepNewPassword').required = true;
    document.getElementById('ResetPassword').disabled = false;
    document.getElementById('CurrentPassword').value = '';
    document.getElementById('CurrentPassword').disabled = true;
    document.getElementById('VerifyPassword').disabled = true;
    </script>";
    }

    if (isset($_POST['btnChange'])) {
        if ($_POST['NewPassword'] != $_POST['RepNewPassword']) {
            echo "<script>
        alert('Password Does Not Match. Please Retry.');
        location.href = './editpassword.php?error=pwdmismatch';
        </script>";
        } else {
            $password = $_POST['NewPassword'];
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET UserPassword = '$password_hashed' WHERE UserID = " . $_SESSION['id'];
            if (mysqli_query($conn, $sql)) {
                echo "<script>
            alert('Password Successfully Changed');
            location.href = './editpassword.php';
            </script>";
            } else {
                echo "<script>
            alert('Something Went Wrong. Please Retry.');
            location.href = './editpassword.php';
            </script>";
            }
        }
    }
}
?>

</html>