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
        case 'create-jugador':
            $jugadoresController -> createJugador();
            break;
        case 'update-jugador':
            $jugadoresController -> updateJugador();
            break;
        case 'teams-list':
            $jugadoresController -> showEquipos();
            break;
        case 'equipos':
            $jugadoresController -> showEquipoInfo($params[1]);
            break;
        case 'players-list':
            $jugadoresController -> showJugadores();
            break;
        case 'jugadores':
            $jugadoresController -> showJugadorInfo($params[1]);
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
        case 'delete':
            $jugadoresController -> deleteJugador($params[1]);
            break;
        default:
            echo('404 Page not found!');
            break;
    }