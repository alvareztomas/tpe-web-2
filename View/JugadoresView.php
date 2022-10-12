<?php
    require_once './libs/smarty/libs/Smarty.class.php';

class JugadoresView{
    private $smarty;

    function __construct(){
        $this -> smarty = new Smarty();
    }

    function renderHome($jugadores, $equipos, $mapEquipos){
        $this -> smarty -> assign('jugadores', $jugadores);
        $this -> smarty -> assign('equipos', $equipos);
        $this -> smarty -> assign('mapEquipos', $mapEquipos);
        $this -> smarty -> display('./templates/home.tpl');
    }

    function relocateHome(){
        header("Location:".BASE_URL."home");
    }

    function renderJugadores($jugadores){
        $this -> smarty -> assign('jugadores', $jugadores);
        $this -> smarty -> display('jugadores.tpl');
    }

    function renderJugadorInfo($jugador){
        $this -> smarty -> assign('jugador', $jugador);
        $this -> smarty -> display('jugadorInfo.tpl');
    }
}