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
        <li><a href="index.php" class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
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
                    <a class="image" href="_profile.html"><img src="assets/images/tuplogo.png" alt="User"></a>
                    <div class="detail">
                        <h4>Michael</h4>
                        <small>Super Admin</small>                        
                    </div>
                </div>
            </li>
            <li><a href="_dashboard.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="_reservation.php"><i class="zmdi zmdi-calendar"></i><span>Reservation of Facility</span></a></li>
            <li class="active open"><a href="_uniform.php"><i class="zmdi zmdi-shopping-cart"></i><span>Uniform Inquiries</span></a></li>
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
                                <li class="breadcrumb-item"><a href="_index.html"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                                <li class="breadcrumb-item active">Request Table</li>
                                <li class="breadcrumb-item"><a href="#onprocess">On-Process Table</a></li>
                                <li class="breadcrumb-item"><a href="#onpickup">On-Pickup</a></li>
                                <li class="breadcrumb-item"><a href="#history">History Table</a></li>
                            </ul>
                            <h2><strong>Request</strong> Table </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" style="text-align: center;">
                                <table class="table table-bordered table-hover js-basic-example dataTable table-sm " id="table1">
                                    <thead class="thead-light">
                                        <tr>                               
                                            <th><small>Name</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Gender</small></th>
                                            <th><small>Variation</small></th>
                                            <th><small>T-Shirt Size</small></th>
                                            <th><small>Short/Pants Size</small></th>
                                            <th><small>P.E. Instructor</small></th>
                                            <th><small>Req. Date/Time</small></th>
                                            <th><small>Selected</small></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>                                    
                                            <th><small>Name</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Gender</small></th>
                                            <th><small>Variation</small></th>
                                            <th><small>T-Shirt Size</small></th>
                                            <th><small>Short/Pants Size</small></th>
                                            <th><small>P.E. Instructor</small></th>
                                            <th><small>Req. Date/Time</small></th>
                                            <th><small>Selected</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td id="nem">Tiger Nixon</td>
                                            <td>COET</td>
                                            <td>Male</td>
                                            <td>PE 1</td>
                                            <td>Medium</td>
                                            <td>Small</td>
                                            <td>Janlee</td>
                                            <td>08/13/2022 / 9:00AM</td>
                                            <td>
                                                <input type="checkbox" name="check-tab1"></td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="nem">Cedric Kelly</td>
                                            <td>COET</td>
                                            <td>Male</td>
                                            <td>PE 1</td>
                                            <td>Large</td>
                                            <td>Medium</td>
                                            <td>Jester</td>
                                            <td>08/21/2022 / 9:00AM</td>
                                            <td>
                                                <input type="checkbox" name="check-tab1"></td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="nem">Brielle Williamson</td>
                                            <td>COET</td>
                                            <td>Male</td>
                                            <td>PE 2</td>
                                            <td>Small</td>
                                            <td>Small</td>
                                            <td>Mica</td>
                                            <td>08/21/2022 / 9:00AM</td>
                                            <td> 
                                                <input type="checkbox" name="check-tab1"></td>
                                            </td>
                                        </tr>
                                    </tbody>
                                   
                                </table>
                                <div class="col-sm-3 btn-group" role="group">
                                    <button id="acceptt" class="btn btn-success btn-sm" data-toggle="modal" data-target="#accept">Accept</button>
                                    <button class="btn btn-danger btn-sm ">Decline</button>
                                </div>
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
                                <li class="breadcrumb-item"><a href="#request">Request Table</a></li>
                                <li class="breadcrumb-item active">On-Process Table</li>
                                <li class="breadcrumb-item"><a href="#onpickup">On-Pickup</a></li>
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
                                            <th><small>Course</small></th>
                                            <th><small>Gender</small></th>
                                            <th><small>Variation</small></th>
                                            <th><small>T-Shirt Size</small></th>
                                            <th><small>Short/Pants Size</small></th>
                                            <th><small>P.E. Instructor</small></th>
                                            <th><small>Sched. of Payment</small></th>
                                            <th><small>Status</small></th>
                                            <th><small>Modify</small></th>
                                            <th><small>Selected</small></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th><small>Name</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Gender</small></th>
                                            <th><small>Variation</small></th>
                                            <th><small>T-Shirt Size</small></th>
                                            <th><small>Short/Pants Size</small></th>
                                            <th><small>P.E. Instructor</small></th>
                                            <th><small>Sched. of Payment</small></th>
                                            <th><small>Status</small></th>
                                            <th><small>Modify</small></th>
                                            <th><small>Selected</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Rhona Davidson</td>
                                            <td>COET</td>
                                            <td>Female</td>
                                            <td>PE 2</td>
                                            <td>Medium</td>
                                            <td>Small</td>
                                            <td>Janlee</td>
                                            <td>08/13/2022 / 9:00AM</td>
                                            <td>Paid</td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">                                      
                                                    <button class="btn btn-info btn-sm " data-toggle="modal" data-target="#modify">Edit</button>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="check-tab1"></td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>COET</td>
                                            <td>Female</td>
                                            <td>PE 2</td>
                                            <td>Small</td>
                                            <td>Small</td>
                                            <td>Janlee</td>
                                            <td>08/13/2022 / 9:00AM</td>
                                            <td>Unpaid</td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">                                      
                                                    <button class="btn btn-info btn-sm " data-toggle="modal" data-target="#modify">Edit</button>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="check-tab1"></td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Colleen Hurst</td>
                                            <td>COET</td>
                                            <td>Female</td>
                                            <td>PE 2</td>
                                            <td>Medium</td>
                                            <td>Large</td>
                                            <td>Janlee</td>
                                            <td>08/13/2022 / 9:00AM</td>
                                            <td>Paid</td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">                                      
                                                    <button class="btn btn-info btn-sm " data-toggle="modal" data-target="#modify">Edit</button>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="check-tab1"></td>
                                            </td>
                                        </tr>                                       
                                    </tbody>
                                </table>
                                <div class="col-sm-3 btn-group" role="group">
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#pickup">Pickup Order</button>
                                    <button class="btn btn-danger btn-sm ">Cancel Order</button>
                                </div>
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
                                <li class="breadcrumb-item"><a href="_index.html"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#request">Request Table</a></li>
                                <li class="breadcrumb-item"><a href="#onprocess">On-Process Table</a></li>
                                <li class="breadcrumb-item active">On-Pickup</li>
                                <li class="breadcrumb-item"><a href="#history">History Table</a></li>
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
                                            <th><small>Short/Pants Size</small></th>
                                            <th><small>P.E. Instructor</small></th>
                                            <th><small>Sched. of Pick-up</small></th>
                                            <th><small>Reschedule Request</small></th>
                                            <th><small>Reason</small></th>
                                            <th><small>Selected</small></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th><small>Name</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Gender</small></th>
                                            <th><small>Variation</small></th>
                                            <th><small>T-Shirt Size</small></th>
                                            <th><small>Short/Pants Size</small></th>
                                            <th><small>P.E. Instructor</small></th>
                                            <th><small>Sched. of Pick-up</small></th>
                                            <th><small>Reschedule Request</small></th>
                                            <th><small>Reason</small></th>
                                            <th><small>Selected</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Rhona Davidson</td>
                                            <td>COET</td>
                                            <td>Female</td>
                                            <td>PE 2</td>
                                            <td>Medium</td>
                                            <td>Small</td>
                                            <td>Janlee</td>
                                            <td>08/13/2022 / 9:00AM</td>
                                            <td>No</td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">                                      
                                                    <button class="btn btn-info btn-sm " data-toggle="modal" data-target="#reason" disabled>Info</button>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="check-tab1"></td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>COET</td>
                                            <td>Female</td>
                                            <td>PE 2</td>
                                            <td>Small</td>
                                            <td>Small</td>
                                            <td>Janlee</td>
                                            <td>08/13/2022 / 9:00AM</td>
                                            <td>Yes</td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">                                      
                                                    <button class="btn btn-info btn-sm " data-toggle="modal" data-target="#reason">Info</button>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="check-tab1"></td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Colleen Hurst</td>
                                            <td>COET</td>
                                            <td>Female</td>
                                            <td>PE 2</td>
                                            <td>Medium</td>
                                            <td>Large</td>
                                            <td>Janlee</td>
                                            <td>08/13/2022 / 9:00AM</td>
                                            <td>No</td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">                                      
                                                    <button class="btn btn-info btn-sm " data-toggle="modal" data-target="#reason" disabled>Info</button>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="check-tab1"></td>
                                            </td>
                                        </tr>                                       
                                    </tbody>
                                </table>
                                <div class="col-sm-3 btn-group" role="group">
                                    <button class="btn btn-success btn-sm">Received</button>
                                    <button class="btn btn-info btn-sm " data-toggle="modal" data-target="#resched">Reschedule</button>
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
                                <li class="breadcrumb-item"><a href="_index.html"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#request">Request Table</a></li>
                                <li class="breadcrumb-item"><a href="#onprocess">On-Process Table</a></li>
                                <li class="breadcrumb-item"><a href="#onpickup">On-Pickup</a></li>
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
                                            <th><small>Course</small></th>
                                            <th><small>Gender</small></th>
                                            <th><small>Variation</small></th>
                                            <th><small>T-Shirt Size</small></th>
                                            <th><small>Short/Pants Size</small></th>
                                            <th><small>P.E. Instructor</small></th>
                                            <th><small>Date Received/Cancelled</small></th>
                                            <th><small>Status</small></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th><small>Name</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Gender</small></th>
                                            <th><small>Variation</small></th>
                                            <th><small>T-Shirt Size</small></th>
                                            <th><small>Short/Pants Size</small></th>
                                            <th><small>P.E. Instructor</small></th>
                                            <th><small>Date Received/Cancelled</small></th>
                                            <th><small>Status</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Rhona Davidson</td>
                                            <td>COET</td>
                                            <td>Female</td>
                                            <td>PE 1</td>
                                            <td>Medium</td>
                                            <td>Small</td>
                                            <td>Janlee</td>
                                            <td>08/13/2022 / 9:00AM</td>
                                            <td class="text-success">Success</td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>COET</td>
                                            <td>Female</td>
                                            <td>PE 1</td>
                                            <td>Medium</td>
                                            <td>Small</td>
                                            <td>Janlee</td>
                                            <td>08/13/2022 / 9:00AM</td>
                                            <td class="text-danger">Cancelled</td>    
                                        </tr>
                                        <tr>
                                            <td>Colleen Hurst</td>
                                            <td>COET</td>
                                            <td>Female</td>
                                            <td>PE 1</td>
                                            <td>Medium</td>
                                            <td>Small</td>
                                            <td>Janlee</td>
                                            <td>08/13/2022 / 9:00AM</td>
                                            <td class="text-success">Success</td>
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

