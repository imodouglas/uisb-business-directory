<?php

class ConfigController extends Config{

    public function doQuery($statement, $execute = "", $callback){
        return $this->query($statement, $execute, $callback);
    }

    public function states(){
        $query = "SELECT * FROM states";
        $result = $this->query($query, [], 'allResults');
        return $result;
    }

    public function activeStates(){
        $query = "SELECT * FROM states WHERE status = ?";
        $result = $this->query($query, ['active'], 'allResults');
        return $result;
    }

}