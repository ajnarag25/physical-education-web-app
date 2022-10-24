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
    <script>
      var x = document.getElementById("display_otp");
        function exexutedis() {
        var otp = "<?php        
              echo $_SESSION['borrower_get_data']['otp_generate'];
                    ?>"
              x.innerHTML = otp;
        }
        
      
</script>
</head>

<body onload = "exexutedis()">
    
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
            <h3 id = "thistypeotp">Type This OTP into the Machine</h3>
            <h6 id = "nevershare"> <b>NEVER SHARE</b> this Code with Others, the OTP will also send to your gsfe account<br> Valid for  <b> 5 minutes</b></h6>
            <h6 id = "nevershare"> <b>Impotant Note:</b> The OTP and Terms and Conditions will be <b> void</b> if you Cancel or Leave this page</h6>
        </div>
          <div class="row">
            <div class="text-center">
              <button onclick = "mdown()" class="btn btn-dark" style = "color:white;">Click to View</button>
              <h1 id = "display_otp" style = "display:none;"></h1>
          </div>
          </div>
          
          <br>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" style = "color:white;" hidden>Generate new OTP</button>
            <button type="submit" class="btn btn-danger">Cancel</button>

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
      function mdown() {
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }
    </script>


</body>
</html>