<?php 
  include('connection.php');
  session_start();
  if (!isset($_SESSION['get_data']['email'])) {
    header("Location: index.php");
}
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
                <a class="nav-link active" aria-current="page" id="link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="link" href="#">Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="link" href="#">Transaction</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <br><br>

        <div class="container text-center mt-5">
            <h1>Your Account is Unverified !</h1>
            <br>
            <h4>Please wait for your account verification.</h4>
            <br><br>
            <a href="https://mail.google.com/" target="_blank" class="btn btn-primary">Check Email</a>
            <a href="functions.php?logout" class="btn btn-danger">Logout</a>
        </div>

      <br><br>

      <footer class="footers fixed-bottom">
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