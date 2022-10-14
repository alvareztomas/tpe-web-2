<?php

    class AuthHelper{

        function __construct(){ 
        }

        function checkLoggedIn(){
            session_start();
            if(!isset($_SESSION["email"])){
                header("Location:".BASE_URL."login");
                die();
            }
        }

        // Retorna la variable $_SESSION["email"] para renderizar condicionalmente en los templates
        function isLoggedIn(){ 
            if(!isset($_SESSION)){ 
                session_start(); 
            } 
            if(isset($_SESSION["email"])){
                return $_SESSION["email"];
            }else return null;
        }

        function logout(){
            session_start();
            session_destroy();
        }

    }