<?php

/**********************************************************************
 * Game Class.
 * Responsible for the mechanics of gameplay. Responds to user actions.
 * 
 * Public methods: start, newRound, hit, stand, illegalNewRound
 * Private methods: checkMoney, processCompareHands, blackjack
 *********************************************************************/

class Game {
    public $username;
    public $player;
    public $dealer;
    public $deck;
    public $money;
    public $inPlay;
    public $message;
    
    /**
     * Constructor function.
     * Sets username.
     */
    public function __construct() {
        $this->username = empty($_POST['name']) ? "Player" : $_POST['name'];
    }
    
    /**
     * Starts the game.
     */
    public function start() {
        // Start with 100 in money
        $this->money = 100;
        
        // Start new round
        $this->newRound();
    }
    
    /**
     * Starts a new Round.
     */
    public function newRound() {
        // Initialize deck, player and dealer
        $this->deck = new Deck();
        $this->player = new Player();
        $this->dealer = new Dealer();
        

        // Round is in play, set starting message
        $this->inPlay = true;
        $this->message = "Hit or Stand?";

        // Two cards for dealer and player
        $this->player->addCard($this->deck, 2);
        $this->dealer->addCard($this->deck, 2);
        
        // Deal with blackjack
        $this->blackjack();
    }
    
    /**
     * When the player clicks the hit button, deal a card and check if
     * player busts.
     */
    public function hit() {
        // Deal card
        $bust = $this->player->hitMe($this->deck);
        
        // Handle player buusting
         if ($bust) {
                $this->inPlay = false;
                $this->money -= 10;
                $this->checkMoney();
                $this->message = "You busted...";
            }
    }
    
    /**
     * Player clicks stand nutton:
     * Give dealer cards, check if dealer busts.
     */
    public function stand() {
        // Round is not in play
        $this->inPlay = false;
        
        // Give dealer cards
        $bust = $this->dealer->hitDealer($this->deck);
        
        // Deal with dealer bust/no bust
        if ($bust) {
            $this->message = "Dealer busted, you win!";
            $this->money += 10;
        } else {
            // Compare dealer and player hands and deal with the outcome
            $outcome = $this->dealer->compareHands($this->player);
            $this->processCompareHands($outcome);
        }
    }
    
    /**
     * Check if Next Round is clicked while game is in play, if so
     * deduct money.
     */
    public function illegalNewRound() {
        if ($_SESSION["game"]->inPlay) {
            $_SESSION["game"]->money -= 5;
        }
        return $this->checkMoney();
    }
    
    /**
     * Check if money is gone, if so: end game.
     */
    private function checkMoney() {
        if ($this->money <= 0) {
            $this->message = "You lose...";
            sleep(1);
            header("location:finish.php");
            
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Process the outcome of comparing the dealer and player hands.
     * Outcome can be: win, tie or lose.
     * @param string $outcome
     */
    private function processCompareHands($outcome) {
        switch ($outcome) {
                case "win":
                    $this->money += 10;
                    $this->message = "You Win!";
                    break;
                case "tie":
                    $this->message = "It's a tie!";
                    break;
                case "lose":
                    $this->money -= 10;
                    $this->checkMoney();
                    $this->message = "You Lose...New Round?";
                    break;
            }
    }
    
    /**
     * If the first two cards add up to 21 it's a blackjack and the player wins
     */
    private function blackjack() {
        if ($this->player->calcValue() == 21) {
            $this->inPlay = false;
            $this->money += 15;
            $this->message = "Blackjack!";
        }
    }
}