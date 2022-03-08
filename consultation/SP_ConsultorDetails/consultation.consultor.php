<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="styleconsultor.css">
    <title>HFYC | Book Consultation - Select Consultor</title>
</head>

<body>
<main>
    <div id="page-description">
        <h1>Please Select Your Consultor</h1>
    </div>

<form action="" method="post"></form>

<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "hfyc_apu";

    $conn = mysqli_connect($servername, $username, $password, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * from users where UserID = '" . $_SESSION['tp'] . "'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows >= 1) {
    echo "<div id='consultor-list'>";
        //Consultor-1
        echo "<img src='Chino.png' alt='consultor-pic' class='photos'>";
        echo "<div class='consultor-info'>";
               echo "<table class='table'>";
                    echo "<tbody>";
                        echo "<tr>";
                            echo "<th>Consultor Name</th>";
                                echo "<td>" . $row[''] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<th>Age</th>";
                                echo"<td>" . $row[''] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<th>Ratings</th>";
                                echo "<td>" . $row[''] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<th>Description</th>";
                                echo "<td>" . $row[''] . "</td>";
                        echo "</tr>";
                    echo "</tbody>"
                echo "</table>"

                echo "<br>"

            echo "<a href='#' class='btn-select'>
                Book My Consultation Now!
            </a>"
        echo "</div>"
        //Consultor-2
        echo"<img src='aa.jpg' alt='consultor-pic' class='photos'>"
        echo "<div class='consultor-info'>";
        echo "<table class='table'>";
             echo "<tbody>";
                 echo "<tr>";
                     echo "<th>Consultor Name</th>";
                         echo "<td>" . $row[''] . "</td>";
                 echo "</tr>";
                 echo "<tr>";
                     echo "<th>Age</th>";
                         echo"<td>" . $row[''] . "</td>";
                 echo "</tr>";
                 echo "<tr>";
                     echo "<th>Ratings</th>";
                         echo "<td>" . $row[''] . "</td>";
                 echo "</tr>";
                 echo "<tr>";
                     echo "<th>Description</th>";
                         echo "<td>" . $row[''] . "</td>";
                 echo "</tr>";
             echo "</tbody>"
         echo "</table>"

         echo "<br>"

     echo "<a href='#' class='btn-select'>
         Book My Consultation Now!
     </a>"
 echo "</div>"
echo"</div>"
?>
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

<script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</body>

</html>