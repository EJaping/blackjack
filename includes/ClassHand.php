<?php

/******************************************************************
 * Hand class.
 * A hand consists of an array of cards, drawn from the deck.
 * Methods: addCard, calcValue, getImages
 *****************************************************************/
class Hand {
    
    /**
     * Hand constructor: a hand starts as an empty array.
     */
    public function __construct() {
        $this->hand = [];
    }
    
    /**
     * Add a card from the deck to the hand.
     * You can choose how many cards to add. Default is one.
     * @param class Deck $deck
     * @param int $amount
     */
    public function addCard($deck, $amount = 1) {
        for ($i = 0; $i < $amount; $i++) {
            $this->hand[] = $deck->drawCard();
        }
    }
    
    /**
     * Calculate the combined value of the cards in the hand.
     * @return int value
     */
    public function calcValue() {
        $this->value = 0;
        $ace = false;
        
        // Check for aces
        foreach ($this->hand as $card) {
            if ($card->rank == 'a') {
                $ace = true;
            }
            // Calculate value
            $this->value += $card->value;
        }
        
        // If there's an ace in the hand, see if it will be counted as 11 instead of 11
        if($ace) {
            if (($this->value + 10) < 22) {
                $this->value += 10;
            }
        }
        
        // Return the hand value
        return $this->value;
    }
    
    /**
     * For each card: construct a string to display a table cell with the 
     * correct image name.
     * @return array of table cells.
     */
    public function getImages() {
        $this->images = [];
        
        // Construct the table cell with card image string and put it in the array
        foreach ($this->hand as $card) {
            $this->images[] = "<td class=\"card_img\"><img src=" . $card->callImage() . "></td>";
        }
        
        // Return images array
        return $this->images;
    }
    
    /**
     * Displays the card images in the hand in a table row.
     */
    public function displayCards() {
        $images = $this->getImages();
    
        foreach ($images as $cardImage) {
            echo $cardImage;
        }
    }
    
    /**
      * Counts the number of cards in a hand.
      * @return integer
      */
    public function numberOfCards() {
        return count($this->hand);
    }
}

 ?>