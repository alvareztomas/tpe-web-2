<?php
    require_once './libs/smarty/libs/Smarty.class.php';

    class LoginView{
        private $smarty;

        function __construct(){
            $this -> smarty = new Smarty();
        }

        function renderLogin($error = ""){
            $this -> smarty -> assign('error', $error);
            $this -> smarty -> display('./templates/login.tpl');
        }

        function renderHome(){
            header("Location:".BASE_URL."home");
        }

    };