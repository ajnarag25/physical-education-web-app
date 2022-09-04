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
        <li><a href="index.php" class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
    </ul>
</div>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="_dashboard.html"><img src="assets/images/tuplogo.png" width="25" alt="Aero"><span class="m-l-10">P.E. Department</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="_profile.php"><img src="assets/images/tuplogo.png" alt="User"></a>
                    <div class="detail">
                        <h4>Michael</h4>
                        <small>Super Admin</small>                        
                    </div>
                </div>
            </li>
            <li><a href="_dashboard.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li class="active open"><a href="_reservation.php"><i class="zmdi zmdi-calendar"></i><span>Reservation of Facility</span></a></li>
            <li><a href="_uniform.php"><i class="zmdi zmdi-shopping-cart"></i><span>Uniform Inquiries</span></a></li>
            <li><a href="_basketball.php"><i class="zmdi zmdi-chart-donut"></i><span>Sports Equipment</span></a></li> 
            <li><a href="_profile.php"><i class="zmdi zmdi-account-circle"></i><span>My Profile</span></a></li>
            <li><a href="index.php"><i class="zmdi zmdi-sign-in"></i><span>Logout</span></a></li>
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
    <div class="body_scroll" id="calendarr">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-8 col-md-4 col-sm-11">
                    <h2>Welcome to P.E. Department Admin Site</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="_index.html"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Reservation Calendar</li>
                        <li class="breadcrumb-item"><a href="#request">Request Table</a></li>
                        <li class="breadcrumb-item"><a href="#onprocess">On-Process Table</a></li>
                        <li class="breadcrumb-item"><a href="#reschedule">Reschedule</a></li>
                        <li class="breadcrumb-item"><a href="#history">History Table</a></li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Facility Reservation Calendar</h4>
                    </div>
                    <div class="widget-inner">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
            <!-- Request Table -->
            <div class="row clearfix" id="request">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="_index.html"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#calendarr">Reservation Calendar</a></li>
                                <li class="breadcrumb-item active">Request Table</li>
                                <li class="breadcrumb-item"><a href="#onprocess">On-Process Table</a></li>
                                <li class="breadcrumb-item"><a href="#reschedule">Reschedule</a></li>
                                <li class="breadcrumb-item"><a href="#history">History Table</a></li>
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
                                            <th><small>Sched. Date/Time</small></th>
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
                                            <th><small>Sched. Date/Time</small></th>
                                            <th><small>Purpose</small></th>
                                            <th><small>Participants</small></th>
                                            <th><small>Decisions</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>Industrial Education</td>
                                            <td>07/13/2022 / 9:00AM</td>
                                            <td>Gymnasium</td>
                                            <td>08/13/2022 / 9:00AM</td>
                                            <td>One Day League</td>
                                            <td>100</td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">
                                                    <button class="btn btn-success btn-sm ">Accept</button>
                                                    <button class="btn btn-danger btn-sm ">Decline</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>Industrial Technology</td>
                                            <td>07/15/2022 / 9:00AM</td>
                                            <td>Amphitheater</td>
                                            <td>08/21/2022 / 9:00AM</td>
                                            <td>Choir Practice</td>
                                            <td>30</td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">
                                                    <button class="btn btn-success btn-sm ">Accept</button>
                                                    <button class="btn btn-danger btn-sm ">Decline</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Brielle Williamson</td>
                                            <td>Engineering Science</td>
                                            <td>07/30/2022 / 9:00AM</td>
                                            <td>Conference Room</td>
                                            <td>08/24/2022 / 9:00AM</td>
                                            <td>Meeting</td>
                                            <td>10</td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">
                                                    <button class="btn btn-success btn-sm ">Accept</button>
                                                    <button class="btn btn-danger btn-sm ">Decline</button>
                                                </div>
                                            </td>
                                        </tr>
                                        
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
                                <li class="breadcrumb-item"><a href="_index.html"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#calendarr">Reservation Calendar</a></li>
                                <li class="breadcrumb-item"><a href="#request">Request Table</a></li>
                                <li class="breadcrumb-item active">On-Process Table</li>
                                <li class="breadcrumb-item"><a href="#reschedule">Reschedule</a></li>
                                <li class="breadcrumb-item"><a href="#history">History Table</a></li>
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
                                            <th><small>Sched. Date/Time</small></th>
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
                                            <th><small>Sched. Date/Time</small></th>
                                            <th><small>Purpose</small></th>
                                            <th><small>Participants</small></th>
                                            <th><small>Decisions</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Rhona Davidson</td>
                                            <td>Industrial Education</td>
                                            <td>07/13/2022 / 9:00AM</td>
                                            <td>Gymnasium</td>
                                            <td>08/13/2022 / 9:00AM</td>
                                            <td>One Day League</td>
                                            <td>100</td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">
                                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approve">Approve</button>
                                                    <button class="btn btn-info btn-sm " data-toggle="modal" data-target="#status">Status</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Industrial Technology</td>
                                            <td>07/15/2022 / 9:00AM</td>
                                            <td>Amphitheater</td>
                                            <td>08/21/2022 / 9:00AM</td>
                                            <td>Choir Practice</td>
                                            <td>30</td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">
                                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approve">Approve</button>
                                                    <button class="btn btn-info btn-sm " data-toggle="modal" data-target="#status">Status</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Colleen Hurst</td>
                                            <td>Engineering Science</td>
                                            <td>07/30/2022 / 9:00AM</td>
                                            <td>Conference Room</td>
                                            <td>08/24/2022 / 9:00AM</td>
                                            <td>Meeting</td>
                                            <td>10</td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">
                                                    <button class="btn btn-success btn-sm " data-toggle="modal" data-target="#approve">Approve</button>
                                                    <button class="btn btn-info btn-sm " data-toggle="modal" data-target="#status">Status</button>
                                                </div>
                                            </td>
                                        </tr>
                                        
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
                                <li class="breadcrumb-item"><a href="_index.html"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#calendarr">Reservation Calendar</a></li>
                                <li class="breadcrumb-item"><a href="#request">Request Table</a></li>
                                <li class="breadcrumb-item"><a href="#onprocess">On-Process Table</a></li>
                                <li class="breadcrumb-item active">Reschedule</li>
                                <li class="breadcrumb-item"><a href="#history">History Table</a></li>
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
                                            <th><small>Sched. Date/Time</small></th>
                                            <th><small>Purpose</small></th>
                                            <th><small>Participants</small></th>
                                            <th><small>Request cancelled</small></th>
                                            <th><small>Decision</small></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th><small>Name</small></th>
                                            <th><small>Department</small></th>
                                            <th><small>Req. Date/Time</small></th>
                                            <th><small>Venue</small></th>
                                            <th><small>Sched. Date/Time</small></th>
                                            <th><small>Purpose</small></th>
                                            <th><small>Participants</small></th>
                                            <th><small>Request cancelled</small></th>
                                            <th><small>Decisions</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Sonya Frost</td>
                                            <td>Industrial Education</td>
                                            <td>07/13/2022 / 9:00AM</td>
                                            <td>Gymnasium</td>
                                            <td>08/13/2022 / 9:00AM</td>
                                            <td>One Day League</td>
                                            <td>100</td>
                                            <td>Yes</td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">
                                                    <button class="btn btn-info btn-sm "data-toggle="modal" data-target="#info">Info</button>
                                                    <button class="btn btn-danger btn-sm ">Cancel</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Herrod Chandler</td>
                                            <td>Industrial Technology</td>
                                            <td>07/15/2022 / 9:00AM</td>
                                            <td>Amphitheater</td>
                                            <td>08/21/2022 / 9:00AM</td>
                                            <td>Choir Practice</td>
                                            <td>30</td>
                                            <td>No</td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">
                                                    <button class="btn btn-info btn-sm "data-toggle="modal" data-target="#info">Info</button>
                                                    <button class="btn btn-danger btn-sm ">Cancel</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Quinn Flynn</td>
                                            <td>Engineering Science</td>
                                            <td>07/30/2022 / 9:00AM</td>
                                            <td>Conference Room</td>
                                            <td>08/24/2022 / 9:00AM</td>
                                            <td>Meeting</td>
                                            <td>10</td>
                                            <td>No</td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">
                                                    <button class="btn btn-info btn-sm "data-toggle="modal" data-target="#info">Info</button>
                                                    <button class="btn btn-danger btn-sm ">Cancel</button>
                                                </div>
                                            </td>
                                        </tr>
                                        
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
                                <li class="breadcrumb-item"><a href="_index.html"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#calendarr">Reservation Calendar</a></li>
                                <li class="breadcrumb-item"><a href="#request">Request Table</a></li>
                                <li class="breadcrumb-item"><a href="#onprocess">On-Process Table</a></li>
                                <li class="breadcrumb-item"><a href="#reschedule">Reschedule</a></li>
                                <li class="breadcrumb-item active">History Table</li>
                            </ul>
                            <h2><strong>History</strong> Table </h2>
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
                                            <th><small>Sched. Date/Time</small></th>
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
                                            <th><small>Sched. Date/Time</small></th>
                                            <th><small>Purpose</small></th>
                                            <th><small>Participants</small></th>
                                            <th><small>Decisions</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Rhona Davidson</td>
                                            <td>Industrial Education</td>
                                            <td>07/13/2022 / 9:00AM</td>
                                            <td>Gymnasium</td>
                                            <td>08/13/2022 / 9:00AM</td>
                                            <td>One Day League</td>
                                            <td>100</td>
                                            <td class="text-success">Approve</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Industrial Technology</td>
                                            <td>07/15/2022 / 9:00AM</td>
                                            <td>Amphitheater</td>
                                            <td>08/21/2022 / 9:00AM</td>
                                            <td>Choir Practice</td>
                                            <td>30</td>
                                            <td class="text-warning">Reschedule</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Colleen Hurst</td>
                                            <td>Engineering Science</td>
                                            <td>07/30/2022 / 9:00AM</td>
                                            <td>Conference Room</td>
                                            <td>08/24/2022 / 9:00AM</td>
                                            <td>Meeting</td>
                                            <td>10</td>
                                            <td class="text-danger">Disapproved</td>
                                            
                                        </tr>
                                        
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

