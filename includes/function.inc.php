<?php

function emptyInputSignup($name, $email, $uid, $pwd, $npwdrepeadame)
{
    $result;
    if (empty($name) || empty($email) ||  empty($uid) || empty($pwd) || empty($npwdrepeadame)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
};

function invalidUid($uid)
{
    $result;
    $patternuid = ("/^[a-zA-Z0-9]*$/");
    if (!preg_match($patternuid, $uid)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
};

function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
};

function pwdMatch($pwd, $npwdrepeadame)
{
    $result;
    if ($pwd !== $npwdrepeadame) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
};

function uiDExists($conn, $uid, $email)
{
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stm = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stm, $sql)) {
        header("Location: ../signup.php?error=usernametaken");
        exit();
    }

    mysqli_stmt_bind_param($stm, "ss", $uid, $email);
    mysqli_stmt_execute($stm);

    $resultData = mysqli_stmt_get_result($stm);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stm);
}

function CreateUser($conn, $name, $email, $uid, $pwd)
{
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stm = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stm, $sql)) {
        header("Location: ../signup.php?error=usernametaken");
        exit();
    }
    $hasedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stm, "ssss", $name, $email, $uid, $hasedPwd);
    mysqli_stmt_execute($stm);
    mysqli_stmt_close($stm);
    header("Location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd)
{
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
};

function loginUser($conn, $username, $pwd)
{
    $uidExist = uiDExists($conn, $username, $username);
    if ($uidExist === false) {
        header("Location: ../login.php?error=WrongLogin");
        exit();
    }
    $pwdHashed = $uidExist["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("Location: ../login.php?error=WrongLogin");
        exit();
    } elseif ($checkPwd === true) {
        session_start();
        $_SESSION['userid'] = $uidExist["usersID"];
        $_SESSION['useruid'] = $uidExist["usersUid"];
        header("location: ../index.php?error=login");
    }
}
