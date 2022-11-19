<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.min.css">

<?php
    include('connection.php');
    session_start();
    error_reporting(0);
    date_default_timezone_set('Asia/Manila');

    #LOGOUT
    if (isset($_GET['logout'])) {
        session_destroy();
        header('location:index.php');
    }   
    
    #LOGIN
    if (isset($_POST['signin'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $login="SELECT * FROM admin WHERE email='$email'";
        $prompt = mysqli_query($conn, $login);
        $getData = mysqli_fetch_array($prompt);


        if (password_verify($password, $getData['password'])){
            if ($getData['status'] == 'Enabled'){
                $_SESSION['get_data'] = $getData;
                header('location:_dashboard.php');
            }else{
                header('location:disabled.php');
 
            }
        }else{
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
            $(document).ready(function(){
                    Swal.fire({
                    icon: 'error',
                    title: 'Username and/or Password is incorrect',
                    text: 'Something went wrong!',
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

    }

    #SIGNUP
    if (isset($_POST['signup'])) {
        $first = $_POST['firstname'];
        $last = $_POST['lastname'];
        $user = $_POST['username'];
        $middlename = $_POST['middlename'];
        $mail = $_POST['email'];
        $pass1 = $_POST['password1'];
        $pass2 = $_POST['password2'];
    
        $sql = "SELECT * FROM admin WHERE (username='$user') OR (email = '$mail') OR (firstname='$first' AND lastname='$last' and middlename = '$middlename');";
        $result = mysqli_query($conn, $sql);

        if ($pass1 != $pass2){
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
              $(document).ready(function(){
                    Swal.fire({
                    icon: 'error',
                    title: 'Password does not match',
                    text: 'Something went wrong!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_sign-up.php";
                        }else{
                            window.location.href = "_sign-up.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }else{
            if(!$result->num_rows > 0){
                $conn->query("INSERT INTO admin (firstname, lastname, username,middlename, password, email, image)
                VALUES('$first','$last', '$user','$middlename','".password_hash($pass1, PASSWORD_DEFAULT)."','$mail','default_profile/default_pic.jpg')") or die($conn->error);
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
                            window.location.href = "_sign-up.php";
                            }else{
                                window.location.href = "_sign-up.php";
                            }
                        })
                        
                    })
            
                </script>
                <?php
            }
        }
    
    }

    #SET SCHEDULE OF PAYMENT
    if (isset($_POST['set_sched'])) {
        $id_accept = $_POST['id_accept'];
        $set_scheds = $_POST['sched'];
        $get_email = $_POST['email_set_sched'];

        if ($id_accept != null){
            $conn->query("UPDATE inquire SET status='UNPAID', note='Approved', sched_pay='$set_scheds' WHERE id='$id_accept'") or die($conn->error);
            include 'send_email_1.php';
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Approved!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_uniform.php";
                        }else{
                            window.location.href = "_uniform.php";
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
                    title: 'An Error Occured!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_uniform.php";
                        }else{
                            window.location.href = "_uniform.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    
    }

    #DECLINE INQUIRY
    if (isset($_POST['set_decline'])) {
        $id_decline = $_POST['id_decline'];
        $msg = $_POST['msg_decline'];
        $get_email = $_POST['email_set_decline'];
        if ($id_decline != null){
            $conn->query("UPDATE inquire SET status='DECLINED', note='$msg' WHERE id='$id_decline'") or die($conn->error);
            include 'send_email_2.php';
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Declined the Inquiry!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_uniform.php";
                        }else{
                            window.location.href = "_uniform.php";
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
                        window.location.href = "_uniform.php";
                        }else{
                            window.location.href = "_uniform.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }


    }

    #UPDATE INQUIRE INFORMATION
    if (isset($_POST['modify_inquire'])) {
        $id_modify = $_POST['id_modify'];
        $status = $_POST['stat'];
        $tshirt = $_POST['tshirts'];
        $short = $_POST['shorts'];
        $jogging = $_POST['joggingpants'];


        if ($id_modify != null){
            $conn->query("UPDATE inquire SET status='$status', size_t='$tshirt', size_s='$short', size_j='$jogging' WHERE id='$id_modify'") or die($conn->error);
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Updated',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_uniform.php";
                        }else{
                            window.location.href = "_uniform.php";
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
                        window.location.href = "_uniform.php";
                        }else{
                            window.location.href = "_uniform.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    }

    #SET SCHEDULE OF PICKUP
    if (isset($_POST['set_pickup'])) {
        $id_pickup = $_POST['id_pickup'];
        $set_pickup = $_POST['sched'];
        $check_status = $_POST['check_stat'];
        $get_email = $_POST['set_email_pickup'];

        if ($check_status == 'PAID'){
            $conn->query("UPDATE inquire SET status='PICKUP', note='Ready for Pickup', sched_pickup='$set_pickup' WHERE id='$id_pickup'") or die($conn->error);
            include 'send_email_3.php';
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Set Pickup Schedule!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_uniform.php";
                        }else{
                            window.location.href = "_uniform.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
            
        }elseif ($check_status == 'UNPAID'){
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'warning',
                    title: 'This user is still unpaid',
                    text: 'Please check the status',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_uniform.php";
                        }else{
                            window.location.href = "_uniform.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
        else{
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
                        window.location.href = "_uniform.php";
                        }else{
                            window.location.href = "_uniform.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    
    }

    #CANCEL INQUIRY
    if (isset($_POST['set_cancel'])) {
        $id_cancel = $_POST['id_cancel'];
        $msg = $_POST['msg_cancel'];
        $get_email = $_POST['set_email_cancel'];
        if ($id_cancel != null){
            $conn->query("UPDATE inquire SET status='CANCELED', note='$msg' WHERE id='$id_cancel'") or die($conn->error);
            include 'send_email_4.php';
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Canceled the Inquiry!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_uniform.php";
                        }else{
                            window.location.href = "_uniform.php";
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
                        window.location.href = "_uniform.php";
                        }else{
                            window.location.href = "_uniform.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }


    }

    #RECEIVED ORDER
    if (isset($_POST['received_order'])) {
        $received_id = $_POST['id_received'];
        $get_email = $_POST['set_email_received'];
        if ($received_id != null){
            $conn->query("UPDATE inquire SET status='RECEIVED', note='Completed Inquiry' WHERE id='$received_id'") or die($conn->error);
            include 'send_email_5.php';
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Completed the transaction',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_uniform.php";
                        }else{
                            window.location.href = "_uniform.php";
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
                        window.location.href = "_uniform.php";
                        }else{
                            window.location.href = "_uniform.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    }

    #RESCHEDULE INQUIRY
    if (isset($_POST['set_resched'])) {
        $resched_id = $_POST['id_resched'];
        $get_resched = $_POST['resched_date'];
        $get_email = $_POST['set_email_resched'];
        if ($resched_id != null){
            $conn->query("UPDATE inquire SET status='PICKUP', note='Rescheduled', sched_pickup='$get_resched' WHERE id='$resched_id'") or die($conn->error);
            include 'send_email_6.php';
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Reschedule the Inquiry',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_uniform.php";
                        }else{
                            window.location.href = "_uniform.php";
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
                        window.location.href = "_uniform.php";
                        }else{
                            window.location.href = "_uniform.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    }

    #ACCEPT REQUEST
    if (isset($_POST['set_accept'])) {
        $id_accepts = $_POST['id_accept'];
        $get_email = $_POST['email_set_accept'];

        if ($id_accepts != null){
            $conn->query("UPDATE reserve SET status='ACCEPTED' WHERE id='$id_accepts'") or die($conn->error);
            include 'send_email_7.php';
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Accepted the Request',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_reservation.php";
                        }else{
                            window.location.href = "_reservation.php";
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
                        window.location.href = "_reservation.php";
                        }else{
                            window.location.href = "_reservation.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    } 

    #DECLINE REQUEST
    if (isset($_POST['decline_req'])) {
        $id_declines = $_POST['id_decline'];
        $get_email = $_POST['email_set_decline'];
        $msg = $_POST['msg_decline'];

        if ($id_declines != null){
            $conn->query("UPDATE reserve SET status='DECLINED', reason='$msg' WHERE id='$id_declines'") or die($conn->error);
            include 'send_email_11.php';
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Declined the Request',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_reservation.php";
                        }else{
                            window.location.href = "_reservation.php";
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
                        window.location.href = "_reservation.php";
                        }else{
                            window.location.href = "_reservation.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    } 

    #APPROVE REQUEST
    if (isset($_POST['set_approval'])) {
    $id_approve = $_POST['id_approval'];
    $get_email = $_POST['get_email_approval'];
    $status = $_POST['stats'];
    $resched = $_POST['resched'];
    $reasons = $_POST['reason'];
    $setdate = $_POST['setdate'];

    if ($resched == null && $status =='APPROVED'){
        $conn->query("UPDATE reserve SET status='APPROVED', reason='$reasons', resched='N/A' WHERE id='$id_approve'") or die($conn->error);
        include 'send_email_8.php';
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Approved Request',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "_reservation.php";
                    }else{
                        window.location.href = "_reservation.php";
                    }
                })
                
            })
    
        </script>
        <?php
            
    }elseif ($resched == null && $status == 'DECLINED'){
        $conn->query("UPDATE reserve SET status='DECLINED', reason='$reasons', resched='N/A' WHERE id='$id_approve'") or die($conn->error);
        include 'send_email_9.php';
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Declined the Request',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "_reservation.php";
                    }else{
                        window.location.href = "_reservation.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else{
        if ($id_approve != null){
            $conn->query("UPDATE reserve SET status='RESCHEDULE', reason='$reasons', resched='$resched' WHERE id='$id_approve'") or die($conn->error);
            include 'send_email_10.php';
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Reschedule Request',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_reservation.php";
                        }else{
                            window.location.href = "_reservation.php";
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
                        window.location.href = "_reservation.php";
                        }else{
                            window.location.href = "_reservation.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
        }
    }

    #CANCEL REQUEST
    if (isset($_POST['cancel_req'])) {
        $id_cancel = $_POST['id_cancel'];
        $get_email = $_POST['email_set_cancel'];
        $msg = $_POST['msg_cancel'];

        if ($id_cancel != null){
            $conn->query("UPDATE reserve SET status='CANCELED', reason='$msg' WHERE id='$id_cancel'") or die($conn->error);
            include 'send_email_12.php';
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Canceled the Request',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "_reservation.php";
                        }else{
                            window.location.href = "_reservation.php";
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
                        window.location.href = "_reservation.php";
                        }else{
                            window.location.href = "_reservation.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    } 

    #UPLOAD IMAGE ADMIN
    if (isset($_POST['upload_admin_image'])) {
        $get_id_img = $_POST['admin_id_img'];

        $target_dir = "../uploads/profile_pic/";
        $target_file = $target_dir . basename($_FILES["admin_profile"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["admin_profile"]["tmp_name"]);
    
        if($check !== false) {
        
            $uploadOk = 1;
            if ($uploadOk == 0) {
                ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                        icon: 'error',
                        title: 'Sorry, your file was not uploaded',
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
            } else {
                move_uploaded_file($_FILES["admin_profile"]["tmp_name"], $target_file);
            }
                $sql="UPDATE admin SET image='$target_file' WHERE id='$get_id_img'";
                $result = mysqli_query($conn, $sql);
                header('location: _profile.php');
            
        } else {
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'error',
                    title: 'File is not an image!',
                    text: 'Please upload an image format',
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

    #CHANGE USERNAME ADMIN
    if (isset($_POST['user_admin'])) {
        $id_user = $_POST['id_username'];
        $get_username = $_POST['username'];

        if ($id_user != null){
            $conn->query("UPDATE admin SET username='$get_username' WHERE id='$id_user'") or die($conn->error);
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
                        window.location.href = "index.php";
                        }else{
                            window.location.href = "index.php";
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

    #CHANGE PASSWORD ADMIN
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
            $conn->query("UPDATE admin SET password='".password_hash($password1, PASSWORD_DEFAULT)."' WHERE id='$id_pass'") or die($conn->error);
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
                        window.location.href = "index.php";
                        }else{
                            window.location.href = "index.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    }
?>

<?php
if (isset($_POST['submit_report'])) {
    $id_no = $_POST['id_no'];
    $equipment = $_POST['equipment'];
    $ball_id = $_POST['ball_id'];
    $time_borrow = $_POST['time_borrow'];
    $date_borrow = $_POST['date_borrow'];
    $time_return = $_POST['time_return'];
    $date_return = $_POST['date_return'];
    $remarks = $_POST['remarks'];
    $status = "pending";
    $admin_name = $_POST['admin_name'];
    $conn->query("INSERT INTO report_equip (id_no, equipment, ball_id, time_borrow, date_borrow, time_return, date_return, remarks,admin_name, status)
VALUES('$id_no','$equipment','$ball_id','$time_borrow','$date_borrow','$time_return','$date_return','$remarks','$admin_name','$status')") or die($conn->error);
                ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                        title: 'Are you sure?',
                        text: "The Student will never be able to borrow equipments in the machine until the student report to you.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, I understand'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                            'Report Submit Successfully!',
                            'The student is banned from borrowing in the machine',
                            'success'
                            )
                            window.location.href = "_basketball.php";
                        }
                        })
                        
                    })
                </script>


<?php

}
?>