<!-- Modal for Approve -->
<div class="modal fade" id="approve" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Approving Process</h4>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="modal-header">
                            <h6 class="title " style="text-align: center;">Requested By: Firstname Lastname</h6>
                        </div>
                        <div class="body">
                            <form>
                                <label for="stat">Current Status</label>
                                <div id="stat" name="stat" style="text-align: center;" class="alert alert-warning">
                                    <strong >PENDING</strong>
                                </div>
                                <label for="status">Action Status</label>
                                <div name="stats" class="form-group"> 
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="stats" id="Approve" class="with-gap" value="Approve">
                                        <label for="Approve">Approve</label>
                                    </div>                             
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="stats" id="decline" class="with-gap" value="decline">
                                        <label for="decline">Decline</label>
                                    </div>
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="stats" id="res" class="with-gap" value="reschedule">
                                        <label for="res">Reschedule</label>
                                    </div>
                                    
                                    <div id="resched" class="inlineblock col-sm-6" hidden>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                            </div>
                                            <input type="text" class="form-control datetimepicker" placeholder="Set Date/Time for Reschedule">
                                        </div>
                                    </div>
                                </div>
                                <label id="reasonlabel" for="reason">Reason for Approving/Dissapproved/Reschedule</label>
                                <div class="form-group">                                
                                    <input type="text" id="reason" class="form-control" placeholder="Enter your reason" disabled required>
                                </div>
                                <label for="name">Action by</label>
                                <div class="form-group">                                
                                    <input type="text" id="name" class="form-control" placeholder="Enter your name" disabled required>
                                </div>
                                <label id="approveschedd" for="approvesched">Date/Time of Approval/Decline/Reschedule (Date Today)</label>
                                <div name="approvesched" id="approvesched" class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                        </div>
                                        <input type="text" id="setdate" class="form-control datetimepicker" placeholder="Please choose date & time" disabled required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-success btn-round waves-effect">Confirm</button>
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

