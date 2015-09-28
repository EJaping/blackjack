<?php
    /**
     * Blackjack! Round page
     * Play the game.
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
     
    // Start the session
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
        <br />
        
        <div id="game">
            
            <h2>Dealer</h2>
            <div id="container">
                <table id="dealer">  
                    <tr> 
                    <?php 
                        $_SESSION['game']->dealer->displayCards($_SESSION['game']->inPlay);
                    ?> 
                    </tr>
                </table>
            </div>

            <h2><?php echo $_SESSION["game"]->username; ?></h2>
            <div id="container">
                <table id="player">  
                    <tr> 
                    <?php 
                        $_SESSION['game']->player->displayCards(); 
                    ?> 
                   </tr>
                </table>
            </div>
            <br />
            <br />
            
            <form method="post" action="action.php">
                <input type="submit" name="action" value="Hit" <?php if (!$_SESSION['game']->inPlay) {echo 'disabled="disabled"';} ?>/>
                <input type="submit" name="action" value="Stand" <?php if (!$_SESSION['game']->inPlay) {echo 'disabled="disabled"';} ?>/>
                <input type="submit" name="action" value="Next Round" />
            </form>
            <br />
        </div>
            
        <div id="com">
            
            <div id="message">
                <span>
                    <?php echo $_SESSION['game']->message; ?>
                </span>
            </div>
            
            <div id="score">
                <span>
                    <?php echo "Money: " . $_SESSION['game']->money; ?>
                </span>
            </div>
            
            <form method="post" action="action.php" id="restart">
                <input type="submit" name="action" value="Restart" />
            </form>
            
        </div>
        
    </body>
</html>
