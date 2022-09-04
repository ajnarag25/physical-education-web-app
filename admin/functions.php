<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.min.css">

<?php
    include('connection.php');
    session_start();
    error_reporting(0);

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

?>