<!-- Modal for Status -->
<div class="modal fade" id="status" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Request for Approval of Other Departments</h4>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="modal-header">
                            <h6 class="title " style="text-align: center;">Requested By: Firstname Lastname</h6>
                        </div>
                        <div class="body">
                            <form>
                                <div class="row clearfix js-sweetalert">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label id="reasonlabel" for="reason">Office of Student Affairs</label>
                                            <input type="text" class="form-control" value="Jane Doe" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="statt">Current Status</label>
                                        <input type="text" class="form-control bg-warning text-white" value="Pending" readonly>
                                    </div>
                                    <div class="col-lg-4">  
                                        <label for="statt">Inform the Head Department</label>
                                        <button type="button" class="btn btn-block btn-info waves-effect" data-type="success">Inform</button>          
                                    </div>
                                </div>
                                <div class="row clearfix js-sweetalert">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label id="reasonlabel" for="reason">Department of Engineering Science</label>
                                            <input type="text" class="form-control" value="Ann Whitaker" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="statt">Current Status</label>
                                        <input type="text" class="form-control bg-danger text-white" value="Uninformed" readonly>
                                    </div>
                                    <div class="col-lg-4">  
                                        <label for="statt">Inform the Head Department</label>
                                        <button type="button" class="btn btn-block btn-info waves-effect" data-type="success">Inform</button>          
                                    </div>
                                </div>
                                <div class="row clearfix js-sweetalert">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label id="reasonlabel" for="reason">Department of Industrial Technology</label>
                                            <input type="text" class="form-control" value="Lisa Hurley" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="statt">Current Status</label>
                                        <input type="text" class="form-control bg-success text-white" value="Approved" readonly>
                                    </div>
                                    <div class="col-lg-4">  
                                        <label for="statt">Inform the Head Department</label>
                                        <button type="button" class="btn btn-block btn-info waves-effect" data-type="success" disabled>Inform</button>          
                                    </div>
                                </div>
                            </form>
                            <div id="stat" name="stat" style="text-align: justify;" class="alert alert-secondary text-dark">
                                <strong ><div class="alert-icon">
                                    <i class="zmdi zmdi-alert-circle-o"></i>
                                </div>Note:
                                    <br>-> If status is 'Uninformed' it means that the head department is not yet informed about the request. Simply click the button 'Inform' to inform the head department.
                                    <br>-> If status is 'Pending' it means that you already informed the head department and you'll need to wait for his/her approval. To inform again just simply click the button 'Inform'.
                                    <br>-> If status is 'Approved' it means the head department approved the request. You can now decide whether approved, dissapproved or reschedule.</strong>
                            </div>
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

