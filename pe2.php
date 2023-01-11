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
            <h2>Request Form - Type 2</h2>
        </div>
        <br>
        <div class="container marg-top d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
        <?php 
        $set_studentid = $_SESSION['get_data']['id_no'];
        $set_data1 = $_SESSION['get_data']['firstname'];
        $set_data2 = $_SESSION['get_data']['middlename'];
        $set_data3 = $_SESSION['get_data']['lastname'];
        $set_data4 = $_SESSION['get_data']['course'];
        $set_data5 = $_SESSION['get_data']['department'];
        $set_data6 = $_SESSION['get_data']['gender'];
        $set_data7 = $_SESSION['get_data']['email'];
        $set_data8 = $_SESSION['get_data']['image'];
        $set_data9 = $_SESSION['get_data']['id_no'];
        $date_today = date("d/m/Y");
        
        if ($_SESSION['get_data']['users'] == 'Student'){
        ?>
        <div class="row">
            <div class="col-md-4">
                <br>
                <div class="card card_custom">
                    <div class="text-center">
                        <h4 class="mb-4">Type-2</h4>
                        <img src="assets/images/uniform_jogging.png" width="200" alt="">
                    </div>
                    <br>
                    <div class="text-center">
                        <p>P.E Uniform with joggingpants</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
            <br>
            <div class="card card_custom">
                <form class="" action="functions.php" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="inputFirst" class="form-label">Student I.D</label>
                            <input type="text" class="form-control" id="inputFirst" name="studentid" value="<?php  echo $set_studentid ?>" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="inputFirst" class="form-label">First name</label>
                            <input type="text" class="form-control" id="inputFirst" name="firstname" value="<?php  echo $set_data1 ?> " readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="inputMiddle" class="form-label">Middle name</label>
                            <input type="text" class="form-control" id="inputMiddle" name="middlename" value="<?php  echo $set_data2 ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="inputLast" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="inputLast" name="lastname" value="<?php  echo $set_data3 ?>" readonly>
                        </div>
                    </div>  
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputCourse" class="form-label">Course</label>
                            <input type="text" class="form-control" id="inputCourse" name="course" value="<?php  echo $set_data4 ?>" readonly>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <label for="inputGender" class="form-label">Gender</label>
                            <input type="text" class="form-control" id="inputGender" name="gender" value="<?php  echo $set_data6 ?>" readonly>
                        </div>
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="inputPeTeach" class="form-label">P.E Teacher <span style="color:red;">* </span></label>
                            <select name="teacher" class="form-select" id="" required>

                                <option value="" selected disabled>Select P.E Teacher</option>
                                <?php 
                                    $query = "SELECT * FROM peteachers";
                                    $result = mysqli_query($conn, $query);
                                    $check_row = mysqli_num_rows($result);
                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row['name'] ?>"><?php echo $row["name"] ?></option>
                                
                                <?php } ?>
                    
                            
                            </select>
                          
                        </div>
                        <div class="col-md-4">
                            <label for="tshirt" class="form-label">Size of T-Shirt <span style="color:red;">* </span></label>
                            <select name="tshirt" class="form-select" id="" required>
                                <option value="" selected disabled>Select Size</option>
                                <option value="extra small">XS</option>
                                <option value="small">S</option>
                                <option value="medium">M</option>
                                <option value="large">L</option>
                                <option value="extra large">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="joggingpants" class="form-label">Size of Joggingpants <span style="color:red;">* </span></label>
                            <select name="joggingpants" class="form-select" id="" required>
                                <option value="" selected disabled>Select Size</option>
                                <option value="extra small">XS</option>
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
                        <input type="hidden" name="date" value="<?php  echo $date_today ?>">
                        <input type="hidden" name="email" value="<?php  echo $set_data7 ?>">
                        <input type="hidden" name="image" value="<?php  echo $set_data8 ?>">
                        <input type="hidden" name="note" value="N/A">
                        <input type="hidden" name="status" value="PENDING">
                        <input type="hidden" name="department" value="N/A">
                        <input type="hidden" name="sizes" value="N/A">
                        <input type="hidden" name="id_no" value="<?php  echo $set_data9 ?>">
                        <a class="btn btn-secondary" href="pickuniform.php">Back</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#studentpe2<?php echo $set_studentid ?>" >Request</button>
                    </div>


                    </div>
                </div>
                    </div>
                        </div>  

                    <!-- Modal -->
                    <div class="modal fade" id="studentpe2<?php echo $set_studentid ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Inquire Uniform Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h4>Are you sure to submit now your inquiry?</h4>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="date" value="<?php  echo $date_today ?>">
                                <input type="hidden" name="email" value="<?php  echo $set_data7 ?>">
                                <input type="hidden" name="image" value="<?php  echo $set_data8 ?>">
                                <input type="hidden" name="note" value="N/A">
                                <input type="hidden" name="status" value="PENDING">
                                <input type="hidden" name="department" value="N/A">
                                <input type="hidden" name="sizes" value="N/A">
                                <input type="hidden" name="id_no" value="<?php  echo $set_data9 ?>">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger" name="request_student_2">Yes</button>
                            </div>
                            </div>
                        </div>
                    </div>

                </form>

            <?php } 
            
            else {?>
                <div class="row">
            <div class="col-md-4">
                <br>
                <div class="card card_custom">
                    <div class="text-center">
                        <h4 class="mb-4">Type-2</h4>
                        <img src="assets/images/uniform_short.png" width="200" alt="">
                    </div>
                    <br>
                    <div class="text-center">
                        <p>P.E Uniform with shorts</p>
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
                            <input type="text" class="form-control" id="inputFirst" name="firstname" value=" <?php  echo $set_data1 ?> " readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="inputMiddle" class="form-label">Middle name</label>
                            <input type="text" class="form-control" id="inputMiddle" name="middlename" value="<?php  echo $set_data2 ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="inputLast" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="inputLast" name="lastname" value="<?php  echo $set_data3 ?>" readonly>
                        </div>
                    </div>  
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputDepartment" class="form-label">Department</label>
                            <input type="text" class="form-control" id="inputDepartment" name="department" value="<?php  echo $set_data5 ?>" readonly>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <label for="inputGender" class="form-label">Gender</label>
                            <input type="text" class="form-control" id="inputGender" name="gender" value="<?php  echo $set_data6 ?>" readonly>
                        </div>
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="inputPeTeach" class="form-label">P.E Teacher <span style="color:red;">* </span></label>
                            <select name="teacher" class="form-select" id="" required>
                                <option value="" selected disabled>Select P.E Teacher</option>
                                <?php 
                                    $query = "SELECT * FROM peteachers";
                                    $result = mysqli_query($conn, $query);
                                    $check_row = mysqli_num_rows($result);
                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row['name'] ?>"><?php echo $row["name"] ?></option>
                                
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="tshirt" class="form-label">Size of T-Shirt <span style="color:red;">* </span></label>
                            <select name="tshirt" class="form-select" id="" required>
                                <option value="" selected disabled>Select Size</option>
                                <option value="extra small">XS</option>
                                <option value="small">S</option>
                                <option value="medium">M</option>
                                <option value="large">L</option>
                                <option value="extra large">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="joggingpants" class="form-label">Size of Joggingpants <span style="color:red;">* </span></label>
                            <select name="joggingpants" class="form-select" id="" required>
                                <option value="" selected disabled>Select Size</option>
                                <option value="extra small">XS</option>
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
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#teacherpe2<?php echo $set_studentid ?>">Request</button>
                    </div>

                    </div>
                </div>
                    </div>
                        </div> 

                    <!-- Modal -->
                    <div class="modal fade" id="teacherpe2<?php echo $set_studentid ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Inquire Uniform Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h4>Are you sure to submit now your inquiry?</h4>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="date" value="<?php  echo $date_today ?>">
                                <input type="hidden" name="email" value="<?php  echo $set_data7 ?>">
                                <input type="hidden" name="image" value="<?php  echo $set_data8 ?>">
                                <input type="hidden" name="note" value="N/A">
                                <input type="hidden" name="status" value="PENDING">
                                <input type="hidden" name="course" value="N/A">
                                <input type="hidden" name="sizes" value="N/A">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger" name="request_teacher_2">Yes</button>
                            </div>
                            </div>
                        </div>
                    </div>

                </form>
                <?php } ?>
   
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