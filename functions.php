<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
include('connection.php');
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Manila');

#LOGIN
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login="SELECT * FROM registration WHERE email='$email'";
    $prompt = mysqli_query($conn, $login);
    $getData = mysqli_fetch_array($prompt);

    if (password_verify($password, $getData['password'])){
        if ($getData['status'] == 'UNVERIFIED'){
            $_SESSION['get_data'] = $getData;
            header('location:unverified.php');
        }else{
            $_SESSION['get_data'] = $getData;
            header('location:home.php');
        }
    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
          $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'Username and/or Password is incorrect',
                text: 'Something went wrong!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                    }else{
                        window.location.href = "index.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }

}

#REGISTER STUDENT
if (isset($_POST['register_student'])) {
    $first = $_POST['firstname'];
    $middle = $_POST['middlename'];
    $last = $_POST['lastname'];
    $emails = $_POST['email'];
    $contacts = $_POST['contact'];
    $gender = $_POST['gender'];
    $courses = $_POST['course'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];
    $user = $_POST['user_student'];
    $idno = $_POST['stuid'];
    $watcher = $_POST['watcher'];
    $qr_val = $_POST['qr_val'];
    $dir_qr = "uploads/school_id_qr/";

    $target_file_qr = $dir_qr . time(). basename($_FILES["ID_pic"]["name"]);
    $uploadOk_qr = 1;
    $imageFileType_qr = strtolower(pathinfo($target_file_qr,PATHINFO_EXTENSION));
    $check_qr = getimagesize($_FILES["ID_pic"]["tmp_name"]);

    $target_dir = "uploads/profile_pic/";
    
    $target_file = $target_dir . time(). basename($_FILES["profile_pic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);


    $sql = "SELECT * FROM registration WHERE email='$emails' OR firstname='$first' AND middlename='$middle' AND lastname='$last' AND id_no = '$idno'";
    $result = mysqli_query($conn, $sql);

    if ($pass1 != $pass2){
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'Your password does not match',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "register_student.php";
                    }else{
                        window.location.href = "register_student.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else{
        if (!$result->num_rows > 0) {
            move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);
            move_uploaded_file($_FILES["ID_pic"]["tmp_name"], $target_file_qr);
            if ($check == false ){
                ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                        icon: 'error',
                        title: 'Uploaded file is not an image!',
                        text: 'Please upload an image format',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Okay'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "register_student.php";
                            }else{
                                window.location.href = "register_student.php";
                            }
                        })
                        
                    })
            
                </script>
            <?php
            }elseif ($watcher == 0) {
            ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                        icon: 'error',
                        title: 'Uploaded QR-Code doesnt match on the inputted information',
                        text: 'Please check the filled out fields and Reupload the image of QR in your School ID',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Okay'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "register_student.php";
                            }else{
                                window.location.href = "register_student.php";
                            }
                        })
                        
                    })
            
                </script>

                <?php
            }else{
                $conn->query("INSERT INTO registration (firstname, middlename, lastname, email, contact, gender, course, department, image, password, qr, users, otp,id_no,qr_path, status) 
                VALUES('$first','$middle','$last', '$emails', '$contacts', '$gender', '$courses', 'N/A', '$target_file', '".password_hash($pass1, PASSWORD_DEFAULT)."','$qr_val','$user', 0,'$idno','$target_file_qr', 'UNVERIFIED')") or die($conn->error);
                ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                        icon: 'success',
                        title: 'Successfully Registered',
                        text: 'Please login your credentials now',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Okay'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "index.php";
                            }else{
                                window.location.href = "index.php";
                            }
                        })
                        
                    })
            
                </script>
                <?php
                }
            }else{
                ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                        icon: 'error',
                        title: 'User is already registered',
                        text: 'Please login your credentials now',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Okay'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "register_student.php";
                            }else{
                                window.location.href = "register_student.php";
                            }
                        })
                        
                    })
            
                </script>
                <?php
                }
        }
    }


