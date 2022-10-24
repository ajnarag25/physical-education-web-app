<?php 
  include('connection.php');
  session_start();
  date_default_timezone_set('Asia/Manila');
  if (!isset($_SESSION['get_data']['email'])) {

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
		/>
		<title>Borrower's Receipt</title>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"
		/>
		<!-- <link rel="stylesheet" href="css/custom.css" /> -->
		<link rel="stylesheet" href="css/custom2.css" />
	</head>
	<body>
		<?php if(isset ($_SESSION["bbid"]) and isset ($_SESSION["equipment"]))
		{
		?>
		<div class="container receipt-wrap" id="receipt-wrap">
			<div class="row justify-content-md-center">
				<div class="receipt-main col-xs-10 col-sm-10 col-md-6">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-2">
							<div class="receipt-left">
								<img
									class="img-responsive"
									alt="tuplogo"
									src="uploads/for_pdf/tuplogo.png"
									style="width: 71px; border-radius: 71px"
								/>
							</div>
						</div>
						<div class="col-sm-6 col-md-10 text-center">
							<div class="receipt-right">
								<h5>Technological University of the Philippines-Cavite</h5>
								<p>CQT. Ave. Salawag, Dasmariñas City, Cavite
                                    <i class="fa fa-phone"></i></p>
								<p>Telefax: (046) 416-4920<i class="fa fa-envelope-o"></i></p>
								<p>Email: cavite@tup.edu.ph │  Website: www.tup.edu.ph <i class="fa fa-location-arrow"></i></p>
                                <br>
                                
							</div>
						</div>
					</div>

					<br />
					<center><h5>Borrower's Slip</h5></center>
					<br>
					<div class="row">
						<div class="col-xs-8 col-sm-8 col-md-8 text-left">
							<div class="receipt-right">
								
								<h5>ID No: <span><?php echo $_SESSION['get_data']['id_no'];?></span></h5>
								<p><b>Name:</b> <span>
								<?php echo $_SESSION['get_data']['firstname'];?>
                    			<?php echo $_SESSION['get_data']['middlename'];?>
                    			<?php echo $_SESSION['get_data']['lastname'];?>
								</span></p>
                                <p><b>Course:</b><span><?php echo $_SESSION['get_data']['course'];?></span></p>
								<p><b>Email :</b> <span><?php echo $_SESSION['get_data']['email'];?></span></p>
								<p><b>Contact Number:</b> <span><?php echo $_SESSION['get_data']['contact'];?></span></p>
							</div>
						</div>
					</div>

					<br />

					<div>
						<table class="table table-border">
							<thead>
								<tr>
									<th>Ball ID</th>
									<th>Equipment</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="col-md-2"><b><?php echo $_SESSION["bbid"]?></b> </td>
									<td class="col-md-2"><b><?php echo $_SESSION["equipment"]?></b> </td>
								</tr>
							</tbody>
						</table>
						<table class="table table-border">
							<thead>
								<tr>
                                    <th>Time</th>
									<th>Date(y-m-d)</th>
								</tr>
							</thead>
							<tbody>
								<tr>
                                    <td class="col-md-2"> <b><?php echo date("h:ia");?></b>  </td>
                                    <td class="col-md-2"> <b><?php echo date("Y-m-d");?></b></td>
								</tr>
							</tbody>
						</table>
					</div>
					<hr>
					<div class="row">
						<div class="receipt-right">
							<h5>Terms and Conditions:</h5>
							<li>I agree that I will take good care of the sports equipment being borrowed.</li>
							<li>I agree that I will return the sports equipment after used.</li>
							<li>I agree that I will take accountability to any damage to the sports equipment being borrowed.</li>
							<li>I agree that any loss of sports equipment is subject to penalty.</li>
							<li>I agree that the information of my transactions will be  saved  for security purposes and will be kept confidential.</li>
							<li>I agree that the sports equipment will be used only  within the TUPC premises.</li>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <hr>
							<div class="receipt-right">
								<h5 style="color: rgb(39, 38, 38); font-weight:800 ;">This Borrower's is Downloaded Upon Accepting Terms and Conditions</h5>
                                    
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		}
		else {
			?>

			<h1>Request Denied</h1>
          	<h6>There's Something wrong with your URL request</h6>
			<?php
		}
		?>
	</body>
</html>