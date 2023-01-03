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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">

    <title>Borrower's Slip</title>
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
              <li class="nav-item">
                <a class="nav-link" id="link" href="transaction.php">Transaction</a>
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
      
    <br>
    <?php
    if (isset($_GET['idd'])) {
      $a = $_GET['idd'];
                  
    ?>
    <div class="container receipt-wrap">
        <div class="row justify-content-md-center">
          <div class="container mb-5 mt-2">
            <div class="row d-flex align-items-baseline">
              <div class="col-xl-9">
                <p style="font-size: 20px;">Technological University of the Philippines-Cavite <span>P.E. Department</span></p>
                <p style="font-size: 18px;">Borrower's Slip</p>

              </div>
              <div class="col-xl-3 float-end">
                    <img src="uploads/for_pdf/tuplogo.png" style="height: 100px; width:100px;" alt="">
              </div>
              <hr>
            </div>

            <div class="container receipt-wrap">   
              <div class="row">
                <div class="col-xl-8">
                  <ul class="list-unstyled">
                    <li class="fw-bold">ID No: <span><?php echo $_SESSION['get_data']['id_no'];?></span></li>
                    <li class="fw-bold">Name: <span>
                    <?php echo $_SESSION['get_data']['firstname'];?>
                    <?php echo $_SESSION['get_data']['middlename'];?>
                    <?php echo $_SESSION['get_data']['lastname'];?>
                    

                    </span></li>
                    <li class="fw-bold">Course: <span><?php echo $_SESSION['get_data']['course'];?></span></li>
                    <li class="fw-bold">Email: <span><?php echo $_SESSION['get_data']['email'];?></span></li>

                  </ul>
                </div>
              </div>

              <div class="row my-2 mx-1 justify-content-center">
                <table class="table table-striped table-borderless">
                  <thead style="background-color:#AB2330;" class="text-white">
                    <tr>

                      <th scope="col">Ball ID</th>
                      <th scope="col">Equipment</th>
                      <th scope="col">Time Borrowed</th>
                      <th scope="col">Date Borrowed(Year-Month-Day)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      
                    
                      $query = "SELECT * FROM borrowing_machine_info WHERE id='$a'";
                      $result = mysqli_query($conn, $query);
                      $check_row = mysqli_num_rows($result);
                      while ($row = mysqli_fetch_array($result)) {
    
                      ?>
                      <th scope="row"><?php echo $row['ball_id']; ?></th>
                      <td><?php echo $row['equipment']; ?></td>
                      <td><?php echo $row['time_borrow'];?></td>
                      <td> <?php echo $row['date_borrow'];?> </td>
                      <?php
                      }?>
                    </tr>
                  </tbody>

                </table>
              </div>
              <div class="row my-2 mx-1 justify-content-center">
                <table class="table table-striped table-borderless">
                  <thead style="background-color:#AB2330;" class="text-white">
                    <tr>
                      <th scope="col">Time Returned</th>
                      <th scope="col">Date Returned(Year-Month-Day)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <?php
                      
                    
                      $query = "SELECT * FROM borrowing_machine_info WHERE id='$a'";
                      $result = mysqli_query($conn, $query);
                      $check_row = mysqli_num_rows($result);
                      while ($row = mysqli_fetch_array($result)) {
    
                      ?>
                      <td><?php echo $row['time_return'];?></td>
                      <td><?php echo $row['date_return'];?></td>
                    </tr>
                    <?php
                      }
                    ?>
                  </tbody>

                </table>
              </div>
              <div class="row">
                <div class="col-xl-8">
                  <p class="fw-bold ms-3">Terms and Conditions:</p>
                    <li class="fw-bold">I agree that I will take good care of the sports equipment being borrowed.</li>
                    <li class="fw-bold">I agree that I will return the sports equipment after used.</li>
                    <li class="fw-bold">I agree that I will take accountability to any damage to the sports equipment being borrowed.</li>
                    <li class="fw-bold">I agree that any loss of sports equipment is subject to penalty.</li>
                    <li class="fw-bold">I agree that the sports equipment will be used only within the TUPC premises.</li>

                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xl-10">
                  <p>This borrower's slip is downloaded for the user's personal copy only downloaded on this date:
                    <?php
                  echo date("h:ia")."//".date("Y-m-d")
                  ?> 
                  </p>
              </div>
              <div class="col-xl-10">
        <br>
        <center>
        <button class="btn btn-danger btn-lg " style = "color: white;">Download PDF</button>
              
        </center>
              
            </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <?php
    }
    else{
      echo "<h1>Request Denied</h1>";
      echo "<h6>Please Click the 'Transactions' and go to 'Borrowed Equipment- History' to request a borrowing slip</h6>";

    }
    
      ?>
</body>
</html>