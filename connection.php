<?php
date_default_timezone_set('Asia/Manila');
$server = "localhost";
$user = "root";
$pass = "";
$database = "pe_dept_db";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
$conn->query("DELETE FROM otp_requests WHERE `date_time_generate` < (NOW() - INTERVAL 5 MINUTE);") or die($conn->error);
?>