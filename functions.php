<?php
include('connection.php');
session_start();

#REGISTER STUDENT
if (isset($_POST['register_student'])) {
    $first = $_POST['firstname'];
    $middle = $_POST['middlename'];
    $last = $_POST['lastname'];
    $emails = $_POST['email'];
    $contacts = $_POST['contact'];
    $courses = $_POST['course'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];
    $qr = $_POST['firstname'];

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
                            window.location.href = "register_student.php";
                            }else{
                                window.location.href = "register_student.php";
                            }
                        })
                        
                    })
            
                </script>
                <?php
            }else{
                $conn->query("INSERT INTO registration (firstname, middlename, lastname, email, contact, course, department, image, password, qr) 
                VALUES('$first','$middle','$last', '$emails', '$contacts', '$courses', 'N/A', '$target_file', '".password_hash($pass1, PASSWORD_DEFAULT)."','N/A')") or die($conn->error);
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



?>