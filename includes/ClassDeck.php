<?php

/*****************************************************
 * Deck class.
 * A deck consists of 52 shuffled cards.
 * Methods: drawCard
 *****************************************************/
class Deck {
    // Arrays of the suits, the ranks and the values belonging to the ranks
    protected static $suits = ['h', 's', 'd', 'c'];
    protected static $ranks = ['a', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'j', 'q', 'k'];
    protected static $values = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10];
    
    /**
     * Deck constructor
     */
    public function __construct() {
        // Combine the rank and value arrays
        $rankValues = array_combine(self::$ranks, self::$values);
        
        // Construct the cards and put them in the deck array
        foreach (self::$suits as $suit) {
            foreach ($rankValues as $rank => $value) {
                $card = new Card($suit, $rank, $value);
                $this->deck[] = $card;
            }
        }
        
        // Shuffle the deck
        shuffle($this->deck);
    }
    
    /** 
     * Draw one card from the deck
     * @return class Card
     */
    public function drawCard() {
        $card = array_pop($this->deck);
        return $card;
    }
}

?>