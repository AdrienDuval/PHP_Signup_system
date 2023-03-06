<body>
    <?php include_once('./header..php') ?>

    <div class="container">

        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <!--<img src="images/frontImg.jpg" alt="">-->
                <div class="text">
                    <span class="text-1">Every new friend is a <br> new adventure</span>
                    <span class="text-2">Let's get connected</span>
                </div>
            </div>
            <div class="back">
                <!--<img class="backImg" src="images/backImg.jpg" alt="">-->
                <div class="text">
                    <span class="text-1">Complete miles of journey <br> with one step</span>
                    <span class="text-2">Let's get started</span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="signup-form">
                    <div class="title">Signup</div>
                    <form action="./includes/signup.inc.php" method="POST">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" name="name" placeholder="Enter your name">
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="email" placeholder="Enter your email">
                            </div>
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" name="uid" placeholder="Enter your user name">
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="pwd" placeholder="Enter your password">
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="pwdrepead" placeholder="Repeat your password">
                            </div>
                            <div class="button input-box">
                                <input type="submit" name="submit" value="Sumbit">
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p>fil in all the feilds!</p>";
                        } elseif ($_GET["error"] == "invalidUid") {
                            echo "<p>Choose a proper username</p>";
                        } elseif ($_GET["error"] == "invalidemail") {
                            echo "<p>Choose a proper email</p>";
                        } elseif ($_GET["error"] == "passwordsdontmatch") {
                            echo "<p>password don't match</p>";
                        } elseif ($_GET["error"] == "usernametaken") {
                            echo "<p>user name already taken</p>";
                        } elseif ($_GET["error"] == "none") {
                            echo "<p>You have succesfully sigup </p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>