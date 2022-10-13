<?php
    require_once './Model/UserModel.php';
    require_once './Helpers/AuthHelper.php';
    require_once './View/LoginView.php';

    class LoginController{  
        private $model;
        private $view;
        private $authHelper;

        function __construct(){
            $this -> model = new UserModel();
            $this -> view = new LoginView();
            $this -> authHelper = new AuthHelper();
        }

        function showLogin(){
            $this -> view -> renderLogin();
        }

        function logout(){
            $this -> authHelper -> logout();
            $this -> view -> renderLogin("Sesion finalizada");
        }

        function verifyLogin(){
            if(!empty($_POST['email']) && !empty($_POST['password'])){
                $email = $_POST['email'];
                $password = $_POST['password'];

                $user = $this -> model -> getUser($email);

                if($user && password_verify($password, $user->password)){
                    session_start();
                    $_SESSION["email"] = $email;
                    $this -> view -> renderHome();
                }else{
                    $this -> view -> renderLogin("Acceso denegado");
                }
            }
        }
    };