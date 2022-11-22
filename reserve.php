<?php 
  include('connection.php');
  session_start();
  error_reporting(0);
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
            <h2>Facilities Booking / Schedule Form</h2>
        </div>
        <br>
        <div class="container marg-top d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
            <div class="row">
                <div class="col">
                    <div class="card card_custom">
                        <form class="" action="functions.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputBooking" class="form-label">Booking for: <span style="color:red;">* </span></label>
                                    <select name="book" class="form-select" id="" required>
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="AVR & GYM">AVR * GYM</option>
                                        <option value="ConferenceRoom">Conference Room</option>
                                        <option value="Amphitheater">Amphitheater</option>
                                        <option value="Hostel">Hostel</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputDate" class="form-label">Date <span style="color:red;">* </span></label>
                                    <input type="date" class="form-control" id="inputDate" name="date" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputTime" class="form-label">Time <span style="color:red;">* </span></label>
                                    <input type="time" class="form-control" id="inputTime" name="time" required>
                                </div>
                            </div> 
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="inputPurpose" class="form-label">Purpose/Activity: <span style="color:red;">* </span></label>
                                    <input type="text" class="form-control" id="inputPurpose" name="purpose" required>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col">
                                    <label for="inputParticipants" class="form-label">Expected Number of Participants: <span style="color:red;">* </span></label>
                                    <input type="number" class="form-control" id="inputParticipants" name="participants" required>
                                </div>
                            </div> 
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <label for="inputRequested" class="form-label">Requested by:</label>
                                    <input type="text" class="form-control" id="inputRequested" readonly>
                                </div>
                            </div> 
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputDepartment" class="form-label">Department/Unit/Course:</label>
                                    <input type="text" class="form-control" id="inputRequested" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputDate" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="inputDate" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputTime" class="form-label">Time</label>
                                    <input type="time" class="form-control" id="inputTime" readonly>
                                </div>
                            </div> 
                    </div>
                </div>
                <div class="col">
                    <div class="card card_custom">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputStatus" class="form-label">Action Status:</label>
                                    <input type="text" class="form-control" id="inputStatus" placeholder="NONE" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">Please wait for Head Officials Approval</label>
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
                                    <input type="date" class="form-control" id="inputDate" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputTime" class="form-label">Time</label>
                                    <input type="time" class="form-control" id="inputTime" readonly>
                                </div>
                            </div>
                            <br>
                            <div class="text-center">
                                <input type="hidden" name="names" value="<?php echo $_SESSION['get_data']['firstname'].' '.$_SESSION['get_data']['middlename'].' '.$_SESSION['get_data']['lastname'];?>">
                                <?php 
                                if ($_SESSION['get_data']['users'] == 'Student'){
                                    $set_dept_course_1 = $_SESSION['get_data']['course'];
                                    echo'
                                    <input type="hidden" name="dept_course" value="'.$set_dept_course_1.'">
                                    '?>
                                <?php
                                }
                                else{
                                    $set_dept_course_2 = $_SESSION['get_data']['department'];
                                    echo'
                                    <input type="hidden" name="dept_course" value="'.$set_dept_course_2.'">
                                    '?>
                                <?php
                                }?>
                                <input type="hidden" name="id_no" value="<?php echo $_SESSION['get_data']['id_no'];?>">
                                <input type="hidden" name="email" value="<?php echo $_SESSION['get_data']['email'];?>">
                                <input type="hidden" name="stats" value="PENDING">
                                <input type="hidden" name="reason" value="N/A">
                                <input type="hidden" name="resched" value="N/A">
                                <a class="btn btn-secondary" href="home.php">Back</a>
                                <button type="submit" class="btn btn-danger" name="reserve_facility">Submit</button>
                            </div>

                        </form>
                        </div>
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