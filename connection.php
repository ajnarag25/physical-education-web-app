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

?>