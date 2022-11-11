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
    <title>P.E Department - Account</title>
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
            <h2>Account</h2>
        </div>
        <br>

        <div class="container">
            <div class="row">
            <div class="col-lg-4" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <?php 
                            $account = $_SESSION['get_data']['email'];
                            $query = "SELECT * FROM registration WHERE email='$account' ";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                        ?>

                        <img src="<?php echo $row['image'] ?>" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3"><?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h5>
                        <p class="text-muted mb-1"><?php echo $row['users'] ?></p>
                        
                        <br>
                        <label for="">Change Profile Picture:</label>
                        <form action="functions.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="pic" class="form-control my-3" required>
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <button type="submit" class="btn btn-primary w-100" name="update_pic">Update Profile Picture</button>
                        </form>

                        <?php } ?>

                    </div>
                </div>
               
            </div>
            <div class="col-lg-8">
                <form action="functions.php" method="POST">
                    <div class="card mb-4" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
                        <div class="card-body">
                            <h4 class="text-center">Profile Information:</h4>
                            <br>
                            <?php 
                                $account = $_SESSION['get_data']['email'];
                                $query = "SELECT * FROM registration WHERE email='$account' ";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Firstname</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="fname" value="<?php echo $row['firstname'] ?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Middlename</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="mname" value="<?php echo $row['middlename'] ?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Lastname</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="lname" value="<?php echo $row['lastname'] ?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Contact</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="contact" value="<?php echo $row['contact'] ?>" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#changeprofile">Update Profile Information</button>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="changeprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Profile Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h4>Are you sure to update your Profile Information?</h4>
                                <p><i class='bx bxs-message-alt-error bx-flashing' style="color:red"></i> You will be automatically logout!</p>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="update_profile">Update Profile</button>
                            </div>
                            </div>
                        </div>
                    </div>

                    <br>

                </form>
                <form action="functions.php" method="POST">

                    <div class="card mb-4" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
                        <div class="card-body">
                            <h4 class="text-center">Change Password:</h4>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">New Password</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password1" placeholder="Enter New Password" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Retype Password</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password2" placeholder="Retype Password" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#changepass">Change Password</button>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="changepass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h4>Are you sure to update your password?</h4>
                                <p><i class='bx bxs-message-alt-error bx-flashing' style="color:red"></i> You will be automatically logout!</p>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="update_password">Yes</button>
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
    


        

  
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="js/scripts.js"></script>

</body>
</html>