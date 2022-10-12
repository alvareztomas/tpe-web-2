<?php
    require_once 'Controller/JugadoresController.php';

    $jugadoresController = new JugadoresController();

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
        case 'team-list':
            $jugadoresController -> showEquipos();
            break;
        default:
            echo('404 not found');
            break;
    }