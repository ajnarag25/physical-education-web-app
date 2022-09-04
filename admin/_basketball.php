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
                    <a class="image" href="_profile.html"><img src="assets/images/tuplogo.png" alt="User"></a>
                    <div class="detail">
                        <h4><?php echo $_SESSION['get_data']['firstname'] ?></h4>
                        <small>Administrator</small>                        
                    </div>
                </div>
            </li>
            <li><a href="_dashboard.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="_reservation.php"><i class="zmdi zmdi-calendar"></i><span>Reservation of Facility</span></a></li>
            <li><a href="_uniform.php"><i class="zmdi zmdi-shopping-cart"></i><span>Uniform Inquiries</span></a></li>
            <li class="active open"><a href="_basketball.php"><i class="zmdi zmdi-chart-donut"></i><span>Sports Equipment</span></a></li> 
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
    <div class="body_scroll" id="bv">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-8 col-md-4 col-sm-11">
                    <h2>Welcome to P.E. Department Admin Site</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="_index.html"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Basketball & Volleyball Table</li>
                        <li class="breadcrumb-item"><a href="#history">History Table</a></li>
                        <li class="breadcrumb-item"><a href="#report">Report Table</a></li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col centerr">
                        <h5>Basketball Position in the Machine</h5>
                        <button class="btn btn-danger btn-sm btn-circle btn-xl" ></button>
                        <button class="btn btn-danger btn-sm btn-circle btn-xl" ></button>
                        <button class="btn btn-success btn-sm btn-circle btn-xl" >B3</button>
                    </div>
                    <div class="col centerr">
                        <button class="btn btn-success btn-sm btn-circle btn-xl" >B2</button>
                        <button class="btn btn-success btn-sm btn-circle btn-xl" >B3</button>
                        <button class="btn btn-danger btn-sm btn-circle btn-xl" ></button>
                        <h5>Volleyball Position in the Machine</h5>
                    </div>
                </div>
            </div>
            <!-- Unreturned Table Basketball -->
            <div class="row clearfix" id="">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Unreturned</strong> Table (Basketball)</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" style="text-align: center;">
                                <table class="table table-bordered table-hover dataTable js-exportable table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><small>Borrowed Time</small></th>
                                            <th><small>Borrowed Date</small></th>
                                            <th><small>Name</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Ball Number</small></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th><small>Borrowed Time</small></th>
                                            <th><small>Borrowed Date</small></th>
                                            <th><small>Name</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Ball Number</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>07:00AM</td>
                                            <td>08/13/2022</td>                                           
                                            <td>Ashton Cox</td>
                                            <td>COET</td>                               
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>08:00AM</td>
                                            <td>08/13/2022</td>                               
                                            <td>Rhona Davidson</td>
                                            <td>COET</td>                                           
                                            <td>2</td>
                                        </tr>                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Unreturned Table Volleyball -->
            <div class="row clearfix" id="">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Unreturned</strong> Table (Volleyball)</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" style="text-align: center;">
                                <table class="table table-bordered table-hover dataTable js-exportable table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><small>Borrowed Time</small></th>
                                            <th><small>Borrowed Date</small></th>
                                            <th><small>Name</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Ball Number</small></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th><small>Borrowed Time</small></th>
                                            <th><small>Borrowed Date</small></th>
                                            <th><small>Name</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Ball Number</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>07:00AM</td>
                                            <td>08/13/2022</td>                                           
                                            <td>Ashton Cox</td>
                                            <td>COET</td>                               
                                            <td>1</td>
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
                                <li class="breadcrumb-item"><a href="#bv">Basketball & Volleyball Table</a></li>
                                <li class="breadcrumb-item active">History Table</li>
                                <li class="breadcrumb-item"><a href="#report">Report Table</a></li>
                            </ul>
                            <h2><strong>History</strong> Table </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" style="text-align: center;">
                                <table class="table table-bordered table-hover dataTable js-exportable table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><small>Returned Time</small></th>
                                            <th><small>Returned Date</small></th>
                                            <th><small>Name</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Borrowed Date</small></th>
                                            <th><small>Borrowed Time</small></th>
                                            <th><small>Borrowed Item</small></th>
                                            <th><small>Ball Number</small></th>
                                            <th><small>Report</small></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th><small>Returned Time</small></th>
                                            <th><small>Returned Date</small></th>
                                            <th><small>Name</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Borrowed Date</small></th>
                                            <th><small>Borrowed Time</small></th>
                                            <th><small>Borrowed Item</small></th>
                                            <th><small>Ball Number</small></th>
                                            <th><small>Report</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>08:00AM</td>
                                            <td>08/12/2022</td>
                                            <td>Rhona Davidson</td>
                                            <td>COET</td>
                                            <td>08/12/2022</td>
                                            <td>07:00AM</td>
                                            <td>Volleyball</td>
                                            <td>1</td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">
                                                    <button class="btn btn-danger btn-sm " data-toggle="modal" data-target="#reportt">Report</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>09:00AM</td> 
                                            <td>08/12/2022</td>                                          
                                            <td>Ashton Cox</td>
                                            <td>COET</td>
                                            <td>08/12/2022</td>
                                            <td>08:00AM</td>
                                            <td>Volleyball</td>
                                            <td>2</td>
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">
                                                    <button class="btn btn-danger btn-sm " data-toggle="modal" data-target="#reportt">Report</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>10:00AM</td>
                                            <td>08/12/2022</td>
                                            <td>Colleen Hurst</td>
                                            <td>COET</td>
                                            <td>08/12/2022</td>
                                            <td>09:00AM</td>
                                            <td>Volleyball</td>
                                            <td>3</td>     
                                            <td>
                                                <div class="col-sm-12 btn-group" role="group">
                                                    <button class="btn btn-danger btn-sm " data-toggle="modal" data-target="#reportt">Report</button>
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

            <!-- Reported Table -->
            <div class="row clearfix" id="report">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="_index.html"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#bv">Basketball & Volleyball Table</a></li>
                                <li class="breadcrumb-item"><a href="#history">History Table</a></li>
                                <li class="breadcrumb-item active">Report Table</li>
                            </ul>
                            <h2><strong>Reported</strong> Table </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" style="text-align: center;">
                                <table class="table table-bordered table-hover dataTable js-exportable table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><small>Returned Time</small></th>
                                            <th><small>Returned Date</small></th>
                                            <th><small>Name</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Borrowed Date</small></th>
                                            <th><small>Borrowed Time</small></th>
                                            <th><small>Borrowed Item</small></th>
                                            <th><small>Reason</small></th>
                                            <th><small>Status</small></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th><small>Returned Time</small></th>
                                            <th><small>Returned Date</small></th>
                                            <th><small>Name</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Borrowed Date</small></th>
                                            <th><small>Borrowed Time</small></th>
                                            <th><small>Borrowed Item</small></th>
                                            <th><small>Reason</small></th>
                                            <th><small>Status</small></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>08:00AM</td>
                                            <td>08/12/2022</td>
                                            <td>Rhona Davidson</td>
                                            <td>COET</td>
                                            <td>08/12/2022</td>
                                            <td>07:00AM</td>
                                            <td>Volleyball</td>
                                            <td>Nabutas yung bola</td>
                                            <td class="text-success">Done</td>
                                        </tr>
                                        <tr>
                                            <td>09:00AM</td> 
                                            <td>08/12/2022</td>                                          
                                            <td>Ashton Cox</td>
                                            <td>COET</td>
                                            <td>08/12/2022</td>
                                            <td>08:00AM</td>
                                            <td>Volleyball</td>
                                            <td>Nawala yung bola</td>
                                            <td class="text-warning">Pending</td>
                                        </tr>
                                        <tr>
                                            <td>10:00AM</td>
                                            <td>08/12/2022</td>
                                            <td>Colleen Hurst</td>
                                            <td>COET</td>
                                            <td>08/12/2022</td>
                                            <td>09:00AM</td>
                                            <td>Basketball</td> 
                                            <td>Pinalitan yung bola</td> 
                                            <td class="text-success">Done</td>                          
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

<!-- Modal for modify -->
<div class="modal fade" id="reportt" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Report Student</h4>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form> 
                                <label id="reasonlabel" for="reason">Reason for Reporting:</label>
                                <div class="form-group">
                                    <textarea name="reason" rows="4" class="form-control no-resize" required>Please Enter something ...</textarea>
                                </div>
                                <label for="name">Action by:</label>
                                <div class="form-group">                                
                                    <input type="text" id="name" class="form-control" placeholder="Enter your name" required>
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
<style type="text/css">
    .btn-circle.btn-xl {
        width: 70px;
        height: 70px;
        padding: 10px 16px;
        border-radius: 35px;
        font-size: 12px;
        text-align: center;
    }
 
    .centerr {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 200px;
    text-align: center;
    }

</style>

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