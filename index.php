<?php 
  include('connection.php');
  session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/images/tup-logo.png" rel="icon">
    <title>P.E Department</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light nav-bg sticky-top">
        <div class="container">
          <img src="assets/images/gear-spin.gif" width="50" alt="">
          <h4 class="title-pe">P.E Department</h4>
          <button class="navbar-toggler"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" id="link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="link" href="#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="link" href="register_student.php">Register</a>
              </li>
            </ul>
            <form action="functions.php" method="POST">
              <div class="d-flex top">
                <div class="col-md-6">
                  <input class="form-control" type="email" placeholder="Email" aria-label="Email" name="email" required>
                  <p class="forgot">Forgot password? <a class="click" href="" data-bs-toggle="modal" data-bs-target="#forgot">click here</a></p>
                </div>
                <div class="col-md-6 side">
                  <input class="form-control " type="password" placeholder="Password" aria-label="Password" name="password" required>
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-danger side" name="login">Login</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </nav>
      <!-- Modal -->
      <div class="modal fade" id="forgot" tabindex="-1" aria-labelledby="forgot" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="">Reset Password</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="functions.php" method="POST">
              <div class="modal-body">
                <h5>Please enter your email to find your account</h5>
                <input type="text" class="form-control" placeholder="Email" name="email" required>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" name="reset_password">Reset</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="overlay-image" style="background-image:url(assets/images/official_bg.jpg);"></div>
            <div class="container carousel-body text-center" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
              <h1>Welcome Student in our P.E Department Website</h1>
              <p>This website is to provide a service where you can now inquire a uniform, reserve, and borrow equipment from the department
                — the choice is yours.</p>
              <button class="btn btn-custom">Learn More</button>
            </div>
          </div>
          <div class="carousel-item">
            <div class="overlay-image" style="background-image:url(assets/images/sample_uniform.jpg);"></div>
              <div class="carousel-body-2 container">
                <h1>Inquire Uniform</h1>
                <p>Inquire your uniform now. Simply fill-up all the necessary <br> information needed. You will receive a confirmation email <br> if your inquiry has been approved.</p>
              </div>
          </div>
          <div class="carousel-item">
            <div class="overlay-image" style="background-image:url(assets/images/sample_facility.jpg);"></div>
            <div class="container carousel-body-2 text-center">
              <h1>Reservation of Facility</h1>
              <p>Student and Teachers can reserve a faclity inside the campus make sure to submit first <br> a reservation form and wait for the confirmation of the department.</p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="overlay-image" style="background-image:url(assets/images/official_equipment.jpg);"></div>
            <div class="container carousel-body-2">
              <h1>Borrowing of Equipments</h1>
              <p>Generate your own OTP and simply borrow equipment in the borrowing machine <br> or either submit a form and borrow it in the department.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <div class="jumbotron">
        <div class="container service-container">
            <div class="text-center slideanim">
                <h3>Services Offered</h3>
                <p class="lead">Experience our quality service to meet your needs.</p>
                <hr>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4 text-center">
                  <br><br>
                  <i class='bx bxs-t-shirt bx-custom'></i>
                  <br><br>
                  <h3>Inquire Uniform</h3>
                  <br>
                  <p>Here you can Inquire P.E uniform simply input all of the necessary information needed
                      and you are good to go.</p>
                  <br>
                  <a href="" class="service-btn">Inquire Uniform</a>
                </div>
                <div class="col-sm-4 text-center">
                  <br><br>
                  <i class='bx bx-calendar bx-custom'></i>
                  <br><br>
                  <h3>Make Reservation</h3>
                  <br>
                  <p>Make your own reservation, make your time productive and just simply schedule your own choice.</p>
                  <br>
                  <a href="" class="service-btn">Make Reservation</a>
                </div>
                <div class="col-sm-4 text-center">
                  <br><br>
                  <i class='bx bxs-basketball bx-custom'></i>
                  <br><br>
                  <h3>Borrow Equipments</h3>
                  <br>
                  <p>Borrow any equipments in P.E Department, just simply fill-up all the 
                      information that is needed.</p>
                  <br>
                  <a href="" class="service-btn">Borrow Equipments</a>
                </div>
                <div id="about"></div>
            </div>
          </div>
      </div>
      <br><br>
      <div class="container">
        <div class="row ">
            <div class="col-sm-4 slideanim">
                <div class="card">
                    <img src="assets/images/tupc.jpg" alt="">
                </div>
            </div>
            <div class="col-sm-8 align-self-center text-center slideanim">
                <br>
                <h3>About</h3>
                <br>
                <p class="lead">This is a web-based application system for the PE Department that is associated with the innovation
                    of the automated sports equipment borrowing machine of the Technology University of the Philippines - Cavite.</p>
              </div>
          </div>
        </div>

      <br><br>

      <div class="jumbotron">
        <div class="container">
            <div class="row justify-content-center slideanim">
              <div class="col-12 col-sm-8 col-lg-6 m-5">
                <div class="section_heading text-center">
                  <h3>Our Creative <span> Team</span></h3>
                  <p class="lead">The people behind this project development</p>
                  <hr>
                </div>
              </div>
            </div>

            <div class="row justify-content-center">
              <div class="col-12 col-sm-4 col-lg-2 ">
                <div class="single_advisor_profile">
                  <div class="advisor_thumb"><img src="assets/profile/rai.jpg" width="150" alt="">
                    <div class="social-info"><a href="https://www.facebook.com/aziar.gumarang04" target="_blank"><i class="fa fa-facebook"></i></a><a href="https://twitter.com/raizagumarang" target="_blank"><i class="fa fa-twitter"></i></a><a href="https://www.instagram.com/raiza.gumarang/" target="_blank"><i class="fa fa-instagram"></i></a></div>
                  </div>
                  <div class="single_advisor_details_info">
                    <h6>Raiza Gumarang</h6>
                    <p class="designation">Research Leader</p>
                  </div>
                </div>
              </div>

              <div class="col-12 col-sm-4 col-lg-2">
                <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                  <div class="advisor_thumb"><img src="assets/profile/naj.jpg" width="150" alt="">
                    <div class="social-info"><a href="https://www.facebook.com/nigelle.salvador" target="_blank"><i class="fa fa-facebook"></i></a><a href="https://twitter.com/Nigellejarred" target="_blank"><i class="fa fa-twitter"></i></a><a href="https://www.instagram.com/nigellejarred/" target="_blank"><i class="fa fa-instagram"></i></a></div>
                  </div>
                  <div class="single_advisor_details_info">
                    <h6>Nigelle Salvador</h6>
                    <p class="designation">Designer</p>
                  </div>
                </div>
              </div>


              <div class="col-12 col-sm-6 col-lg-2">
                <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                  <div class="advisor_thumb"><img src="assets/profile/aj.jpg" width="150" alt="">
                    <div class="social-info"><a href="https://www.linkedin.com/in/avor-john-narag-660091221/" target="_blank"><i class="fa fa-linkedin"></i></a><a href="https://github.com/ajnarag25" target="_blank"><i class="fa fa-github"></i></a><a href="https://www.facebook.com/avorjohn.narag/" target="_blank"><i class="fa fa-facebook"></i></a></div>
                  </div>
                  <div class="single_advisor_details_info">
                    <h6>Avor John Narag</h6>
                    <p class="designation">Developer</p>
                  </div>
                </div>
              </div>
    
              <div class="col-12 col-sm-6 col-lg-2">
                <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                  <div class="advisor_thumb"><img src="assets/profile/sean.jpg" width="150" alt="">
                    <div class="social-info"><a href="https://www.facebook.com/wooopieee" target="_blank"><i class="fa fa-facebook"></i></a><a href="https://github.com/SeanDotExe" target="blank"><i class="fa fa-github"></i></a><a href="https://seanpw.herokuapp.com/" target="_blank"><i class="fa fa-globe"></i></a></div>
                  </div>
                  <div class="single_advisor_details_info">
                    <h6>Sean Monacillo</h6>
                    <p class="designation">Designer</p>
                  </div>
                </div>
              </div>

              <div class="col-12 col-sm-6 col-lg-2">
                <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                  <div class="advisor_thumb"><img src="assets/profile/rilan.jpg" width="150" alt="">
                    <div class="social-info"><a href="https://www.linkedin.com/in/michael-rilan-272b92233/" target="_blank"><i class="fa fa-linkedin"></i></a><a href="https://github.com/michaelrilan" target="_blank"><i class="fa fa-github"></i></a><a href="https://www.facebook.com/michaelangelo.rilan" target="_blank"><i class="fa fa-facebook"></i></a></div>
                  </div>
                  <div class="single_advisor_details_info">
                    <h6>Michael Rilan</h6>
                    <p class="designation">Developer/Designer</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <br><br>

        <div id="contact" class="container slideanim">
          <h3 class="text-center">Contact</h3>
          <br>
          <div class="row contact-form">
              <div class="col-sm-4 ">
                  <br>
                  <div class="content">
                    <i class='bx bxs-navigation bx-contact' ></i>
                    <p> Carlos Q. Trinidad Avenue Brgy. Salawag Dasmariñas City, Cavite 4114</p>
                  </div>
                  <div class="content">
                    <i class='bx bx-phone bx-contact'></i>
                    <p> (046) 416 4920</p>
                  </div>
                  <div class="content">
                    <i class='bx bxs-envelope bx-contact' ></i>
                    <p> pedepartment2@gmail.com</p>
                  </div>
              </div>
              <div class="col-sm-8 ">
                  <form method="#">
                      <div class="container">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <input type="text" name="txtName" class="form-control" placeholder="Name" value="" required />
                                  </div>
                                  <br>
                                  <div class="form-group">
                                      <input type="email" name="txtEmail" class="form-control" placeholder="Email" value="" required/>
                                  </div>
                                  <br>
                                  <div class="form-group">
                                      <input type="text" name="txtPhone" class="form-control" placeholder="Phone Number" value="" required/>
                                  </div>
                                  <br>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <textarea name="txtMsg" class="form-control" placeholder="Message" style="width: 100%; height: 150px;" required></textarea>
                                  </div>
                                  <br>
                              </div>
                              <div class="form-group mx-auto text-center m-3">
                                <button class="btn btn-custom">Send Message</button>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>

      <br><br>

      <footer class="footers">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <h2 class="footer-heading" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">P.E Department System</h2>
                    <p class="copyright">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | by <a href="#">P.E Department System</a>
                      </p>
                </div>
            </div>
        </div>
      </footer>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="js/scripts.js"></script>

</body>
</html>