<!-- Modal for Accept -->
<div class="modal fade" id="accept" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Set Schedule for Payment</h4>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="modal-header">
                            <h6 class="title " style="text-align: center;">Requested By:</h6>
                        </div>
                        <div class="body">
                            <form name='myForm'>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="Brielle Williamson,Cedric Kelly,Tiger Nixon" data-role="tagsinput" disabled>
                                    </div>
                                </div>
                                <label id="approveschedd" for="approvesched">Set Date/Time for Student to Pay the Uniform</label>
                                <div name="approvesched" id="approvesched" class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                        </div>
                                        <input type="text" id="setdate" class="form-control datetimepicker" placeholder="Please choose date & time" required>
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

<!-- Modal for Pickup -->
<div class="modal fade" id="pickup" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Set Schedule for Pick up</h4>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="modal-header">
                            <h6 class="title " style="text-align: center;">Requested By:</h6>
                        </div>
                        <div class="body">
                            <form name='myForm'>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="Ashton Cox,Colleen Hurst,Rhona Davidson" data-role="tagsinput" disabled>
                                    </div>
                                </div>
                                <label id="approveschedd" for="approvesched">Set Appointment Date & Time for Student to pick up the uniform</label>
                                <div name="approvesched" id="approvesched" class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                        </div>
                                        <input type="text" id="setdate" class="form-control datetimepicker" placeholder="Please choose date & time" required>
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

