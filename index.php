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
            <div id="header" align="right"><?php displaySignIn(); ?></div>
            <?php displayMenu(HOME);?>

            <div id="content" style="overflow: auto;">
                <h1>The place to meet your favourite star!</h1>
                <p>Our brand-new website aims to connect fans with their favourite celebrity stars.</p>
                <p>Search for your celebrities in the menu or use our search function.</p>

                <div class="celebrities">
                    <div class="row">
                        <div class="column">
                            <img src="img/rafaelnadal.png"  class="portraits" style="width: 85%;">
                        </div>
                        <div class="column" style="float: right; width: 60%">
                            <h2>Sport Stars</h2>
                            <p> Do you want to meet Rafael Nadal? He is ranked world No. 5 in singles by the Association of Tennis Professionals (ATP).
                                Nadal has won 21 Grand Slam men's singles titles, the most in history, including a record 13 French Open titles.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="celebrities">
                    <h2>WIN ticket for Glasgow's Riverside Festival !</h2>
                    <p>One of you can win 2 VIP tickets for Riverside Festival 2022 and experience the show from behind the scene!</p>
                    <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Friversidefestivalglasgow%2Fvideos%2F555304586292014%2F&show_text=false&width=560&t=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

            </div>
            <?php displayFooter();?>
        </div>

    </body>
</html>

