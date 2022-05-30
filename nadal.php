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
    <title>Star Stuck - Rafael Nadal</title>


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
    <div id="header" align="right">
        <?php displaySignIn(); ?>
    </div>

    <?php displayMenu(NADAL);?>

    <div id="content" style="overflow: auto;">
        <h1>Rafael Nadal</h1>
        <div class="celebrities">
            <div class="row">
                <div class="column">
                    <img src="img/rafaelnadal.png"  class="portraits" style="width: 85%;">
                </div>
                <p>Rafael Nadal Parera is a Spanish professional tennis player.
                    He is ranked world No. 5 in singles by the Association of Tennis Professionals (ATP).
                    Nadal has won 21 Grand Slam men's singles titles, the most in history, including a record 13 French Open titles.
                    He has won 91 ATP singles titles (including 36 Masters titles), with 62 of these on clay.
                    Nadal's 81 consecutive wins on clay is the longest single-surface win streak in the Open Era.
                </p>
            </div>
        </div>

        <h2>Do you want to meet with Nadal?</h2>
        <div class="celebrities">
            <iframe  src="https://www.youtube.com/embed/IN8u-k7si0M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            <p>If you want to meet Rafael Nadal you can register for the draw on the link here.
            </p>

        </div>

    </div>
    <?php displayFooter();?>
</div>

</body>
</html>

