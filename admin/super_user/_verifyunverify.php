<?php
    include('connection.php');
    session_start();
?>

<!doctype html>
<html class="no-js " lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>P.E Department Superuser Site</title>
<!-- Favicon-->
<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.css" />
<!-- Bootstrap Material Datetime Picker Css -->
<link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
<!-- Bootstrap Tagsinput Css -->
<link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
<!-- Bootstrap Select Css -->
<link href="assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<!-- JQuery DataTable Css -->
<link rel="stylesheet" href="assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/style.min.css">
<link rel="stylesheet" href="assets/plugins/sweetalert/sweetalert.css"/>
</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/tuplogo.png" width="48" height="48" alt="Aero"></div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Right Icon menu Sidebar -->
<div class="navbar-right">
    <ul class="navbar-nav">
        <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li><a href="functions.php?logout" class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
    </ul>
</div>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index.php"><img src="assets/images/tuplogo.png" width="25" alt="Aero"><span class="m-l-10">P.E. Department</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <small>Superuser</small>                        
                </div>
            </li>
            <li><a href="index.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="_createmanage.php"><i class="zmdi zmdi-accounts"></i><span>Create & Manage Accounts</span></a></li>
            <li class="active open"><a href="_verifyunverify.php"><i class="zmdi zmdi-chart-donut"></i><span>Verified & Unverified Accounts</span></a></li> 
            <li><a href="_profile.php"><i class="zmdi zmdi-account-circle"></i><span>My Profile</span></a></li>
            <li><a href="functions.php?logout"><i class="zmdi zmdi-sign-in"></i><span>Logout</span></a></li>
        </ul>
    </div>
</aside>

<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs sm">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Theme Option</h6>
                    <div class="light_dark">
                        <div class="radio">
                            <input type="radio" name="radio1" id="lighttheme" value="light" checked="">
                            <label for="lighttheme">Light Mode</label>
                        </div>
                        <div class="radio mb-0">
                            <input type="radio" name="radio1" id="darktheme" value="dark">
                            <label for="darktheme">Dark Mode</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h6>Color Skins</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple"><div class="purple"></div></li>                   
                        <li data-theme="blue"><div class="blue"></div></li>
                        <li data-theme="cyan"><div class="cyan"></div></li>
                        <li data-theme="green"><div class="green"></div></li>
                        <li data-theme="orange"><div class="orange"></div></li>
                        <li data-theme="blush" class="active"><div class="blush"></div></li>
                    </ul>                    
                </div>
            </div>                
        </div>       
    </div>
</aside>

