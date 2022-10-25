<?php 
  include('connection.php');
  session_start();
  if (!isset($_SESSION['get_data']['email'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html >
<html refresh = "" lang="en">
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
</head>

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

      <div class="jumbotron">
        <div class="text-center">
            <h3 id = "thistypeotp">Type The OTP into the Machine</h3>
            <b>The OTP is valid for 5 Minutes Only</b>
            <p><b> Important Note:</b> </p>
            <li align = "justify center" class = "alignments">The Terms and Conditions and the OTP will be <b>void</b> if you cancel or leave the page.</li>
                    
            <li align = "justify center" class = "alignments">The OTP is concealed for privacy and security purposes, toggle the button "Click to View" to show and hide the OTP</li>
                            <br>     

        </div>
        <div class="row">
            <div class="text-center">

              <button onclick = "mdown()" id = "toggle_bt" class="btn btn-dark" style = "color:white;">Click to View</button>
              <?php
              $id_no = $_SESSION['get_data']['id_no'];
              $sql = "SELECT id,otp_generate FROM borrowing_machine_info where id_no = '$id_no' AND status = 'PENDING'";
              $result = mysqli_query($conn, $sql);
              $get_id = null;
              while($row = mysqli_fetch_assoc($result)) {
                  $get_id = $row['id'];
              ?>
              <h1 id = "display_otp" style = "display:none;"> <?php echo $row['otp_generate']?></h1>
              <?php
              }
              ?>
          </div>
          </div>
          
          <br>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" style = "color:white;" hidden>Generate new OTP</button>
            <a href = "functions.php?cancel_otp_id=<?php echo $get_id?>" class="btn btn-danger">Cancel</a>
        </div>
   
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="js/scripts.js"></script>
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


</body>
</html>