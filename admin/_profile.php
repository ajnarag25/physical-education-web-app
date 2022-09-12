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
<link rel="stylesheet" href="assets/plugins/dropify/css/dropify.min.css">
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
            <li><a href="_reservation.php"><i class="zmdi zmdi-calendar"></i><span>Reservation of Facility</span></a></li>
            <li><a href="_uniform.php"><i class="zmdi zmdi-shopping-cart"></i><span>Uniform Inquiries</span></a></li>
            <li><a href="_basketball.php"><i class="zmdi zmdi-chart-donut"></i><span>Sports Equipment</span></a></li> 
            <li class="active open"><a href="_profile.php"><i class="zmdi zmdi-account-circle"></i><span>My Profile</span></a></li>
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
    <div class="body_scroll" id="calendarr">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-8 col-md-4 col-sm-11">
                    <h2>Welcome to P.E. Department Admin Site</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="_index.html"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Account Settings</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card mcard_3">
                        <div class="body">
                            <?php 
                                $check_name =  $_SESSION['get_data']['firstname'];
                                $query = "SELECT * FROM admin WHERE firstname='$check_name'";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <a href="_profile.php"><img src="<?php echo $row['image'] ?>" class="rounded-circle shadow" width="150" height="150" alt="profile-image"></a>
                            <?php }; ?>
                            <h4 class="m-t-10"><?php echo $_SESSION['get_data']['firstname'] ?> <?php echo $_SESSION['get_data']['lastname'] ?></h4>   
                            <button id="changepic" class="btn btn-primary">Change Profile Picture</button>    
                            <form action="functions.php" method="POST" enctype="multipart/form-data">                    
                            <div id="uploadpic" class="row" hidden>
                                <div class="col-12">
                                    <label for="changepp"></label>
                                    <div class="body">
                                        <input id="getpic" type="file" name="admin_profile" accept="image/png, image/jpeg" class="dropify" required>
                                    </div>
                                </div>                     
                            </div>
                            <div id="savepic" class="col-12" hidden>
                                <input type="hidden" value="<?php echo $_SESSION['get_data']['id'] ?>" name="admin_id_img">
                                <button type="submit" id="getpic2" class="btn btn-primary" name="upload_admin_image">Save Changes</button>
                            </form> 
                                <button id="cancelpic" class="btn btn-secondary" >Cancel</button>
                            </div>    
                        </div>
                    </div>

                    <div class="card">
                        <form>
                            <div class="header">
                                <h2><strong>Account</strong> Settings</h2>
                            </div>
                            <div class="body">
                                <div class="col-lg-12">                
                                    <button type="button" id="edit" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-edit"></i></button>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label for="user">Current Username</label>
                                            <input name="user" type="text" class="form-control" value="Michael Narag" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label for="change">Change Username</label>
                                            <input id="usernew" name="change" type="text" class="form-control" placeholder="Enter new username" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button id="saveuser" type="submit" class="btn btn-primary" disabled>Save Changes</button>
                                        <button id="canceluser" class="btn btn-secondary" disabled>Cancel</button>
                                    </div>                                
                                </div>                              
                            </div>
                        </form>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h2><strong>Security</strong> Settings</h2>
                        </div>
                        <div class="body">
                            <div class="col-lg-12">                
                                <button id="edit2" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-edit"></i></button>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group" >
                                        <label for="user">Current Password</label>
                                        <input name="user" type="password" id="txtPassword" class="form-control" value="poginisean" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group" >
                                        <label for="change">Enter New Password</label>
                                        <input id="passnew" name="change" type="password" class="form-control" placeholder="Enter new password" readonly required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group" >
                                        <label for="change">Confirm New Password</label>
                                        <input id="confirmpassnew" name="change" type="password" class="form-control" placeholder="Enter confirm password" readonly required>

                                    </div>
                                </div>
                                 <div class="col-lg-4 col-md-12">
                                    <div class="checkbox">
                                        <input id="remember_me_2" type="checkbox" onclick="ShowPassword(this)" >
                                        <label for="remember_me_2">
                                                Show Password
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button id="savepass" class="btn btn-primary" disabled>Save Changes</button>
                                    <button id="cancelpass" class="btn btn-secondary" disabled>Cancel</button>
                                </div>                                
                            </div>                              
                        </div>
                    </div>

                    <div class="card">
                        <form>
                            <div class="header">
                                <h2><strong>Head Departments</strong> Settings</h2>
                            </div>
                            <div class="body">
                                <div class="col-lg-12">                
                                    <button type="button" id="edithead" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-edit"></i></button>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label for="user">Office of Student Affair</label>
                                            <input id="head1" name="user" type="text" class="form-control" value="Jane Doe" disabled required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label for="change">Department of Engineering Science</label>
                                            <input id="head2" name="change" type="text" class="form-control" value="Ann Whitaker" disabled required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label for="change">Department of Industrial Technology</label>
                                            <input id="head3" name="change" type="text" class="form-control" value="Lisa Hurley" disabled required>
                                        </div>
                                    </div>
                                    <div class="col-12 js-sweetalert">
                                        <button id="savehead" type="submit" class="btn btn-primary" data-type="success2" disabled>Save Changes</button>
                                        <button id="cancelhead" class="btn btn-secondary" disabled>Cancel</button>
                                    </div>                                
                                </div>                              
                            </div>
                        </form>
                    </div>

                    <div class="card">
                        <form>
                            <div class="header">
                                <h2><strong>Uniform Prices</strong> Settings</h2>
                            </div>
                            <div class="body">
                                <div class="col-lg-12">                
                                    <button type="button" id="editpe" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-edit"></i></button>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label for="user">PE 1 (in Pesos)</label>
                                            <input id="pe1" name="user" type="text" class="form-control" value="500" disabled required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label for="change">PE 2 (in Pesos)</label>
                                            <input id="pe2" name="change" type="text" class="form-control" value="550" disabled required>
                                        </div>
                                    </div>
                                    <div class="col-12 js-sweetalert">
                                        <button id="savepe" type="submit" class="btn btn-primary" data-type="success2" disabled>Save Changes</button>
                                        <button id="cancelpe" class="btn btn-secondary" disabled>Cancel</button>
                                    </div>                                
                                </div>                              
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>   
</section>
<script type="text/javascript">
    function ShowPassword(chkShowPassword) {
        //Reference the TextBox.
        var txtPassword = document.getElementById("txtPassword");
        var txtPassword1 = document.getElementById("passnew");
        var txtPassword2 = document.getElementById("confirmpassnew");

 
        //If CheckBox is Checked i.e. Password needs to be shown.
        if (chkShowPassword.checked) {
            txtPassword.setAttribute('TYPE', 'TEXT');

            txtPassword1.setAttribute('TYPE', 'TEXT');
      
            txtPassword2.setAttribute('TYPE', 'TEXT');
    
        } else {
            txtPassword.setAttribute('TYPE', 'PASSWORD');

            txtPassword1.setAttribute('TYPE', 'PASSWORD');
   
            txtPassword2.setAttribute('TYPE', 'PASSWORD');
   
        }
    };

    // Change Profile Pic DOM //
    document.getElementById('changepic').onclick = function(){
		document.getElementById('uploadpic').hidden = false;
        document.getElementById('savepic').hidden = false;
        document.getElementById('changepic').hidden = true;
	};  

    document.getElementById('getpic').onclick = function(){
		document.getElementById('getpic2').disabled = false;
	};

    document.getElementById('cancelpic').onclick = function(){
		document.getElementById('changepic').hidden = false;
        document.getElementById('savepic').hidden = true;
        document.getElementById('uploadpic').hidden = true;
        document.getElementById('getpic2').disabled = true;
	};

     // Change Username DOM //
    document.getElementById('edit').onclick = function(){
		document.getElementById('usernew').readOnly = false;
        document.getElementById('saveuser').disabled = false;
        document.getElementById('canceluser').disabled = false;
	};  

    document.getElementById('canceluser').onclick = function(){
		document.getElementById('usernew').readOnly = true;
        document.getElementById('usernew').value = "";
        document.getElementById('saveuser').disabled = true; 
        document.getElementById('canceluser').disabled = true;    
	}; 

    // Change Pass DOM //
    document.getElementById('edit2').onclick = function(){
        document.getElementById('passnew').readOnly = false;
        document.getElementById('confirmpassnew').readOnly = false;
        document.getElementById('savepass').disabled = false;
        document.getElementById('cancelpass').disabled = false;
	};  

    document.getElementById('cancelpass').onclick = function(){
        document.getElementById('passnew').readOnly = true;
        document.getElementById('passnew').value = "";
		document.getElementById('confirmpassnew').readOnly = true;
        document.getElementById('confirmpassnew').value = "";
        document.getElementById('savepass').disabled = true; 
        document.getElementById('cancelpass').disabled = true;    
	}; 

      // Change Head DOM //
      document.getElementById('edithead').onclick = function(){
        document.getElementById('head1').disabled = false;
        document.getElementById('head2').disabled = false;
        document.getElementById('head3').disabled = false;
        document.getElementById('savehead').disabled = false;
        document.getElementById('cancelhead').disabled = false;
	};  

    document.getElementById('cancelhead').onclick = function(){
		document.getElementById('head1').disabled = true;
        document.getElementById('head2').disabled = true;
        document.getElementById('head3').disabled = true;
        document.getElementById('savehead').disabled = true;
        document.getElementById('cancelhead').disabled = true;   
	}; 

    // Change P.E. Price DOM //
    document.getElementById('editpe').onclick = function(){
        document.getElementById('pe1').disabled = false;
        document.getElementById('pe2').disabled = false;
        document.getElementById('savepe').disabled = false;
        document.getElementById('cancelpe').disabled = false;
	};  

    document.getElementById('cancelpe').onclick = function(){
		document.getElementById('pe1').disabled = true;
        document.getElementById('pe2').disabled = true;
        document.getElementById('savepe').disabled = true;
        document.getElementById('cancelhead').disabled = true;   
	}; 

</script>


<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script>
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
<script src="assets/js/pages/forms/dropify.js"></script>
<script src="assets/plugins/dropify/js/dropify.min.js"></script>
</body>

</html>