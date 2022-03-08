<?php
if (isset($_POST['validate-submit'])){
    require '../../m_connection/db.con.php';

    $tp = $_POST['tp'];

    if(isset($_POST['student'])){
        $password = $_POST['password'];
        $sql = "SELECT student_password FROM student WHERE student_tp='$tp'";

        $result = mysqli_query($conn2, $sql);

        if(mysqli_num_rows($result) == 1){
            $password_hashed = mysqli_fetch_row($result)[0];
            if(password_verify($password, $password_hashed)){
                session_start();
                $_SESSION['TP'] = $tp;
                $_SESSION['Password'] = $password;
                header("Location: student_register.php?info=validatesuccess");
                exit();
            }else{
                header("Location: student_register.php?error=wrongpassword");
                exit();
            }
        }else{
            header("Location: student_register.php?error=wrongdetails");
            exit();
        }
    }else{
        $name = $_POST['name'];
        $sql = "SELECT staff_name FROM staff WHERE staff_tp='$tp'";

        $result = mysqli_query($conn2, $sql);
        $check_name = mysqli_fetch_row($result)[0];
    
        if(mysqli_num_rows($result) == 1 && $name == $check_name){
            session_start();
            $_SESSION['New_Admin_TP'] = $tp;
            $_SESSION['New_Admin_Name'] = $name;
            header("Location: admin_register.php?info=validatesuccess");
            exit();
        }else{
            header("Location: admin_register.php?error=wrongdetails");
            exit();
        }
    }
    
    mysqli_close($conn);
    mysqli_close($conn2);

}else if (isset($_POST['register-submit'])){
    require '../../m_connection/db.con.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $description = $_POST['description'];

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $roles = $_POST['roles'];
    $age = $_POST['age'];
    $tp = $_POST['tp'];
    if($roles == 'consultor'){
        $services = $_POST['services'];
    }
    if($roles == 'admin' || $roles == 'consultor'){
        $url = "admin_register";
    }else{
        $url = "student_register";
    }

    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    if($roles == 'admin'){
        $table = 'admin';
        $table_tp = "AdminTP";
    }else if($roles == 'consultor'){
        $table = 'consultor';
        $table_tp = "ConsultorTP";
    }else{
        $table = 'normal_user';
        $table_tp = "NormalUserTP";
    }

    $sql = "SELECT * FROM $table WHERE $table_tp = '$tp'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        header("Location: $url.php?error=alreadyregistered");
        exit();
    }

    $sql = "SELECT * FROM users WHERE Username = '$username'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        header("Location: $url.php?error=usernametaken");
        exit();
    }

    $sql = "INSERT INTO users (Username, UserPassword, UserRole) VALUES 
            (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: $url.php?error=sqlerror");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "sss", $username, $password_hashed, $roles);
        mysqli_stmt_execute($stmt);        
    }

    $sql = "SELECT UserID FROM users WHERE Username = '$username'";
    $result = mysqli_query($conn, $sql);
    $userid = mysqli_fetch_array($result)[0];
    $default = 0;

    if($roles == 'admin'){
        $sql = "INSERT INTO `admin` (UserID, AdminTP, AdminEmail, AdminAddress, AdminDescription, AdminAge, 
                AdminPhoneNumber, AdminGender, AdminImgStatus, AdminChillBuds)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: $url.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "issssissii", $userid, $tp, $email, $address, $description, $age, $contact, $gender, $default, $default);
            mysqli_stmt_execute($stmt);        
        }
    }else if($roles == 'consultor'){
        $sql = "INSERT INTO `consultor` (UserID, ConsultorTP, ConsultorEmail, ConsultorAddress, ConsultorDescription, ConsultorAge, 
                ConsultorPhoneNumber, ConsultorGender, ConsultorImgStatus, ConsultorChillBuds, ConsultorService)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: $url.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "issssissiis", $userid, $tp, $email, $address, $description, $age, $contact, $gender, $default, $default, $services);
            mysqli_stmt_execute($stmt);        
        }
    }else{
        $sql = "INSERT INTO `normal_user` (UserID, NormalUserTP, NormalUserEmail, NormalUserAddress, NormalUserDescription, NormalUserAge, 
                NormalUserPhoneNumber, NormalUserGender, NormalUserImgStatus, NormalUserChillBuds)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: $url.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "issssissii", $userid, $tp, $email, $address, $description, $age, $contact, $gender, $default, $default);
            mysqli_stmt_execute($stmt);        
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    mysqli_close($conn2);

    header("Location: ../login/login.php?info=registersuccess");
    exit();
}
?>