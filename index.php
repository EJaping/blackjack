<?php
    /**
     * Blackjack! Start page
     * The player can input his or her name, and start the game or go to
     * the manual.
     * @author Edda Japing
     */

    /* ======================================================================
     *
     * PAGE INITIALIZATION
     * 
     * ==================================================================== */
        
    /*
     * Includes
     */    

    include 'includes/classGame.php';
    include 'includes/classCard.php';
    include 'includes/classDeck.php';
    include 'includes/classHand.php';
    include 'includes/classPlayer.php';
    include 'includes/classDealer.php';
     
    /**
     * Start the session and set new Game object.
     */
    
    session_start();
    
    $_SESSION['game'] = new Game();
    
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
        
        <div>
            <form method="post" action="action.php" id="name">
                Name: <input type="text" name="name" />
                <input type="submit" name="action" value='Start' />
            </form>
        </div>

        <div id='rules'>
            <a href='manual.php'>Don't know the rules?</a>
        </div>
        
    </body>
</html>
