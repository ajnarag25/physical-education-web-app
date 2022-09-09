<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.min.css">

<?php
    include('connection.php');
    session_start();
    // error_reporting(0);

    #LOGOUT
    if (isset($_GET['logout'])) {
        session_destroy();
        header('location:index.php');
    }   
    
    #LOGIN
    if (isset($_POST['signin'])) {
        $user = $_POST['username'];
        $password = $_POST['password'];

        $login="SELECT * FROM admin WHERE username='$user'";
        $prompt = mysqli_query($conn, $login);
        $getData = mysqli_fetch_array($prompt);

        if (password_verify($password, $getData['password'])){
            $_SESSION['get_data'] = $getData;
            header('location:_dashboard.php');
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
        $mail = $_POST['email'];
        $pass1 = $_POST['password1'];
        $pass2 = $_POST['password2'];

        $sql = "SELECT * FROM admin WHERE username='$user' OR firstname='$first' AND lastname='$last' ";
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
                $conn->query("INSERT INTO admin (firstname, lastname, username, password, email, image) 
                VALUES('$first','$last', '$user','".password_hash($pass1, PASSWORD_DEFAULT)."','$mail','N/A')") or die($conn->error);
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

        if ($id_accept != null){
            $conn->query("UPDATE inquire SET status='UNPAID', sched_pay='$set_scheds' WHERE id='$id_accept'") or die($conn->error);
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
        if ($id_decline != null){
            $conn->query("UPDATE inquire SET status='DECLINED', note='$msg' WHERE id='$id_decline'") or die($conn->error);
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

        if ($check_status == 'PAID'){
            $conn->query("UPDATE inquire SET status='PICKUP', sched_pickup='$set_pickup' WHERE id='$id_pickup'") or die($conn->error);
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
        
        if ($id_cancel != null){
            $conn->query("UPDATE inquire SET status='CANCELED', note='$msg' WHERE id='$id_cancel'") or die($conn->error);
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
    #CANCEL INQUIRY
    if (isset($_POST['received_order'])) {
        $received_id = $_POST['id_received'];
        if ($received_id != null){
            $conn->query("UPDATE inquire SET status='RECEIVED' WHERE id='$received_id'") or die($conn->error);
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Updated the Inquiry',
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

?>