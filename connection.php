<?php

try {
    $servername = "localhost";
    $dbname = "pe_dept_db";
    $username = "root";
    $password = "";

    $conn = mysqli_connect('localhost', $username, $password, $dbname);

}
catch(Execption $e){
    echo "Connection failed: " . $e->getMessage();
}

?>