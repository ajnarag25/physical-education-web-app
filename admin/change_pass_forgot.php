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

<title>P.E Department Admin Site</title>
<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Custom Css -->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.min.css">    
</head>

<body class="theme-blush">

<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <form class="card auth_form" action="functions.php" method="POST">
                    <div class="header">
                        <img class="logo" src="assets/images/tuplogo.png" alt="">
                        <h4 class="text-center mb-4">Change Password</h4>
                    </div>
                    <div class="body">
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="newpass1" placeholder="New Password" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="newpass2" placeholder="Retype New Password" required>
                            <div class="input-group-append">                                
                                <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            </div>                            
                        </div>
                        <button type="submit" class="btn btn-primary w-100" name="change_pass">Submit</button>     
                                        
                        <a href="index.php" class="btn btn-primary w-100" name="">Back</a>                     
                        <!-- <div class="signin_with mt-3">
                            <a href="javascript:void(0);" class="link">Need Help?</a>
                        </div> -->
                    </div>
                </form>
                <div class="copyright text-center">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>,
                    <span><a href="https://www.tupcavite.edu.ph/" target="_blank">Technological University of the Philippines - Cavite</a></span>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="assets/images/signin.svg" alt="Forgot Password"/>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
</body>


</html>