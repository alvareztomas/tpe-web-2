<?php

    class UserModel{
        private $db;
        
        function __construct(){
            $this -> db = new PDO('mysql:host=localhost;' . 'dbname=db_jugadores;charset=utf8', 'root', '');
        }

        function getUser($email){
            $sentence = $this -> db -> prepare('SELECT * FROM users WHERE email = ?');
            $sentence -> execute([$email]);
            return $sentence -> fetch(PDO::FETCH_OBJ);
        }

        function addUser($email, $password){
            $sentence = $this -> db -> prepare("INSERT INTO users(email, password) VALUES(?, ?)");
            $sentence -> execute([$email, $password]);
        }

    };