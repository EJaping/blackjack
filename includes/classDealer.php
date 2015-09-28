<?php

/*
 * Dealer class is a child of Hand class.
 * 
 * Methods: displayCards (parent class method overwritten), hitDealer.
 */

class Dealer extends Hand {
    
    /**
     * Displays the card images in the hand in a table row.
     * If the player is still playing (closedCard = true), then the first
     * card in the hand is closed.
     * @param boolean $closedCard
     */
    public function displayCards($closedCard) {
        // During play one of the dealer's cards is closed
        $first = true;
        $images = parent::getImages();
    
        // Display card images in a table row
        foreach ($images as $cardImage) {
            if($closedCard && $first) {
                //Closed card image
                echo "<td class=\"card_img\"><img src=\"images/cards/b2fv.png\"></td>";
                $first = false;
            } else {
                echo $cardImage;
            }
        }
    }
    
    /**
     * Give the dealer cards until hand value is 17 or higher.
     * Check if the hand value is now over 21.
     * If so, return true, otherwise return false.
     * @param class Deck $deck
     * @return boolean
     */
    public function hitDealer($deck) {
        // Add cards to the hand
        while (parent::calcValue() < 17) {
            parent::addCard($deck);
        }
        
        // Check if dealer busts
        $value = parent::calcValue();
        
        if ($value > 21) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Compare the value of the dealer's hand with that of the player's hand.
     * Return win, tie or lose.
     * @param class Player $player
     * @return string
     */
    public function compareHands($player) {
        $dealerValue = $this->calcValue();
        $playerValue = $player->calcValue();
        
         if ($playerValue > $dealerValue) {
            return "win";
        } elseif ($playerValue == $dealerValue) {
            return "tie";
        } else {
            return "lose";
        }
    }
}
 ?>