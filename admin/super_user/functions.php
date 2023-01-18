<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.min.css">

<?php 
   include('connection.php');
   session_start();
//    error_reporting(0);
   date_default_timezone_set('Asia/Manila');

    if (isset($_GET['logout'])) {
        session_destroy();
        header('location:../index.php');
    }  

   if (isset($_POST['update_student'])) {

      $id = $_POST['id_student'];
      $firstname = $_POST['firstname'];
      $middlename = $_POST['middlename'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $contact = $_POST['contact'];
      $gender = $_POST['gender'];
      $course = $_POST['course'];

      $checking = "SELECT * FROM registration WHERE firstname='$firstname' AND middlename='$middlename' AND lastname='$lastname' AND email='$email' AND
      contact='$contact' AND gender='$gender' AND course='$course'";
      $prompt = $conn->query($checking);
      $row = mysqli_num_rows($prompt);

      if ($row == 0){
         $conn->query("UPDATE registration SET firstname='$firstname', middlename='$middlename', lastname='$lastname', email='$email',
         contact='$contact', gender='$gender', course='$course' WHERE id='$id'") or die($conn->error);
         ?>
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
         <script>
             $(document).ready(function(){
                 Swal.fire({
                 icon: 'success',
                 title: 'Successfully Updated Student Account',
                 confirmButtonColor: '#3085d6',
                 confirmButtonText: 'Okay'
                 }).then((result) => {
                 if (result.isConfirmed) {
                     window.location.href = "_createmanage.php";
                     }else{
                         window.location.href = "_createmanage.php";
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
                     window.location.href = "_createmanage.php";
                     }else{
                         window.location.href = "_createmanage.php";
                     }
                 })
                 
             })
     
         </script>
         <?php
     }
  
   }

   if (isset($_POST['update_personnel'])) {

      $id = $_POST['id_personnel'];
      $firstname = $_POST['firstname'];
      $middlename = $_POST['middlename'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $contact = $_POST['contact'];
      $gender = $_POST['gender'];
      $department = $_POST['department'];

      $checking = "SELECT * FROM registration WHERE firstname='$firstname' AND middlename='$middlename' AND lastname='$lastname' AND email='$email' AND
      contact='$contact' AND gender='$gender' AND department='$department'";
      $prompt = $conn->query($checking);
      $row = mysqli_num_rows($prompt);

      if ($row == 0){
         $conn->query("UPDATE registration SET firstname='$firstname', middlename='$middlename', lastname='$lastname', email='$email',
         contact='$contact', gender='$gender', department='$department' WHERE id='$id'") or die($conn->error);
         ?>
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
         <script>
             $(document).ready(function(){
                 Swal.fire({
                 icon: 'success',
                 title: 'Successfully Updated Personnel Account',
                 confirmButtonColor: '#3085d6',
                 confirmButtonText: 'Okay'
                 }).then((result) => {
                 if (result.isConfirmed) {
                     window.location.href = "_createmanage.php";
                     }else{
                         window.location.href = "_createmanage.php";
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
                     window.location.href = "_createmanage.php";
                     }else{
                         window.location.href = "_createmanage.php";
                     }
                 })
                 
             })
     
         </script>
         <?php
     }
  
   }

   if (isset($_POST['update_disenable'])) {
        $id = $_POST['id_disenable'];
        $status = $_POST['stat'];

        $checking = "SELECT * FROM admin WHERE status='$status' AND id='$id'";
        $prompt = $conn->query($checking);
        $row = mysqli_num_rows($prompt);

        if ($row == 0){
            $conn->query("UPDATE admin SET status='$status' WHERE id='$id'") or die($conn->error);
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Updated Status Account',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_createmanage.php";
                        }else{
                            window.location.href = "_createmanage.php";
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
                        window.location.href = "_createmanage.php";
                        }else{
                            window.location.href = "_createmanage.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
   }

   if (isset($_POST['set_del_student'])) {

    $id = $_POST['id_student_del'];
    $id_number = $_POST['studentid_del'];
    $email = $_POST['email_student_del'];

    if ($id == null){
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'An Error Occured!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "_createmanage.php";
                    }else{
                        window.location.href = "_createmanage.php";
                    }
                })
                
            })

        </script>
        <?php
        }else{
            $conn->query("DELETE FROM registration WHERE id_no='$id_number' AND email='$email'") or die($conn->error);
            $conn->query("DELETE FROM inquire WHERE id_no='$id_number' AND email='$email'") or die($conn->error);
            $conn->query("DELETE FROM reserve WHERE id_no='$id_number' AND email='$email'") or die($conn->error);
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Deleted the Account',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_createmanage.php";
                        }else{
                            window.location.href = "_createmanage.php";
                        }
                    })
                    
                })

            </script>
            <?php
        }

    }
    if (isset($_POST['set_del_personnel'])) {

        $id = $_POST['id_personnel_del'];
        $id_number = $_POST['personnelid_del'];
        $email = $_POST['email_personnel_del'];

        if ($id == null){
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_createmanage.php";
                        }else{
                            window.location.href = "_createmanage.php";
                        }
                    })
                    
                })

            </script>
            <?php
            }else{
                $conn->query("DELETE FROM registration WHERE id_no='$id_number' AND email='$email'") or die($conn->error);
                $conn->query("DELETE FROM inquire WHERE id_no='$id_number' AND email='$email'") or die($conn->error);
                $conn->query("DELETE FROM reserve WHERE id_no='$id_number' AND email='$email'") or die($conn->error);
                ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                        icon: 'success',
                        title: 'Successfully Deleted the Account',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Okay'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "_createmanage.php";
                            }else{
                                window.location.href = "_createmanage.php";
                            }
                        })
                        
                    })

                </script>
                <?php
            }

        }
   if (isset($_POST['del_admin'])) {
        $id = $_POST['id_delete_admin'];

        if ($id == null){
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_createmanage.php";
                        }else{
                            window.location.href = "_createmanage.php";
                        }
                    })
                    
                })
    
            </script>
            <?php
        }else{
            $conn->query("DELETE FROM admin WHERE id='$id'") or die($conn->error);
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Deleted the Account',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_createmanage.php";
                        }else{
                            window.location.href = "_createmanage.php";
                        }
                    })
                    
                })
    
            </script>
            <?php
        }
    
   }

   if (isset($_POST['verify_acc'])) {
        $id = $_POST['id'];
        $emails = $_POST['email'];
        $msg = $_POST['msg_verify'];
        if($id == null){
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_verifyunverify.php";
                        }else{
                            window.location.href = "_verifyunverify.php";
                        }
                    })
                    
                })
    
            </script>
            <?php
        }else{
            echo $emails;
            $conn->query("UPDATE registration SET status='VERIFIED' WHERE id='$id'") or die($conn->error);
            include 'send_email_verified.php';
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Verified the Account',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_verifyunverify.php";
                        }else{
                            window.location.href = "_verifyunverify.php";
                        }
                    })
                    
                })
    
            </script>
            <?php
        }


   }


   if (isset($_POST['cancel_acc'])) {
        $id = $_POST['id'];
        $emails = $_POST['email'];
        $msg = $_POST['msg_verify'];
        if($id == null){
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_verifyunverify.php";
                        }else{
                            window.location.href = "_verifyunverify.php";
                        }
                    })
                    
                })

            </script>
            <?php
        }else{
            echo $emails;
            $conn->query("UPDATE registration SET status='CANCELED' WHERE id='$id'") or die($conn->error);
            include 'send_email_verified.php';
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Canceled the Account',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_verifyunverify.php";
                        }else{
                            window.location.href = "_verifyunverify.php";
                        }
                    })
                    
                })

            </script>
            <?php
        }


    }

   if (isset($_POST['verify_acc_admin'])) {
        $id = $_POST['id'];
        $emails = $_POST['email'];
        $msg = $_POST['msg_verify'];
        if($id == null){
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_verifyunverify.php";
                        }else{
                            window.location.href = "_verifyunverify.php";
                        }
                    })
                    
                })

            </script>
            <?php
        }else{
            echo $emails;
            $conn->query("UPDATE admin SET acc_status='VERIFIED' WHERE id='$id'") or die($conn->error);
            include 'send_email_verified.php';
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Verified the Account',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_verifyunverify.php";
                        }else{
                            window.location.href = "_verifyunverify.php";
                        }
                    })
                    
                })

            </script>
            <?php
        }

    }


    if (isset($_POST['cancel_acc_admin'])) {
        $id = $_POST['id'];
        $emails = $_POST['email'];
        $msg = $_POST['msg_cancel'];
        if($id == null){
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_verifyunverify.php";
                        }else{
                            window.location.href = "_verifyunverify.php";
                        }
                    })
                    
                })

            </script>
            <?php
        }else{
            echo $emails;
            $conn->query("UPDATE admin SET acc_status='CANCELED' WHERE id='$id'") or die($conn->error);
            include 'send_email_verified.php';
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Verified the Account',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_verifyunverify.php";
                        }else{
                            window.location.href = "_verifyunverify.php";
                        }
                    })
                    
                })

            </script>
            <?php
        }

    }

   if (isset($_POST['unverify_acc'])) {
        $id = $_POST['id'];
        $emails = $_POST['email'];
        $msg = $_POST['msg_unverify'];
        
        if($id == null){
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_verifyunverify.php";
                        }else{
                            window.location.href = "_verifyunverify.php";
                        }
                    })
                    
                })

            </script>
            <?php
        }else{
            $conn->query("UPDATE registration SET status='UNVERIFIED' WHERE id='$id'") or die($conn->error);
            include 'send_email_unverified.php';
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Unverified the Account',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_verifyunverify.php";
                        }else{
                            window.location.href = "_verifyunverify.php";
                        }
                    })
                    
                })

            </script>
            <?php
        }


    }

    if (isset($_POST['unverify_acc_admin'])) {
        $id = $_POST['id'];
        $emails = $_POST['email'];
        $msg = $_POST['msg_unverify'];
        
        if($id == null){
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_verifyunverify.php";
                        }else{
                            window.location.href = "_verifyunverify.php";
                        }
                    })
                    
                })

            </script>
            <?php
        }else{
            $conn->query("UPDATE admin SET acc_status='UNVERIFIED' WHERE id='$id'") or die($conn->error);
            include 'send_email_unverified.php';
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Unverified the Account',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_verifyunverify.php";
                        }else{
                            window.location.href = "_verifyunverify.php";
                        }
                    })
                    
                })

            </script>
            <?php
        }


    }


       #CHANGE USERNAME SUPERUSER
       if (isset($_POST['user_superuser'])) {
        $id_user = $_POST['id_username'];
        $get_username = $_POST['username'];

        if ($id_user != null){
            $conn->query("UPDATE superuser_acc SET username='$get_username' WHERE id='$id_user'") or die($conn->error);
            session_destroy();
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Updated your Username',
                    text: 'Please login your new created username',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "../index.php";
                        }else{
                            window.location.href = "../index.php";
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
                    title: 'An Error Occured',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_profile.php";
                        }else{
                            window.location.href = "_profile.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    }

    #CHANGE PASSWORD SUPERUSER
    if (isset($_POST['pass_admin'])) {
        $id_pass = $_POST['id_password'];
        $password1 = $_POST['pass1'];
        $password2 = $_POST['pass2'];
        if ($password1 != $password2){
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'warning',
                    title: 'Your password does not match',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_profile.php";
                        }else{
                            window.location.href = "_profile.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }else{
            $conn->query("UPDATE superuser_acc SET password='$password1' WHERE id='$id_pass'") or die($conn->error);
            session_destroy();
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Updated your Password',
                    text: 'Please login your new created password',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "../index.php";
                        }else{
                            window.location.href = "../index.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    }

    #ADD SOUND SYSTEM COORDINATOR
    if (isset($_POST['addSound'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $departs = $_POST['depts'];
    
        $sql = "SELECT * FROM sound_coordinator WHERE name='$name' AND email='$email'";
        $result = mysqli_query($conn, $sql);

        if(!$result->num_rows > 0){
            $conn->query("INSERT INTO sound_coordinator (name, email, status)
            VALUES('$name', '$email', 'Enabled')") or die($conn->error);
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Added',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_createmanage.php";
                        }else{
                            window.location.href = "_createmanage.php";
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
                    title: 'Sound System Coordinator is Already Existed',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_createmanage.php";
                        }else{
                            window.location.href = "_createmanage.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    
    }

    if (isset($_POST['addTeacher'])) {
        $name = $_POST['name'];
    
        $sql = "SELECT * FROM peteachers WHERE name='$name'";
        $result = mysqli_query($conn, $sql);

        if(!$result->num_rows > 0){
            $conn->query("INSERT INTO peteachers (name)
            VALUES('$name')") or die($conn->error);
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Added',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_createmanage.php";
                        }else{
                            window.location.href = "_createmanage.php";
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
                    title: 'PE Teacher is Already Existed',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_createmanage.php";
                        }else{
                            window.location.href = "_createmanage.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    
    }


    if (isset($_POST['update_disenable_head'])) {
        $id = $_POST['id_disenable_head'];
        $status = $_POST['stat_head'];

        $checking = "SELECT * FROM sound_coordinator WHERE status='$status' AND id='$id'";
        $prompt = $conn->query($checking);
        $row = mysqli_num_rows($prompt);

        if ($row == 0){
            $conn->query("UPDATE sound_coordinator SET status='$status' WHERE id='$id'") or die($conn->error);
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Updated Status',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_createmanage.php";
                        }else{
                            window.location.href = "_createmanage.php";
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
                        window.location.href = "_createmanage.php";
                        }else{
                            window.location.href = "_createmanage.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
   }


   if (isset($_POST['del_head'])) {
    $id = $_POST['id_delete_head'];
    if ($id == null){
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'An Error Occured!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "_createmanage.php";
                    }else{
                        window.location.href = "_createmanage.php";
                    }
                })
                
            })

        </script>
        <?php
        }else{
            $conn->query("DELETE FROM sound_coordinator WHERE id='$id'") or die($conn->error);
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Removed the Sound System Coordinator',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_createmanage.php";
                        }else{
                            window.location.href = "_createmanage.php";
                        }
                    })
                    
                })

            </script>
            <?php
        }

    }
   

?>