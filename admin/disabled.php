<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.min.css">

<?php 
 ?>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script>
   $(document).ready(function(){
         Swal.fire({
         icon: 'error',
         title: 'Your Account is Disabled!',
         text: 'Account is temporarily unavailable',
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
?>