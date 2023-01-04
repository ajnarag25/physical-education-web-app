<?php 
    include('connection.php');
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/images/tup-logo.png" rel="icon">
    <title>Confirmation</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

</head>

<style>
    #sig-canvas {
        border: 5px solid #000;
        border-radius: 15px;
        cursor: url('../assets/images/pen.png'), auto;
    }
</style>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light nav-bg">
        <div class="container">
          <img src="../assets/images/gear-spin.gif" width="50" alt="">
          <h4 class="title-pe">P.E Department</h4>  
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
          </div>
        </div>
      </nav>

    <div class="container mt-5">
    
        <div class="text-center">
        <?php 
            $get_id = $_GET['id'];
            $query = "SELECT * FROM reserve WHERE id='$get_id'";
            $result = mysqli_query($conn, $query);
            $check_row = mysqli_num_rows($result);
            while ($row = mysqli_fetch_array($result)) {
        ?>
        <br><br>
            <h2>Approving the request of student:  <?php echo $row['name']; ?></h2>
            <br>
            <h3>Please select approve button if you are approving the request and select decline if you are declining the request.</h3>
        </div>
        <br>
        <div class="text-center">
           
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approve<?php echo $row['id'] ?>">Approve Request</button>
            
            <!-- Modal Approve -->
            <div class="modal fade" id="approve<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="functions.php" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Approve Request</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h3>Are you sure to approve this request?</h3>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" value="<?php echo $row['id'] ?>" name="ids">
                            <button type="submit" class="btn btn-success" name="approve_osa">Yes</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Not now</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>

            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#decline<?php echo $row['id'] ?>">Decline Request</button>
                <!-- Modal Decline -->
                <div class="modal fade" id="decline<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="functions.php" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Decline Request</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3>Are you sure to decline this request?</h3>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" value="<?php echo $row['id'] ?>" name="ids">
                                <button type="submit" class="btn btn-danger" name="decline_osa">Yes</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Not now</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
        </div>
        <?php } ?>

    </div>


    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="../js/scripts.js"></script>

    <!---DITO KO NILAGAY YUNG PAG IMPORT NG QR JS PACKAGES----->
    <script type="text/javascript" src="../js/qr_js_packages/script_qr.js"></script>
    <script src="../js/canvas.js"></script>
</body>
</html>