<?php

class DataBase{

    private string $_dbName = DBNAME;
    private string $_user = DBUSER;
    private string $_password = DBPASSWORD;

    protected function connectDb()
    {
        try {
            $database = new PDO("mysql:host=localhost;dbname=" . $this->_dbName . ";charset=utf8", $this->_user, $this->_password);
           $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $database;
        } catch (Exception $errorMessage) {
            die('Erreur : ' . $errorMessage->getMessage());
        }
    }
}