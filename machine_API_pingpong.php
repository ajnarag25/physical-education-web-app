<?php
include('connection.php');
session_start();
date_default_timezone_set('Asia/Manila');
?>
<?php
if (isset($_POST['changestat_empty'])) {
    $conn->query("UPDATE ping_pong_stat SET is_emptyy =1 "."WHERE id = 1") or die($conn->error);
}

if (isset($_POST['changestat_non_empty'])) {
    $conn->query("UPDATE ping_pong_stat SET is_emptyy = 0 "."WHERE id = 1") or die($conn->error);
    
}
?>
