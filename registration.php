<?php
require 'database.php';
require 'pageElements.php';

ini_set('session.use_strict_mode', 1);
session_start();
?>

<html>
    <head>
        <title>Star Stuck Registration</title>
        <?php writeCommonStyles(); ?>

        <script src="js/validateRegForm.js" type="text/javascript"></script>

    </head>

    <body>
        <div id="container">

            <div id = "header"></div>

            <?php displayMenu(HOME); ?>

            <div id="content" style="overflow: auto">

                <h2>Register new celebrity account</h2>

<?php
// if there is an error from the previous registration attempt then display it
if (isset($_SESSION['errorMsg'])) {
    $errorMsg = $_SESSION['errorMsg'];
    echo "<p>$errorMsg";
    unset($_SESSION['errorMsg']);
}
?>

                <div class="celebrities">
                    <form action="processCelebReg.php" name="registrationForm" method="post">
                        <table class="twoColForm">
                            <tr><td>Please pick a user name:</td><td><input type="text" name="userName" required></td></tr>
                            <tr><td>Please enter your name:</td><td><input type="text" name="name" required></td></tr>
                            <tr><td>Please enter a password:</td><td><input type="password" name="pw" required></td></tr>
                            <tr><td>Please retype your password:</td><td><input type="password" name="pwcheck" required></td></tr>
                            <tr><td>Please enter what do you do for living:</td><td><input type="text" name="celeb_type" required></td></tr>
                            <tr><td>Please choose membership plan:</td>
                            <td>
                                <select name="service" id = service required>
                                    <option value=""></option>
                                    <option value="1">Send Custom Text messages</option>
                                    <option value="2">Send Custom Text and Video Messages</option>
                                    <option value="3">Send Custom Text,Video Messages and Merchandise</option>
                                </select>
                            </td></tr>
                            <tr><td colspan="2"><input type="submit" value="Register"></td></tr>
                        </table>
                    </form>
                </div>
                <h2>Register new user account</h2>
                <div class="celebrities">
                    <form action="processUserReg.php" name="registrationForm" method="post">
                        <table class="twoColForm">
                            <tr><td>Please pick a user name:</td><td><input type="text" name="userName" required></td></tr>
                            <tr><td>Please enter a password:</td><td><input type="password" name="pw" required></td></tr>
                            <tr><td>Please retype your password:</td><td><input type="password" name="pwcheck" required></td></tr>
                            <tr><td colspan="2"><input type="submit" value="Register"></td></tr>
                        </table>
                    </form>
                </div>
            </div>
            <?php displayFooter(); ?>
        </div>
    </body>
</html>