<!-- Modal for Info -->
<div class="modal fade" id="info" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Approving Process</h4>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="modal-header">
                            <h6 class="title " style="text-align: center;">Requested By: Firstname Lastname</h6>
                        </div>
                        <div class="body">
                            <form>
                                <label for="stat">Current Status</label>
                                <div id="stat" name="stat" style="text-align: center;" class="alert alert-info">
                                    <strong >Reschedule</strong>
                                </div>
                                <label for="status">Action Status</label>
                                <div name="stats" class="form-group"> 
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="stats" id="Approve" class="with-gap" value="Approve" readonly>
                                        <label for="Approve">Approve</label>
                                    </div>                             
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="stats" id="decline" class="with-gap" value="decline" readonly>
                                        <label for="decline">Decline</label>
                                    </div>
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="stats" id="res" class="with-gap" value="reschedule" checked readonly>
                                        <label for="res">Reschedule</label>
                                    </div>
                                    
                                    <div id="resched" class="inlineblock col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                            </div>
                                            <input type="text" class="form-control datetimepicker" placeholder="Set Date/Time for Reschedule" value="Wednesday 27 July 2022 - 2:12" disabled>
                                        </div>
                                    </div>
                                </div>
                                <label id="reasonlabel" for="reason">Reason for Approving/Dissapproved/Reschedule</label>
                                <div class="form-group">                                
                                    <input type="text" id="reason" class="form-control" placeholder="Enter your reason" value="Conflicts on reservation" readonly required>
                                </div>
                                <label for="name">Action by</label>
                                <div class="form-group">                                
                                    <input type="text" id="name" class="form-control" placeholder="Enter your name" value="John Cena" readonly required>
                                </div>
                                <label id="approveschedd" for="approvesched">Date/Time of Approval/Decline/Reschedule (Date Today)</label>
                                <div name="approvesched" id="approvesched" class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                        </div>
                                        <input type="text" id="setdate" class="form-control datetimepicker" placeholder="Please choose date & time" value="Saturday 30 July 2022 - 2:12" disabled required>
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
<script>
    

	document.getElementById('Approve').onclick = function(){
		document.getElementById('resched').hidden = true;
		document.getElementById('reasonlabel').innerHTML = 'Reason for Approved';
        document.getElementById('approveschedd').innerHTML = 'Date/Time of Approval (Date Today)';
		document.getElementById('stat').innerHTML = 'Approving';
        document.getElementById('stat').classList = 'alert alert-success';
        document.getElementById('reason').disabled = false;
        document.getElementById('name').disabled = false;
        document.getElementById('setdate').disabled = false;
	};

	document.getElementById('decline').onclick = function(){
		document.getElementById('resched').hidden = true;
		document.getElementById('reasonlabel').innerHTML = 'Reason for Dissapproved';
        document.getElementById('approveschedd').innerHTML = 'Date/Time of Decline (Date Today)';
		document.getElementById('stat').innerHTML = 'Dissapproved';
        document.getElementById('stat').classList = 'alert alert-danger';
        document.getElementById('reason').disabled = false;
        document.getElementById('name').disabled = false;
        document.getElementById('setdate').disabled = false;
	};

	document.getElementById('res').onclick = function(){
		document.getElementById('resched').hidden = false;
		document.getElementById('reasonlabel').innerHTML = 'Reason for Reschedule';
        document.getElementById('approveschedd').innerHTML = 'Date/Time of Reschedule (Date Today)';
		document.getElementById('stat').innerHTML = 'Reschedule';
        document.getElementById('stat').classList = 'alert alert-info';
        document.getElementById('reason').disabled = false;
        document.getElementById('name').disabled = false;
        document.getElementById('setdate').disabled = false;
	};


</script>

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
</body>

</html>