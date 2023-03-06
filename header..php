<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form validation</title>
    <link rel="stylesheet" href="style.css">
</head>

<div class="header">
    <ul>
        <?php if (isset($_SESSION["useruid"])) {
            echo "<li><a href='./account.php'>account</a></li>";
            echo "<li><a href='./logout.php'>log out</a></li>";
        } else {
            echo "<li><a href='./signup.php'>SIGNUP</a></li>";
            echo "<li><a href='./login.php'>LOG IN</a></li>";
        }
        ?>
    </ul>
</div>