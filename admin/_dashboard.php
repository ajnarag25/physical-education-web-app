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
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/style.min.css">
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
            <li class="active open"><a href="_dashboard.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="_reservation.php"><i class="zmdi zmdi-calendar"></i><span>Reservation <span id="no_number_reserve">0</span></span></a></li>
            <li><a href="_uniform.php"><i class="zmdi zmdi-shopping-cart"></i><span>Uniform <span id="no_number_inquire">0</span></span></a></li>
            <li><a href="_basketball.php"><i class="zmdi zmdi-chart-donut"></i><span>Sports Equipment</span></a></li> 
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
                    <h2>Welcome to P.E. Department Admin Site</h2>
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
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon zmdi-calendar">
                        <div class="body">
                            <h6>Facility Reservation <br><small>(P.E. Dept. Facilities)</small></h6>
                            <?php 
                                $query = "SELECT * FROM reserve WHERE status='PENDING'";
                                $result = mysqli_query($conn, $query);
                                $row_reserve_1 = mysqli_num_rows($result);
                            ?>
                            <h2><?php echo $row_reserve_1; ?> <small class="info">Request/s</small></h2>
                            <?php 
                                $query = "SELECT * FROM reserve WHERE status='PENDING'";
                                $result = mysqli_query($conn, $query);
                                $row_reserve_2 = mysqli_num_rows($result);
                            ?>
                            <small>Pending: <?php echo $row_reserve_2; ?></small>
                            <div class="progress">
                                <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row_reserve_1?>%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon sales">
                        <div class="body">
                            <h6>Uniform Inquiries <br><small>(P.E. Uniform)</small></h6>
                            <?php 
                                $query = "SELECT * FROM inquire WHERE status='PENDING'";
                                $result = mysqli_query($conn, $query);
                                $row_inquire_1 = mysqli_num_rows($result);
                            ?>
                            <h2><?php echo $row_inquire_1; ?> <small class="info">Request/s</small></h2>
                            <?php 
                                $query = "SELECT * FROM inquire WHERE status='PENDING'";
                                $result = mysqli_query($conn, $query);
                                $row_inquire_2 = mysqli_num_rows($result);
                            ?>
                            <small>Pending: <?php echo $row_inquire_2; ?></small>
                            <div class="progress">
                                <div class="progress-bar l-blue" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row_inquire_1?>%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon zmdi-star-circle">
                        <div class="body">
                            <h6>Borrow Ball <br><small>(Basketball)</small></h6>
                            <?php 
                                //count all unreturned users for equipment basketball
                                $query_unret_basketball = "SELECT * FROM borrowing_machine_info WHERE equipment = 'basketball' AND status = 'UNRETURNED'";
                                $result_unret_basketball = mysqli_query($conn, $query_unret_basketball);
                                $row_result_unret_basketball = mysqli_num_rows($result_unret_basketball);
                                
                                //count all unreturned users for equipment volleyball
                                $query_unret_volleyball = "SELECT * FROM borrowing_machine_info WHERE equipment = 'volleyball' AND status = 'UNRETURNED'";
                                $result_unret_volleyball = mysqli_query($conn, $query_unret_volleyball);
                                $row_result_unret_volleyball = mysqli_num_rows($result_unret_volleyball);


                                //how many basketball inside the machine
                                $query_cnt_basketball = "SELECT * from ball_sequence where basketball != ''";
                                $result_cnt_baskeball = mysqli_query($conn, $query_cnt_basketball);
                                $row_cnt_basketball =mysqli_num_rows($result_cnt_baskeball);
                                

                                //how many volleyball inside the machine
                                $query_cnt_volleyball = "SELECT * from ball_sequence where volleyball != ''";
                                $result_cnt_volleyball = mysqli_query($conn, $query_cnt_volleyball);
                                $row_cnt_volleyball =mysqli_num_rows($result_cnt_volleyball);
                            ?>


                            <h2><?php echo $row_result_unret_basketball; ?> <small class="info">Unreturned</small></h2>
                            <small>Remaining Ball in the Machine: <?php echo $row_cnt_basketball?></small>
                            <div class="progress">
                                <?php
                                if ($row_cnt_basketball == 3) {
                                ?>
                                <div class="progress-bar l-purple" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                <?php
                                }elseif ($row_cnt_basketball == 2) {
                                ?>
                                <div class="progress-bar l-purple" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: 66%;"></div>
                                <?php
                                }elseif ($row_cnt_basketball == 1) {
                                ?>
                                <div class="progress-bar l-purple" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: 33%;"></div>
                                <?php
                                }elseif($row_cnt_basketball ==0){
                                ?>
                                <div class="progress-bar l-purple" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: 1%;"></div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon zmdi-star-circle">
                        <div class="body">
                            <h6>Borrow Ball <br><small>(Volleyball)</small></h6>
                            <h2><?php echo $row_result_unret_volleyball; ?> <small class="info">Unreturned</small></h2>
                            <small>Remaining Ball in the Machine: <?php echo $row_cnt_volleyball?></small>
                            <div class="progress">
                            <?php
                                if ($row_cnt_volleyball == 3) {
                                ?>
                                <div class="progress-bar l-green" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                <?php
                                }elseif ($row_cnt_volleyball == 2) {
                                ?>
                                <div class="progress-bar l-green" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: 66%;"></div>
                                <?php
                                }elseif ($row_cnt_volleyball == 1) {
                                ?>
                                <div class="progress-bar l-green" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: 33%;"></div>
                                <?php
                                }elseif($row_cnt_volleyball ==0){
                                ?>
                                <div class="progress-bar l-green" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: 1%;"></div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2">
                        <div class="body">
                            <h6>Table Tennis Ball Status <br></h6>
                            <?php 
                                $query = "SELECT is_emptyy FROM ping_pong_stat WHERE id='1'";
                                $result = mysqli_query($conn, $query);
                                $statt = mysqli_fetch_array($result);
                            ?>
                            <?php
                            if($statt['is_emptyy'] == 1){

                            ?>
                            <h3 style = "color : red;">Empty</h3>
                            <?php
                            } else{
                            ?>
                            <h3 style = "color : green;">Not Empty</h3>
                            <?php
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            
                            <h2><strong>Pending</strong> Uniform Orders</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover c_table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Item</th>
                                        <th>Request Date</th>
                                        <th>P.E Teacher</th>   
                                        <th>Size of T-shirt</th>   
                                        <th>Size of Shorts</th>   
                                        <th>Size of Joggingpants</th>                                    
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $query = "SELECT * FROM inquire WHERE status='PENDING'";
                                    $result = mysqli_query($conn, $query);
                                    $check_row = mysqli_num_rows($result);
                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><img src="../<?php echo $row['image'] ?>" width="40" alt=""> </td>
                                        <td><?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></td>
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
                                        <td><?php echo $row['date'] ?></td>
                                        <td><?php echo $row['teacher'] ?></td>
                                        <td><?php echo $row['size_t'] ?></td>
                                        <td><?php echo $row['size_s'] ?></td>
                                        <td><?php echo $row['size_j'] ?></td>
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

                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            
                            <h2><strong>Pending</strong> Reservation of Facility</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover c_table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Req. Date/Time</th>
                                        <th>Venue</th>
                                        <th>Purpose</th>
                                        <th>Participants</th>                             
                                        <th>Status</th>
                                    </tr>
                                </thead>
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

                                <?php }?>
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
<script src=""></script>

<script src="assets/js/pages/calendar/calendar.js"></script>
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
</body>

</html>