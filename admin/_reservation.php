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
            <li class="active open"><a href="_reservation.php"><i class="zmdi zmdi-calendar"></i><span>Reservation <span id="no_number_reserve">0</span></span></a> </li>
            <li><a href="_uniform.php"><i class="zmdi zmdi-shopping-cart"></i><span>Uniform <span id="no_number_inquire">0</span></span></a> </li>
            <li><a href="_basketball.php"><i class="zmdi zmdi-chart-donut"></i><span>Sports Equipment</span></a></li> 
            <li><a href="_profile.php"><i class="zmdi zmdi-account-circle"></i><span>My Profile </span></a></li>
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
                                <li class="breadcrumb-item"><a href="#reschedule">Reschedule</a></li>
                                <li class="breadcrumb-item"><a href="#history">Transaction Table</a></li>
                            </ul>
                            <h2><strong>Request</strong> Table </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" style="text-align: center;">
                                <table class="table table-bordered table-hover js-basic-example dataTable table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><small>Name</small></th>
                                            <th><small>Department</small></th>
                                            <th><small>Req. Date/Time</small></th>
                                            <th><small>Venue</small></th>
                                            <th><small>Purpose</small></th>
                                            <th><small>Participants</small></th>
                                            <th><small>Sound System</small></th>
                                            <th><small>Decisions</small></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th><small>Name</small></th>
                                            <th><small>Department</small></th>
                                            <th><small>Req. Date/Time</small></th>
                                            <th><small>Venue</small></th>
                                            <th><small>Purpose</small></th>
                                            <th><small>Participants</small></th>
                                            <th><small>Sound System</small></th>
                                            <th><small>Decisions</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM reserve WHERE status='PENDING'";
                                            $result = mysqli_query($conn, $query);
                                            $check_row = mysqli_num_rows($result);
                                            while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['dept_course'] ?></td>
                                            <td><?php echo $row['date'] ?> / <?php echo $row['time'] ?></td>
                                            <td><?php echo $row['booking'] ?></td>
                                            <td><?php echo $row['purpose'] ?></td>
                                            <td><?php echo $row['participants'] ?></td>
                                            <td><?php echo $row['stat_sound'] ?></td>
                                            <td>
                                                <button class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Accept Request" data-toggle="modal" data-target="#accept<?php echo $row['id'] ?>"><i class="zmdi zmdi-check"></i></button>
                                                <!-- Modal for Accept -->
                                                <div class="modal fade" id="accept<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Accept Request</h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <form action="functions.php" method="POST">
                                                                            <div class="modal-header">
                                                                                <h6 class="title " style="text-align: center;">Requested By: <?php echo $row['name'] ?></h6>
                                                                            </div>
                                                                            <br>
                                                                            <div class="body">
                                                                                <h3>Accept this User Request?</h3>
                                                                                <h4>Venue Reservation: <span style="color: blue"><?php echo $row['booking'] ?></span></h4>
                                                                                <div class="modal-footer">
                                                                                    <input type="hidden" name="id_accept" value="<?php echo $row['id'] ?>">
                                                                                    <input type="hidden" name="email_set_accept" value="<?php echo $row['email'] ?>">
                                                                                    <button type="submit" class="btn btn-success btn-round waves-effect" name="set_accept">Accept</button>
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
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Decline Request" data-toggle="modal" data-target="#decline<?php echo $row['id'] ?>"><i class="zmdi zmdi-close"></i></button>
                                                <!-- Modal for Decline -->
                                                <div class="modal fade" id="decline<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Decline Request</h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <br>
                                                                        <form action="functions.php" method="POST">
                                                                            <div class="body">
                                                                                <h3>Decline Request of : <?php echo $row['name'] ?> </h3>
                                                                                <p><i class="zmdi zmdi-alert-circle infinite pulse" style="color:red"></i> This Action is Irrevesible!</p>
                                                                                <p style="text-align:left">Leave a message for this user:</p>
                                                                                <textarea class="form-control" name="msg_decline" id="" cols="30" rows="5" required></textarea>
                                                                                <div class="modal-footer">
                                                                                    <input type="hidden" name="id_decline" value="<?php echo $row['id'] ?>">
                                                                                    <input type="hidden" name="email_set_decline" value="<?php echo $row['email'] ?>">
                                                                                    <button type="submit" class="btn btn-danger btn-round waves-effect" name="decline_req">Decline</button>
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
                                                <button class="btn btn-info btn-sm " data-bs-toggle="tooltip" data-bs-placement="top" title="Request for Sound System" data-toggle="modal" data-target="#status<?php echo $row['id'] ?>"><i class="zmdi zmdi-alarm"></i></button>
                                                
                                                <!-- Modal for Status -->
                                                <div class="modal fade" id="status<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Request for Sound System</h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <div class="modal-header">
                                                                            <h6 class="title " style="text-align: center;">Requested By: <?php echo $row['name'] ?></h6>
                                                                        </div>
                                                                        <div class="body">
                                                                            <form action="functions.php" method="POST">
                                                                                <input type="hidden" value="<?php echo $row['id'] ?>" name="student_id">
                                                                                <input type="hidden" value="<?php echo $row['name'] ?>" name="student_name">
                                                                                <h2>Sound System Coordinator</h2>
                                                                                <button type="submit" class="btn btn-block btn-info waves-effect w-50" name="inform_sound">Request</button> 
                                                                            </form>
                                                                           
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-outline-danger btn-block waves-effect" data-dismiss="modal">Close</button>
                                                                            </div>
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
                                <li class="breadcrumb-item"><a href="#calendarr">Reservation Calendar</a></li>
                                <li class="breadcrumb-item"><a href="#request">Request Table</a></li>
                                <li class="breadcrumb-item active">On-Process Table</li>
                                <li class="breadcrumb-item"><a href="#reschedule">Reschedule</a></li>
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
                                            <th><small>Department</small></th>
                                            <th><small>Req. Date/Time</small></th>
                                            <th><small>Venue</small></th>
                                            <th><small>Purpose</small></th>
                                            <th><small>Participants</small></th>
                                            <th><small>Decisions</small></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th><small>Name</small></th>
                                            <th><small>Department</small></th>
                                            <th><small>Req. Date/Time</small></th>
                                            <th><small>Venue</small></th>
                                            <th><small>Purpose</small></th>
                                            <th><small>Participants</small></th>
                                            <th><small>Decisions</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM reserve WHERE status='ACCEPTED'";
                                            $result = mysqli_query($conn, $query);
                                            $check_row = mysqli_num_rows($result);
                                            while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['dept_course'] ?></td>
                                            <td><?php echo $row['date'] ?> / <?php echo $row['time'] ?></td>
                                            <td><?php echo $row['booking'] ?></td>
                                            <td><?php echo $row['purpose'] ?></td>
                                            <td><?php echo $row['participants'] ?></td>
                                            <td>
                                                <button class="btn btn-success btn-sm" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve Request" data-target="#approve<?php echo $row['id'] ?>"><i class="zmdi zmdi-assignment-check"></i></button>
                                                <!-- Modal for Approve -->
                                                <div class="modal fade" id="approve<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Approving Process</h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <div class="modal-header">
                                                                            <h6 class="title " style="text-align: center;">Requested By: <?php echo $row['name'] ?></h6>
                                                                        </div>
                                                                        <div class="body">
                                                                            <form action="functions.php" method="POST">
                                                                                <label for="stat">Current Status</label>
                                                                                <div id="stat" name="stat" style="text-align: center;" class="alert alert-success">
                                                                                    <strong >ACCEPTED</strong>
                                                                                </div>
                                                                                <label for="status">Action Status</label>
                                                                            
                                                                                <div class="form-group"> 
                                                                                    <select name="stats" class="form-control">
                                                                                        <option value="APPROVED">Approve</option>
                                                                                        <option value="DECLINED">Decline</option>
                                                                                        <option value="RESCHEDULE">Reschedule</option>
                                                                                    </select>
                                                                                    
                                                                                    <label for="stat" class="mt-2">This is for Reschedule only *</label>
                                                                                    <div class="input-group">
                                                                                        
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                                                                        </div>
                                                                                      
                                                                                        <input type="text" id="min-date" name="resched" class="form-control floating-label" placeholder="Set Date/Time for Reschedule">

                                                                                        
                                                                                    </div>
                                                                                
                                                                                </div>
                                                                                <label id="reasonlabel" for="reason">Reason for Approving/Dissapproved/Reschedule</label>
                                                                                <div class="form-group">                                
                                                                                    <input type="text" name="reason" class="form-control" placeholder="Enter your reason" required>
                                                                                </div>
                                                                                <label id="approveschedd" for="approvesched">Date/Time of Approval/Decline/Reschedule (Date Today)</label>
                                                                                <div name="approvesched" id="approvesched" class="form-group">
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                                                                        </div>
                                                                                        <input type="text" id="min-date2" name="setdate" class="form-control floating-label" placeholder="Please choose date & time" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id_approval">
                                                                                    <input type="hidden" value="<?php echo $row['email'] ?>" name="get_email_approval">
                                                                                    <button type="submit" class="btn btn-success btn-round waves-effect" name="set_approval">Confirm</button>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reschedule Table -->
            <div class="row clearfix" id="reschedule">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="_dashboard.php"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#calendarr">Reservation Calendar</a></li>
                                <li class="breadcrumb-item"><a href="#request">Request Table</a></li>
                                <li class="breadcrumb-item"><a href="#onprocess">On-Process Table</a></li>
                                <li class="breadcrumb-item active">Reschedule</li>
                                <li class="breadcrumb-item"><a href="#history">Transaction Table</a></li>
                            </ul>
                            <h2><strong>Reschedule</strong> Table </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" style="text-align: center;">
                                <table class="table table-bordered table-hover dataTable js-exportable table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><small>Name</small></th>
                                            <th><small>Department</small></th>
                                            <th><small>Req. Date/Time</small></th>
                                            <th><small>Venue</small></th>
                                            <th><small>Purpose</small></th>
                                            <th><small>Participants</small></th>
                                            <th><small>Decision</small></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th><small>Name</small></th>
                                            <th><small>Department</small></th>
                                            <th><small>Req. Date/Time</small></th>
                                            <th><small>Venue</small></th>
                                            <th><small>Purpose</small></th>
                                            <th><small>Participants</small></th>
                                            <th><small>Decisions</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM reserve WHERE status='RESCHEDULE'";
                                            $result = mysqli_query($conn, $query);
                                            $check_row = mysqli_num_rows($result);
                                            while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['dept_course'] ?></td>
                                            <td><?php echo $row['date'] ?> / <?php echo $row['time'] ?></td>
                                            <td><?php echo $row['booking'] ?></td>
                                            <td><?php echo $row['purpose'] ?></td>
                                            <td><?php echo $row['participants'] ?></td>
                                            <td>
                                              
                                                <button class="btn btn-info btn-sm " data-bs-toggle="tooltip" data-bs-placement="top" title="Info" data-toggle="modal" data-target="#info<?php echo $row['id'] ?>">Info</button>
                                                <!-- Modal for Info -->
                                                <div class="modal fade" id="info<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Approving Process</h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <div class="modal-header">
                                                                            <h6 class="title " style="text-align: center;">Requested By: <?php echo $row['name'] ?></h6>
                                                                        </div>
                                                                        <div class="body">
                                                                            <form>
                                                                                <label for="stat">Current Status</label>
                                                                                <div id="stat" name="stat" style="text-align: center;" class="alert alert-info">
                                                                                    <strong >Reschedule</strong>
                                                                                </div>
                                                                                <label for="status">Action Status</label>
                                                                                <div name="stats" class="form-group"> 
                                                                                    
                                                                                 
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-prepend">
                                                                                                <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                                                                            </div>
                                                                                            <input type="text" id="min-date3" class="form-control" placeholder="Set Date/Time for Reschedule" value="<?php echo $row['resched'] ?>" disabled>
                                                                                        </div>
                                                                                    
                                                                                </div>
                                                                                <label id="reasonlabel" for="reason">Reason for Approving/Dissapproved/Reschedule</label>
                                                                                <div class="form-group">                                
                                                                                    <input type="text" id="reason" class="form-control" placeholder="Enter your reason" value="<?php echo $row['reason'] ?>" readonly required>
                                                                                </div>
                                                                                <label for="name">Action by</label>
                                                                                <div class="form-group">                                
                                                                                    <input type="text" id="name" class="form-control" placeholder="Enter your name" value="<?php echo $row['name'] ?>" readonly required>
                                                                                </div>
                                                                                <label id="approveschedd" for="approvesched">Date/Time of Approval/Decline/Reschedule (Date Today)</label>
                                                                                <div name="approvesched" id="approvesched" class="form-group">
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                                                                        </div>
                                                                                        <input type="text" id="min-date4" class="form-control" placeholder="Please choose date & time" value="<?php echo $row['date'] ?>" disabled required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
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
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel Request" data-target="#cancel<?php echo $row['id'] ?>"><i class="zmdi zmdi-close"></i></button>
                                                <!-- Modal for Cancel -->
                                                <div class="modal fade" id="cancel<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Cancel Request</h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <br>
                                                                        <form action="functions.php" method="POST">
                                                                            <div class="body">
                                                                                <h3>Cancel Request of : <?php echo $row['name'] ?> </h3>
                                                                                <p><i class="zmdi zmdi-alert-circle infinite pulse" style="color:red"></i> This Action is Irrevesible!</p>
                                                                                <p style="text-align:left">Leave a message for this user:</p>
                                                                                <textarea class="form-control" name="msg_cancel" id="" cols="30" rows="5" required></textarea>
                                                                                <div class="modal-footer">
                                                                                    <input type="hidden" name="id_cancel" value="<?php echo $row['id'] ?>">
                                                                                    <input type="hidden" name="email_set_cancel" value="<?php echo $row['email'] ?>">
                                                                                    <button type="submit" class="btn btn-danger btn-round waves-effect" name="cancel_req">Cancel</button>
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

            <!-- History Table -->
            <div class="row clearfix" id="history">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="_dashboard.php"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#calendarr">Reservation Calendar</a></li>
                                <li class="breadcrumb-item"><a href="#request">Request Table</a></li>
                                <li class="breadcrumb-item"><a href="#onprocess">On-Process Table</a></li>
                                <li class="breadcrumb-item"><a href="#reschedule">Reschedule</a></li>
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
                                            <th><small>Department</small></th>
                                            <th><small>Req. Date/Time</small></th>
                                            <th><small>Venue</small></th>
                                            <th><small>Purpose</small></th>
                                            <th><small>Participants</small></th>
                                            <th><small>Status</small></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th><small>Name</small></th>
                                            <th><small>Department</small></th>
                                            <th><small>Req. Date/Time</small></th>
                                            <th><small>Venue</small></th>
                                            <th><small>Purpose</small></th>
                                            <th><small>Participants</small></th>
                                            <th><small>Status</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM reserve ";
                                            $result = mysqli_query($conn, $query);
                                            $check_row = mysqli_num_rows($result);
                                            while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['dept_course'] ?></td>
                                            <td><?php echo $row['date'] ?> / <?php echo $row['time'] ?></td>
                                            <td><?php echo $row['booking'] ?></td>
                                            <td><?php echo $row['purpose'] ?></td>
                                            <td><?php echo $row['participants'] ?></td>
                                            <td>
                                            <?php 
                                                if ($row['status'] == 'PENDING'){
                                                    echo'
                                                    <p class="badge badge-warning">PENDING</p>
                                                    ';
                                                }elseif ($row['status'] == 'ACCEPTED'){
                                                    echo'
                                                    <p class="badge badge-success">ACCEPTED</p>
                                                    ';
                                                }elseif ($row['status'] == 'APPROVED'){
                                                    echo'
                                                    <p class="badge badge-success">APPROVED</p>
                                                    ';
                                                }elseif ($row['status'] == 'DECLINED'){
                                                    echo'
                                                    <p class="badge badge-danger">DECLINED</p>
                                                    ';
                                                }elseif ($row['status'] == 'CANCELED'){
                                                    echo'
                                                    <p class="badge badge-danger">CANCELED</p>
                                                    ';
                                                }elseif ($row['status'] == 'RESCHEDULE'){
                                                    echo'
                                                    <p class="badge badge-warning">RESCHEDULE</p>
                                                    ';
                                                }  
                                                elseif ($row['status'] == 'RECEIVED'){
                                                    echo'
                                                    <p class="badge badge-primary">RECEIVED</p>
                                                    ';
                                                }  
                                                
                                                ?>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                        
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
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script> 
<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/tables/jquery-datatable.js"></script>

<script src="assets/js/pages/forms/form-validation.js"></script> 
<script src="assets/js/pages/calendar/calendar.js"></script>
<script src="assets/js/pages/forms/basic-form-elements.js"></script>
<script src="assets/js/pages/ui/sweetalert.js"></script>

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