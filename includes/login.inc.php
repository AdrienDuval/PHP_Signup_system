<?php 
if(isset($_POST["submit"])) {
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    require_once './dbh.inc.php';
    require_once './function.inc.php';

    if (emptyInputLogin($username, $pwd) !== false) {
        header("Location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);

    echo $username;
    echo $pwd;
} else {
    header("Location: ../login.php");
    exit();
}