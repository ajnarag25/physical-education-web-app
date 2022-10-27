<?php 
  include('connection.php');
  session_start();
  if (!isset($_SESSION['get_data']['email'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/images/tup-logo.png" rel="icon">
    <title>P.E Department - Borrow Equipment</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>

<?php
$typed = '0';
$id_no = $_SESSION['get_data']['id_no'];

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<body>
    <nav class="navbar navbar-expand-lg navbar-light nav-bg sticky-top">
        <div class="container">
          <img src="assets/images/gear-spin.gif" width="50" alt="">
          <h4 class="title-pe">P.E Department</h4>
          <button class="navbar-toggler"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          </div>
        </div>
      </nav>
      <?php 
          $id_no = $_SESSION['get_data']['id_no'];
          $query = "SELECT otp_generate FROM otp_requests where id_no = '$id_no';";
          $result = mysqli_query($conn, $query);
          $check = mysqli_num_rows($result);
          if ($check > 0) {
                    ?>
        <div class="jumbotron">
        <div class="text-center">
            <h4 id = "thistypeotp">Type The OTP into the Machine and click "Done" button to claim</h4>
            
            <li><b>Important Note:</b></li>
            <li align = "justify center" class = "alignments">The OTP will <b>reset</b> if you leave the page or click the `Cancel` button.</li>
                    
            <li align = "justify center" class = "alignments">Toggle the button "Click to View" to show and hide the OTP <b>Valid for 5 Minutes Only</b></li>
                            <br>     
        </div>
        <div class="row">
            <div class="text-center">
              <button onclick = "mdown()" id = "toggle_bt" class="btn btn-dark" style = "color:white;">Click to View</button>
              <?php 
                  $query = "SELECT id,otp_generate FROM otp_requests where id_no = '$id_no';";
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_array($result)) {
                    ?>
              <h1 id = "display_otp" style = "display:none;"><?php echo $row['otp_generate'] ?></h1>
          </div>
          </div>
          <br>
        <div class="text-center">
            
            <form action="machine_API.php" method="post">
              <a href = "functions.php?cancel_otp_id=<?php echo $row['id'] ?>" class="btn btn-danger">Cancel</a>
              <button type = "submit" class="btn btn-info" name="success_really" style = "color:white;">Done</a>
            </form>
            
        </div>
        <?php
            }
        ?>
   
    </div><!-----END OF JUMBOTRON--------->
    <?php
          }
          else {
    ?>
    <div class="jumbotron">
        <div class="text-center">
            <h3 id = "thistypeotp">OTP has been Expired</h3>
        </div>
        <div class="row">
            <div class="text-center">
              <form action="functions.php" method="post">
                <input type="hidden" name = "id_no" value = <?php echo $_SESSION['arr_user']['id_no']?>>
                <input type="hidden" name = "equipment_to_borrow" value = <?php echo $_SESSION['arr_user']['equipment_to_borrow']?>>
                <input type="hidden" name = "typed" value = <?php echo $_SESSION['arr_user']['typed']?>>
                <input type="hidden" name = "actionn" value = <?php echo $_SESSION['arr_user']['actionn']?>>
              <button type = "submit" name = "generate_new_otp" class="btn btn-dark" style = "color:white;">Generate New OTP</button>
              </form>
          </div>
          </div>
          <br>
        <div class="text-center">
            <a href = "home.php" class="btn btn-danger">back to home</a>
        </div>
   
    </div><!-----END OF JUMBOTRON--------->

    <?php
          }
    ?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="js/scripts.js"></script>
  <!-----IMPORTING AJAX MODULE FOR POST REQUEST--->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
<!----END ------>
    <script>
      function preview() {
          frame_1.src=URL.createObjectURL(event.target.files[0]);
      }
    </script>

    <script>
      var x = document.getElementById("display_otp");
      var tg_btn = document.getElementById("toggle_bt");
      function mdown() {
        if (x.style.display === "none") {
          x.style.display = "block";
          tg_btn.innerHTML = "Click To Hide";
        } else {
          x.style.display = "none";
          tg_btn.innerHTML = "Click To View";
        }
      }
    </script>





    <script>
      setTimeout(function(){
      window.location.reload();
    },310000);
    </script>

</body>
</html>