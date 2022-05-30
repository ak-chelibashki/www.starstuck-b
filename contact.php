<!--- StarStuck home page
Author : Atanas Chelibashki
-->
<!DOCTYPE html>
<?php
require 'userSession.php';
require 'pageElements.php';
?>

<html>
<head>
    <title>Star Stuck</title>


    <?php writeMetatags("Star Stuck Celebrities Home page"); ?>
    <?php writeCommonStyles();?>
    <?php importJS();?>

    <script type="text/javascript">
        function displayError(msg) {
            alert("Problem signing in: "+msg);
        }
    </script>
</head>

<body
    <?php
    // check for a sign in error and post an alert if necessary
    $errMsg = null;
    if (isset($_SESSION['errorMsg'])) {
        $errMsg = $_SESSION['errorMsg'];
        echo "onload='displayError(\"$errMsg\");'";
        unset($_SESSION['errorMsg']);
    }
    ?>
>
<div id="container">
    <div id="header" align="right"><?php displaySignIn(); ?>

    </div>
    <?php displayMenu(CONTACT);?>

    <div id="content" style="overflow: auto;">
        <h1>About us</h1>
        <p>Our brand-new website aims to connect fans with their favourite celebrity stars.</p>
        <p>Search for your celebrities in the menu or use our search function.</p>
        <p>If you are a celebrity and you would like to advertise yourself or sell your merchant
            you can register <a href="registration.php">here</a>
            .</p>



    </div>
    <?php displayFooter();?>
</div>

</body>
</html>
