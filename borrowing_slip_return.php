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
    <title>P.E Department</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style_koto.css">
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
			integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		></script>

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
                <a class="nav-link" id="link" href="account.php">Account</a>
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
        if (isset($_GET['equipment_to_return'])) {
          $equip = $_GET['equipment_to_return'];
          ?>
          
            
            <div class="jumbotron">
            <div id="invoice">
            <div class="text-center">
           

                <h2>Ball Return</h2>
            </div>
            <br>
            <div class="container marg-top d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
                <!-- <div class="card card_custom"> -->
                    <div class="row">
                        <?php

            
                        $fetch_data="SELECT * FROM borrowing_machine_info WHERE id_no ='$equip'";
                        $result_data = mysqli_query($conn, $fetch_data);

                        while ($row = mysqli_fetch_array($result_data)) {
                      
                        ?>
                        <div class="col-md-12">
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
                            <span  id = "equipment"> <?php echo $row['equipment']; ?> </span>

                            </h5>
                            <hr>
                            <h5><b>Ball ID:</b>
                            <span  id = "bbid"> <?php echo $row['ball_id']; ?> </span>

                            </h5>
                            <hr>
                            <h5><b>Time Borrow: </b>
                              <span  id = "time_borrow"> <?php echo $row['time_borrow']; ?> </span>

                            </h5>
                            
                            <hr>
                            <h5><b>Date Borrow(Year-Month-Day): </b>
                              <span  id = "date_borrow"> <?php echo $row['date_borrow']; ?> </span>
                            </h5>
                            <hr>
                            <h5><b>Time Return: </b>
                              <span  id = "time_borrow"> <?php echo date("h:ia");?> </span>
                            </h5>
                            
                            <hr>
                            <h5><b>Date Return(Year-Month-Day): </b>
                              <span  id = "date_borrow"> <?php echo date("Y-m-d");?> </span>
                            </h5>
                        </div> <!--end of col md 12--->

                      <?php 
                      // THIS IS THE CODE WHERE THE SYSTEM WILL GENERATE ONE TIME PASSWORD THRU RAND() MODULE AND WILL PASS IT 
                      //ON THE SESSION VARIABLE TOGETHER WITH SOME IMPORTANT DATAS ABOVE
                      $permitted_char = '0123456789ABCD';
                      $otp_equipment =substr(str_shuffle($permitted_char), 0, 5);
                      ?>
                          
                          
                        <div class = "container">
                        <div class="text-center">
                          <br>
                            <form action="functions.php" id = "submit_machine_info" method = "post">
                              <input type="hidden" name = "id_no" value = '<?php echo $_SESSION['get_data']['id_no']?>'>
                              <input type="hidden" name = "equipment_to_borrow" value = '<?php echo $row['equipment']; ?>'>
                              <input type="hidden" name = "otp_generate" value = '<?php echo $otp_equipment ?>'>
                              <input type="hidden" name = "typed" value = '0'>
                              <input type="hidden" name = "actionn" value = 'RETURNING'>
                              <a href = "pickequipment.php" class="btn btn-secondary">Back</a>
                              <button type = "submit" name = "passed_borrower_slip_return" class="btn btn-danger"  id = "btn_confirm_generate">Generate OTP</button>
                            </form>                 
                        </div> <!---end of text center for buttons--->
                        </div>
                    <!-- </div> -->
                    <?php
                        }
                            ?>

                </div><!---end of row---->
            </div><!---end of containe marg top---->
        </div><!---end of jumbotron---->
        </div><!-----end ofinvoice---->
          <?php
        }
        else {
          echo "<h1>Request Denied</h1>";
          echo "<h6>Please Click the 'Home'  --> 'Return your Equipment'</h6>";
        }
        ?>
        
    <iframe id = "frame" src="official_rec.php" style = "width = 100%; border:0; height:0;"></iframe>
    <!-- <script>
      document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('#iaccept').addEventListener('click', function () {
          if(event.target.checked) {
          let wspFrame = document.getElementById('frame').contentWindow;
		      wspFrame.focus();
		      wspFrame.print();
          }
          });
        });
        //////////////
        //////////////
      
    </script> -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>