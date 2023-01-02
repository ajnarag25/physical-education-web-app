<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/images/tup-logo.png" rel="icon">
    <title>E-Signature</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

</head>

<style>
    #sig-canvas {
        border: 5px solid #000;
        border-radius: 15px;
        cursor: url('/assets/images/pen.png'), auto;
    }
</style>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light nav-bg">
        <div class="container">
          <img src="assets/images/gear-spin.gif" width="50" alt="">
          <h4 class="title-pe">P.E Department</h4>  
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
          </div>
        </div>
      </nav>

    <div class="container mt-5">
    
        <div class="text-center">
            <h3>E-Signature:</h3>
            <p>Sign in the canvas below and submit your signature.</p>
            <canvas id="sig-canvas" class="mt-2" width="750" height="300">Your browser does not support the HTML canvas tag.</canvas>
            <textarea style="display:none" id="sig-dataUrl" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
            <br>
            <img style="display:none" id="sig-image" src="" alt="Your signature will go here!"/>
        </div>
        <br>
        <div class="text-center">
            <button type="submit" class="btn btn-success" id="sig-submitBtn">Submit Signature</button>
            <button class="btn btn-danger" id="">Decline Request</button>
            <button class="btn btn-secondary" id="sig-clearBtn">Clear Signature</button>
        </div>
    

    </div>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="js/scripts.js"></script>

    <!---DITO KO NILAGAY YUNG PAG IMPORT NG QR JS PACKAGES----->
    <script type="text/javascript" src="js/qr_js_packages/script_qr.js"></script>
    <script src="js/canvas.js"></script>
</body>
</html>