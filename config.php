<?php
error_reporting(1);
$host = "localhost";
$username = "root";
$password = "";
$dbname = "mcq";

// Connecting to database
$connection = mysqli_connect($host,$username,$password,$dbname);
mysqli_set_charset($connection,"utf8");

function mysqli_result($res,$row=0,$col=0){ 
    $numrows = mysqli_num_rows($res); 
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}

?>
