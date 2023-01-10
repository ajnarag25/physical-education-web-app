<?php 
   include('connection.php');
   $sql = "SELECT * FROM reserve WHERE status='PENDING'";
   $result = $conn->query($sql);

   echo $result->num_rows;

?>