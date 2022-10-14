<?php
    require_once './libs/smarty/libs/Smarty.class.php';

    class LoginView{
        private $smarty;

        function __construct(){
            $this -> smarty = new Smarty();
        }

        function renderLogin($session, $error = ""){
            $this -> smarty -> assign('error', $error);
            $this -> smarty -> assign('session', $session);
            $this -> smarty -> display('./templates/login.tpl');
        }

        function renderHome(){
            header("Location:".BASE_URL."home");
        }

        function relocateRegistro(){
            header("Location:".BASE_URL."registro");
        }

        function relocateLogin(){
            header("Location:".BASE_URL."login");
        }

        function renderRegistro($session, $error = ""){
            $this -> smarty -> assign('error', $error);
            $this -> smarty -> assign('session', $session);
            $this -> smarty -> display('./templates/register.tpl');
        }

    };