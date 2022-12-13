<?php 
  include('connection.php');
  session_start();
  if (!isset($_SESSION['otp'])) {
    header("Location: verify_otp.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/images/tup-logo.png" rel="icon">
    <title>P.E Department - Registration Student</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>

<body>
    
    <nav class="navbar navbar-expand-lg navbar-light nav-bg">
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
                <a class="nav-link" id="link" href="index.php#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="link" href="register_student.php">Register</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <br><br>

      <div class="container marg-top d-flex justify-content-center mt-5" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
        <div class="card card_custom">
            <i class='bx bxs-key bx-custom text-center'></i>
            <br>
                <div class="form-outline mb-4">
                <h4 class="text-center mb-4">Change Password</h4>
                </div>
                <form action="functions.php" class="login-form" method="POST">
                    <div class="form-group">
                        <input type="password" class="form-control rounded-left" name="newpass1" placeholder="Enter New Password" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="password" class="form-control rounded-left" name="newpass2" placeholder="Retype password" required>
                    </div>
                    <div class="form-group text-center">
                        <br>
                        <a href="verify_otp.php" class="btn btn-secondary" name="login">Back</a>
                        <button type="submit" class="btn btn-danger" name="change_pass">Submit</button>
                    </div>
                </form>
            </div>
        </div>


   

  
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="js/scripts.js"></script>
    <script>
      function preview() {
          frame_1.src=URL.createObjectURL(event.target.files[0]);
      }

    </script>
</body>
</html>