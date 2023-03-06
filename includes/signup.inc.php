<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $npwdrepeadame = $_POST['pwdrepead'];
    require_once './dbh.inc.php';
    require_once './function.inc.php';

    if (emptyInputSignup($name, $email, $uid, $pwd, $npwdrepeadame) !== false) {
        header("Location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($uid) !== false) {
        header("Location: ../signup.php?error=invalidUid");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("Location: ../signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $npwdrepeadame) !== false) {
        header("Location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if (uiDExists($conn, $uid, $email) !== false) {
        header("Location: ../signup.php?error=usernametaken");
        exit();
    }

    CreateUser($conn, $name, $email, $uid, $pwd);

} else {
    header("Location: ../signup.php");
    exit();
}
