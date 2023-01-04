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
    <title>P.E Department - Reserve Facility</title>
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

      <div class="jumbotron">
        <div class="text-center">
            <h2>Your Request for Reservation has been sent</h2>
            <p>Please wait for your response.</p>
        </div>
        <br>
        <div class="container marg-top d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
            <div class="row">
                <div class="col">
                    <div class="card card_custom">
                            <?php 
                                $email = $_SESSION['get_data']['email']; 
                                $query = "SELECT * FROM reserve WHERE email='$email' AND status='PENDING'";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                            ?>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputBooking" class="form-label">Booking for:</label>
                                    <input type="text" class="form-control" name="book" value="<?php echo $row['booking'] ?>" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputDate" class="form-label">Date</label>
                                    <input type="text" class="form-control" name="date" value="<?php echo $row['date'] ?>" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputTime" class="form-label">Time</label>
                                    <input type="text" class="form-control" name="time" value="<?php echo $row['time'] ?>" readonly>
                                </div>
                            </div> 
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="inputPurpose" class="form-label">Purpose/Activity:</label>
                                    <input type="text" class="form-control" name="purpose" value="<?php echo $row['purpose'] ?>" readonly>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col">
                                    <label for="inputParticipants" class="form-label">Expected Number of Participants:</label>
                                    <input type="text" class="form-control" name="participants" value="<?php echo $row['participants'] ?>" readonly>
                                </div>
                            </div> 
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <label for="inputRequested" class="form-label">Requested by:</label>
                                    <input type="text" class="form-control" name="requested" value="<?php echo $row['name'] ?>" readonly>
                                </div>
                            </div> 
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputDepartment" class="form-label">Department/Unit/Course:</label>
                                    <input type="text" class="form-control" name="dept_course" value="<?php echo $row['dept_course'] ?>" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputDate" class="form-label">Date</label>
                                    <input type="text" class="form-control" name="date" value="<?php echo $row['date'] ?>" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputTime" class="form-label">Time</label>
                                    <input type="text" class="form-control" name="time" value="<?php echo $row['time'] ?>" readonly>
                                </div>
                            </div> 
                    </div>
                </div>
                <div class="col">
                    <div class="card card_custom">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputStatus" class="form-label">Action Status:</label>
                                    <input type="text" class="form-control" name="stat" value="<?php echo $row['status'] ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">Please wait for Head Officials Approval</label>
                                    <a type="button" href="" data-bs-toggle="modal" data-bs-target="#status<?php echo $row['id'] ?>">View Status</a>
                                           
                                  <!-- Modal -->
                                  <div class="modal fade" id="status<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Request for Approval</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                      
                                        <div class="modal-body">
                                          <h5>Office of Student Affairs</h5>
                                          <?php 
                                            if ($row['stat_osa'] == 'N/A'){
                                              echo '<input style="color:rgb(185, 187, 48)" type="text" class="form-control" value="PENDING" readonly>';
                                            }elseif($row['stat_osa'] == 'APPROVED'){
                                              echo '<input style="color:rgb(5, 171, 14)" type="text" class="form-control" value="APPROVED" readonly>';
                                            }else{
                                              echo '<input style="color:rgb(176, 0, 0)" type="text" class="form-control" value="APPROVED" readonly>';
                                            }
                                          
                                          ?>
                                         
                                          <h5><?php echo $row['name'] ?></h5>
                                          <p><?php echo $row['department'] ?></p>
                                          <input style="color:rgb(185, 187, 48)" type="text" class="form-control" value="PENDING" readonly>

                                          <h5><?php echo $row['name'] ?></h5>
                                          <p><?php echo $row['department'] ?></p>
                                          <input style="color:rgb(185, 187, 48)" type="text" class="form-control" value="PENDING" readonly>
                                        </div>
                                   
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputDate" class="form-label">RESCHEDULE Date:</label>
                                    <input type="date" class="form-control" id="inputDate" readonly>
                                </div>
                            </div> 
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="inputReason" class="form-label">Reason:</label>
                                    <input type="text" class="form-control" id="inputReason" readonly>
                                </div>
                            </div> 
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputAction" class="form-label">Action by:</label>
                                    <input type="text" class="form-control" id="inputAction" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputDate" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="inputDate" name="date" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputTime" class="form-label">Time</label>
                                    <input type="time" class="form-control" id="inputTime" name="time" readonly>
                                </div>
                            </div>
                            <br>
                            <button type="button" class="btn btn-danger" name="" data-bs-toggle="modal" data-bs-target="#cancel">Cancel Request</button>
                            <a class="btn btn-secondary" href="home.php">Back</a>
                            <?php
                                }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 

        <!-- Modal -->
        <div class="modal fade" id="cancel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cancel Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
              </div>
              <div class="modal-body text-center">
                <h4>Are you sure to cancel your request?</h4>
                <p><i class='bx bxs-message-alt-error bx-flashing' style="color:red"></i> This action is irreversible!</p>
              </div>
              <div class="modal-footer">
                <form action="functions.php" method="POST">
                  <input type="hidden" value="<?php echo $_SESSION['get_data']['email']; ?>" name="check_email">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger" name="cancel_reserve">Yes, Cancel it now</button>
                </form>
              </div>
            </div>
          </div>
        </div>
   

  
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>