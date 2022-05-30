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

    <script src="js/validateRegForm.js" type="text/javascript"></script>
    <script src="js/changecolour.js" type="text/javascript"></script>
    <link href="css/darkmode.css" rel="stylesheet" type="text/css" />
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
    <div id="header" align="right"><?php displaySignIn(); ?></div>
    <?php displayMenu(HOME);?>

    <div class="content" style="overflow: auto;">
        <h1>The place to meet your favourite star!</h1>
        <p>Our brand-new website aims to connect fans with their favourite celebrity stars.</p>
        <p>Search for your celebrities in the menu or use our search function.</p>

        <form role="search" method="get" action="search.php" target="_blank" >
            <input type="text" name="query" placeholder="Search..." class="SearchText" />
            <button type="submit" class="SearchButton" title="Submit the search"></button>
        </form>
    </div>
    <?php displayFooter();?>
</div>

</body>
</html>