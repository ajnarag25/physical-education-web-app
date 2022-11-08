<?php
include('connection.php');
session_start();
date_default_timezone_set('Asia/Manila');
?>
<?php
$id_no = $_SESSION['get_data']['id_no'];
$query = "SELECT otp_generate FROM otp_requests where id_no = '$id_no';";
$result = mysqli_query($conn, $query);
$check = mysqli_num_rows($result);
if ($check > 0) {
  $id_no=  $_SESSION['get_data']['id_no'];
    $check_typed="SELECT * FROM otp_requests WHERE id_no='$id_no'";
    $result = mysqli_query($conn, $check_typed);
    while ($row = mysqli_fetch_array($result)) {
      if ($row['typed'] == '0') {
?>
<div>
        <div class="text-center">
            <h4 id = "thistypeotp">Type The OTP into the Machine</h4>
            
            <b>Important Note:</b>
            <li align = "justify center" class = "alignments">The OTP will <b>reset</b> if you click the <b>`Cancel`</b> button.</li>
                    
            <li align = "justify center" class = "alignments">The OTP <b>expires</b> after 5 minutes</li>
                            <br>     
        </div>
        <div class="row">
            <div class="text-center">
              <?php 
                  $query = "SELECT id,otp_generate FROM otp_requests where id_no = '$id_no';";
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_array($result)) {
                    ?>
              <h2 id = "display_otp"><?php echo $row['otp_generate'] ?></h2>
          </div>
          </div>
          <br>
        <div class="text-center">
        <a href = "functions.php?cancel_otp_id=<?php echo $row['id'] ?>" class="btn btn-danger">Cancel</a>
        </div>
        <?php
            }
        ?>

    </div><!-----END OF PARENT DIV--------->
<?php
      }
      else {
        if ($row['actionn'] == 'BORROWING') {     
        
          $equipment_to_borrow = $row['equipment_to_borrow'];
          $fetch_ball_3="SELECT `$equipment_to_borrow` FROM ball_sequence WHERE id ='3'";
          $fetch_ball_2="SELECT `$equipment_to_borrow` FROM ball_sequence WHERE id ='2'";
          $fetch_ball_1="SELECT `$equipment_to_borrow` FROM ball_sequence WHERE id ='1'";
          
          $result_ball_3 = mysqli_query($conn, $fetch_ball_3);
          $result_ball_2 = mysqli_query($conn, $fetch_ball_2);
          $result_ball_1 = mysqli_query($conn, $fetch_ball_1);
          
          $get_row_3 = null;
          $get_row_2 = null;
          $get_row_1 = null;
          while ($row_3 = mysqli_fetch_array($result_ball_3)) {
              $get_row_3 = $row_3[$equipment_to_borrow];
          }
          while ($row_2 = mysqli_fetch_array($result_ball_2)) {
              $get_row_2 = $row_2[$equipment_to_borrow];
          }
          while ($row_1 = mysqli_fetch_array($result_ball_1)) {
              $get_row_1 = $row_1[$equipment_to_borrow];
          }
  
          $id_no = $_SESSION['get_data']['id_no'];
          $qr= $_SESSION['get_data']['qr'];
          $time_borrow = date("h:ia");
          $date_borrow = date("Y-m-d");
  
  
          $conn->query("INSERT INTO borrowing_machine_info (id_no, equipment, ball_id, time_borrow, date_borrow, time_return, date_return, qr,status) 
                  VALUES('$id_no','$equipment_to_borrow','$get_row_3', '$time_borrow', '$date_borrow', 'N/A', 'N/A', '$qr', 'UNRETURNED');") or die($conn->error);
          
          $conn->query("DELETE FROM `otp_requests` WHERE typed='1';") or die($conn->error);
  
  
          //Stack and  Queue Database Edition
          $conn->query("UPDATE ball_sequence SET $equipment_to_borrow= '$get_row_2' WHERE id ='3';") or die($conn->error);
          $conn->query("UPDATE ball_sequence SET $equipment_to_borrow='$get_row_1' WHERE id ='2';") or die($conn->error);
          $conn->query("UPDATE ball_sequence SET $equipment_to_borrow='' WHERE id ='1';") or die($conn->error);
        ?>
        
        <?php
        }//end of if condition for borrowing
      }//end of else
}// end of while loop
} //end of check if condition
else {
?>
<div>
        <div class="text-center">
            <h3 id = "thistypeotp">OTP has been Expired</h3>
        </div>
        <div class="row">
            <div class="text-center">
              <form action="functions.php" id = "gen_new_otp" method="post">
                <input type="hidden" name = "id_no" value = <?php echo $_SESSION['arr_user']['id_no']?>>
                <input type="hidden" name = "equipment_to_borrow" value = <?php echo $_SESSION['arr_user']['equipment_to_borrow']?>>
                <input type="hidden" name = "typed" value = <?php echo $_SESSION['arr_user']['typed']?>>
                <input type="hidden" name = "actionn" value = <?php echo $_SESSION['arr_user']['actionn']?>>
              
              </form>
          </div>
          </div>
          <br>
        <div class="text-center">
          <button type = "submit"  name = "generate_new_otp" form="gen_new_otp" class="btn btn-primary" style = "color:white;">Generate New OTP</button>
            <a href = "home.php" class="btn btn-danger">back to home</a>
        </div>
   
    </div><!-----END OF PARENT DIV-------->
<?php
}
?>
