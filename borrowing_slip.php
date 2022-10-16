<?php 
  include('connection.php');
  session_start();
  date_default_timezone_set('Asia/Manila');
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
    <title>P.E Department - Inquire Uniform</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style_koto.css">
    

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
        <?php
        if (isset($_GET['equipment_to_borrow'])) {
          $equip = $_GET['equipment_to_borrow'];
          $sql = "SELECT $equip FROM ball_sequence where id = '3'";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)) {
        
          
          ?>
          <div id="invoice">

              <div class="jumbotron">
            <div class="text-center">
                <h2>Borrower's Slip</h2>
            
            </div>
            <br>
            <div class="container marg-top d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
                <div class="card card_custom">
                    <div class="row">
                        <div class="col-md-4">
                            <h5><b>ID No:</b>  
                              <span  id = "id_no"> <?php echo $_SESSION['get_data']['id_no'];?></span>
                            </h5>
                            <hr>
                            <h5><b>Name:</b>  
                              <span  id = "firstname"><?php echo $_SESSION['get_data']['firstname'];?> </span>
                              <span  id = "middlename"><?php echo $_SESSION['get_data']['middlename'];?> </span>
                              <span  id = "lastname"><?php echo $_SESSION['get_data']['lastname'];?> </span>
                            </h5>
                            <hr>
                            <h5><b>Course:</b>
                            <span  id = "course"><?php echo $_SESSION['get_data']['course'];?> </span>
                            </h5>
                            <hr>
                            <h5><b>Equipment:</b>
                            <span  id = "equipment"> <?php echo $_GET['equipment_to_borrow'] ?> </span>

                            </h5>
                            <hr>
                            <h5> <b>Ball ID:</b>
                              <span  id = "ball_id"> <?php echo $row["$equip"] ?> </span>    
                            </h5>
                              

                            <hr>
                            <h5><b>Time Borrow</b>
                              <span  id = "time_borrow"> <?php
                              echo date("h:ia");?> </span>

                            </h5>
                            
                            <hr>
                            <h5><b>Date Borrow</b>
                              <span  id = "time_borrow"> <?php echo date("Y-m-d");?> </span>

                            </h5>
                        </div>
                        <?php }?>
                        <div class="col-md-8">
                            <p><b> Terms and Conditions</b> </p>
                            <li align = "justify" class = "alignments">I agree that I will take good care of the sports equipment being borrowed.</li>
                            
                            <li align = "justify" class = "alignments">I agree that I will return the sports equipment after used.</li>
                            
                            <li align = "justify" class = "alignments">I agree that I will take accountability to any damage to the sports equipment being borrowed.</li>
                            
                            <li align = "justify" class = "alignments">I agree that any loss of sports equipment is subject to penalty.</li>
                            
                            <li align = "justify" class = "alignments">I agree that the information of my transactions will be  saved  for security purposes and will be kept confidential.</li>
                            
                            <li align = "justify" class = "alignments">I agree that the sports equipment will be used only  within the TUPC premises.</li>
                            <br>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" onclick = "accept_cbb()" type="checkbox" id="iaccept" >
                              <label class="form-check-label" for="iaccept"> I Accept the Terms and Conditions</label>
                            </div>
                            
                          </div>
                      
 
                        
                        <div class="text-center">
                          <br>
                            <a href = "pickequipment.php" class="btn btn-secondary">Back</a>
                            <button class="btn btn-danger"  id = "btn_confirm_generate"> Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <?php
        }
        else {
          echo "<h1>Request Denied</h1>";
          echo "<h6>Please Click the 'Home'  --> 'Borrow Equipments' to request a Borrowing Slip</h6>";
        }
        ?>
        
        </div>

    <script>
      function accept_cbb() {
        alert("fsadfsdf");       
      }
    </script>
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>                 
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>