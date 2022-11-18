<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.min.css">

<?php 
   include('connection.php');
   session_start();
   error_reporting(0);
   date_default_timezone_set('Asia/Manila');


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


?>