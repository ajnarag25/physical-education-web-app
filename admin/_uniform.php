<?php
    include('connection.php');
    session_start();
    if (!isset($_SESSION['get_data']['username'])) {
    header("Location: index.php");
}
?>

<!doctype html>
<html class="no-js " lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>P.E Department Admin Site</title>
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
        <a href="_dashboard.php"><img src="assets/images/tuplogo.png" width="25" alt="Aero"><span class="m-l-10">P.E. Department</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <?php 
                        $check_name =  $_SESSION['get_data']['firstname'];
                        $query = "SELECT * FROM admin WHERE firstname='$check_name'";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <a href="_profile.php"><img src="<?php echo $row['image'] ?>" class="rounded-circle shadow" width="60" alt="profile-image"></a>
                    <?php }; ?>
                    <div class="detail">
                        <h4><?php echo $_SESSION['get_data']['firstname'] ?></h4>
                        <small>Administrator</small>                        
                    </div>
                </div>
            </li>
            <li><a href="_dashboard.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="_reservation.php"><i class="zmdi zmdi-calendar"></i><span>Reservation <span id="no_number_reserve">0</span></span></a></li>
            <li class="active open"><a href="_uniform.php"><i class="zmdi zmdi-shopping-cart"></i><span>Uniform <span id="no_number_inquire">0</span></span></a></li>
            <li><a href="_basketball.php"><i class="zmdi zmdi-chart-donut"></i><span>Sports Equipment</span></a></li> 
            <li><a href="_profile.php"><i class="zmdi zmdi-account-circle"></i><span>My Profile</span></a></li>
            <li><a href="functions.php?logout"><i class="zmdi zmdi-sign-in"></i><span>Logout</span></a></li>
        </ul>
    </div>
</aside>

