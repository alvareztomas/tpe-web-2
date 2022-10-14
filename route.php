<?php
    require_once 'Controller/JugadoresController.php';
    require_once 'Controller/LoginController.php';

    $jugadoresController = new JugadoresController();
    $loginController = new LoginController();

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    if (!empty($_GET['action'])) { 
        $action = $_GET['action'];
    } else {
        $action = 'home';
    };

    $params = explode('/', $action);

    switch ($params[0]) {
        case 'home':
            $jugadoresController -> showHome();
            break;
        case 'crearJugador':
            $jugadoresController -> createJugador();
            break;
        case 'modificarJugador':
            $jugadoresController -> updateJugador();
            break;
        case 'eliminarJugador':
            $jugadoresController -> deleteJugador();
            break;
        case 'crearEquipo':
            $jugadoresController -> createEquipo();
            break;
        case 'modificarEquipo':
            $jugadoresController -> modificarEquipo();
            break;
        case 'eliminarEquipo':
            $jugadoresController -> eliminarEquipo();
            break;
        case 'equipos':
            if (isset($params[1])) {
                $jugadoresController -> showEquipoInfo($params[1]);
            }else{
                $jugadoresController -> showEquipos();
            }
            break;
        case 'jugadores':
            if(isset($params[1])){
                $jugadoresController -> showJugadorInfo($params[1]);
            }else{
                $jugadoresController -> showJugadores();
            }
            break;
        case 'login':
            $loginController -> showLogin();
            break;
        case 'logout':
            $loginController -> logout();
            break;
        case 'verify':
            $loginController -> verifyLogin();
            break;
        case 'registro':
            $loginController -> showRegistro();
            break;
        case 'agregarUsuario':
            $loginController -> register();
            break;
        default:
            echo('404 Page not found!');
            break;
    }