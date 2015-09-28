<?php
    /**
     * Blackjack! End page
     * The player has lost all money, this ends the game.
     * @author Edda Japing
     */
        
    session_start();
 
    /* ======================================================================
     *
     * HTML START
     * 
     * ==================================================================== */
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8" />
        <title>Blackjack</title>
        <link type="text/css" rel="stylesheet" href="includes/default.css"  />
    </head>
    <body>
        
        <header>
            <img src="images/blackjack.png" id="blackjack" alt="blackjack" />
        </header>
        
        <div id='sorry'>
            Sorry, you lost all your money!
        </div>
        
        <form method="post" action="action.php" id='finish'>
            Do you want to play another game?
            <br />
            <br />

            <input type="submit" name="action" value="Go!" />
        </form>

        
    </body>
</html>