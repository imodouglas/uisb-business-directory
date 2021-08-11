<?php

class UserController extends UserModel{
    
    public function getUsers($callback = "allResults"){
        return $this->users($callback);
    }

    public function getUser($id, $callback = "singleResult"){
        return $this->user($id, $callback);
    }

    public function login($username, $password){
        $user = $this->getUser($username);
        if($user !== false){
            if($user['password'] == md5($password)){
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function createUser($fname, $lname, $email, $phone, $password){
        return $this->createAccount($fname, $lname, $email, $phone, md5($password));
    }

}