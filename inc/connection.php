<?php
$connection = mysqli_connect("216.15.108.25", "tarot-keeper", "tarot-keeper2020", "tarot-keeper");

if (!$connection) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
else {
    // echo "<script>console.log('Successful connection to database!');</script>";
}
?>