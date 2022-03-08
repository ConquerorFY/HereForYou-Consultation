<?php
date_default_timezone_set('Asia/Singapore');
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="browsericon.png">
    <link rel="stylesheet" href="styleconsult.css">
    <script src="createConsult.js" defer></script>
    <title>HFYC | Consultation Slot</title>
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
                                                    <a href="#">Create Consultation Slots</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="#">Consultation Booked List</a>
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
            <div class='overlay'>
                <h1> Create Consultation Slots</h1><br><br><br><button class="btnOpen" id="btnOpen">Add Slot</button>

                <?php
                $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if (strpos($fullUrl, "loginerror=emptyFields") == TRUE) {
                    echo "<div class = 'alert show'>";
                    echo "<span class= 'fas fa-exclamation-circle'></span>";
                    echo "<span class= 'msg'> Warning: Please try again! You have failed to select all the fields needed.</span>";
                    echo "<span class= 'close-btn' id='close-btn'>";
                    echo "<span class='fas fa-times'></span>";
                    echo "</span>";
                    echo "</div>";

                    echo "<script>
        document.querySelector('.close-btn').addEventListener('click', function() {
            document.querySelector('.alert').style.display = 'none';
        });
        </script>";
                } elseif (strpos($fullUrl, "Timeerror=sameTime") == TRUE) {
                    echo "<div class = 'error show'>";
                    echo "<span class= 'fas fa-times-circle'></span>";
                    echo "<span class= 'msg'> Error: Start time and End time should be different!</span>";
                    echo "<span class= 'e-close-btn' id = 'e-close-btn'>";
                    echo "<span class='fas fa-times'></span>";
                    echo "</span>";
                    echo "</div>";

                    echo "<script>
        document.querySelector('.e-close-btn').addEventListener('click', function() {
            document.querySelector('.error').style.display = 'none';
        });
        </script>";
                } elseif (strpos($fullUrl, "Slot=exist") == TRUE) {
                    echo "<div class = 'error show'>";
                    echo "<span class= 'fas fa-times-circle'></span>";
                    echo "<span class= 'msg'> Error: Slot Already Exist! Please Try Again with a New Input.</span>";
                    echo "<span class= 'e-close-btn' id = 'e-close-btn'>";
                    echo "<span class='fas fa-times'></span>";
                    echo "</span>";
                    echo "</div>";

                    echo "<script>
        document.querySelector('.e-close-btn').addEventListener('click', function() {
            document.querySelector('.error').style.display = 'none';
        });
        </script>";
                } elseif (strpos($fullUrl, "error=sqlError") == TRUE) {
                    echo "<div class = 'error show'>";
                    echo "<span class= 'fas fa-times-circle'></span>";
                    echo "<span class= 'msg'> Warning: Please try again! There was an error occured.</span>";
                    echo "<span class= 'e-close-btn' id= 'e-close-btn'>";
                    echo "<span class='fas fa-times'></span>";
                    echo "</span>";
                    echo "</div>";

                    echo "<script>
        document.querySelector('.e-close-btn').addEventListener('click', function() {
            document.querySelector('.error').style.display = 'none';
        });
        </script>";
                } elseif (strpos($fullUrl, "submit=success") == TRUE) {
                    echo "<div class = 'success show'>";
                    echo "<span class= 'fas fa-check-circle'></span>";
                    echo "<span class= 'msg'> Success: Slots has been added successfully.</span>";
                    echo "<span class= 's-close-btn' id = 's-close-btn'>";
                    echo "<span class='fas fa-times'></span>";
                    echo "</span>";
                    echo "</div>";

                    echo "<script>
        document.querySelector('.s-close-btn').addEventListener('click', function() {
            document.querySelector('.success').style.display = 'none';
        });
        </script>";
                }
                ?>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $db = "hfyc_apu";

                $conn = mysqli_connect($servername, $username, $password, $db);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * from Consultor_Consultation where Consultor_ID = '" . $_SESSION['tp'] . "'";
                $result = mysqli_query($conn, $sql);

                if ($result->num_rows <= 0) {
                    echo "<div class='box'>";
                    echo "<div class='center-text'>";
                    echo "<img src = 'sadFace.png'>";
                    echo "<h2>Oopss!!! It seems like you haven't added any slots yet. Add some for the users to book.</h2>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
                <div id="dialogoverlay"></div>
                    <div id="dialogbox">
                        <div>
                            <div id="dialogboxhead"></div>
                            <div id="dialogboxbody"></div>
                            <div id="dialogboxfoot"></div>
                        </div>
                    </div>
                

                <div class="time-slot">
                    <div class="modal-content"><br>
                        <h2 class="title-slot">Add New Time Slot</h2>
                        <div class="btnClose" id="btnClose">+</div><br><br>
                        <h5>Please Select All the Fields!</h3>
                        <form class="form" method="POST" action="addTimeslot.php">
                        <h6 class="select-date">Select Date</h6>
                            <input type="date" name="date" id="dateValidate" class="date-align">
                            <h6 class="select-venue">Select Venue</h6>
          
                            <select name="venue" class="venue-align">
                            <option value="" selected="selected">Venue</option>
                            <option value="Microsoft Teams">Microsoft Teams</option>
                            <option value="Discord">Discord</option>
                            </select>
                         
                            <h6 class='select-duration' >Select Duration</h6><br>
                            <select name="start_time" class="time-align">
                                <option value="" selected>Start-Time</option>
                                <option value="00:00 AM">12.00 AM</option>
                                <option value="00:30 AM">12.30 AM</option>
                                <option value="01:00 AM">01.00 AM</option>
                                <option value="01:30 AM">01.30 AM</option>
                                <option value="02:00 AM">02.00 AM</option>
                                <option value="02:30 AM">02.30 AM</option>
                                <option value="03:00 AM">03.00 AM</option>
                                <option value="03:30 AM">03.30 AM</option>
                                <option value="04:00 AM">04.00 AM</option>
                                <option value="04:30 AM">04.30 AM</option>
                                <option value="05:00 AM">05.00 AM</option>
                                <option value="05:30 AM">05.30 AM</option>
                                <option value="06:00 AM">06.00 AM</option>
                                <option value="06:30 AM">06.30 AM</option>
                                <option value="07:00 AM">07.00 AM</option>
                                <option value="07:30 AM">07.30 AM</option>
                                <option value="08:00 AM">08.00 AM</option>
                                <option value="08:30 AM">08.30 AM</option>
                                <option value="09:00 AM">09.00 AM</option>
                                <option value="09:30 AM">09.30 AM</option>
                                <option value="10:00 AM">10.00 AM</option>
                                <option value="10:30 AM">10.30 AM</option>
                                <option value="11:00 AM">11.00 AM</option>
                                <option value="11:30 AM">11.30 AM</option>
                                <option value="12:00 PM">12.00 PM</option>
                                <option value="12:30 PM">12.30 PM</option>
                                <option value="13:00 PM">01.00 PM</option>
                                <option value="13:30 PM">01.30 PM</option>
                                <option value="14:00 PM">02.00 PM</option>
                                <option value="14:30 PM">02.30 PM</option>
                                <option value="15:00 PM">03.00 PM</option>
                                <option value="15:30 PM">03.30 PM</option>
                                <option value="16:00 PM">04.00 PM</option>
                                <option value="16:30 PM">04.30 PM</option>
                                <option value="17:00 PM">05.00 PM</option>
                                <option value="17:30 PM">05.30 PM</option>
                                <option value="18:00 PM">06.00 PM</option>
                                <option value="18:30 PM">06.30 PM</option>
                                <option value="19:00 PM">07.00 PM</option>
                                <option value="19:30 PM">07.30 PM</option>
                                <option value="20:00 PM">08.00 PM</option>
                                <option value="20:30 PM">08.30 PM</option>
                                <option value="21:00 PM">09.00 PM</option>
                                <option value="21:30 PM">09.30 PM</option>
                                <option value="22:00 PM">10.00 PM</option>
                                <option value="22:30 PM">10.30 PM</option>
                                <option value="23:00 PM">11.00 PM</option>
                                <option value="23:30 PM">11.30 PM</option>
                            </select><label class="time-label"> to </label> <select name="end_time" class="time-align">
                                <option value="" selected>End-Time</option>
                                <option value="00:00 AM">12.00 AM</option>
                                <option value="00:30 AM">12.30 AM</option>
                                <option value="01:00 AM">01.00 AM</option>
                                <option value="01:30 AM">01.30 AM</option>
                                <option value="02:00 AM">02.00 AM</option>
                                <option value="02:30 AM">02.30 AM</option>
                                <option value="03:00 AM">03.00 AM</option>
                                <option value="03:30 AM">03.30 AM</option>
                                <option value="04:00 AM">04.00 AM</option>
                                <option value="04:30 AM">04.30 AM</option>
                                <option value="05:00 AM">05.00 AM</option>
                                <option value="05:30 AM">05.30 AM</option>
                                <option value="06:00 AM">06.00 AM</option>
                                <option value="06:30 AM">06.30 AM</option>
                                <option value="07:00 AM">07.00 AM</option>
                                <option value="07:30 AM">07.30 AM</option>
                                <option value="08:00 AM">08.00 AM</option>
                                <option value="08:30 AM">08.30 AM</option>
                                <option value="09:00 AM">09.00 AM</option>
                                <option value="09:30 AM">09.30 AM</option>
                                <option value="10:00 AM">10.00 AM</option>
                                <option value="10:30 AM">10.30 AM</option>
                                <option value="11:00 AM">11.00 AM</option>
                                <option value="11:30 AM">11.30 AM</option>
                                <option value="12:00 PM">12.00 PM</option>
                                <option value="12:30 PM">12.30 PM</option>
                                <option value="13:00 PM">01.00 PM</option>
                                <option value="13:30 PM">01.30 PM</option>
                                <option value="14:00 PM">02.00 PM</option>
                                <option value="14:30 PM">02.30 PM</option>
                                <option value="15:00 PM">03.00 PM</option>
                                <option value="15:30 PM">03.30 PM</option>
                                <option value="16:00 PM">04.00 PM</option>
                                <option value="16:30 PM">04.30 PM</option>
                                <option value="17:00 PM">05.00 PM</option>
                                <option value="17:30 PM">05.30 PM</option>
                                <option value="18:00 PM">06.00 PM</option>
                                <option value="18:30 PM">06.30 PM</option>
                                <option value="19:00 PM">07.00 PM</option>
                                <option value="19:30 PM">07.30 PM</option>
                                <option value="20:00 PM">08.00 PM</option>
                                <option value="20:30 PM">08.30 PM</option>
                                <option value="21:00 PM">09.00 PM</option>
                                <option value="21:30 PM">09.30 PM</option>
                                <option value="22:00 PM">10.00 PM</option>
                                <option value="22:30 PM">10.30 PM</option>
                                <option value="23:00 PM">11.00 PM</option>
                                <option value="23:30 PM">11.30 PM</option>
                            </select><br><br>

                            <button type="sudmit" name="btnSave" class="btnSave" id="btnSave"><i class="fa fa-save" style="font-size: 30px;padding-top: 1px;"></i></button>
                        </form>
                    </div>
                </div>
                <?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $db = "hfyc_apu";

                $conn = mysqli_connect($servername, $username, $password, $db);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * from Consultor_Consultation where Consultor_ID = '" . $_SESSION['tp'] . "'";
                $result = mysqli_query($conn, $sql);

                if ($result->num_rows >= 1) {
                    echo "<table class='table-style' width='100%'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Date</th>";
                    echo "<th >Time Slots</th>";
                    echo "<th>Status</th>";
                    echo "<th>Venue</th>";
                    echo "<th >Details</th>";
                    echo "<th></th>";
                    echo "<th></th>";
                    echo "<th></th>";
                    echo "<th></th>";
                    echo "</tr>";

                    echo "</thead>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>" . $row["Consult_Date"] . "</td>";
                        echo "<td>" . $row["Start_Time"] . " - " . $row["End_Time"] . "</td>";
                        echo "<td>".$row["SlotStatus"]."</td>";
                        echo "<td>".$row["ConsultationVenue"]."</td>";
                        
                        echo "<td>" . "<a href= '#' style= 'text-decoration: underline;color;black;' class = 'link'>Click Here</a>" . "</td>";
                        echo "<td></td>";
                        echo "<td></td>";                      
                        echo "<td><a style ='color:white' href ='delete.php?id=" . $row["Consultation_ID"] . "'><button class='btnDelete' name='btnDelete' id='btnDelete' onClick='deleteme()' >Delete</button></a>";
                        echo "<td></td>";
                        echo "</tr>";
                    }
                }
                ?> 
    <script type="text/javascript">   
		function deleteme()
		{
			if(confirm("Are you sure you want delete this slot?")){
				window.location.href='delete.php?id=" . $row["Consultation_ID"] . "';
                return true;
            }
            return false;
        }	
        </script>
    
                </tbody>
                </table>
                <?php
                    echo "<script>
                    var size = 1 + document.querySelectorAll('tr').length / 10;
                    document.querySelector('section').style.height = `calc((100vh - 3rem) * ".'${size'."}`"
                    ."</script>";
                ?>
            </div>
        </section>
    </main>
    <footer>
        <div class='footer'>
            <div class='sec aboutus'>
                <h2>About Us</h2>
                <p>dwsdw</p>
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
                            <a href="tel:12345679">+60 123 1233333</a>
                        </p>
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