#REGISTER PERSNONNEL
if (isset($_POST['addPersonnel'])) {
    $first = $_POST['firstname'];
    $middle = $_POST['middlename'];
    $last = $_POST['lastname'];
    $emails = $_POST['email'];
    $contacts = $_POST['contact'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];
    $user = $_POST['user_personnel'];

    
    $target_dir = "uploads/profile_pic/";
    
    $target_file = $target_dir . time(). basename($_FILES["profile_pic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);

    $sql = "SELECT * FROM registration WHERE email='$emails' OR firstname='$first' AND middlename='$middle' AND lastname='$last'";
    $result = mysqli_query($conn, $sql);

    if ($pass1 != $pass2){
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'Password does not match',
                text: 'Something went wrong!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "./admin/super_user/_createmanage.php";
                    }else{
                        window.location.href = "./admin/super_user/_createmanage.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else{
        if(!$result->num_rows > 0){
            move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);
            if ($check == false ){
                ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                        icon: 'error',
                        title: 'Uploaded file is not an image!',
                        text: 'Please upload an image format',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Okay'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./admin/super_user/_createmanage.php";
                            }else{
                                window.location.href = "./admin/super_user/_createmanage.php";
                            }
                        })
                        
                    })
            
                </script>
            <?php
            }else{
                $conn->query("INSERT INTO registration (firstname, middlename, lastname, email, contact, gender, course, department, image, password, qr, users, otp,id_no,qr_path, status) 
                VALUES('$first','$middle','$last', '$emails', '$contacts', '$gender', 'N/A', '$department', '$target_file', '".password_hash($pass1, PASSWORD_DEFAULT)."','N/A','$user', 0, 'N/A','N/A', 'VERIFIED')") or die($conn->error);
                ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                        icon: 'success',
                        title: 'Successfully Registered',
                        text: 'Please login your credentials now',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Okay'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./admin/super_user/_createmanage.php";
                            }else{
                                window.location.href = "./admin/super_user/_createmanage.php";
                            }
                        })
                        
                    })
            
                </script>
                <?php
            }

        }else{
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'error',
                    title: 'User is already registered',
                    text: 'Please login your credentials now',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "./admin/super_user/_createmanage.php";
                        }else{
                            window.location.href = "./admin/super_user/_createmanage.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    }

}


#LOGOUT
if (isset($_GET['logout'])) {
    session_destroy();
    header('location:index.php');
}   

#FORGOT PASSWORD
if (isset($_POST['reset_password'])) {
    $emails = $_POST['email'];
    $setOTP = rand(0000,9999);

    $sql = "SELECT * FROM registration WHERE email='$emails'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    if ($check == 0){
        ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'An error occured!',
                text: 'We could not find your account.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                    }else{
                        window.location.href = "index.php";
                    }
                })
                
            })
        </script>
        <?php
    }else{
        
        $conn->query("UPDATE registration SET otp=$setOTP WHERE email='$emails'") or die($conn->error);
        include 'otp_email.php';
        header("Location: verify_otp.php");
    }

}

 #OTP SUBMIT
 if (isset($_POST['otp_submit'])) {
    $otp = $_POST['otp'];
    $_SESSION['otp'] = $otp;
    $sql = "SELECT * FROM registration WHERE otp='$otp'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);

    if ($check == 0){
        ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'OTP entered is wrong!',
                text: 'Please check your email for the OTP verification',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "verify_otp.php";
                    }else{
                        window.location.href = "verify_otp.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else{
        header("Location: change_pass_forgot.php");
    }
}

