<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel='stylesheet' href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>HFYC | Homepage</title>
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
                    <button class="btn transparent" onclick="location.href='http://localhost/hfyc/logsignsys/login/login.php'">Login</button>
                    <button class="btn solid" onclick="location.href='http://localhost/hfyc/logsignsys/login/login.php'">Sign-Up</button>
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
                <img class='pic-1' src="pic1.jpg" alt="pic_1">
                <div class='content'>
                    <p>Welcome to </p>
                    <p id='hfyc'>HereForYou Consultation</p>
                    <br>
                    <div class='description'>
                        We are here for you always and will provide you with the best services.
                    </div>
                </div>
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