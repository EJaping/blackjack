<?php
    /**
     * Blackjack! Action page
     * Handling button clicks.
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
    
    /**
     * Code
     */
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $action = $_POST["action"];
    }

    // Checks which button is clicked and calls the appropriate function.
    if (isset($action)) {

        switch ($action) {
            //Start the game, go to round page
            case "Start":
                $_SESSION['game']->start();
                header("Location:round.php");
                break;
            
            case "Hit":
                $_SESSION['game']->hit();
                header("Location:round.php");
                break;
            
            case "Stand":
                $_SESSION['game']->stand();
                header("Location:round.php");
                break;
            
            // If Next Round is clicked while game is in Play: lose 5 money
            case "Next Round":
                if ($_SESSION['game']->illegalNewRound()) {
                    continue;
                } else {
                    $_SESSION['game']->newRound();
                    header("Location:round.php");
                }
                break;
            
            // Go to index page
            case "Restart":
            case "Go!":
            case "Back":
                header("Location:index.php");
                break;
        }

        // Refresh screen
        header("Refresh: 0");
    }
    
?>