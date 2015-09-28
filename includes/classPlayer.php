<?php

/******************************************************
 * Player class is a child of Hand class.
 *
 * Methods: hitMe
 ******************************************************/

class Player extends Hand {

    /**
     * Give the player one card. Check if the hand value is now over 21.
     * If so, return true, otherwise return false.
     * @param class Deck $deck
     * @return boolean
     */
    public function hitMe($deck) {
        parent::addCard($deck);
        
        $value = parent::calcValue();
        
        if ($value > 21) {
            return true;
        } else {
            return false;
        }
    }
} 
