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
    <title>P.E Department - Inquire Uniform</title>
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
                <h4 class="title_profile">Welcome,  <?php echo $_SESSION['get_data']['firstname']; ?> 
        
                 <a href="functions.php?logout" type="submit" class="btn btn-danger side" >Logout</a>
                </h4>
            </div>
          </div>
        </div>
      </nav>

      <div class="jumbotron">
        <div class="text-center">
            <h2>Request Form - PE 2</h2>
        </div>
        <br>
        <div class="container marg-top d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
        <?php 
        $set_data1 = $_SESSION['get_data']['firstname'];
        $set_data2 = $_SESSION['get_data']['middlename'];
        $set_data3 = $_SESSION['get_data']['lastname'];
        $set_data4 = $_SESSION['get_data']['course'];
        $set_data5 = $_SESSION['get_data']['department'];
        $set_data6 = $_SESSION['get_data']['gender'];
        $set_data7 = $_SESSION['get_data']['email'];
        $set_data8 = $_SESSION['get_data']['image'];
        
        if ($_SESSION['get_data']['users'] == 'Student'){
        
        echo '
        <div class="row">
            <div class="col-md-4">
                <br>
                <div class="card card_custom">
                    <div class="text-center">
                        <h4 class="mb-4">PE-2</h4>
                        <img src="assets/images/sample.jpg" width="200" alt="">
                    </div>
                    <br>
                    <div class="text-center">
                        <p>P.E Uniform with Jogginpants</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
            <br>
            <div class="card card_custom">
                <form class="" action="functions.php" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="inputFirst" class="form-label">First name</label>
                            <input type="text" class="form-control" id="inputFirst" name="firstname" value=" '.$set_data1.' " readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="inputMiddle" class="form-label">Middle name</label>
                            <input type="text" class="form-control" id="inputMiddle" name="middlename" value="'.$set_data2.'" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="inputLast" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="inputLast" name="lastname" value="'.$set_data3.'" readonly>
                        </div>
                    </div>  
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputCourse" class="form-label">Course</label>
                            <input type="text" class="form-control" id="inputCourse" name="course" value="'.$set_data4.'" readonly>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <label for="inputGender" class="form-label">Gender</label>
                            <input type="text" class="form-control" id="inputGender" name="gender" value="'.$set_data6.'" readonly>
                        </div>
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="inputPeTeach" class="form-label">P.E Teacher <span style="color:red;">* </span></label>
                            <select name="teacher" class="form-select" id="" required>
                                <option value="" selected disabled>Select P.E Teacher</option>
                                <option value="Janlee">Mr. Janlee</option>
                                <option value="Eiman">Mr. Eiman</option>
                                <option value="Mica">Ms. Mica</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="tshirt" class="form-label">Size of T-Shirt <span style="color:red;">* </span></label>
                            <select name="tshirt" class="form-select" id="" required>
                                <option value="" selected disabled>Select Size</option>
                                <option value="small">S</option>
                                <option value="medium">M</option>
                                <option value="large">L</option>
                                <option value="extralarge">XL</option>
                                <option value="2extralarge">XXL</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="joggingpants" class="form-label">Size of Joggingpants <span style="color:red;">* </span></label>
                            <select name="joggingpants" class="form-select" id="" required>
                                <option value="" selected disabled>Select Size</option>
                                <option value="small">S</option>
                                <option value="medium">M</option>
                                <option value="large">L</option>
                                <option value="extralarge">XL</option>
                                <option value="2extralarge">XXL</option>
                            </select>
                        </div>
                    </div> 
                    <br>
                    <div class="text-center">
                        <a class="btn btn-secondary" href="pickuniform.php">Back</a>
                        <button type="submit" class="btn btn-danger" name="request_student_2">Request</button>
                    </div>


                </form>
             '?>
             <?php } 
             else{
                echo '
                <div class="row">
            <div class="col-md-4">
                <br>
                <div class="card card_custom">
                    <div class="text-center">
                        <h4 class="mb-4">PE-2</h4>
                        <img src="assets/images/sample.jpg" width="200" alt="">
                    </div>
                    <br>
                    <div class="text-center">
                        <p>P.E Uniform with Joggingpants</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
            <br>
            <div class="card card_custom">
                <form class="" action="functions.php" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="inputFirst" class="form-label">First name</label>
                            <input type="text" class="form-control" id="inputFirst" name="firstname" value=" '.$set_data1.' " readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="inputMiddle" class="form-label">Middle name</label>
                            <input type="text" class="form-control" id="inputMiddle" name="middlename" value="'.$set_data2.'" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="inputLast" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="inputLast" name="lastname" value="'.$set_data3.'" readonly>
                        </div>
                    </div>  
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputDepartment" class="form-label">Department</label>
                            <input type="text" class="form-control" id="inputDepartment" name="department" value="'.$set_data5.'" readonly>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <label for="inputGender" class="form-label">Gender</label>
                            <input type="text" class="form-control" id="inputGender" name="gender" value="'.$set_data6.'" readonly>
                        </div>
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="inputPeTeach" class="form-label">P.E Teacher <span style="color:red;">* </span></label>
                            <select name="teacher" class="form-select" id="" required>
                                <option value="" selected disabled>Select P.E Teacher</option>
                                <option value="Janlee">Mr. Janlee</option>
                                <option value="Eiman">Mr. Eiman</option>
                                <option value="Mica">Ms. Mica</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="tshirt" class="form-label">Size of T-Shirt <span style="color:red;">* </span></label>
                            <select name="tshirt" class="form-select" id="" required>
                                <option value="" selected disabled>Select Size</option>
                                <option value="small">S</option>
                                <option value="medium">M</option>
                                <option value="large">L</option>
                                <option value="extralarge">XL</option>
                                <option value="2extralarge">XXL</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="joggingpants" class="form-label">Size of Joggingpants <span style="color:red;">* </span></label>
                            <select name="joggingpants" class="form-select" id="" required>
                                <option value="" selected disabled>Select Size</option>
                                <option value="small">S</option>
                                <option value="medium">M</option>
                                <option value="large">L</option>
                                <option value="extralarge">XL</option>
                                <option value="2extralarge">XXL</option>
                            </select>
                        </div>
                    </div> 
                    <br>
                    <div class="text-center">
                        <a class="btn btn-secondary" href="pickuniform.php">Back</a>
                        <button type="submit" class="btn btn-danger" name="request_teacher_2">Request</button>
                    </div>


                </form>
                
            '?>
            <?php }
             
             
            ?>
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