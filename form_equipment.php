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
        <div class="text-center">
            <h2>Borrow Equipment - Form</h2>
        </div>
        <br>
        <div class="container marg-top d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
            <div class="card card_custom">
                <div class="text-center">
                    <p>Please fill-up the necessary information needed, we will validate the items that you borrow.</p>
                </div>
                <form method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputName" class="form-label">Name:</label>
                            <input type="text" name="names" class="form-control" value="<?php echo $_SESSION['get_data']['firstname']; ?> <?php echo $_SESSION['get_data']['middlename']; ?> <?php echo $_SESSION['get_data']['lastname']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">Email:</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $_SESSION['get_data']['email']; ?>" readonly>
                        </div>
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputDepartment" class="form-label">Department/Unit/Course:</label>
                            <?php 
                            if ($_SESSION['get_data']['users'] == 'Student'){
                                $course = $_SESSION['get_data']['course'];
                                echo '<input type="text" class="form-control" id="inputDeptcourse" name="dept_course" value='.$course.' readonly>'
                            ?>
                            <?php }
                            else{
                                $dept = $_SESSION['get_data']['department'];
                                echo '<input type="text" class="form-control" id="inputDeptcourse" name="dept_course" value='.$dept.' readonly>'
                                ?>
                            <?php
                            }
                            ?>
                            
                        </div>
                        <div class="col-md-6">
                            <label for="inputContact" class="form-label">Contact:</label>
                            <input type="text" class="form-control" id="inputRequested" name="dept_course" value="<?php echo $_SESSION['get_data']['contact']; ?>" readonly>
                        </div>
                    </div> 

                    <br>
            

                    <div class="row">
                        <div class="col-md-6">
                            <label for="items">Select an item <span style="color:red;">* </span></label>
                            <select name="items" id="b7" class="form-select" required>
                                <option selected disabled>Select Item</option>
                                <option value="Basketball">Basketball</option>
                                <option value="volleyball">Volleyball</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="quantity">Quantity <span style="color:red;">* </span></label>
                            <input type="number" id="b8" name="quantity" class="form-control" value="1" min="0" max="20">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label for="d-borrow">Date of Borrow <span style="color:red;">* </span></label>
                            <input name="dateofborrow" id="b9" type="date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="d-borrow">Time of Borrow <span style="color:red;">* </span></label>
                            <input name="timeofborrow" id="b10" type="time" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="d-return">Date of Return <span style="color:red;">* </span></label>
                            <input name="dateofreturn" id="b11" type="date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="d-return">Time of Return <span style="color:red;">* </span></label>
                            <input name="timeofreturn" id="b12" type="time" class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group text-center">
                        <label>* Reminder please check all item you will borrow before claiming. All items return with defect will be reimburse *</label>
                        <br>
                        <input type= "checkbox" id="checkbox1" required>
	                    <label for = "checkbox1"> I Agree in terms and condition</label>
                    </div>
                    <br>
                
                    <div class="text-center">
                        <a class="btn btn-secondary" href="pickequipment.php">Back</a>
                        <button type="submit" data-bs-toggle="modal" id="checkBorrow" data-bs-target="#borrow" class="btn btn-danger">Submit</button>
                        <hr>
                    </div>
                </form>
            </div>
        </div>
    </div>
   

  
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>