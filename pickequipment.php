<?php 
  include('connection.php');
  session_start();
  if (!isset($_SESSION['get_data']['email'])) {
    header("Location: index.php");
}
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM otp_requests WHERE id =".$id) or die($conn->error);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/images/tup-logo.png" rel="icon">
    <title>P.E Department - Borrow Equipment</title>
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
                <a class="nav-link active" aria-current="page" id="link" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="link" href="home.php#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="link" href="#">Account</a>
              </li>
            </ul>
            <div class="d-flex flex-row-reverse bd-highlight">
                <h5 class="title_profile">Welcome,  <?php echo $_SESSION['get_data']['firstname']; ?> 
        
                 <a href="functions.php?logout" type="submit" class="btn btn-danger side" >Logout</a>
                </h5>
            </div>
          </div>
        </div>
      </nav>

      <div class="jumbotron">
        <div class="d-flex flex-row bd-highlight mb-3">
            <a href="home.php" style="text-decoration: none; color:rgb(151, 8, 8);"><i class='bx bx-left-arrow-alt'></i> Back </a>
        </div>
        <div class="text-center">
            <h2>Borrow Equipment</h2>
        </div>
        <br>
        <div class="container marg-top d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
            <div class="row">
                  
                    <div class="col">
                        <br>
                        <div class="card card_custom">
                            <h4 class="text-center mb-4">Basketball</h4>
                            <div class="text-center">
                                <img src="assets/images/basketball.png" width="250" alt="">
                            </div>
                            <br>
                            <a href="borrowing_slip.php?equipment_to_borrow=basketball" type="button" class="btn btn-danger" name="">Select</a>
                            <!-- <a href="" type="button" class="btn btn-danger" name="">Select</a>   -->
                        </div>
                    </div>
                    <div class="col">
                        <br>
                        <div class="card card_custom">
                            <h4 class="text-center mb-4">Volleyball</h4>
                            <div class="text-center">
                                <img src="assets/images/volleyball.png" width="250" alt="">
                            </div>
                            <br>
                            <a href="borrowing_slip.php?equipment_to_borrow=volleyball" type="button" class="btn btn-danger" name="">Select</a>
                        </div>
                    </div>
                </div>
                
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