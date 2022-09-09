<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">

<?php
include('connection.php');
session_start();
error_reporting(0);

#LOGIN
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login="SELECT * FROM registration WHERE email='$email'";
    $prompt = mysqli_query($conn, $login);
    $getData = mysqli_fetch_array($prompt);

    if (password_verify($password, $getData['password'])){
        $_SESSION['get_data'] = $getData;
        header('location:home.php');
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
                $conn->query("INSERT INTO registration (firstname, middlename, lastname, email, contact, gender, course, department, image, password, qr, users, otp,id_no,qr_path) 
                VALUES('$first','$middle','$last', '$emails', '$contacts', '$gender', '$courses', 'N/A', '$target_file', '".password_hash($pass1, PASSWORD_DEFAULT)."','$qr_val','$user', 0,'$idno','$target_file_qr')") or die($conn->error);
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



#REGISTER TEACHER
if (isset($_POST['register_teacher'])) {
    $first = $_POST['firstname'];
    $middle = $_POST['middlename'];
    $last = $_POST['lastname'];
    $emails = $_POST['email'];
    $contacts = $_POST['contact'];
    $gender = $_POST['gender'];
    $dept = $_POST['department'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];
    $user = $_POST['user_teacher'];

    $target_dir = "uploads/";
    $target_file = $target_dir . time(). basename($_FILES["profile_pic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);


    $sql = "SELECT * FROM registration WHERE email='$emails' OR firstname='$first' AND middlename='$middle'  AND lastname='$last' ";
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
                    window.location.href = "register_teacher.php";
                    }else{
                        window.location.href = "register_teacher.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else{
        if (!$result->num_rows > 0) {
            move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);
            if ($check == false){
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
                            window.location.href = "register_teacher.php";
                            }else{
                                window.location.href = "register_teacher.php";
                            }
                        })
                        
                    })
            
                </script>
                <?php
            }else{
                $conn->query("INSERT INTO registration (firstname, middlename, lastname, email, contact, gender, course, department, image, password, qr, users, otp) 
                VALUES('$first','$middle','$last', '$emails', '$contacts', '$gender', 'N/A', '$dept', '$target_file', '".password_hash($pass1, PASSWORD_DEFAULT)."','N/A','$user',0)") or die($conn->error);
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
                            window.location.href = "register_teacher.php";
                            }else{
                                window.location.href = "register_teacher.php";
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