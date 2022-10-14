<?php
    require_once './libs/smarty/libs/Smarty.class.php';

class JugadoresView{
    private $smarty;

    function __construct(){
        $this -> smarty = new Smarty();
    }

    function renderHome($jugadores, $mapEquipos, $session){
        $this -> smarty -> assign('jugadores', $jugadores);
        $this -> smarty -> assign('mapEquipos', $mapEquipos);
        $this -> smarty -> assign('session', $session);
        $this -> smarty -> display('./templates/home.tpl');
    }

    function relocateHome(){
        header("Location:".BASE_URL."home");
    }

    function relocateJugadores(){
        header("Location:".BASE_URL."jugadores");
    }

    function renderJugadores($jugadores, $equipos, $mapEquipos, $session){
        $this -> smarty -> assign('jugadores', $jugadores);
        $this -> smarty -> assign('equipos', $equipos);
        $this -> smarty -> assign('mapEquipos', $mapEquipos);
        $this -> smarty -> assign('session', $session);
        $this -> smarty -> display('jugadores.tpl');
    }

    function renderJugadorInfo($jugador, $equipo, $session){
        $this -> smarty -> assign('jugador', $jugador);
        $this -> smarty -> assign('equipo', $equipo);
        $this -> smarty -> assign('session', $session);
        $this -> smarty -> display('jugadorInfo.tpl');
    }
}