<!--- StarStuck home page
Author : Atanas Chelibashki
-->
<!DOCTYPE html>
<?php
require 'pageElements.php';
require 'userSession.php';

?>
<html>
    <head>
        <title>Star Stuck</title>

    <?php writeMetatags(); ?>
    <?php writeCommonStyles(); ?>
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
    <div id="header"><?php displaySignIn(); ?></div>

    <?php displayMenu(CELEBRITIES); ?>

            <div id="content" style="overflow: auto;">
                <h1>Find Your Favourite Star</h1>
                <p style="text-align: center">Our brand new website aims to connect fans with their favourite celebrity stars!</p>
                <p style="text-align: center">Search for your celebrities in the menu or use our search function!</p>


                <h2>Sport Stars</h2>
                <div class="celebrities">

                    <div class="card">
                        <a href="nadal.php" ><img src="img/rafaelnadal.png" alt="Nadal Avatar" style="width: 100%"></a>
                        <div class="card-container">
                            <h3><b>Rafael Nadal</b></h3>
                            <p>Tennis Player</p>
                        </div>
                    </div>

                    <div class="card">
                        <img src="img/hamilton.png" alt="Lewis Hamilton" style="width: 100%">
                        <div class="card-container">
                            <h3><b>Lewis Hamilton</b></h3>
                            <p>F1 Driver</p>
                        </div>
                    </div>

                    <div class="card">
                        <img src="img/derekjeter.png" alt="Derek Jeter" style="width: 100%">
                        <div class="card-container">
                            <h3><b>Derek Jeter</b></h3>
                            <p>Baseball Player</p>
                        </div>
                    </div>
                </div>

                <h2>Film Stars</h2>
                <div class="celebrities">

                    <div class="card">
                        <img src="img/angelinajolie.jpg" alt="Angelina Jolie" title="Angelina Jolie" style="width: 100%;">
                        <div class="card-container">
                            <h3><b>Angelina Jolie</b></h3>
                            <p>Actress</p>
                        </div>
                    </div>

                    <div class="card">
                        <img src="img/bradpitt.jpg" alt="profile Pitt" title="Brat Pitt" style="width: 100%;">
                        <div class="card-container">
                            <h3><b>Brad Pitt</b></h3>
                            <p>Actor</p>
                        </div>
                    </div>

                    <div class="card">
                        <img src="img/jenniferaniston.jpg" alt="Profile Aniston" title="Jennifer Aniston" style="width: 100%;">
                        <div class="card-container">
                            <h3><b>Jennifer Aniston</b></h3>
                            <p>Actress</p>
                        </div>
                    </div>

                </div>

                <h2>Music Stars</h2>
                <div class="celebrities">

                    <div class="card">
                        <img src="img/cher.jpg" alt="Cher" style="width: 100%">
                        <div class="card-container">
                            <h3><b>Cher</b></h3>
                            <p>Singer</p>
                        </div>
                    </div>

                    <div class="card">
                        <img src="img/madonna.jpg" alt="Madonna" style="width: 100%">
                        <div class="card-container">
                            <h3><b>Madonna</b></h3>
                            <p>Singer</p>
                        </div>
                    </div>


                    <div class="card">
                        <img src="img/mariahcarey.jpg" alt="Mariah Carey" style="width: 100%">
                        <div class="card-container">
                            <h3><b>Mariah Carey</b></h3>
                            <p>Singer</p>
                        </div>
                    </div>

                </div>
            </div>
            <?php displayFooter();?>
        </div>

    </body>
</html>