<!-- Main Content -->
<section class="content">
    <div class="body_scroll" id="calendarr">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-8 col-md-4 col-sm-11">
                    <h2 style="text-align: right;">Welcome to P.E. Department Admin Site</h2>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            
            <!-- Request Table -->
            <div class="row clearfix" id="request">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="_dashboard.php"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                                <li class="breadcrumb-item active">Request Table</li>
                                <li class="breadcrumb-item"><a href="#onprocess">On-Process Table</a></li>
                                <li class="breadcrumb-item"><a href="#onpickup">On-Pickup</a></li>
                                <li class="breadcrumb-item"><a href="#history">Transaction Table</a></li>
                            </ul>
                            <h2><strong>Request</strong> Table </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" style="text-align: center;">
                                <table class="table table-bordered table-hover js-basic-example dataTable table-sm " id="table1">
                                    <thead class="thead-light">
                                        <tr>                               
                                            <th><small>Name</small></th>
                                            <th><small>Course/Department</small></th>
                                            <th><small>Gender</small></th>
                                            <th><small>Variation</small></th>
                                            <th><small>T-Shirt Size</small></th>
                                            <th><small>Shorts Size</small></th>
                                            <th><small>Joggingpants Size</small></th>
                                            <th><small>P.E. Instructor</small></th>
                                            <th><small>Req. Date</small></th>
                                            <th><small>Action</small></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>                                    
                                            <th><small>Name</small></th>
                                            <th><small>Course/Department</small></th>
                                            <th><small>Gender</small></th>
                                            <th><small>Variation</small></th>
                                            <th><small>T-Shirt Size</small></th>
                                            <th><small>Shorts Size</small></th>
                                            <th><small>Joggingpants Size</small></th>
                                            <th><small>P.E. Instructor</small></th>
                                            <th><small>Req. Date</small></th>
                                            <th><small>Action</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                        $query = "SELECT * FROM inquire WHERE status='PENDING'";
                                        $result = mysqli_query($conn, $query);
                                        $check_row = mysqli_num_rows($result);
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td id="nem"><?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></td>
                                            <td>
                                                <?php if ($row['course'] == 'N/A'){
                                                    $department = $row['department'];
                                                    echo $department;
                                                }else{
                                                    $course = $row['course'];
                                                    echo $course;
                                                } ?>
                                            </td>
                                            <td><?php echo $row['gender'] ?></td>
                                            <td>
                                                <?php if ($row['size_s'] == 'N/A'){
                                                        echo '
                                                            PE-2
                                                        ';
                                                    }else{
                                                        echo '
                                                            PE-1
                                                        ';
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $row['size_t'] ?></td>
                                            <td><?php echo $row['size_s'] ?></td>
                                            <td><?php echo $row['size_j'] ?></td>
                                            <td><?php echo $row['teacher'] ?></td>
                                            <td><?php echo $row['date'] ?></td>
                                            <td>
                                                <button id="acceptt" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Accept Request" data-toggle="modal" data-target="#accept<?php echo $row['id'] ?>"><i class="zmdi zmdi-check"></i></button>
                                                <!-- Modal for Accept -->
                                                <div class="modal fade" id="accept<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Set Schedule for Payment</h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <form action="functions.php" method="POST">
                                                                            <div class="modal-header">
                                                                                <h6 class="title " style="text-align: center;">Requested By: <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h6>
                                                                            </div>
                                                                            <br>
                                                                            <div class="body">
                                                                                <label id="approveschedd" for="approvesched">Set Date/Time for Student to Pay the Uniform</label>
                                                                                <div name="approvesched" id="approvesched" class="form-group">
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                                                                        </div>
                                                                                        <input type="text" id="min-date" name="sched" class="form-control" placeholder="Please choose date & time" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <input type="hidden" name="id_accept" value="<?php echo $row['id'] ?>">
                                                                                    <input type="hidden" name="email_set_sched" value="<?php echo $row['email'] ?>">
                                                                                    <button type="submit" class="btn btn-success btn-round waves-effect" name="set_sched">Confirm</button>
                                                                                    <button type="button" class="btn btn-outline-danger btn-round waves-effect" data-dismiss="modal">Close</button>
                                                                                </div>        
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Decline Request" data-target="#decline<?php echo $row['id'] ?>"><i class="zmdi zmdi-close"></i></button>
                                                <!-- Modal for Decline -->
                                                <div class="modal fade" id="decline<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Decline Inquiry</h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <br>
                                                                        <form action="functions.php" method="POST">
                                                                            <div class="body">
                                                                                <h3>Decline Inquiry of : <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h3>
                                                                                <p><i class="zmdi zmdi-alert-circle infinite pulse" style="color:red"></i> This Action is Irrevesible!</p>
                                                                                <p style="text-align:left">Leave a message for this user:</p>
                                                                                <textarea class="form-control" name="msg_decline" id="" cols="30" rows="5" required></textarea>
                                                                                <div class="modal-footer">
                                                                                    <input type="hidden" name="id_decline" value="<?php echo $row['id'] ?>">
                                                                                    <input type="hidden" name="email_set_decline" value="<?php echo $row['email'] ?>">
                                                                                    <button type="submit" class="btn btn-danger btn-round waves-effect" name="set_decline">Decline</button>
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

            <!-- Ongoing Table -->
            <div class="row clearfix" id="onprocess">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="_dashboard.php"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#request">Request Table</a></li>
                                <li class="breadcrumb-item active">On-Process Table</li>
                                <li class="breadcrumb-item"><a href="#onpickup">On-Pickup</a></li>
                                <li class="breadcrumb-item"><a href="#history">Transaction Table</a></li>
                            </ul>
                            <h2><strong>On-Process</strong> Table </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" style="text-align: center;">
                                <table class="table table-bordered table-hover dataTable js-exportable table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><small>Name</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Gender</small></th>
                                            <th><small>Variation</small></th>
                                            <th><small>T-Shirt Size</small></th>
                                            <th><small>Shorts Size</small></th>
                                            <th><small>Joggingpants Size</small></th>
                                            <th><small>P.E. Instructor</small></th>
                                            <th><small>Sched. of Payment</small></th>
                                            <th><small>Status</small></th>
                                            <th><small>Modify</small></th>
                                            <th><small>Action</small></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th><small>Name</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Gender</small></th>
                                            <th><small>Variation</small></th>
                                            <th><small>T-Shirt Size</small></th>
                                            <th><small>Shorts Size</small></th>
                                            <th><small>Joggingpants Size</small></th>
                                            <th><small>P.E. Instructor</small></th>
                                            <th><small>Sched. of Payment</small></th>
                                            <th><small>Status</small></th>
                                            <th><small>Modify</small></th>
                                            <th><small>Action</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                        $query = "SELECT * FROM inquire WHERE status='UNPAID' OR status='PAID' ";
                                        $result = mysqli_query($conn, $query);
                                        $check_row = mysqli_num_rows($result);
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></td>
                                            <td>
                                                <?php if ($row['course'] == 'N/A'){
                                                    $department = $row['department'];
                                                    echo $department;
                                                }else{
                                                    $course = $row['course'];
                                                    echo $course;
                                                } ?>
                                            </td>
                                            <td><?php echo $row['gender'] ?></td>
                                            <td>
                                                <?php if ($row['size_s'] == 'N/A'){
                                                        echo '
                                                            PE-2
                                                        ';
                                                    }else{
                                                        echo '
                                                            PE-1
                                                        ';
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $row['size_t'] ?></td>
                                            <td><?php echo $row['size_s'] ?></td>
                                            <td><?php echo $row['size_j'] ?></td>
                                            <td><?php echo $row['teacher'] ?></td>
                                            <td><?php echo $row['sched_pay'] ?></td>
                                            <td>
                                                <?php 
                                                    if ($row['status'] == 'UNPAID'){
                                                        echo '
                                                            <p class="text-warning">UNPAID</p>
                                                        ';
                                                    }else {
                                                        echo '
                                                            <p class="text-success">PAID</p>
                                                        ';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">                                      
                                                    <button class="btn btn-info btn-sm " data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Modify" data-target="#modify<?php echo $row['id'] ?>">Edit</button>
                                                </div>
                                                <!-- Modal for modify -->
                                                <div class="modal fade" id="modify<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Modify Order </h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <div class="modal-header">
                                                                            <h6 class="title " style="text-align: center;">Modify Order of: <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h6>
                                                                        </div>
                                                                        <div class="body">
                                                                            <form action="functions.php" method="POST">
                                                                                <label  for="stat">Current Status</label>
                                                                                <?php
                                                                                    if ($row['status'] == 'UNPAID'){
                                                                                        echo '
                                                                                        <div style="text-align: center;" class="alert alert-warning ">
                                                                                        <strong>Unpaid</strong>
                                                                                        </div>
                                                                                        ';
                                                                                    }elseif ($row['status'] == 'REFUND'){
                                                                                        echo '
                                                                                        <div style="text-align: center;" class="alert alert-warning ">
                                                                                        <strong>Refund</strong>
                                                                                        </div>
                                                                                        ';
                                                                                    }else{
                                                                                        echo '
                                                                                        <div style="text-align: center;" class="alert alert-success ">
                                                                                        <strong>Paid</strong>
                                                                                        </div>
                                                                                        ';
                                                                                    }
                                                                                ?>
                                                                                <label  for="status">Change Status</label>
                                                                                <div class="mb-3">
                                                                                    <select class="form-control show-tick" name="stat">
                                                                                        <option value="UNPAID">UNPAID</option>
                                                                                        <option value="PAID">PAID</option>
                                                                                        <option value="REFUND">REFUND</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-4 col-md-8">
                                                                                        <div class="form-group">
                                                                                            <label for="change">T-shirt Size</label>
                                                                                            <select class="form-control show-tick" name="tshirts">
                                                                                                <option selected value="<?php echo $row['size_t'] ?>"><?php echo $row['size_t'] ?></option>
                                                                                                <option value="small">Small</option>
                                                                                                <option value="medium">Medium</option>
                                                                                                <option value="large">Large</option>
                                                                                                <option value="extra large">Extra Large</option>
                                                                                                <option value="XXL">XXL</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>       
                                                                                    <div class="col-lg-4 col-md-8">
                                                                                        <div class="form-group">
                                                                                            <label for="change">Shorts Size</label>
                                                                                            <select class="form-control show-tick" name="shorts">
                                                                                                <?php 
                                                                                                    if ($row['size_s'] == 'N/A'){
                                                                                                        echo '
                                                                                                            <option selected value="N/A">N/A</option>
                                                                                                        ';
                                                                                                    }else{
                                                                                                        $shorts = $row['size_s'];
                                                                                                        echo '
                                                                                                            <option selected value='.$shorts.'>'.$shorts.'</option>
                                                                                                            <option value="small">Small</option>
                                                                                                            <option value="medium">Medium</option>
                                                                                                            <option value="large">Large</option>
                                                                                                            <option value="extra large">Extra Large</option>
                                                                                                            <option value="XXL">XXL</option>
                                                                                                        ';
                                                                                                    }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>     
                                                                                    <div class="col-lg-4 col-md-8">
                                                                                        <div class="form-group">
                                                                                            <label for="change">Joggingpants Size</label>
                                                                                            <select class="form-control show-tick" name="joggingpants">
                                                                                                <?php 
                                                                                                    if ($row['size_j'] == 'N/A'){
                                                                                                        echo '
                                                                                                            <option selected value="N/A">N/A</option>
                                                                                                        ';
                                                                                                    }else{
                                                                                                        $jogging = $row['size_j'];
                                                                                                        echo '
                                                                                                            <option selected value='.$jogging.'>'.$jogging.'</option>
                                                                                                            <option value="small">Small</option>
                                                                                                            <option value="medium">Medium</option>
                                                                                                            <option value="large">Large</option>
                                                                                                            <option value="extra large">Extra Large</option>
                                                                                                            <option value="XXL">XXL</option>
                                                                                                        ';
                                                                                                    }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>                    
                                                                                </div>      
                                                                                <div class="modal-footer">
                                                                                    <input type="hidden" name="id_modify" value="<?php echo $row['id'] ?>">
                                                                                    <button type="submit" class="btn btn-success btn-round waves-effect" name="modify_inquire">Save Changes</button>
                                                                                    <button type="button" class="btn btn-outline-danger btn-round waves-effect" data-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#pickup<?php echo $row['id'] ?>"><i class="zmdi zmdi-assignment-check"></i></button>
                                            <!-- Modal for Pickup -->
                                            <div class="modal fade" id="pickup<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="largeModalLabel">Set Schedule for Pick up</h4>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="card">
                                                                    <div class="modal-header">
                                                                        <h6 class="title " style="text-align: center;">Requested By: <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h6>
                                                                    </div>
                                                                    <br>
                                                                    <div class="body">
                                                                        <form action="functions.php" method="POST">
                                                                            <label id="approveschedd" for="approvesched">Set Appointment Date & Time for Student to pick up the uniform</label>
                                                                            <div name="approvesched" id="approvesched" class="form-group">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                                                                    </div>
                                                                                    <input type="text" id="min-date2" name="sched" class="form-control" placeholder="Please choose date & time" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id_pickup">
                                                                                <input type="hidden" value="<?php echo $row['status'] ?>" name="check_stat">
                                                                                <input type="hidden" value="<?php echo $row['email'] ?>" name="set_email_pickup">
                                                                                <button type="submit" class="btn btn-success btn-round waves-effect" name="set_pickup">Confirm</button>
                                                                                <button type="button" class="btn btn-outline-danger btn-round waves-effect" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancel<?php echo $row['id'] ?>"><i class="zmdi zmdi-close"></i></button>
                                            <!-- Modal for Decline -->
                                            <div class="modal fade" id="cancel<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="largeModalLabel">Cancel Order</h4>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="card">
                                                                    <br>
                                                                    <form action="functions.php" method="POST">
                                                                        <div class="body">
                                                                            <h3>Cancel Order of : <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h3>
                                                                            <p><i class="zmdi zmdi-alert-circle infinite pulse" style="color:red"></i> This Action is Irrevesible!</p>
                                                                            <p style="text-align:left">Leave a message for this user:</p>
                                                                            <textarea class="form-control" name="msg_cancel" id="" cols="30" rows="5" required></textarea>
                                                                            <div class="modal-footer">
                                                                                <input type="hidden" name="id_cancel" value="<?php echo $row['id'] ?>">
                                                                                <input type="hidden" value="<?php echo $row['email'] ?>" name="set_email_cancel">
                                                                                <button type="submit" class="btn btn-danger btn-round waves-effect" name="set_cancel">Cancel</button>
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

            <!-- On-pickup Table -->
            <div class="row clearfix" id="onpickup">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="_dashboard.php"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#request">Request Table</a></li>
                                <li class="breadcrumb-item"><a href="#onprocess">On-Process Table</a></li>
                                <li class="breadcrumb-item active">On-Pickup</li>
                                <li class="breadcrumb-item"><a href="#history">Transaction Table</a></li>
                            </ul>
                            <h2><strong>On-pickup</strong> Table </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" style="text-align: center;">
                                <table class="table table-bordered table-hover dataTable js-exportable table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><small>Name</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Gender</small></th>
                                            <th><small>Variation</small></th>
                                            <th><small>T-Shirt Size</small></th>
                                            <th><small>Shorts Size</small></th>
                                            <th><small>Joggingpants Size</small></th>
                                            <th><small>P.E. Instructor</small></th>
                                            <th><small>Sched. of Pick-up</small></th>
                                            <th><small>Action</small></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th><small>Name</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Gender</small></th>
                                            <th><small>Variation</small></th>
                                            <th><small>T-Shirt Size</small></th>
                                            <th><small>Shorts Size</small></th>
                                            <th><small>Joggingpants Size</small></th>
                                            <th><small>P.E. Instructor</small></th>
                                            <th><small>Sched. of Pick-up</small></th>
                                            <th><small>Action</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM inquire WHERE status='PICKUP' ";
                                            $result = mysqli_query($conn, $query);
                                            $check_row = mysqli_num_rows($result);
                                            while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></td>
                                            <td>
                                                <?php if ($row['course'] == 'N/A'){
                                                    $department = $row['department'];
                                                    echo $department;
                                                }else{
                                                    $course = $row['course'];
                                                    echo $course;
                                                } ?>
                                            </td>
                                            <td><?php echo $row['gender'] ?></td>
                                            <td>
                                                <?php if ($row['size_s'] == 'N/A'){
                                                        echo '
                                                            PE-2
                                                        ';
                                                    }else{
                                                        echo '
                                                            PE-1
                                                        ';
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $row['size_t'] ?></td>
                                            <td><?php echo $row['size_s'] ?></td>
                                            <td><?php echo $row['size_j'] ?></td>
                                            <td><?php echo $row['teacher'] ?></td>
                                            <td><?php echo $row['sched_pickup'] ?></td>
                                            <td>
                                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#received<?php echo $row['id'] ?>"><i class="zmdi zmdi-check"></i></button>
                                                <!-- Modal for Recieved -->
                                                <div class="modal fade" id="received<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <h4 class="title" id="largeModalLabel">Received Order</h4>
                                                                        <h6 class="text-center" style="text-align: center;">Received By: <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h6>
                                                                        <div class="body">
                                                                            <form action="functions.php" method="POST">
                                                                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id_received">
                                                                                <input type="hidden" value="<?php echo $row['email'] ?>" name="set_email_received">
                                                                                <button type="submit" class="btn btn-success btn-round waves-effect" name="received_order">Received Order</button>
                                                                                <button type="button" class="btn btn-outline-danger btn-round waves-effect" data-dismiss="modal">Close</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-info btn-sm " data-toggle="modal" data-target="#resched<?php echo $row['id'] ?>"><i class="zmdi zmdi-assignment-o"></i></button>
                                                <!-- Modal for Reschdule -->
                                                <div class="modal fade" id="resched<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Reschedule for Pick up</h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <div class="modal-header">
                                                                            <h6 class="title " style="text-align: center;">Requested By: <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h6>
                                                                        </div>
                                                                        <br>
                                                                        <div class="body">
                                                                            <form action='functions.php' method="POST">
                                                                                <label id="approveschedd" for="approvesched">Set Appointment Date & Time for Student to pick up the uniform</label>
                                                                                <div name="approvesched" id="approvesched" class="form-group">
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                                                                        </div>
                                                                                        <input type="text" id="min-date3" name="resched_date" class="form-control " placeholder="Please choose date & time" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id_resched">
                                                                                    <input type="hidden" value="<?php echo $row['email'] ?>" name="set_email_resched">
                                                                                    <button type="submit" class="btn btn-success btn-round waves-effect" name="set_resched">Confirm</button>
                                                                                    <button type="button" class="btn btn-outline-danger btn-round waves-effect" data-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
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
                                <div class="col-sm-3 btn-group" role="group">
              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- History Table -->
            <div class="row clearfix" id="history">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="_dashboard.php"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#request">Request Table</a></li>
                                <li class="breadcrumb-item"><a href="#onprocess">On-Process Table</a></li>
                                <li class="breadcrumb-item"><a href="#onpickup">On-Pickup</a></li>
                                <li class="breadcrumb-item active">Transaction Table</li>
                            </ul>
                            <h2><strong>Transaction</strong> Table </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" style="text-align: center;">
                                <table class="table table-bordered table-hover dataTable js-exportable table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><small>Name</small></th>
                                            <th><small>Course/Department</small></th>
                                            <th><small>Gender</small></th>
                                            <th><small>Variation</small></th>
                                            <th><small>T-Shirt Size</small></th>
                                            <th><small>Shorts Size</small></th>
                                            <th><small>Joggingpants Size</small></th>
                                            <th><small>P.E. Instructor</small></th>
                                            <th><small>Date</small></th>
                                            <th><small>Status</small></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th><small>Name</small></th>
                                            <th><small>Course/Department</small></th>
                                            <th><small>Gender</small></th>
                                            <th><small>Variation</small></th>
                                            <th><small>T-Shirt Size</small></th>
                                            <th><small>Shorts Size</small></th>
                                            <th><small>Joggingpants Size</small></th>
                                            <th><small>P.E. Instructor</small></th>
                                            <th><small>Date</small></th>
                                            <th><small>Status</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                        $query = "SELECT * FROM inquire ";
                                        $result = mysqli_query($conn, $query);
                                        $check_row = mysqli_num_rows($result);
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></td>
                                            <td>
                                                <?php if ($row['course'] == 'N/A'){
                                                    $department = $row['department'];
                                                    echo $department;
                                                }else{
                                                    $course = $row['course'];
                                                    echo $course;
                                                } ?>
                                            </td>
                                            <td><?php echo $row['gender'] ?> </td>
                                            <td>
                                                <?php if ($row['size_s'] == 'N/A'){
                                                        echo '
                                                            PE-2
                                                        ';
                                                    }else{
                                                        echo '
                                                            PE-1
                                                        ';
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $row['size_t'] ?></td>
                                            <td><?php echo $row['size_s'] ?></td>
                                            <td><?php echo $row['size_j'] ?></td>
                                            <td><?php echo $row['teacher'] ?></td>
                                            <td><?php echo $row['date'] ?></td>
                                            <td>
                                                <?php 
                                                if ($row['status'] == 'PENDING'){
                                                    echo'
                                                    <p class="badge badge-warning">PENDING</p>
                                                    ';
                                                }elseif ($row['status'] == 'UNPAID'){
                                                    echo'
                                                    <p class="badge badge-warning">UNPAID</p>
                                                    ';
                                                }elseif ($row['status'] == 'PAID'){
                                                    echo'
                                                    <p class="badge badge-success">PAID</p>
                                                    ';
                                                }elseif ($row['status'] == 'REFUND'){
                                                    echo'
                                                    <p class="badge badge-warning">REFUND</p>
                                                    ';
                                                }elseif ($row['status'] == 'PICKUP'){
                                                    echo'
                                                    <p class="badge badge-success">PICKUP</p>
                                                    ';
                                                }elseif ($row['status'] == 'DECLINED'){
                                                    echo'
                                                    <p class="badge badge-danger">DECLINED</p>
                                                    ';
                                                }elseif ($row['status'] == 'CANCELED'){
                                                    echo'
                                                    <p class="badge badge-danger">CANCELED</p>
                                                    ';
                                                }elseif ($row['status'] == 'RECEIVED'){
                                                    echo'
                                                    <p class="badge badge-primary">RECEIVED</p>
                                                    ';
                                                }  
                                                
                                                ?>
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
    </div>

    
</section>

<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/fullcalendarscripts.bundle.js"></script><!--/ calender javascripts --> 

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

<script src="assets/js/pages/forms/form-validation.js"></script> 
<script src="assets/js/pages/calendar/calendar.js"></script>
<script src="assets/js/pages/forms/basic-form-elements.js"></script>
<script src="assets/js/pages/ui/sweetalert.js"></script>
<script src="assets/js/pages/forms/advanced-form-elements.js"></script> 
<script>
    function loadDoc1(){
        setInterval(() => {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    document.getElementById('no_number_reserve').innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "data_reserve.php", true);
            xhttp.send();
        }, 1000);
    }
    loadDoc1();
    function loadDoc2(){
        setInterval(() => {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    document.getElementById('no_number_inquire').innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "data_inquire.php", true);
            xhttp.send();
        }, 1000);
    }
    loadDoc2();
</script>
<script type="text/javascript">

    $(document).ready(function()
    {
        $('[id=min-date]').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });
        $('[id=min-date2]').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });
        $('[id=min-date3]').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });
        $('[id=min-date4]').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });
        $.material.init()
    });
</script>
</body>

</html>