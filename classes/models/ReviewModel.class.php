<?php

class ReviewModel extends Config {

    protected function reviews($id, $callback){
        $query = $this->query("SELECT * FROM reviews WHERE business_id=?", [$id], $callback);
        return $query;
    }

    protected function review($id, $callback){
        $query = $this->query("SELECT * FROM reviews WHERE id = ? ORDER BY id DESC", [$id], $callback);
        return $query;
    }

    protected function createReview($id, $name, $email, $review, $rating, $callback="boolean"){
        $statement = "INSERT INTO reviews (business_id, `name`, email, review, rating, created_at) VALUES (?,?,?,?,?,?)";
        $query = $this->query($statement, [$id, $name, $email, $review, $rating, time()], $callback);
        return $query;
    }


    // Review Rating Models

    protected function ratingSum($id, $callback){
        $query = $this->query("SELECT SUM(rating) AS ratings FROM reviews WHERE business_id = ?", [$id], $callback);
        return $query;
    }

}