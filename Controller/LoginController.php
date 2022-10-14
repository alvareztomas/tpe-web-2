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
            $session = $this -> authHelper -> isLoggedIn();
            $this -> view -> renderLogin($session);
        }

        function logout(){
            $this -> authHelper -> logout();
            $session = $this -> authHelper -> isLoggedIn();
            $this -> view -> renderLogin($session, "Sesion finalizada");
        }

        function showRegister(){
            $this -> authHelper -> checkLoggedIn();
            $session = $this -> authHelper -> isLoggedIn();
            $this -> view -> renderRegister($session);
        }

        function register(){
            $this -> authHelper -> checkLoggedIn();
            $session = $this -> authHelper -> isLoggedIn();
            if(!empty($_POST['email']) && !empty($_POST['password'])){
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $password = password_hash($pass, PASSWORD_BCRYPT);
                $this -> model -> addUser($email, $password);
                $this -> view -> renderRegister($session, "Registro exitoso!");
            }else{
                $this -> view -> relocateRegister();
            }
        }

        function verifyLogin(){
            $session = $this -> authHelper -> isLoggedIn(); // Previene que se desloguee si escribe /verify en la URL
            if(!empty($_POST['email']) && !empty($_POST['password']) && !$session){
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
            }else{
                $this -> view -> renderHome();
            }
        }
    };