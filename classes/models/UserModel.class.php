<?php

class UserModel extends Config {

    protected function users($callback){
        $query = $this->query("SELECT * FROM users", null, $callback);
        return $query;
    }

    protected function user($id, $callback){
        $query = $this->query("SELECT * FROM users WHERE id = ? OR email = ? OR phone = ?", [$id, $id, $id], $callback);
        return $query;
    }

    protected function createAccount($fname, $lname, $email, $phone, $password, $callback = "boolean"){
        $statement = "INSERT INTO users (first_name, last_name, email, phone, `password`, created_at, `status`) VALUES (?,?,?,?,?,?,?)";
        $query = $this->query($statement, [$fname, $lname, $email, $phone, $password, time(), 'active'], $callback = 'id');
        return $query;
    }
}