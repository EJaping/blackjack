<?php
    /**
     * Blackjack! Manual page
     * Explains the rules of the game.
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
        
        <div id='manual'>
            <h2>The Rules of Blackjack</h2>
            <h3>The game</h3>
            <p>
                This game is played by two people, a player and a dealer. The aim is 
                to beat the dealer by getting a higher score, without going over 21.
            </p>
            <p>
                Both dealer and player start with two cards, though only one of the 
                dealer's cards is visible. Then the player can choose either 
                <b>Hit</b> or <b>Stand</b>.<br />
                If the player chooses <b>Hit</b>, he or she gets another card. If this 
                makes the value of his or her hand go over 21, the player loses 
                ('busts'). If the player chooses <b>Stand</b>, it's the dealer's turn.
            </p>
            <p>
                If the dealer doesn't bust, the hand values are compared. When 
                the player scores higher, the player wins. When the dealer 
                scores higher, the player loses. If the scores are equal, it's 
                a tie.
            </p>
            
            <h3>Card values</h3>
            <p>
                The cards 2 through 10 have their face value. J, Q, and K are 
                worth 10 points each.<br />The Ace is worth either 1 or 11 points. 
                This is the player's choice, and can change during the round.
            </p>
            
            <h3>Scoring</h3>
            <p>
                The player starts the game with a Money value of 100. Scoring is 
                as follows:
            </p>
            <ul>
                <li>Player wins: + 10</li>
                <li>Player loses: - 10</li>
                <li>Player's first two cards make 21: Blackjack! + 15</li>
                <li>Player goes to next round without playing: - 5</li>
            </ul>
            <p>
                When the player has no money left, he or she loses the game.
            </p>
        </div>
        
        <form method="post" action="action.php" id="toindex">
            <input type="submit" name="action" value='Back' />
        </form>
        
    </body>
</html>
