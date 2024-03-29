<?php
include('connection.php');
session_start();
date_default_timezone_set('Asia/Manila');
?>

<?php
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