<?php
/*
 * global constants
 */
const HOME = 0;
const CELEBRITIES = 1;
const ABOUT = 2;
const CONTACT = 3;
const ADMIN = 4;
const NADAL = 5;


/*
 * Method to import style sheets and fonts
 */
function writeCommonStyles()
{
    ?>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/menu.css" rel="stylesheet" type="text/css"/>
    <link href="css/darkmode.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Open+Sans:wght@300&family=Roboto:wght@100;300&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Open+Sans:wght@300&family=Roboto+Condensed&family=Roboto:wght@100;300&display=swap" rel="stylesheet"/>
    <?php
}

/*
 * Method to import required java scrips
 */
function importJS(){
    echo '<script src="js/validateRegForm.js" type="text/javascript"></script>';
    echo '<script src="js/changecolour.js" type="text/javascript"></script>';
}

/*
 * Method to write meta tags for
 * each page
 */
function writeMetatags()
{
    ?>
    <meta name="author" content="Atanas Chelibashki"/>
    <meta charset="utf-8">
    <meta name="description" content="Meet your favourite celebrity star"/>
    <meta name="keywords" content="star stuck, stars, favourite star
    , celebrities, sport celebrities, film celebrities, music celebrities"/>
    <meta name="author" content="Atanas Chelibashki Forth Valley College"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php
}

/* Display the menu in a page.
*/
function displayMenu($section)
{
    global $adminLevel;

    // the top level menu items are stored as an array
    if ($adminLevel < 1) {
        $menuItems = array('<a href="index.php" id="Home">Home</a>',
            '<a href="celebrities.php" id="Celebrities">Celebrities</a>',
            '<a href="about.php" id="MenuItem2">About</a>',
            '<a href="contact.php" id="Contact">Contact</a>',
            '<form role="search" method="get" action="search.php" target="_blank" >
            <input type="text" name="query" placeholder="Search..." class="SearchText" />
            <button type="submit" class="SearchButton" title="Submit the search"></button>
            </form>',toggleDarkMode()
        );
    }
    else {
        $menuItems = array('<a href="index.php" id="Home">Home</a>',
            '<a href="celebrities.php" id="Celebrities">Celebrities</a>',
            '<a href="about.php" id="MenuItem2">About</a>',
            '<a href="contact.php" id="Contact">Contact</a>',
            '<a href="admin.php" id="Admin">Admin</a>',
            '<form role="search" method="get" action="http://google.com/search?q=" target="_blank" >
            <input type="text" name="q" placeholder="Search..." class="SearchText" />
            <button type="submit" class="SearchButton" title="Submit the search"></button>
        </form>'
            );
    }

    // write the opening structure of the menu
    echo '<div id ="menu">
			<div class="menuBackground">
				<ul class="dropDownMenu">';

    // write the individual menu items
    $menuCount = count($menuItems);
    for ($i = 0; $i < $menuCount; $i++) {
        echo "\n<li";
        if ($section == $i) { // if an item is selected, add the correct class spec
            echo " class='selected'";
        }
        echo ">" . $menuItems[$i];
    }

    // write the closing structure of the menu
    echo "\n</ul>
			</div>
		</div>";
}



/* Display the footer information.
*/
function displayFooter()
{
    echo '<div id="footer">';
    echo '<h3 style="text-align: center;">&copy;Atanas Chelibashki</h3>';
    echo '<h3 style="text-align: center;">Forth Valley College</h3>';
    echo '</div>'."\n";
}

/*
 * Function to change background colour
 */
function toggleDarkMode(){
    echo '<button style="" onclick="togggleBackground()">Switch mode</button>';
}


/* Display the user form. If the user has not signed in, then this will be a sign-in
   form asking for their name. If they are signed in, it will be a sign-out form.
*/
function displaySignIn()
{
    // need to specify we want to access the global variable
    global $userName;

    // if there is no username set then we need to offer the sign in form or registration link
    if ($userName == '') {
        echo '<span id="signin"><form action="processSignIn.php" name="signInForm" onsubmit="return validateUserName(\'signInForm\');" method="post"><table border="0"><tr><td align="right">Please enter your user name:</td><td><input type="text" name="userName" required></td></tr><tr><td align="right">Password:</td><td><input type="password" name="pw" required></td></tr><tr><td colspan="2" align="right"><input type="submit" value="Sign In!"></td></tr></table></form><br>or <a href="registration.php">register here...</a></span>';
    }
    else { // otherwise, we offer the sign out form
        echo '<span id="signout"><form action="processSignOut.php" method="post">Welcome ' . $userName . ' <input type="submit" value="Sign Out"></form></span>';
    }
}
?>