// change password
if (isset($_POST['change_pass'])) {
    $password1 = $_POST['newpass1'];
    $password2 = $_POST['newpass2'];
    $get_otp = $_SESSION['otp'];
    
    if ($password1 != $password2){
        ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'Password does not match!',
                text: 'Something went wrong',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "change_pass_forgot.php";
                    }else{
                        window.location.href = "change_pass_forgot.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else{
        $conn->query("UPDATE registration SET password='".password_hash($password1, PASSWORD_DEFAULT)."' WHERE otp='$get_otp'") or die($conn->error);
        ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully changed your password',
                text: 'Please login your new created password account',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                    }else{
                        window.location.href = "index.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }

}

#INQUIRE UNIFORM
if (isset($_POST['request_student_1'])) {
    
    $first = $_POST['firstname'];
    $middle = $_POST['middlename'];
    $last = $_POST['lastname'];
    $course = $_POST['course'];
    $dept = $_POST['department'];
    $gender = $_POST['gender']; 
    $teacher = $_POST['teacher'];
    $sizeT = $_POST['tshirt'];
    $sizeS = $_POST['shorts'];
    $sizeJ = $_POST['sizej'];
    $email = $_POST['email'];
    $image = $_POST['image'];
    $status = $_POST['status'];
    $note = $_POST['note'];
    $date =  $_POST['date'];
    if ($email != null){
        $conn->query("INSERT INTO inquire (firstname, middlename, lastname, course, department, gender, teacher, size_t, size_s, size_j, email, image, status, note, date, sched_pay, sched_pickup) 
        VALUES('$first','$middle','$last', '$course', '$dept', '$gender', '$teacher', '$sizeT', '$sizeS', '$sizeJ', '$email', '$image', '$status', '$note', '$date', 'N/A', 'N/A')") or die($conn->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Submitted',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "success_inquire.php";
                    }else{
                        window.location.href = "success_inquire.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'An error occured!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "pe1.php";
                    }else{
                        window.location.href = "pe1.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }
}
if (isset($_POST['request_student_2'])) {
    $first = $_POST['firstname'];
    $middle = $_POST['middlename'];
    $last = $_POST['lastname'];
    $course = $_POST['course'];
    $dept = $_POST['department'];
    $gender = $_POST['gender']; 
    $teacher = $_POST['teacher'];
    $sizeT = $_POST['tshirt'];
    $sizeS = $_POST['sizes'];
    $sizeJ = $_POST['joggingpants'];
    $email = $_POST['email'];
    $image = $_POST['image'];
    $status = $_POST['status'];
    $note = $_POST['note'];
    $date =  $_POST['date'];
    

    if ($email != null){
        $conn->query("INSERT INTO inquire (firstname, middlename, lastname, course, department, gender, teacher, size_t, size_s, size_j, email, image, status, note, date, sched_pay, sched_pickup) 
        VALUES('$first','$middle','$last', '$course', '$dept', '$gender', '$teacher', '$sizeT', '$sizeS', '$sizeJ', '$email', '$image', '$status', '$note', '$date', 'N/A', 'N/A')") or die($conn->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Submitted',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "success_inquire.php";
                    }else{
                        window.location.href = "success_inquire.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'An error occured!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "pe2.php";
                    }else{
                        window.location.href = "pe2.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }
}


if (isset($_POST['request_teacher_1'])) {
    
    $first = $_POST['firstname'];
    $middle = $_POST['middlename'];
    $last = $_POST['lastname'];
    $course = $_POST['course'];
    $dept = $_POST['department'];
    $gender = $_POST['gender']; 
    $teacher = $_POST['teacher'];
    $sizeT = $_POST['tshirt'];
    $sizeS = $_POST['shorts'];
    $sizeJ = $_POST['sizej'];
    $email = $_POST['email'];
    $image = $_POST['image'];
    $status = $_POST['status'];
    $note = $_POST['note'];
    $date =  $_POST['date'];
    if ($email != null){
        $conn->query("INSERT INTO inquire (firstname, middlename, lastname, course, department, gender, teacher, size_t, size_s, size_j, email, image, status, note, date, sched_pay, sched_pickup) 
        VALUES('$first','$middle','$last', '$course', '$dept', '$gender', '$teacher', '$sizeT', '$sizeS', '$sizeJ', '$email', '$image', '$status', '$note', '$date', 'N/A', 'N/A')") or die($conn->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Submitted',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "success_inquire.php";
                    }else{
                        window.location.href = "success_inquire.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'An error occured!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "pe1.php";
                    }else{
                        window.location.href = "pe1.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }
}
if (isset($_POST['request_teacher_2'])) {
    $first = $_POST['firstname'];
    $middle = $_POST['middlename'];
    $last = $_POST['lastname'];
    $course = $_POST['course'];
    $dept = $_POST['department'];
    $gender = $_POST['gender']; 
    $teacher = $_POST['teacher'];
    $sizeT = $_POST['tshirt'];
    $sizeS = $_POST['sizes'];
    $sizeJ = $_POST['joggingpants'];
    $email = $_POST['email'];
    $image = $_POST['image'];
    $status = $_POST['status'];
    $note = $_POST['note'];
    $date =  $_POST['date'];
    


    if ($email != null){
        $conn->query("INSERT INTO inquire (firstname, middlename, lastname, course, department, gender, teacher, size_t, size_s, size_j, email, image, status, note, date, sched_pay, sched_pickup) 
        VALUES('$first','$middle','$last', '$course', '$dept', '$gender', '$teacher', '$sizeT', '$sizeS', '$sizeJ', '$email', '$image', '$status', '$note', '$date', 'N/A', 'N/A')") or die($conn->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Submitted',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "success_inquire.php";
                    }else{
                        window.location.href = "success_inquire.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'An error occured!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "pe2.php";
                    }else{
                        window.location.href = "pe2.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }
}

#CANCEL REQUEST
if (isset($_POST['cancel_request'])) {
    
    $get_mail = $_POST['check_email'];

    if ($get_mail != null){
        // $kuha_id="SELECT id FROM inquire WHERE email='$email'";
        // $prompt = mysqli_query($conn, $login);
        // $getData = mysqli_fetch_array($prompt);
        $conn->query("DELETE FROM inquire WHERE email='$get_mail';") or die($conn->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Canceled',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "home.php";
                    }else{
                        window.location.href = "home.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }
    else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'An error occured!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "home.php";
                    }else{
                        window.location.href = "home.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }
}


#RESERVE FACILITY
if (isset($_POST['reserve_facility'])) {
    $check_mail = $_POST['email'];
    $names = $_POST['names'];
    $dept_course = $_POST['dept_course'];
    $dates = $_POST['date'];
    $times = $_POST['time'];
    $bookings = $_POST['book'];
    $purposes = $_POST['purpose'];
    $participants = $_POST['participants'];
    $reasons = $_POST['reason'];
    $status = $_POST['stats'];
    $rescheds = $_POST['resched'];

    if ($check_mail != null){
        $conn->query("INSERT INTO reserve (email, name, dept_course, date, time, booking, purpose, participants, reason, status, resched) 
        VALUES('$check_mail','$names','$dept_course','$dates', '$times', '$bookings', '$purposes', '$participants', '$reasons', '$status', '$rescheds')") or die($conn->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Submitted',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "success_reserve.php";
                    }else{
                        window.location.href = "success_reserve.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'An error occured!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "reserve.php";
                    }else{
                        window.location.href = "reserve.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }
}

?>


<?php

if (isset($_POST['passed_borrower_slip'])) {
    
    $conn->query("DELETE FROM `otp_requests` WHERE typed='1';") or die($conn->error);
    $arr_user =array();
    $equipment_to_borrow = $_POST['equipment_to_borrow'];
    $id_no = $_POST['id_no'];
    $otp_generate = $_POST['otp_generate'];
    $typed = $_POST['typed'];
    $actionn = $_POST['actionn'];
    $arr_user['equipment_to_borrow'] = $equipment_to_borrow;
    $arr_user['id_no'] = $id_no;
    $arr_user['otp_generate'] = $otp_generate;
    $arr_user['typed'] = $typed;
    $arr_user['actionn'] = $actionn;
    $_SESSION['arr_user'] = $arr_user;



    if (isset($_POST['accept_terms'])) {
        
        $query = "SELECT otp_generate FROM otp_requests where id_no = '$id_no'";
        $result = mysqli_query($conn, $query);
        $check = mysqli_num_rows($result);

        if ($check == 0) {
        $conn->query("INSERT INTO otp_requests (id_no, equipment_to_borrow,otp_generate,typed,actionn) 
        VALUES('$id_no','$equipment_to_borrow','$otp_generate','$typed', '$actionn')") or die($conn->error);
        
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
                $(document).ready(function(){
                    Swal.fire({
                    position: 'middle',
                    icon: 'success',
                    title: "OTP Generated Successfully",
                    showConfirmButton: false,
                    timer: 1000
                    }).then((result)=>{
                        window.location.href = "display_otp_equip.php";
                    })
                    })
        </script>
        <?php
        }
        else {
            // $conn->query("UPDATE otp_requests SET (id_no,equipment_to_borrow) 
            // VALUES('$id_no','$equipment_to_borrow')") or die($conn->error);
            $conn->query("UPDATE otp_requests SET typed= otp_generate='".$_SESSION['arr_user']['otp_generate']."',equipment_to_borrow='".$_SESSION['arr_user']['equipment_to_borrow']."' WHERE id_no='$id_no'") or die($conn->error);
            ?>
            <script>
                window.location.href = "display_otp_equip.php";
            </script>
            
            <?php
          }
    }
    else {
    ?>        
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'Please Read and Accept the Terms and Conditions!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "borrowing_slip.php?equipment_to_borrow=<?php echo $equipment_to_borrow?>";
                    }else{
                        window.location.href = "borrowing_slip.php?equipment_to_borrow=<?php echo $equipment_to_borrow?>";
                    }
                })
            })
    
        </script>    
<?php
    }
}

?>







<?php

if (isset($_POST['passed_borrower_slip_return'])) {
    $conn->query("DELETE FROM `otp_requests` WHERE typed='1';") or die($conn->error);
    $arr_user =array();
    $equipment_to_borrow = $_POST['equipment_to_borrow'];
    $id_no = $_POST['id_no'];
    $otp_generate = $_POST['otp_generate'];
    $typed = $_POST['typed'];
    $actionn = $_POST['actionn'];
    $arr_user['equipment_to_borrow'] = $equipment_to_borrow;
    $arr_user['id_no'] = $id_no;
    $arr_user['otp_generate'] = $otp_generate;
    $arr_user['typed'] = $typed;
    $arr_user['actionn'] = $actionn;
    $_SESSION['arr_user'] = $arr_user;
        
        $query = "SELECT otp_generate FROM otp_requests where id_no = '$id_no'";
        $result = mysqli_query($conn, $query);
        $check = mysqli_num_rows($result);

        if ($check == 0) {
        $conn->query("INSERT INTO otp_requests (id_no, equipment_to_borrow,otp_generate,typed,actionn) 
        VALUES('$id_no','$equipment_to_borrow','$otp_generate','$typed', '$actionn')") or die($conn->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
                $(document).ready(function(){
                    Swal.fire({
                    position: 'middle',
                    icon: 'success',
                    title: "OTP Generated Successfully",
                    showConfirmButton: false,
                    timer: 1000
                    }).then((result)=>{
                        window.location.href = "display_otp_equip.php";
                    })
                    })
        </script>
        <?php
        }
        else {
            // $conn->query("UPDATE otp_requests SET (id_no,equipment_to_borrow) 
            // VALUES('$id_no','$equipment_to_borrow')") or die($conn->error);
            $conn->query("UPDATE otp_requests SET typed= otp_generate='".$_SESSION['arr_user']['otp_generate']."',equipment_to_borrow='".$_SESSION['arr_user']['equipment_to_borrow']."' WHERE id_no='$id_no'") or die($conn->error);
            ?>
            <script>
                window.location.href = "display_otp_equip.php";
            </script>
            
            <?php
          }
    
}
?>




<?php
//IF THE USER CLICK THE CANCEL BUTTON
if (isset($_GET['cancel_otp_id'])) {
    $fet_id = $_GET['cancel_otp_id'];
    $query="SELECT actionn FROM otp_requests WHERE id = '$fet_id'";
    $result = mysqli_query($conn, $query);
    $fetch = mysqli_fetch_array($result);
    if ($fetch['actionn'] == 'BORROWING') {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
                $(document).ready(function(){
                    Swal.fire({
                    title: 'Are you sure?',
                    text: "Your borrower's slip and all requests will be void if you leave the page",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Cancel it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "pickequipment.php?id=<?php echo $fet_id?>";
                    }else{
                        window.location.href = "display_otp_equip.php";
                    }
                    })
                    })
        </script>
    
    <?php
    }elseif ($fetch['actionn'] == 'RETURNING') {
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
                $(document).ready(function(){
                    Swal.fire({
                    title: 'Are you sure?',
                    text: "Your OTP request will be void if you leave the page",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Cancel it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "home.php?id=<?php echo $fet_id?>";
                    }else{
                        window.location.href = "display_otp_equip.php";
                    }
                    })
                    })
        </script>
        <?php
    }
?>
        
<?php
}
?>

<?php
if (isset($_POST['generate_new_otp'])) {
    $equipment_to_borrow = $_POST['equipment_to_borrow'];
    $id_no = $_POST['id_no'];
    $permitted_char = '0123456789ABCD#*';
    $otp_equipment =substr(str_shuffle($permitted_char), 0, 5);
    $typed = $_POST['typed'];
    $actionn = $_POST['actionn'];
    $conn->query("INSERT INTO otp_requests (id_no, equipment_to_borrow,otp_generate,typed,actionn) 
        VALUES('$id_no','$equipment_to_borrow','$otp_equipment','$typed', '$actionn')") or die($conn->error);
?>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
                $(document).ready(function(){
                    Swal.fire({
                    position: 'middle',
                    icon: 'success',
                    title: "OTP Generated Successfully",
                    showConfirmButton: false,
                    timer: 1000
                    }).then((result)=>{
                        window.location.href = "display_otp_equip.php";
                    })
                    })
        </script>
<?php
}



// UPDATE PROFILE INFORMATION
if (isset($_POST['update_profile'])) {
    $id = $_POST['id'];
    $firstname = $_POST['fname'];
    $middlename = $_POST['mname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];


    $checking = "SELECT * FROM registration WHERE firstname='$firstname' AND middlename='$middlename' AND lastname='$lastname' AND email='$email' AND contact='$contact' ";
    $prompt = $conn->query($checking);
    $row = mysqli_num_rows($prompt);


    if ($row == 0){
        $conn->query("UPDATE registration SET firstname='$firstname', middlename='$middlename', lastname='$lastname', email='$email',  contact='$contact' WHERE id='$id'") or die($conn->error);
        session_destroy();
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Updated your Account',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                    }else{
                        window.location.href = "index.php";
                    }
                })
                
            })

        </script>
        <?php

    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'warning',
                title: 'No changes has been made!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "account.php";
                    }else{
                        window.location.href = "account.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }
}


// UPDATE PROFILE PICTURE
if (isset($_POST['update_pic'])) {
    $get_id = $_POST['id'];
    $target_dir = "uploads/profile_pic/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["pic"]["tmp_name"]);

    if($check !== false) {

        $uploadOk = 1;
        if ($uploadOk == 0) {
            echo "<script type=\"text/javascript\">
            alert(\"Sorry, your file was not uploaded.\");
            window.location = \"account.php\"
            </script>";
    } else {
    move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);
    }
        $sql='UPDATE registration SET image="'.$target_file.'" WHERE id="'.$get_id.'"';
        $result = mysqli_query($conn, $sql);
        header('location: account.php');
        
    } else {
        $uploadOk = 0;
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'File is not an image!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "account.php";
                    }else{
                        window.location.href = "account.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }
}

// UPDATE PASSWORD
if (isset($_POST['update_password'])) {
    $id = $_POST['id'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if ($password1 != $password2){
        ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'Password does not match',
                text: 'Something went wrong!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "account.php";
                    }else{
                        window.location.href = "account.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else{
        $conn->query("UPDATE registration SET password='".password_hash($password1, PASSWORD_DEFAULT)."' WHERE id='$id'") or die($conn->error);
        session_destroy();
        ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully changed your password',
                text: 'Please login your credentials now',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                    }else{
                        window.location.href = "index.php";
                    }
                })
                
            })

        </script>
        <?php
    }
}


?>


