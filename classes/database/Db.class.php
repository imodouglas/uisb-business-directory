<?php

    class Db {
        private $dbHost = "localhost";
        private $dbName = "uisbpro";
        private $dbUser = "root";
        private $dbPass = "";

        protected function conn(){
            $conn = new PDO('mysql:host='.$this->dbHost.'; dbname='.$this->dbName, $this->dbUser, $this->dbPass);
            return $conn;
        }
    }