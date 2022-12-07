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
                <form class="card auth_form" method="POST" action="functions.php"> 
                    <div class="header">
                        <img class="logo" src="assets/images/tuplogo.png" alt="">
                        <h5>Sign Up</h5>
                        <span>Admin Registration</span>
                    </div>
                    <div class="body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="firstname" placeholder="Firstname" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="middlename" placeholder="Middlename" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="lastname" placeholder="Lastname" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="inputEmail" onkeyup="gsfeOnly(this)" placeholder="Email" name="email" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                            </div>
                            <label id="check_gsfe" class="text-primary"></label>
                        </div>                    
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password1" placeholder="Password" required>
                            <div class="input-group-append">                                
                                <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            </div>                            
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password2" placeholder="Confirm Password" required>
                            <div class="input-group-append">                                
                                <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            </div>                            
                        </div> 
                        <!-- <div class="input-group mb-3">
                            <input type="password" class="form-control" name="vcode" placeholder="Verification Code" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            </div>                            
                        </div>  -->
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light" name="signup">SIGN UP</button>
                        <div class="signin_with mt-3">
                            <a class="link" href="index.php">You already have a account?</a>
                        </div>
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
                    <img src="assets/images/signup.svg" alt="Sign Up" />
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script>
        function gsfeOnly(input) {
            let regex = new RegExp('[a-z0-9]+@gsfe.tupcavite.edu.ph');
            check = regex.test(input.value)
            if(check == false){
                console.log('Not gsfe account')
                document.getElementById("check_gsfe").innerText = "Please use your gsfe account only";
            }else{
                console.log('Your using gsfe account')
                document.getElementById("check_gsfe").innerText = "";
            }
        }
    </script>
</body>


</html>