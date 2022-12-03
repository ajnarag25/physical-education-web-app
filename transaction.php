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
            <h2>Transactions</h2>
        </div>
        <br>
        <div class="container">
            <div class="row" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="assets/images/sample_uniform.jpg" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">Inquire Uniform</h5>
                            <p class="text-muted mb-1">Pending Transaction</p>
                            <?php 
                                $account = $_SESSION['get_data']['email'];
                                $query = "SELECT * FROM inquire WHERE email='$account' and status='PENDING'";
                                $result = mysqli_query($conn, $query);
                                $inquire = mysqli_num_rows($result);
                            ?>
                            <p><?php echo $inquire ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="assets/images/sample_facility.jpg" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">Reservation of Facilites</h5>
                            <p class="text-muted mb-1">Pending Transaction</p>
                            <?php 
                                $account = $_SESSION['get_data']['email'];
                                $query = "SELECT * FROM reserve WHERE email='$account' and status='PENDING'";
                                $result = mysqli_query($conn, $query);
                                $reserve = mysqli_num_rows($result);
                            ?>
                            <p><?php echo $reserve ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="assets/images/sample_equipment.jpg" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">Borrowed Equipments</h5>
                            <p class="text-muted mb-1">Pending Transaction</p>
                            <?php 
                                $account = $_SESSION['get_data']['id_no'];
                                $query = "SELECT * FROM borrowing_machine_info WHERE id_no='$account' and status='PENDING'";
                                $result = mysqli_query($conn, $query);
                                $borrow = mysqli_num_rows($result);
                            ?>
                            <p><?php echo $borrow ?></p>
                        </div>
                    </div>
                </div>
                
            </div>
            <br>
            <h4>Inquire Uniform - History</h4>
            <?php 
                $account = $_SESSION['get_data']['email'];
                $query = "SELECT * FROM inquire WHERE email='$account'";
                $result = mysqli_query($conn, $query);
                $check_row = mysqli_num_rows($result);
                while ($row = mysqli_fetch_array($result)) {
            ?>

            <a class="text-danger" href="" style="font-size:15px;" data-bs-toggle="modal" data-bs-target="#clearAllInquire<?php echo $row['id'] ?>">Clear All</a>
            <!-- Modal -->
            <div class="modal fade" id="clearAllInquire<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Clear All Inquire Uniform History</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h4>Are you sure to clear all your Inquire Uniform History?</h4>
                        <p><i class='bx bxs-message-alt-error bx-flashing' style="color:red"></i> This Action is Irreversible!</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="clear_inquire">Clear All</button>
                    </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Date Submitted</th>
                            <th>Size T-Shirt</th>
                            <th>Size Shorts</th>
                            <th>Size Joggingpants</th>
                            <th>Teacher</th>
                            <th>Payment Schedule</th>
                            <th>Pickup Schedule</th>
                            <th>Status</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        $account = $_SESSION['get_data']['email'];
                        $query = "SELECT * FROM inquire WHERE email='$account'";
                        $result = mysqli_query($conn, $query);
                        $check_row = mysqli_num_rows($result);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>

                    <tr>
                        <td><?php echo $row['date'] ?></td>
                        <td><?php echo $row['size_t'] ?></td>
                        <td><?php echo $row['size_s'] ?></td>
                        <td><?php echo $row['size_j'] ?></td>
                        <td><?php echo $row['teacher'] ?></td>
                        <td><?php echo $row['sched_pay'] ?></td>
                        <td><?php echo $row['sched_pickup'] ?></td>
                        <td>
                            <?php 
                                if($row['status'] == 'PENDING'){
                                    echo'
                                        <span class="text-warning">PENDING</span>
                                    ';
                                }elseif($row['status'] == 'UNPAID'){
                                    echo'
                                        <span class="text-warning">UNPAID</span>
                                    ';
                                }elseif($row['status'] == 'PAID'){
                                    echo'
                                        <span class="text-primary">PAID</span>
                                    ';
                                }elseif($row['status'] == 'DECLINED'){
                                    echo'
                                        <span class="text-danger">DECLINED</span>
                                    ';
                                }elseif($row['status'] == 'CANCELED'){
                                    echo'
                                        <span class="text-danger">CANCELED</span>
                                    ';
                                }
                                else{
                                    echo'
                                        <span class="text-success">RECEIVED</span>
                                    ';
                                }
                            
                            ?>
                
                        </td>
                        <td><?php echo $row['note'] ?></td>
                    </tr>

                    <?php } ?>

                    </tbody>
                </table>
            </div>
            <br>
            <h4>Reservation of Facility - History</h4>
            <a class="text-danger" style="font-size:15px;" href="">Clear All</a>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Requested Facility</th>
                            <th>Purpose</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>No. of Participants</th>
                            <th>Status</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        $account = $_SESSION['get_data']['email'];
                        $query = "SELECT * FROM reserve WHERE email='$account'";
                        $result = mysqli_query($conn, $query);
                        $check_row = mysqli_num_rows($result);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>

                    <tr>
                        <td><?php echo $row['booking'] ?></td>
                        <td><?php echo $row['purpose'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><?php echo $row['time'] ?></td>
                        <td><?php echo $row['participants'] ?></td>
                        <td>
                            <?php 
                                if($row['status'] == 'PENDING'){
                                    echo'
                                        <span class="text-warning">PENDING</span>
                                    ';
                                }elseif($row['status'] == 'UNPAID'){
                                    echo'
                                        <span class="text-warning">UNPAID</span>
                                    ';
                                }elseif($row['status'] == 'PAID'){
                                    echo'
                                        <span class="text-primary">PAID</span>
                                    ';
                                }elseif($row['status'] == 'DECLINED'){
                                    echo'
                                        <span class="text-danger">DECLINED</span>
                                    ';
                                }elseif($row['status'] == 'CANCELED'){
                                    echo'
                                        <span class="text-danger">CANCELED</span>
                                    ';
                                }
                                else{
                                    echo'
                                        <span class="text-success">RECEIVED</span>
                                    ';
                                }
                            
                            ?>
                
                        </td>
                        <td><?php echo $row['reason'] ?></td>
                    </tr>

                    <?php } ?>

                    </tbody>
                </table>
            </div>
            <br>
            <h4>Borrowed Equipment - History</h4>
            <a class="text-danger" style="font-size:15px;" href="">Clear All</a>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Date Submitted</th>
                            <th>Size T-Shirt</th>
                            <th>Size Shorts</th>
                            <th>Size Joggingpants</th>
                            <th>Teacher</th>
                            <th>Payment Schedule</th>
                            <th>Pickup Schedule</th>
                            <th>Status</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        $account = $_SESSION['get_data']['id_no'];
                        $query = "SELECT * FROM borrowing_machine_info WHERE id_no='$account'";
                        $result = mysqli_query($conn, $query);
                        $check_row = mysqli_num_rows($result);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>

                    <tr>
                        <td><?php echo $row['date'] ?></td>
                        <td><?php echo $row['size_t'] ?></td>
                        <td><?php echo $row['size_s'] ?></td>
                        <td><?php echo $row['size_j'] ?></td>
                        <td><?php echo $row['teacher'] ?></td>
                        <td><?php echo $row['sched_pay'] ?></td>
                        <td><?php echo $row['sched_pickup'] ?></td>
                        <td>
                            <?php 
                                if($row['status'] == 'PENDING'){
                                    echo'
                                        <span class="text-warning">PENDING</span>
                                    ';
                                }elseif($row['status'] == 'UNPAID'){
                                    echo'
                                        <span class="text-warning">UNPAID</span>
                                    ';
                                }elseif($row['status'] == 'PAID'){
                                    echo'
                                        <span class="text-primary">PAID</span>
                                    ';
                                }elseif($row['status'] == 'DECLINED'){
                                    echo'
                                        <span class="text-danger">DECLINED</span>
                                    ';
                                }elseif($row['status'] == 'CANCELED'){
                                    echo'
                                        <span class="text-danger">CANCELED</span>
                                    ';
                                }
                                else{
                                    echo'
                                        <span class="text-success">RECEIVED</span>
                                    ';
                                }
                            
                            ?>
                
                        </td>
                        <td><?php echo $row['note'] ?></td>
                    </tr>

                    <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    


        

  
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="js/scripts.js"></script>

</body>
</html>