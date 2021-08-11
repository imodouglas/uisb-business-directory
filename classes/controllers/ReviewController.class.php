<?php

class ReviewController extends ReviewModel{
    
    public function getReviews($id, $callback = "allResults"){
        return $this->reviews($id, $callback);
    }

    public function getReview($id, $callback = "singleResult"){
        return $this->review($id, $callback);
    }

    public function addReview($id, $name, $email, $review, $rating){
        return $this->createReview($id, $name, $email, $review, $rating);
    }

    public function stars($id, $callback = "singleResult"){
        $ratingSum = $this->ratingSum($id, $callback);
        if($this->reviews($id, 'count') == 0){
            $stars = 0;
        } else {
            $sum = $ratingSum['ratings'];
            $ratingCount = $this->reviews($id, 'count');
            $stars = number_format(($sum / $ratingCount), 1);
        }
        return $stars;
    }

    public function displayStars($number){
        $result = "";
        for($i=1; $i <= $number; $i++){
            $result .= '<i class="fas fa-star active-star"></i>';
        } for($i=1; $i <= (5 - $number); $i++){ 
            $result .= '<i class="fas fa-star inactive-star"></i>';
        }
        return $result;
    }

    public function showStars($id){
        $result = "";
        $result .= $this->displayStars(round($this->stars($id)));
        $result .= '<br>'.$this->stars($id).' star from '. number_format($this->getReviews($id, 'count')).' reviews';

        return $result;
    }

}