<?php
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "form_validationDB";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connectioned failed:" . mysqli_connect_error());
} else {
    echo "good job";
}