<!-- Modal for Reschdule -->
<div class="modal fade" id="resched" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Reschedule for Pick up</h4>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="modal-header">
                            <h6 class="title " style="text-align: center;">Requested By:</h6>
                        </div>
                        <div class="body">
                            <form name='myForm'>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="Ashton Cox" data-role="tagsinput" disabled>
                                    </div>
                                </div>
                                <label id="approveschedd" for="approvesched">Set Appointment Date & Time for Student to pick up the uniform</label>
                                <div name="approvesched" id="approvesched" class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                        </div>
                                        <input type="text" id="setdate" class="form-control datetimepicker" placeholder="Please choose date & time" required>
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

<!-- Modal for modify -->
<div class="modal fade" id="modify" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Modify Order</h4>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="modal-header">
                            <h6 class="title " style="text-align: center;">Requested By: Firstname Lastname</h6>
                        </div>
                        <div class="body">
                            <form>
                                <label  for="stat">Current Status</label>
                                <div id="stat" name="stat" style="text-align: center;" class="alert alert-warning ">
                                    <strong >Unpaid</strong>
                                </div>
                                <label  for="status">Change Status</label>
                                <div class="mb-3">
                                    <select id="sta" class="form-control show-tick" onChange="update()">
                                        <option selected>Unpaid</option>
                                        <option>Paid</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label for="user">Variation</label>
                                            <select id="var" class="form-control show-tick">
                                                <option selected>PE 1</option>
                                                <option>PE 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label for="change">T-shirt Size</label>
                                            <select id="size1" class="form-control show-tick">
                                                <option selected>Small</option>
                                                <option>Medium</option>
                                                <option>Large</option>
                                            </select>
                                        </div>
                                    </div>       
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label for="change">Short/Pants Size</label>
                                            <select id="size2" class="form-control show-tick">
                                                <option selected>Small</option>
                                                <option>Medium</option>
                                                <option>Large</option>
                                            </select>
                                        </div>
                                    </div>                      
                                </div>      
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-success btn-round waves-effect">Save Changes</button>
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

<!-- Modal for reschdule reason -->
<div class="modal fade" id="reason" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Reschdule Request Info</h4>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="modal-header">
                            <h6 class="title " style="text-align: center;">Requested By: Firstname Lastname</h6>
                        </div>
                        <div class="body">
                            <form>
                                <label  for="stat">Current Status</label>
                                <div id="stat" name="stat" style="text-align: center;" class="alert alert-info ">
                                    <strong >Request for Reschedule</strong>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label  for="reas">Students Reason:</label>
                                            <div class="form-line">
                                                <textarea name="reas" rows="4" class="form-control no-resize" readonly>I have emergency sir</textarea>
                                            </div>
                                        </div>
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


<script type="text/javascript">
    function update() {
        var select = document.getElementById('sta');
        var option = select.options[select.selectedIndex];
        if (option.text == "Paid") {
            document.getElementById('stat').classList = 'alert alert-success';
    }   else {
        document.getElementById('stat').classList = 'alert alert-warning';
    }   

        document.getElementById('stat').innerHTML = option.text;
    }

    update();
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
</body>

</html>