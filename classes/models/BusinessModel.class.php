<?php

class BusinessModel extends Config {

    protected function businesses($extras, $callback){
        $query = $this->query("SELECT * FROM businesses $extras", null, $callback);
        return $query;
    }

    protected function bizSearch($extras, $execute, $callback){
        $query = $this->query("SELECT * FROM businesses $extras", $execute, $callback);
        return $query;
    }

    protected function business($slug, $callback){
        $query = $this->query("SELECT * FROM businesses WHERE slug = ?", [$slug], $callback);
        return $query;
    }

    protected function addBusiness($userId, $name, $slug, $email, $phone, $address, $category, $workStart, $workEnd, $description, $logo, $image, $callback="boolean"){
        $statement = "INSERT INTO businesses(`user_id`, `name`, slug, email, phone, `address`, category, work_start, work_end, `description`, logo, `image`, created_at, `status`) VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $query = $this->query($statement, [$userId, $name, $slug, $email, $phone, $address, $category, $workStart, $workEnd, $description, $logo, $image, time(), 'active'], $callback);
        return $query;
    }

}