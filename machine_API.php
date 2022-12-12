<?php
include('connection.php');
session_start();
date_default_timezone_set('Asia/Manila');
?>

<?php


if(isset($_POST['command'])){
    echo "hey";
}

if (isset($_POST['otpdata'])) {
    $otp =$_POST['otpdata'];
    $query_get_data = "SELECT * FROM otp_requests WHERE otp_generate = '$otp' and typed = '0' and is_expired = '0'";
    
    $result_get_data = mysqli_query($conn, $query_get_data);
    $row_get_data = mysqli_num_rows($result_get_data);
    $fetch_data = mysqli_fetch_array($result_get_data);

    if ($row_get_data>0) {
        
        //transfer some data in a variable.
        $id_no = $fetch_data['id_no'];
        $equipment = $fetch_data['equipment_to_borrow'];
        $time_borrow = date("h:ia");
        $date_borrow = date("Y-m-d");
        $query_id = "SELECT * FROM registration WHERE id_no = '$id_no'";
        $result_get_id = mysqli_query($conn, $query_id);
        $fetch_id = mysqli_fetch_array($result_get_id);
        $qr = $fetch_id['qr'];
        
        //fetch all the balls separated by rows 1-3
        $fetch_ball_3="SELECT `$equipment` FROM ball_sequence WHERE id ='3'";
        $fetch_ball_2="SELECT `$equipment` FROM ball_sequence WHERE id ='2'";
        $fetch_ball_1="SELECT `$equipment` FROM ball_sequence WHERE id ='1'";
        
        $result_fetch_ball_3 = mysqli_query($conn, $fetch_ball_3);
        $result_fetch_ball_2 = mysqli_query($conn, $fetch_ball_2);
        $result_fetch_ball_1 = mysqli_query($conn, $fetch_ball_1);
        
        
        $fetch_ball_r3 = mysqli_fetch_array($result_fetch_ball_3);
        $fetch_ball_r2 = mysqli_fetch_array($result_fetch_ball_2);
        $fetch_ball_r1 = mysqli_fetch_array($result_fetch_ball_1);

            //get the ball in row 3-1
        $ball_id_1 = $fetch_ball_r1[$equipment];
        $ball_id_2 = $fetch_ball_r2[$equipment]; 
        $ball_id_3  = $fetch_ball_r3[$equipment];

        // lcd.clear();
        // lcd.setCursor(0,0);
        // lcd.print("Enter your OTP:");
        // lcd.setCursor(0,1);
        // lcd.print(otp_typed);
        // Serial.print("sent");
        // delay(1000);

        $conn->query("UPDATE otp_requests SET typed='1' WHERE otp_generate='$otp'") or die($conn->error);
        $command = $fetch_data['actionn'].$fetch_data['equipment_to_borrow'];
        

        if($command == 'BORROWINGvolleyball' OR $command == 'BORROWINGbasketball'){
            $conn->query("UPDATE otp_requests SET is_expired='1' WHERE otp_generate='$otp'") or die($conn->error);
            $conn->query("INSERT INTO `borrowing_machine_info`(`id_no`, `equipment`, `ball_id`, `time_borrow`, `date_borrow`, `time_return`, `date_return`, `status`, `qr`)
            VALUES ('$id_no','$equipment','$ball_id_3','$time_borrow','$date_borrow','N/A','N/A','UNRETURNED','$qr')") or die($conn->error);

            $conn->query("UPDATE ball_sequence SET $equipment= '$ball_id_2' WHERE id ='3';") or die($conn->error);
            $conn->query("UPDATE ball_sequence SET $equipment='$ball_id_1' WHERE id ='2';") or die($conn->error);
            $conn->query("UPDATE ball_sequence SET $equipment='' WHERE id ='1';") or die($conn->error);
            
        }
        if ($command == 'BORROWINGvolleyball') {
            echo 'BORROW_V_BALL';
        }
        elseif ($command == 'BORROWINGbasketball') {
            echo 'BORROW_B_BALL';
        }
        elseif($command == 'RETURNINGvolleyball'){
                echo 'RETURN_V_BALL';

        }
        elseif ($command == 'RETURNINGbasketball') {
            echo 'RETURN_B_BALL';
        }
    }
    else {
        echo"otp_error";
        
    }
}


if (isset($_POST['confirmreturn'])) {
    $query_return_ball = "SELECT * FROM otp_requests WHERE typed = '1' and is_expired = '0' and actionn = 'RETURNING'";
    $result_return_ball = mysqli_query($conn, $query_return_ball);
    $row_return_ball = mysqli_num_rows($result_return_ball);
    $fetch_data_return_ball = mysqli_fetch_array($result_return_ball);

    if ($row_return_ball > 0) {
        
        //transfer some data in a variable.
        $id_no = $fetch_data_return_ball['id_no'];
        $equipment = $fetch_data_return_ball['equipment_to_borrow'];
        $time_return = date("h:ia");
        $date_return = date("Y-m-d");

        $query_ball_id = "SELECT * FROM borrowing_machine_info WHERE id_no = '$id_no' and status = 'UNRETURNED'";
        $result_ball_id = mysqli_query($conn, $query_ball_id);
        $fetch_ball_id = mysqli_fetch_array($result_ball_id);

        $borrowed_ball_id = $fetch_ball_id['ball_id'];

        

        //fetch all the balls separated by rows 1-3
        $fetch_ball_3="SELECT `$equipment` FROM ball_sequence WHERE id ='3'";
        $fetch_ball_2="SELECT `$equipment` FROM ball_sequence WHERE id ='2'";
        $fetch_ball_1="SELECT `$equipment` FROM ball_sequence WHERE id ='1'";



        
        $result_fetch_ball_3 = mysqli_query($conn, $fetch_ball_3);
        $result_fetch_ball_2 = mysqli_query($conn, $fetch_ball_2);
        $result_fetch_ball_1 = mysqli_query($conn, $fetch_ball_1);
        
        
        $fetch_ball_r3 = mysqli_fetch_array($result_fetch_ball_3);
        $fetch_ball_r2 = mysqli_fetch_array($result_fetch_ball_2);
        $fetch_ball_r1 = mysqli_fetch_array($result_fetch_ball_1);

            //get the ball in row 3-1
        $ball_id_1 = $fetch_ball_r1[$equipment];
        $ball_id_2 = $fetch_ball_r2[$equipment]; 
        $ball_id_3  = $fetch_ball_r3[$equipment];

        $conn->query("UPDATE otp_requests SET is_expired='1' WHERE id_no='$id_no' and typed = '1'") or die($conn->error);
        $conn->query("UPDATE borrowing_machine_info SET status='RETURNED',time_return = '$time_return',date_return = '$date_return' WHERE id_no='$id_no' and status = 'UNRETURNED'") or die($conn->error);

        if (($ball_id_1 == '' OR $ball_id_1 == null) AND ($ball_id_2 != '' OR $ball_id_2 != null) AND ($ball_id_3 != '' OR $ball_id_3 != null)) {
            $conn->query("UPDATE ball_sequence SET $equipment= '$borrowed_ball_id' WHERE id ='1';") or die($conn->error);
        }elseif (($ball_id_1 == '' OR $ball_id_1 == null) AND ($ball_id_2 == '' OR $ball_id_2 == null) AND ($ball_id_3 != '' OR $ball_id_3 != null)) {
            $conn->query("UPDATE ball_sequence SET $equipment= '$borrowed_ball_id' WHERE id ='2';") or die($conn->error);
        }elseif (($ball_id_1 == '' OR $ball_id_1 == null) AND ($ball_id_2 == '' OR $ball_id_2 == null) AND ($ball_id_3 == '' OR $ball_id_3 == null)) {
            $conn->query("UPDATE ball_sequence SET $equipment= '$borrowed_ball_id' WHERE id ='3';") or die($conn->error);
        }

    }
}
?>

<?php
if (isset($_POST['reset_otp'])) {
    $conn->query("DELETE FROM otp_requests WHERE typed  = '1' AND is_expired = '0';") or die($conn->error);
}
?>
