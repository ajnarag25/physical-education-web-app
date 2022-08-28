<?php 
  include('connection.php');
  session_start();

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

      <div class="jumbotron">
        <div class="text-center">
            <h2>Register Account</h2>
        </div>
        <br>
        <div class="card card_custom container"  data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
            <div class="d-flex flex-row-reverse bd-highlight">
                <a href="register_teacher.php" style="text-decoration: none; color:rgb(151, 8, 8);">Register as Teacher <i class='bx bx-right-arrow-alt'></i> </a>
            </div>
            <form class="" action="functions.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <label for="inputFirst" class="form-label">First name</label>
                        <input type="text" class="form-control" id="inputFirst" name="firstname" required>
                    </div>
                    <div class="col-md-4">
                        <label for="inputMiddle" class="form-label">Middle name</label>
                        <input type="text" class="form-control" id="inputMiddle" name="middlename" required>
                    </div>
                    <div class="col-md-4">
                        <label for="inputLast" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="inputLast" name="lastname" required>
                    </div>
                </div> 
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="text" class="form-control" id="inputEmail" name="email" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputContact" class="form-label">Contact No.</label>
                        <input type="text" class="form-control" id="inputContact" name="contact" required>
                    </div>
                </div> 
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="inputCourse" class="form-label">Course</label>
                        <select name="course" class="form-select" id="">
                            <option value="" selected disabled>Select Course</option>
                            <option value="BSCE">BSCE - Bachelor of Science in Civil Engineering</option>
                            <option value="BSEE">BSEE - Bachelor of Science in Electrical Engineering</option>
                            <option value="BSME">BSME - Bachelor of Science in Mechanical Engineering</option>
                            <option value="BGT-AT">BGT-AT - Architecture Technology </option>
                            <option value="BET-ET">BET-ET - Electrical Technology</option>
                            <option value="BET-ESET">BET-ESET - Industrial Automation Technology</option>
                            <option value="BET-COET">BET-COET - Computer Engineering Technology</option>
                            <option value="BET-CT-1">BET-CT - Contruction Technology</option>
                            <option value="BET-CT-2">BET-CT - Civil Technology</option>
                            <option value="BET-MT">BET-MT - Mechanical Technology</option>
                            <option value="BET-AT">BET-AT - Automotive Technology</option>
                            <option value="BET-PPT">BET-PPT - Power Plant Technology</option>
                            <option value="BSIE-HE">BSIE-HE - Home Economics</option>
                            <option value="BSIE-IA">BSIE-IA - Industrial Arts</option>
                            <option value="BSIE-ICT">BSIE-ICT - Information and Communication Technology</option>
                            <option value="BTTE-CP">BTTE-CP - Computer Programming</option>
                            <option value="BTTE-E">BTTE-E - Electrical</option>
                        </select>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <label for="inputImage" class="form-label">Upload image for your profile pic</label>
                        <input class="form-control" name="profile_pic" type="file" accept="image/png, image/jpeg" onchange="preview()" required>
                    </div>
                </div> 
                <br>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img id="frame_1" src="#" width="100px" height="100px"/>
                        <img id="frame_2" src="#" width="100px" height="100px"/>
                        <br><br>
                        <button type="button" class="btn btn-danger">Scan your ID QR code</button>
                    </div>
                    <div class="col-md-4">
                        <label for="inputPass1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPass1" name="password1" required>
                        <br>
                        <label for="inputPass2" class="form-label">Retype Password</label>
                        <input type="password" class="form-control" id="inputPass2" name="password2" required>
                    </div>
                    <div class="col-md-4">
                        <p>NOTE:</p>
                        <ul>
                            <li>Your password can't be too similar to your other personal information.</li>
                            <li>Your password must conatain at least 8 characters.</li>
                            <li>Your password can't be a commonly used password.</li>
                            <li>Your password can't be entirely numeric.</li>
                        </ul>
                    </div>
                </div> 
                <br>
                <div class="text-center">
                    <a class="btn btn-secondary" href="index.php">Back</a>
                    <input type="hidden" name="user_student" value="Student">
                    <button type="submit" class="btn btn-danger" name="register_student">Register</button>
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