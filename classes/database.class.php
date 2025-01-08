<?php

class Database {
    protected function connectDB() {
        $hostname = "localhost";
        $username = "root";
        $userpswd = "";
        $dbname = "inbentadb";

        $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $userpswd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $pdo;
    }

    protected function getUsername() {
    }

    protected function getPassword() {
    }
}