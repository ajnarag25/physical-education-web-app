<?php
include('connection.php');
session_start();
date_default_timezone_set('Asia/Manila');

if (isset($_POST['success_really'])) {
    $id_no=  $_SESSION['get_data']['id_no'];
    $check_typed="SELECT * FROM otp_requests WHERE id_no='$id_no'";
    $result = mysqli_query($conn, $check_typed);
    while ($row = mysqli_fetch_array($result)) {
        $equipment_to_borrow = $row['equipment_to_borrow'];
    if ($row['typed'] == '0') {
        ?>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
                $(document).ready(function(){
                    Swal.fire({
                    position: 'middle',
                    icon: 'error',
                    title: "Please type the OTP into the machine first!",
                    showConfirmButton: false,
                    timer: 1500
                    }).then((result)=>{
                        window.location.href = "display_otp_equip.php";
                    })
                    })
        </script>
    <?php
    }
    else {
        // IF THE ACTION IS FOR BORROWING::
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


        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
                $(document).ready(function(){
                Swal.fire({
                icon: 'sucess',
                title: 'Please Wait and Claim the borrowed ball in the machine',
                text:'Note: If the ball is deflated/damaged, Please return the ball to the PE Department Immediately',
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



        // IF THE ACTION SAVED IS FOR RETURNING::
        elseif ($row['actionn'] == 'RETURNING') {
            $query_check="SELECT id_no FROM borrowing_machine_info WHERE status ='UNRETURNED'";
            $result_check = mysqli_query($conn, $query_check);
            $check_row = mysqli_num_rows($result_check);
            if ($check_row == 0) {
                ?>
                <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                            $(document).ready(function(){
                            Swal.fire({
                            icon: 'Success',
                            title: 'The Ball has been Returned',
                            text:'The Borrowers Slip can be download on transaction menu.',
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
                <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                            $(document).ready(function(){
                            Swal.fire({
                            icon: 'Error',
                            title: 'Please put the <?php echo $equipment_to_borrow?> inside the returning hole',
                            text:'Please insert the ball into the Machine',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "display_otp_equip.php";
                                }else{
                                    window.location.href = "display_otp_equip.php";
                                }
                            })
                        })
                </script>
                <?php
            }
    ?>
    
    <?php
        }
    }
}// end of while loop
}
?>


<?php
// WEMOS1 = NODEMCU = FOR OTP AND OPENING THE RETURN HOLE DEPENDS ON WHAT KIND OF EQUIPMENT IS BEING RETURNED
// WEMOS2 = WEMOS D1 R1 =FOR BORROW AND FOR IR SENSOR THAT SERVES AS CONFIRMATION OF RETURNING EQUIPMENT OR SOMETHING ROLLS INSIDE THE MACHINE

if (isset($_POST['fetch_otp_wemos1'])) {
    $get_otp = $_POST['fetch_otp_wemos1'];
    $query="SELECT * FROM otp_requests WHERE otp_generate='$get_otp'";
    $prompt = mysqli_query($conn, $query);
    $check = mysqli_num_rows($prompt);
    $get_data = mysqli_fetch_array($prompt);
    if ($check == 0) {
        echo "OTP doesnt exists";
    }
    else {
            $conn->query("UPDATE otp_requests SET typed= '1' WHERE otp_generate = '".$get_otp."'") or die($conn->error);
            
            if ($get_data['actionn'] == 'RETURNING') {
                echo "returning".$get_data['equipment_to_borrow'];
                //SEND THIS TO WEMOS1 TO OPEN THE RETURN HOLE DEPENDING ON THE BORROWED BALL BY ACTIVATING THE SERVO MOTOR
            }
            else {
                echo "borrowing".$get_data['equipment_to_borrow'];
            }
            
    }
    
}

//Isaiah 41:10
?>
<?php
if (isset($_POST['ir_volleyball_wemos2'])) {
    $query="SELECT * FROM otp_requests WHERE typed='1'";
    $prompt = mysqli_query($conn, $query);
    $get_data = mysqli_fetch_array($prompt);
    $conn->query("UPDATE borrowing_machine_info SET status= 'RETURNED' WHERE id_no = '".$get_data['id_no']."';") or die($conn->error);
    $conn->query("UPDATE borrowing_machine_info SET time_return = '".date("h:ia")."'"." WHERE id_no = '".$get_data['id_no']."';") or die($conn->error);
    $conn->query("UPDATE borrowing_machine_info SET date_return = '".date("Y-m-d")."'"." WHERE id_no = '".$get_data['id_no']."';") or die($conn->error);

    
}

?>