<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Welcome to P.E. Department Superuser Site</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Verified & Unverified Accounts</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">

        
            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            
                            <h2><strong>Unverified</strong> Accounts - Student</h2>
                        </div>
                        <div class="table-responsive" style="text-align: center;">
                            <table class="table table-hover js-basic-example dataTable table-sm " id="table1">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th>Department</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM registration WHERE status='UNVERIFIED'";
                                        $result = mysqli_query($conn, $query);
                                        $check_row = mysqli_num_rows($result);
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><img src="../../<?php echo $row['image'] ?>" width="50px" alt=""></td>
                                        <td><?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></td>
                                        <td><?php echo $row['course'] ?></td>
                                        <td><?php echo $row['department'] ?></td>
                                        <td>
                                            
                                            <button class="btn btn-success" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Verify Account" data-target="#verify<?php echo $row['id'] ?>"><i class="zmdi zmdi-check"></i>  </button>
                                             <!-- Modal for Verify -->
                                             <div class="modal fade" id="verify<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Verify Account</h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <br>
                                                                        <form action="functions.php" method="POST">
                                                                            <div class="body">
                                                                                <h3>Verifying Account of : <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h3>
                                                                                <p style="text-align:left">Leave a message for this user:</p>
                                                                                <textarea class="form-control" name="msg_verify" id="" cols="30" rows="5" required></textarea>
                                                                                <div class="modal-footer">
                                                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                                    <input type="hidden" name="email" value="<?php echo $row['email'] ?>">
                                                                                    <button type="submit" class="btn btn-success btn-round waves-effect" name="verify_acc">Verify Account</button>
                                                                                    <button type="button" class="btn btn-outline-secondary btn-round waves-effect" data-dismiss="modal">Close</button>
                                                                                </div>        
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <button class="btn btn-danger" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel Verification" data-target="#cancel<?php echo $row['id'] ?>"><i class="zmdi zmdi-close"></i>  </button>
                                             <!-- Modal for Cancel -->
                                             <div class="modal fade" id="cancel<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Cancel Account</h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <br>
                                                                        <form action="functions.php" method="POST">
                                                                            <div class="body">
                                                                                <h3>Cancelling Account of : <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h3>
                                                                                <p style="text-align:left">Leave a message for this user:</p>
                                                                                <textarea class="form-control" name="msg_cancel" id="" cols="30" rows="5" required></textarea>
                                                                                <div class="modal-footer">
                                                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                                    <input type="hidden" name="email" value="<?php echo $row['email'] ?>">
                                                                                    <button type="submit" class="btn btn-danger btn-round waves-effect" name="cancel_acc">Cancel Account</button>
                                                                                    <button type="button" class="btn btn-outline-secondary btn-round waves-effect" data-dismiss="modal">Close</button>
                                                                                </div>        
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                   
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                                        
                    <div class="card">
                        <div class="header">
                            
                            <h2><strong>Unverified</strong> Accounts - Administrator</h2>
                        </div>
                        <div class="table-responsive" style="text-align: center;">
                            <table class="table table-hover js-basic-example dataTable table-sm " id="table1">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM admin WHERE acc_status= 'UNVERIFIED'";
                                        $result = mysqli_query($conn, $query);
                                        $check_row = mysqli_num_rows($result);
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><img src="../<?php echo $row['image'] ?>" width="50px" alt=""></td>
                                        <td><?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td>
                                            
                                            <button class="btn btn-success" data-toggle="modal"  data-bs-toggle="tooltip" data-bs-placement="top" title="Verify Account" data-target="#verify_admin<?php echo $row['id'] ?>"><i class="zmdi zmdi-check"></i>  </button>
                                             <!-- Modal for Delete -->
                                             <div class="modal fade" id="verify_admin<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Verify Account</h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <br>
                                                                        <form action="functions.php" method="POST">
                                                                            <div class="body">
                                                                                <h3>Verifying Account of : <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h3>
                                                                                <p style="text-align:left">Leave a message for this user:</p>
                                                                                <textarea class="form-control" name="msg_verify" id="" cols="30" rows="5" required></textarea>
                                                                                <div class="modal-footer">
                                                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                                    <input type="hidden" name="email" value="<?php echo $row['email'] ?>">
                                                                                    <button type="submit" class="btn btn-outline-success btn-round waves-effect" name="verify_acc_admin">Verify Account</button>
                                                                                    <button type="button" class="btn btn-outline-secondary btn-round waves-effect" data-dismiss="modal">Close</button>
                                                                                </div>        
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <button class="btn btn-danger" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel Verification" data-target="#cancel_admin<?php echo $row['id'] ?>"><i class="zmdi zmdi-close"></i>  </button>
                                             <!-- Modal for Cancel -->
                                             <div class="modal fade" id="cancel_admin<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Cancel Account</h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <br>
                                                                        <form action="functions.php" method="POST">
                                                                            <div class="body">
                                                                                <h3>Cancelling Account of : <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h3>
                                                                                <p style="text-align:left">Leave a message for this user:</p>
                                                                                <textarea class="form-control" name="msg_cancel" id="" cols="30" rows="5" required></textarea>
                                                                                <div class="modal-footer">
                                                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                                    <input type="hidden" name="email" value="<?php echo $row['email'] ?>">
                                                                                    <button type="submit" class="btn btn-danger btn-round waves-effect" name="cancel_acc_admin">Cancel Account</button>
                                                                                    <button type="button" class="btn btn-outline-secondary btn-round waves-effect" data-dismiss="modal">Close</button>
                                                                                </div>        
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                   
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card">
                        <div class="header">
                            
                            <h2><strong>Verified</strong> Accounts - Student</h2>
                        </div>
                        <div class="table-responsive" style="text-align: center;">
                            <table class="table table-hover js-basic-example dataTable table-sm " id="table1">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th>Department</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM registration WHERE status='VERIFIED'";
                                        $result = mysqli_query($conn, $query);
                                        $check_row = mysqli_num_rows($result);
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><img src="../../<?php echo $row['image'] ?>" width="50px" alt=""></td>
                                        <td><?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></td>
                                        <td><?php echo $row['course'] ?></td>
                                        <td><?php echo $row['department'] ?></td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Account Details" data-target="#accdetails<?php echo $row['id'] ?>"><i class="zmdi zmdi-receipt"></i> </button>
                                             <!-- Modal for Account Details -->
                                             <div class="modal fade" id="accdetails<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="largeModalLabel">Account Details</h4>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="card">
                                                                    <form action="functions.php" method="POST">
                                                                        <div class="modal-header">
                                                                            <h6 class="title " style="text-align: center;">Account Details of: <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h6>
                                                                        </div>
                                                                        <br>
                                                                        <div class="body">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <label for="inputFirst" class="form-label">First name</label>
                                                                                    <input type="text" class="form-control" id="inputFirst" onkeyup="lettersOnly(this)" value="<?php echo $row['firstname'] ?>" name="firstname" readonly>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="inputMiddle" class="form-label">Middle name</label>
                                                                                    <input type="text" class="form-control" id="inputMiddle" onkeyup="lettersOnly(this)" value="<?php echo $row['middlename'] ?>" name="middlename" readonly>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="inputLast" class="form-label">Last name</label>
                                                                                    <input type="text" class="form-control" id="inputLast" onkeyup="lettersOnly(this)" value="<?php echo $row['lastname'] ?>" name="lastname" readonly>
                                                                                </div>
                                                                            </div> 
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label for="inputEmail" class="form-label">Email</label>
                                                                                    <input type="text" class="form-control" id="inputEmail" value="<?php echo $row['email'] ?>" name="email" readonly>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="inputContact" class="form-label">Contact No.</label>
                                                                                    <input type="text" class="form-control" id="inputContact" value="<?php echo $row['contact'] ?>" name="contact" readonly>
                                                                                </div>
                                                                            </div> 
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label for="inputImage" class="form-label">Gender</label>
                                                                                    <input type="text" class="form-control" id="inputGender" value="<?php echo $row['gender'] ?>" name="gender" readonly>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="inputCourse" class="form-label">Course</label>
                                                                                    <input type="text" class="form-control" id="inputCourse" value="<?php echo $row['contact'] ?>" name="course" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label for="inputImage" class="form-label">Department</label>
                                                                                    <input type="text" class="form-control" id="inputDepartment" value="<?php echo $row['department'] ?>" name="department" readonly>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="inputCourse" class="form-label">Status</label>
                                                                                    <input style="color:green" type="text" class="form-control" id="inputStatus" value="<?php echo $row['status'] ?>" name="status" readonly>
                                                                                </div>
                                                                            </div>
                                                                          
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-warning" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Unverify Account" data-target="#delete<?php echo $row['id'] ?>"><i class="zmdi zmdi-rotate-left"></i>  </button>
                                             <!-- Modal for Delete -->
                                             <div class="modal fade" id="delete<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Unverified Account</h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <br>
                                                                        <form action="functions.php" method="POST">
                                                                            <div class="body">
                                                                                <h3>Unverifying Account of : <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h3>
                                                                                <p style="text-align:left">Leave a message for this user:</p>
                                                                                <textarea class="form-control" name="msg_unverify" id="" cols="30" rows="5" required></textarea>
                                                                                <div class="modal-footer">
                                                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                                    <input type="hidden" name="email" value="<?php echo $row['email'] ?>">
                                                                                    <button type="submit" class="btn btn-warning btn-round waves-effect" style="color:white" name="unverify_acc">Unverify Account</button>
                                                                                    <button type="button" class="btn btn-outline-secondary btn-round waves-effect" data-dismiss="modal">Close</button>
                                                                                </div>        
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                   
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
   
                    <div class="card">
                        <div class="header">
                            
                            <h2><strong>Verified</strong> Accounts - Administrator</h2>
                        </div>
                        <div class="table-responsive" style="text-align: center;">
                            <table class="table table-hover js-basic-example dataTable table-sm " id="table1">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM admin WHERE acc_status='VERIFIED'";
                                        $result = mysqli_query($conn, $query);
                                        $check_row = mysqli_num_rows($result);
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><img src="../<?php echo $row['image'] ?>" width="50px" alt=""></td>
                                        <td><?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Account Details" data-target="#accdetails<?php echo $row['id'] ?>"><i class="zmdi zmdi-receipt"></i> </button>
                                             <!-- Modal for Account Details -->
                                             <div class="modal fade" id="accdetails<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="largeModalLabel">Account Details</h4>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="card">
                                                                    <form action="functions.php" method="POST">
                                                                        <div class="modal-header">
                                                                            <h6 class="title " style="text-align: center;">Account Details of: <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h6>
                                                                        </div>
                                                                        <br>
                                                                        <div class="body">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <label for="inputFirst" class="form-label">First name</label>
                                                                                    <input type="text" class="form-control" id="inputFirst" onkeyup="lettersOnly(this)" value="<?php echo $row['firstname'] ?>" name="firstname" readonly>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="inputMiddle" class="form-label">Middle name</label>
                                                                                    <input type="text" class="form-control" id="inputMiddle" onkeyup="lettersOnly(this)" value="<?php echo $row['middlename'] ?>" name="middlename" readonly>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="inputLast" class="form-label">Last name</label>
                                                                                    <input type="text" class="form-control" id="inputLast" onkeyup="lettersOnly(this)" value="<?php echo $row['lastname'] ?>" name="lastname" readonly>
                                                                                </div>
                                                                            </div> 
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label for="inputEmail" class="form-label">Email</label>
                                                                                    <input type="text" class="form-control" id="inputEmail" value="<?php echo $row['email'] ?>" name="email" readonly>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="inputCourse" class="form-label">Status</label>
                                                                                    <input style="color:green" type="text" class="form-control" id="inputStatus" value="<?php echo $row['status'] ?>" name="status" readonly>
                                                                                </div>
                                                                            </div>        
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-warning" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Unverify Account" data-target="#delete<?php echo $row['id'] ?>"><i class="zmdi zmdi-rotate-left"></i>  </button>
                                             <!-- Modal for Unverify -->
                                             <div class="modal fade" id="delete<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Unverified Account</h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <br>
                                                                        <form action="functions.php" method="POST">
                                                                            <div class="body">
                                                                                <h3>Unverifying Account of : <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h3>
                                                                                <p style="text-align:left">Leave a message for this user:</p>
                                                                                <textarea class="form-control" name="msg_unverify" id="" cols="30" rows="5" required></textarea>
                                                                                <div class="modal-footer">
                                                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                                    <input type="hidden" name="email" value="<?php echo $row['email'] ?>">
                                                                                    <button type="submit" class="btn btn-warning btn-round waves-effect" style="color:white" name="unverify_acc_admin">Unverify Account</button>
                                                                                    <button type="button" class="btn btn-outline-secondary btn-round waves-effect" data-dismiss="modal">Close</button>
                                                                                </div>        
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                   
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>  
            
        </div>
    </div>
</section>



<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script>
<script src="assets/bundles/fullcalendarscripts.bundle.js"></script><!--/ calender javascripts --> 
<script src="assets/bundles/mainscripts.bundle.js"></script>
<!-- Jquery DataTable Plugin Js --> 
<script src="assets/bundles/datatablescripts.bundle.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="assets/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js --> 
<script src="assets/plugins/sweetalert/sweetalert.min.js"></script> <!-- SweetAlert Plugin Js --> 
<script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script> <!-- Bootstrap Tags Input Plugin Js --> 
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script> 
<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/tables/jquery-datatable.js"></script>

<script src="assets/js/pages/calendar/calendar.js"></script>
</body>

</html>