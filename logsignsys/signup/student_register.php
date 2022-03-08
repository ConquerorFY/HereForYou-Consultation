<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  <link rel='stylesheet' href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <title>Responsive Navbar</title>
</head>

<body>
  <header>
    <div class="container">
      <input type="checkbox" name="" id="check">

      <div class="logo-container">
        <h3 class="logo">HFY<span>Consultation</span></h3>
      </div>

      <div class="nav-btn">
        <div class="nav-links">
          <ul>
            <li class="nav-link" style="--i: .6s">
              <a href="#">Home</a>
            </li>
            <li class="nav-link" style="--i: .85s">
              <a href="#">Services<i class="fas fa-caret-down"></i></a>
              <div class="dropdown">
                <ul>
                  <li class="dropdown-link">
                    <a href="#">Latest News</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="#">StudyMate</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="#">Consultation<i class="fas fa-caret-down"></i></a>
                    <div class="dropdown second">
                      <ul>
                        <li class="dropdown-link">
                          <a href="#">Book Consultation</a>
                        </li>
                        <li class="dropdown-link">
                          <a href="#">Types of Consultation</a>
                        </li>
                        <li class="dropdown-link">
                          <a href="#">Past Consultations</a>
                        </li>
                        <div class="arrow"></div>
                      </ul>
                    </div>
                  </li>
                  <div class="arrow"></div>
                </ul>
              </div>
            </li>
            <li class="nav-link" style="--i: 1.1s">
              <a href="#">Help<i class="fas fa-caret-down"></i></a>
              <div class="dropdown">
                <ul>
                  <li class="dropdown-link">
                    <a href="#">Terms</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="#">Privacy</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="#">Socials<i class="fas fa-caret-down"></i></a>
                    <div class="dropdown second">
                      <ul>
                        <li class="dropdown-link">
                          <a href="#">Instagram</a>
                        </li>
                        <li class="dropdown-link">
                          <a href="#">Twitter</a>
                        </li>
                        <li class="dropdown-link">
                          <a href="#">Facebook</a>
                        </li>
                        <li class="dropdown-link">
                          <a href="#">Teams</a>
                        </li>
                        <div class="arrow"></div>
                      </ul>
                    </div>
                  </li>
                  <div class="arrow"></div>
                </ul>
              </div>
            </li>
            <li class="nav-link" style="--i: 1.35s">
              <a href="#">About</a>
            </li>
          </ul>
        </div>

        <div class="log-sign" style="--i: 1.8s">
          <a href="#" class="btn transparent">Log in</a>
          <a href="#" class="btn solid">Sign up</a>
        </div>
      </div>

      <div class="hamburger-menu-container">
        <div class="hamburger-menu">
          <div></div>
        </div>
      </div>
    </div>
  </header>
  <main>
    <section>
      <div class="overlay">
        <div class="control-content">

          <div class="left-side">
            <h2>Create Your User Account</h2>
            <p>Come talk to us.</p>
            <br>
            <?php
            $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if ((!isset($_GET['info']) && !isset($_GET['error'])) || strpos($fullUrl, "error=wrongpassword") == TRUE || strpos($fullUrl, "error=wrongdetails") == TRUE || strpos($fullUrl, "error=invalidentry") == TRUE){
              if(isset($_GET['error'])){
                if($_GET['error'] == 'wrongpassword'){
                  $error_message = "Wrong Password Entered. Please Try Again.";
                }else if($_GET['error'] == 'wrongdetails'){
                  $error_message = "Wrong Details Entered. Please Try Again.";
                }else if($_GET['error'] == 'invalidentry'){
                  $error_message = 'Please Enter Your Details.';
                }
              echo "<p class='popup'>
                $error_message                
              </p>";
              }

              echo "<div class='section-a'>
              <form method='POST' action='user_signup.con.php'>
                <b>Section A: Verification Process</b>
                <p>~ To verify your user account in Asia Pacific University, enter the following details and submit to proceed ~</p>
                <br><br>
                <label for='tp'>TP Number: </label>
                <input name='tp' id='tp' type='text' required>
                <br><br>
                <label for='password'>Password: </label>
                <input name='password' id='password' type='password' required>
                <input name='student' type='hidden'>
                <br><br>
                <input type='submit' value='Submit' name='validate-submit'>
              </form>
            </div>";
            }else if (strpos($fullUrl, "info=validatesuccess") == TRUE || strpos($fullUrl, "info=registersuccess") == TRUE || strpos($fullUrl, "error=sqlerror") == TRUE || strpos($fullUrl, "error=alreadyregistered") == TRUE || strpos($fullUrl, "error=usernametaken") == TRUE){
              if(isset($_SESSION['TP']) && isset($_SESSION['Password'])){
                require '../../m_connection/db.con.php';

                if(isset($_GET['error']) || (isset($_GET['info']) && $_GET['info'] == 'registersuccess')){
                  if(isset($_GET['error'])){
                    if($_GET['error'] == 'sqlerror'){
                      $error_message = "An Error Has Occured. Please Retry.";
                    }else if($_GET['error'] == 'alreadyregistered'){
                      $error_message = "Account Already Registered.";
                    }else if($_GET['error'] == 'usernametaken'){
                      $error_message = 'Username Is Taken. Please Retry';
                    }
                  }else{
                    $error_message = 'Registration Successful.';
                  }
                echo "<p class='popup'>
                  $error_message                
                </p>";
                }

                $sql = "SELECT * FROM student WHERE student_tp="."'".$_SESSION['TP']."'";

                $result = mysqli_query($conn2, $sql);
                $data = mysqli_fetch_assoc($result);

                $tp = $_SESSION['TP'];
                $password = $_SESSION['Password'];
                $age = $data["student_age"];
                $roles = "student";
                $name = $data['student_name'];
                $gender = $data['student_gender'];
                $address = $data['student_address'];
                $contact = $data['student_phone'];
                $email = $data['student_email'];

                echo "<div class='section-b'>
                <form method='POST' action='user_signup.con.php'>
                  <b>Section B: Registration Process</b>
                  <p>~ Please enter the username that you would like us to call you ~</p>
                  <br><br>
                  <label for='username'>Username: </label>
                  <input name='username' id='username' type='text' required>
                  <br><br>
                  <label for='password'>Password: </label>
                  <input name='password' id='password' type='password' value=$password>
                  <br><br>
                  <label for='description'>Description: </label>
                  <input name='description' id='description' type='text' required>
                  <br><br>
                  <input name='tp' type='hidden' value=$tp>
                  <input name='age' type='hidden' value=$age>
                  <input name='roles' type='hidden' value=$roles>
                  <input name='name' type='hidden' value=$name>
                  <input name='gender' type='hidden' value=$gender>
                  <input name='address' type='hidden' value=$address>
                  <input name='contact' type='hidden' value=$contact>
                  <input name='email' type='hidden' value=$email>
                  <input type='submit' value='Submit' name='register-submit'>
                </form>
              </div>";
              }else{
                header("Location: studentregister.php?error=invalidentry");
                exit();
              }
            }
            ?>
            <br><br>
          
            <div class="right-side">
              <p class="Content1">Share</p>
              <p class="Content2">Your Thoughts</p>
              <p class="Content3">With Us</p>
              <img src="consultation.jpg" alt='consultation'>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <div class='footer'>
      <div class='sec aboutus'>
        <h2>About Us</h2>
        <p>Come Follow Us</p>
        <ul class='sci'>
          <li><a href='#'><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
          <li><a href='#'><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          <li><a href='#'><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
          <li><a href='#'><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
        </ul>
      </div>
      <div class='sec quickLinks'>
        <h2>Quick Links</h2>
        <ul>
          <li><a href="#">About</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Help</a></li>
          <li><a href="#">Terms & Condition</a></li>
          <li><a href="#">Contact</a></li>
        </ul>

      </div>
      <div class='sec contact'>
        <h2>Contact Info</h2>
        <ul class="info">
          <li>
            <span><i class="fa fa-map-pin" aria-hidden="true"></i></span>
            <span>xxx</span>
            <span>xxxx</span>
          </li>
          <li>
            <span><i class="fa fa-phone" aria-hidden="true"></i></span>
            <p><a href="tel:12345679">+60 123 1233333</a><br>
              <a href="tel:12345679">+60 123 1233333</a></p>
          </li>
          <li>
            <span><i class="fa fa-share" aria-hidden="true"></i></span>
            <p><a href='mailto:xxx@gmail.com'>xxx@gmail.com</a></p>
          </li>

        </ul>

      </div>
    </div>
  </footer>
  <div class='copyrightText'>
    <p>Copyright</p>
  </div>
</body>

</html>