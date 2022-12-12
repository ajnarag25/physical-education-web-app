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


    //if there's request for the specific user
    $check_typed="SELECT * FROM otp_requests WHERE id_no='$id_no'";
    $result = mysqli_query($conn, $check_typed);



    //if the ball rack inside the machine is empty 
    $check_ball="SELECT * FROM ball_sequence WHERE id='3'";
    $exec_check_ball = mysqli_query($conn, $check_ball);
    $fet_exec_check_ball = mysqli_fetch_array($exec_check_ball);



    // if the user have been returned the ball successfully
    $check_unreturned="SELECT * FROM borrowing_machine_info WHERE id_no='$id_no' and status = 'UNRETURNED'";
    $exec_check_unreturned = mysqli_query($conn, $check_unreturned);
    $fet_exec_check_unreturned = mysqli_num_rows($exec_check_unreturned);
    




    while ($row = mysqli_fetch_array($result)) {
      if ($row['typed'] == '0') {
          $check_nearest_ball = $row['equipment_to_borrow'];
          $actionn = $row['actionn'];
          if(($actionn == 'BORROWING') and ($fet_exec_check_ball[$check_nearest_ball] != NULL or $fet_exec_check_ball[$check_nearest_ball] != '')){ 
?>
        <div>
        <div class="text-center">
            <h4 id = "thistypeotp">Type The OTP into the Machine</h4>
            
            <b>Important Note:</b>
            <li align = "justify center" class = "alignments">The OTP will <b>reset</b> if you click the <b>`Cancel`</b> button.</li>
                    
            <li align = "justify center" class = "alignments">The OTP <b>expires</b> after 5 minutes</li>
                            <br>
                            <?php
                            if(isset($_POST['otp_error'])){
                              ?>
                              <script>
                                  alert("OTP ERROR");

                              </script>
                              <?php

                            }
                            ?>     
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
          elseif(($actionn =='BORROWING') and ($fet_exec_check_ball[$check_nearest_ball] == NULL or $fet_exec_check_ball[$check_nearest_ball] == '')) {
            ?>
                      <div>
          <div class="text-center">
            <h4 id = "thistypeotp"><?php echo $row['equipment_to_borrow']?> is currently not available, please try again later</h4>
        </div>
        <div class="row">
            <div class="text-center">
            <a href = "home.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">back to home</a>
            </div>
        </div>

        <?php
          }else{
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
      }
      else {
        
        if ($row['actionn'] == 'BORROWING') {
        ?>
        <div>
          <div class="text-center">
            <h4 id = "thistypeotp">Please Wait and Claim the borrowed ball in the Machine</h4>
            
            <b>Important Note:</b>
            <li align = "justify center" class = "alignments">If the ball is <b>deflated/damaged</b>, Please return the ball to the PE Department <b>Immediately</b></li>
                            <br>     
        </div>
        <div class="row">
            <div class="text-center">
            <a href = "home.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">back to home</a>
            </div>
        </div>

      </div><!-----END OF PARENT DIV--------->


          <?php
        }//end of if condition for borrowing

        elseif ($row['actionn'] == 'RETURNING') {
          if($fet_exec_check_unreturned > 0){
          ?>\
          <br>
          <br>
          
          <h4 class= "text-center"><?php echo $row['equipment_to_borrow']?> Return Door has been Unlocked</h4>
          <h5 class = "text-center"> Please Return the ball within 15 seconds. The door will <b>Lock<b> after the time expires</h5>
          <?php
          }
          else {
            ?>
                    <div>
          <div class="text-center">
            <h4 id = "thistypeotp">Equipment Returned Successfully! <br>
            You can view and download your borrower's slip in the transaction menu 
            </h4>
                            <br>     
        </div>
        <div class="row">
            <div class="text-center">
            <a href = "home.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">back to home</a>
            </div>
        </div>

      </div><!-----END OF PARENT DIV--------->
            <?php
          }
        }

      }//end of else
    }// end of while loop
    } //end of check if condition


else {
?>
<div>
        <div class="text-center">
            <h3 id = "thistypeotp">OTP/Request has been Expired</h3>
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
            <a href = "home.php" class="btn btn-danger">Okay</a>
        </div>
   
    </div><!-----END OF PARENT DIV-------->
<?php
}
?>
