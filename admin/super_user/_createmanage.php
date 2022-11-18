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
                    <small>Superuser</small>                        
                </div>
            </li>
            <li><a href="index.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li class="active open"><a href="_createmanage.php"><i class="zmdi zmdi-accounts"></i><span>Create & Manage Accounts</span></a></li>
            <li><a href="_verifyunverify.php"><i class="zmdi zmdi-chart-donut"></i><span>Verify & Unverified Accounts</span></a></li> 
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
                        <li class="breadcrumb-item"><a href="_index.php"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card mcard_3">
                <div class="body">

                    <img src="default_profile/default_pic.png" class="rounded-circle shadow" width="100" height="100" alt="profile-image">
  
                    <h4 class="m-t-10">Add New Personnel Account</h4>   
                    <button id="changepic" class="btn btn-primary" data-toggle="modal" data-target="#addPersonnel">Add <i class="zmdi zmdi-plus"></i></button>                     
                    <!-- Modal for Add Personnel -->
                    <div class="modal fade" id="addPersonnel" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="title" id="largeModalLabel">Add Personnel Account</h4>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="modal-header">
                                                <h6 class="title " style="text-align: center;">Create Account</h6>
                                            </div>
                                            <br>
                                            <div class="body">
                                            <form action="../../functions.php" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="inputFirst" class="form-label">First name</label>
                                                        <input type="text" class="form-control" id="inputFirst" onkeyup="lettersOnly(this)" name="firstname" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="inputMiddle" class="form-label">Middle name</label>
                                                        <input type="text" class="form-control" id="inputMiddle" onkeyup="lettersOnly(this)" name="middlename" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="inputLast" class="form-label">Last name</label>
                                                        <input type="text" class="form-control" id="inputLast" onkeyup="lettersOnly(this)" name="lastname" required>
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
                                                        <label for="inputImage" class="form-label">Gender</label>
                                                        <br>
                                                        <select name="gender" class="form-select w-100" id="" required>
                                                            <option value="" selected disabled>Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="inputDepartment" class="form-label">Department</label>
                                                        <br>
                                                        <select name="department" class="form-select w-100" id="" required>
                                                            <option value="" selected disabled>Select Department</option>
                                                            <option value="OAA">Office of Academic Affair (OAA)</option>
                                                            <option value="DIT">Department of Information Technology (DIT)</option>
                                                            <option value="DLA">Department of Liberal Arts (DLA)</option>
                                                            <option value="OCL">Office of Campus Library (OCL)</option>
                                                            <option value="DMS">Department of Mathematics and Science (DMS)</option>
                                                            <option value="DOE">Department of Engineering (DOE)</option>
                                                            <option value="DED">Department of Education (DED)</option>
                                                            <option value="OSA">Office of Student Affairs (OSA)</option>
                                                            <option value="UITC">University Information Technology Center (UITC)</option>
                                                            <option value="DPE">Department of Physical Education (DPE)</option>
                                                            <option value="SD">Security Department (SD)</option>
                                                            <option value="RE">Office of Research & Extension (ORE)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                           
                                                      
                                               <div class="row">
                                                    <div class="col-md-6">
                                                        <center>
                                                        <img id="frame_1" src="default_profile/dafauta.jpg" width="100px" height="100px"/>
                                                        </center>
                                                        
                                                        <label for="inputImage" class="form-label">Upload image for your profile pic</label>
                                                        <input class="form-control" name="profile_pic" type="file" accept="image/png, image/jpeg" onchange="preview()" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="inputPass1" class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="inputPass1" name="password1" required>
                                                        <br>
                                                        <label for="inputPass2" class="form-label">Retype Password</label>
                                                        <input type="password" class="form-control" id="inputPass2" name="password2" required>
                                                    </div>
                                               </div>
                                              
                                                <br>
                                                <div class="text-center">
                                                    <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <input type="hidden" name="user_personnel" value="Teacher">
                                                    <button type="submit" class="btn btn-danger" name="addPersonnel">Add Personnel</button>
                                                </div>


                                            </form>

                                            </div>
                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            
                            <h2><strong>Student</strong> Accounts</h2>
                        </div>
                        <div class="table-responsive" style="text-align: center;">
                            <table class="table table-hover js-basic-example dataTable table-sm " id="table1">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Gender</th>
                                        <th>Course</th>   
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM registration WHERE users='Student'";
                                        $result = mysqli_query($conn, $query);
                                        $check_row = mysqli_num_rows($result);
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><img src="../../<?php echo $row['image'] ?>" width="50px" alt=""></td>
                                        <td><?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></td>
                                        <td><?php echo $row['contact'] ?></td>
                                        <td><?php echo $row['gender'] ?></td>
                                        <td><?php echo $row['course'] ?></td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $row['id'] ?>"><i class="zmdi zmdi-edit"></i> </button>
                                             <!-- Modal for Edit -->
                                             <div class="modal fade" id="edit<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="largeModalLabel">Edit Credentials</h4>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="card">
                                                                    <form action="functions.php" method="POST">
                                                                        <div class="modal-header">
                                                                            <h6 class="title " style="text-align: center;">Edit Credentials of Student: <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h6>
                                                                        </div>
                                                                        <br>
                                                                        <div class="body">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <label for="inputFirst" class="form-label">First name</label>
                                                                                    <input type="text" class="form-control" id="inputFirst" onkeyup="lettersOnly(this)" value="<?php echo $row['firstname'] ?>" name="firstname" required>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="inputMiddle" class="form-label">Middle name</label>
                                                                                    <input type="text" class="form-control" id="inputMiddle" onkeyup="lettersOnly(this)" value="<?php echo $row['middlename'] ?>" name="middlename" required>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="inputLast" class="form-label">Last name</label>
                                                                                    <input type="text" class="form-control" id="inputLast" onkeyup="lettersOnly(this)" value="<?php echo $row['lastname'] ?>" name="lastname" required>
                                                                                </div>
                                                                            </div> 
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label for="inputEmail" class="form-label">Email</label>
                                                                                    <input type="text" class="form-control" id="inputEmail" value="<?php echo $row['email'] ?>" name="email" required>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="inputContact" class="form-label">Contact No.</label>
                                                                                    <input type="text" class="form-control" id="inputContact" value="<?php echo $row['contact'] ?>" name="contact" required>
                                                                                </div>
                                                                            </div> 
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label for="inputImage" class="form-label">Gender</label>
                                                                                    <br>
                                                                                    <select name="gender" class="form-select w-100" id="" required>
                                                                                        <option value="<?php echo $row['gender'] ?>" selected readonly><?php echo $row['gender'] ?></option>
                                                                                        <option value="Male">Male</option>
                                                                                        <option value="Female">Female</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="inputCourse" class="form-label">Course</label>
                                                                                    <br>
                                                                                    <select name="course" class="form-select w-100" id="" required>
                                                                                        <option value="<?php echo $row['course'] ?>" selected><?php echo $row['course'] ?></option>
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
                                                                            </div>
                                                                            <br><br>
                                                                            <div class="text-center">
                                                                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <input type="hidden" name="id_student" value="<?php echo $row['id'] ?>">
                                                                                <button type="submit" class="btn btn-danger" name="update_student">Update</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $row['id'] ?>"><i class="zmdi zmdi-close"></i>  </button>
                                             <!-- Modal for Delete -->
                                             <div class="modal fade" id="delete<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Delete Account</h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <br>
                                                                        <form action="functions.php" method="POST">
                                                                            <div class="body">
                                                                                <h3>Deleting Account of : <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h3>
                                                                                <p><i class="zmdi zmdi-alert-circle infinite pulse" style="color:red"></i> This Action is Irrevesible! <br> If you delete this account, all the transactions contained in this account will be deleted.</p>
                                        
                                                                                <div class="modal-footer">
                                                                                    <input type="hidden" name="id_decline" value="<?php echo $row['id'] ?>">
                                                                                    <input type="hidden" name="email_set_decline" value="<?php echo $row['email'] ?>">
                                                                                    <button type="submit" class="btn btn-outline-danger btn-round waves-effect" name="set_del_account">Delete Account</button>
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
                            
                            <h2><strong>Personnel</strong> Accounts</h2>
                        </div>
                        <div class="table-responsive" style="text-align: center;">
                            <table class="table table-hover js-basic-example dataTable table-sm " id="table1">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Gender</th>
                                        <th>Department</th>   
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM registration WHERE users='Teacher'";
                                        $result = mysqli_query($conn, $query);
                                        $check_row = mysqli_num_rows($result);
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><img src="../../<?php echo $row['image'] ?>" width="50px" alt=""></td>
                                        <td><?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></td>
                                        <td><?php echo $row['contact'] ?></td>
                                        <td><?php echo $row['gender'] ?></td>
                                        <td><?php echo $row['department'] ?></td>
                                        <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $row['id'] ?>"><i class="zmdi zmdi-edit"></i> </button>
                                             <!-- Modal for Edit -->
                                             <div class="modal fade" id="edit<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="largeModalLabel">Edit Credentials</h4>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="card">
                                                                    <form action="functions.php" method="POST">
                                                                        <div class="modal-header">
                                                                            <h6 class="title " style="text-align: center;">Edit Credentials of Personnel: <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h6>
                                                                        </div>
                                                                        <br>
                                                                        <div class="body">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <label for="inputFirst" class="form-label">First name</label>
                                                                                    <input type="text" class="form-control" id="inputFirst" onkeyup="lettersOnly(this)" value="<?php echo $row['firstname'] ?>" name="firstname" required>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="inputMiddle" class="form-label">Middle name</label>
                                                                                    <input type="text" class="form-control" id="inputMiddle" onkeyup="lettersOnly(this)" value="<?php echo $row['middlename'] ?>" name="middlename" required>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="inputLast" class="form-label">Last name</label>
                                                                                    <input type="text" class="form-control" id="inputLast" onkeyup="lettersOnly(this)" value="<?php echo $row['lastname'] ?>" name="lastname" required>
                                                                                </div>
                                                                            </div> 
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label for="inputEmail" class="form-label">Email</label>
                                                                                    <input type="text" class="form-control" id="inputEmail" value="<?php echo $row['email'] ?>" name="email" required>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="inputContact" class="form-label">Contact No.</label>
                                                                                    <input type="text" class="form-control" id="inputContact" value="<?php echo $row['contact'] ?>" name="contact" required>
                                                                                </div>
                                                                            </div> 
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label for="inputImage" class="form-label">Gender</label>
                                                                                    <br>
                                                                                    <select name="gender" class="form-select w-100" id="" required>
                                                                                        <option value="<?php echo $row['gender'] ?>" selected readonly><?php echo $row['gender'] ?></option>
                                                                                        <option value="Male">Male</option>
                                                                                        <option value="Female">Female</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="inputDepartment" class="form-label">Department</label>
                                                                                    <br>
                                                                                    <select name="department" class="form-select w-100" id="" required>
                                                                                        <option value="<?php echo $row['department'] ?>" selected><?php echo $row['department'] ?></option>
                                                                                        <option value="OAA">Office of Academic Affair (OAA)</option>
                                                                                        <option value="DIT">Department of Information Technology (DIT)</option>
                                                                                        <option value="DLA">Department of Liberal Arts (DLA)</option>
                                                                                        <option value="OCL">Office of Campus Library (OCL)</option>
                                                                                        <option value="DMS">Department of Mathematics and Science (DMS)</option>
                                                                                        <option value="DOE">Department of Engineering (DOE)</option>
                                                                                        <option value="DED">Department of Education (DED)</option>
                                                                                        <option value="OSA">Office of Student Affairs (OSA)</option>
                                                                                        <option value="UITC">University Information Technology Center (UITC)</option>
                                                                                        <option value="DPE">Department of Physical Education (DPE)</option>
                                                                                        <option value="SD">Security Department (SD)</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <br><br>
                                                                            <div class="text-center">
                                                                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <input type="hidden" name="id_personnel" value="<?php echo $row['id'] ?>">
                                                                                <button type="submit" class="btn btn-danger" name="update_personnel">Update</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $row['id'] ?>"><i class="zmdi zmdi-close"></i>  </button>
                                             <!-- Modal for Delete -->
                                             <div class="modal fade" id="delete<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="title" id="largeModalLabel">Delete Account</h4>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card">
                                                                        <br>
                                                                        <form action="functions.php" method="POST">
                                                                            <div class="body">
                                                                                <h3>Deleting Account of : <?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h3>
                                                                                <p><i class="zmdi zmdi-alert-circle infinite pulse" style="color:red"></i> This Action is Irrevesible! <br> If you delete this account, all the transactions contained in this account will be deleted.</p>
                                        
                                                                                <div class="modal-footer">
                                                                                    <input type="hidden" name="id_decline" value="<?php echo $row['id'] ?>">
                                                                                    <input type="hidden" name="email_set_decline" value="<?php echo $row['email'] ?>">
                                                                                    <button type="submit" class="btn btn-outline-danger btn-round waves-effect" name="set_del_account">Delete Account</button>
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
                            
                            <h2><strong>Administrator</strong> Accounts</h2>
                        </div>
                        <div class="table-responsive" style="text-align: center;">
                            <table class="table table-hover js-basic-example dataTable table-sm " id="table1">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM admin";
                                        $result = mysqli_query($conn, $query);
                                        $check_row = mysqli_num_rows($result);
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><img src="../<?php echo $row['image'] ?>" width="50px" alt=""></td>
                                        <td><?php echo $row['firstname'] ?>  <?php echo $row['lastname'] ?></td>
                                        <td><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td></td>
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
<script>
    function preview() {
        frame_1.src=URL.createObjectURL(event.target.files[0]);
    }
</script>
    <!----ENDING NG GINAWA KO SA JS PART-------->
<script>
    function lettersOnly(input) {
        var regex = /[^a-z]/gi;
        input.value = input.value.replace(regex, "");
    }
</script>
<script>
    $("input[id='inputContact']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });
</script> 
</body>

</html>