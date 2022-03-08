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


    if (isset($_POST['submit'])) {
        $name = $_POST['realname'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $description = $_POST['description'];

        $sql = "UPDATE normal_user SET NormalUserName = '$name', NormalUserAge = '$age', NormalUserEmail = '$email', 
            NormalUserAddress = '$address', NormalUserDescription = '$description' WHERE UserID = " . $_SESSION['id'];

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Changes Has Been Made Successfully')</script>";
            echo "<script>location.href = './editprofile.php'</script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please Try Again')</script>";
            echo "<script>location.href = './editprofile.php'</script>";
        }
    }

    if (isset($_POST['img-submit'])) {
        $filename = $_FILES['file']["name"];
        $filetype = $_FILES['file']['type'];
        $filesize = $_FILES['file']['size'];
        $filetmpname = $_FILES['file']['tmp_name'];
        $fileerror = $_FILES['file']['error'];

        $extension_raw = explode(".", $filename);
        $extension = strtolower(end($extension_raw));
        $allowed_list = array("jpg", "png", "jpeg");

        if (in_array($extension, $allowed_list)) {
            if ($fileerror == 0) {
                if ($filesize < 10000000) {
                    $filenewname = "ProfilePicID" . $_SESSION['id'] . ".$extension";
                    $dirname = '../../../profile_upload_pic/' . $filenewname;
                    move_uploaded_file($filetmpname, $dirname);
                    echo "<script>
                    alert('File Has Been Uploaded Successfully');
                    </script>";
                } else {
                    echo "<script>
                    alert('The file is too big. Please try using files with sizes less than 10MB');
                    </script>";
                }
            } else {
                echo "<script>
                alert('Some error has occurred. Please retry again');
                </script>";
            }
        } else {
            echo "<script>
            alert('The File Format is Not Supported. Please use .jpg, .png or .jpeg files instead');
            </script>";
        }
    }
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="editprofile.css">
    <title>HFYC | Edit Profile</title>
</head>

<body>
    <main>
        <div class="editprofile">
            <h1>Edit Profile</h1>
            <h2>You can change your user picture & details now!</h2>
        </div>
        <div class="editprofile-main-content">
            <div class="profile-pic">
                <?php
                if (file_exists('../../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".jpg")) {
                    echo "<img src='" . '../../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".jpg" . "' alt='user-pic' class='user-pic'>";
                } else if (file_exists('../../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".png")) {
                    echo "<img src='" . '../../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".png" . "' alt='user-pic' class='user-pic'>";
                } else if (file_exists('../../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".jpeg")) {
                    echo "<img src='" . '../../../profile_upload_pic/' . "ProfilePicID" . $_SESSION['id'] . ".jpeg" . "' alt='user-pic' class='user-pic'>";
                } else {
                    echo "<img src= '../../../profile_upload_pic/avatar.png' alt='user-pic' class='user-pic'>";
                }
                ?>
            </div>
            <form class="img-select-button" method="post" enctype="multipart/form-data">
                <input class="btn-file" type="file" name="file">
                <button class="btn-submit" name="img-submit">Upload & Save Image Changes</button>
            </form>
            <div class="profile-info">
                <form class="info-form" method="post">
                    <label for="realname"><b>Real Name</b></label><br>
                    <input type="realname" name="realname" value='<?php echo $name ?>' required><br>
                    <label for="age"><b>Age</b></label><br>
                    <input type="age" name="age" value=<?php echo $age ?> required><br>
                    <label for="email"><b>Email</b></label><br>
                    <input type="email" name="email" value=<?php echo $email ?> required><br>
                    <label for="address"><b>Address</b></label><br>
                    <textarea rows="4" cols="50" class="extend" type="address" name="address" required><?php echo $address ?></textarea><br>
                    <label for="description"><b>Description</b></label><br>
                    <textarea class="extend" type="description" name="description" required><?php echo $description ?> </textarea><br>
                    <center>
                        <button class="btn-cancel" onclick="cancelEdit()">Cancel Edit</button>
                        <button type="submit" name='submit' class="btn-save">Save Changes Made</button>
                    </center>
                </form>
            </div>
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
    <p>Visit our Social Media!!!</p>
    <p class="social-media">
        <a href="#"><i class="fab fa-facebook" onclick=""></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-discord"></i></a>
        <a href="#"><i class="fab fa-microsoft"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
    </p>
</footer>

<!-- Add JS later-->
<script>
    function cancelEdit() {
        location.href = "./editprofile.php";
    }
</script>

</html>