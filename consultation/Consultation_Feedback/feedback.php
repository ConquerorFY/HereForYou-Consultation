<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel='stylesheet' href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Consultation Feedback</title>
</head>

<body>
    <header>
        <div class="container">
            <input type="checkbox" id="check">

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
                <div class='bg-image-parent'>
                    <h1>Consultation Feedback</h1>
                    <p class='description'>~ Feel Free To Provide Reviews And Ratings About Your Consultation Experience ~</p>
                    <div class='consultation_selection'>
                        <p style="display: inline-block">Consultation Session: </p>
                        <!-- Select Box -->
                        <div class="custom-select-wrapper">
                            <div class="custom-select">
                                <div class="custom-select__trigger"><span>Tesla</span>
                                    <div class="arrow-select"></div>
                                </div>
                                <div class="custom-options">
                                    <span class="custom-option selected" data-value="tesla">Tesla</span>
                                    <span class="custom-option" data-value="volvo">Volvo</span>
                                    <span class="custom-option" data-value="mercedes">Mercedes</span>
                                </div>
                            </div>
                        </div>

                        <!-- End Select Box -->
                    </div>
                    <div class='feedback-container'>
                        <div class='bg-image'></div>
                        <div class='consultor-profile'>
                            <img src='consultor-pic'>
                            <div>
                                <label>Consultor Name: Ryan Lim Fang Yung</label>
                                <label>Consultation Date: 31-Jan-2021</label>
                                <label>Consultation Duration: 1:00 p.m. - 1:30 p.m.</label>
                            </div>
                        </div>
                        <div class='feedback-form'>
                            <p>Please Enter Your Ratings And Review</p>
                            <form method='POST'>
                                <label>Ratings (out of 10): </label>
                                <!-- Star Rating System -->
                                <div class="rating">
                                    <span><input type="radio" name="rating" id="str10" value="10"><label for="str10"></label></span>
                                    <span><input type="radio" name="rating" id="str9" value="9"><label for="str9"></label></span>
                                    <span><input type="radio" name="rating" id="str8" value="8"><label for="str8"></label></span>
                                    <span><input type="radio" name="rating" id="str7" value="7"><label for="str7"></label></span>
                                    <span><input type="radio" name="rating" id="str6" value="6"><label for="str6"></label></span>
                                    <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                                    <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                                    <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                                    <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                                    <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                                </div>
                                <!-- End of Star Rating System -->
                                <label>Reviews:</label>
                                <textarea rows="5" cols="50" type='text' name='reviews' style='padding: 7px;'></textarea>
                                <input type='submit'>
                            </form>
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

    <script type='text/javascript'>
        document.querySelector('.custom-select-wrapper').addEventListener('click', function() {
            this.querySelector('.custom-select').classList.toggle('open');
        })

        for (const option of document.querySelectorAll(".custom-option")) {
            option.addEventListener('click', function() {
                if (!this.classList.contains('selected')) {
                    this.parentNode.querySelector('.custom-option.selected').classList.remove('selected');
                    this.classList.add('selected');
                    this.closest('.custom-select').querySelector('.custom-select__trigger span').textContent = this.textContent;
                }
            })
        }

        window.addEventListener('click', function(e) {
            const select = document.querySelector('.custom-select');
            if (!select.contains(e.target)) {
                select.classList.remove('open');
            }
        });

        $(document).ready(function() {
            // Check Radio-box
            $(".rating input:radio").attr("checked", false);

            $('.rating input').click(function() {
                $(".rating span").removeClass('checked');
                $(this).parent().addClass('checked');
            });

            $('input:radio').change(
                function() {
                    var userRating = this.value;
                    alert(userRating);
                });
        });
    </script>
</body>

</html>