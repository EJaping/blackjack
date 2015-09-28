<?php

/***********************************************************
 * Card class.
 * A card had a suit and a rank. 
 * A card also has a value, which depends on the rank.
 * Methods: callImage
 ***********************************************************/
class Card {
    protected $suit;
    public $rank;
    public $value;
   
    /**
     * Card constructor.
     * @param string $suit
     * @param string or int $rank
     * @param int $value
     */
    public function __construct($suit, $rank, $value) {
        $this->suit = $suit;
        $this->rank = $rank;
        $this->value = $value;
    }

    /**
     * Constructs the imagename of the card.
     * @return string
     */
    public function callImage() {
        $imageName = "images/cards/" . $this->suit . $this->rank . ".png";
        return $imageName;
    }
    
}

?>