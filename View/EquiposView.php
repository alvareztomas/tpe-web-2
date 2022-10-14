<?php
    require_once './libs/smarty/libs/Smarty.class.php';

class EquiposView{
    private $smarty;

    function __construct(){
        $this -> smarty = new Smarty();
    }

    function renderEquipos($equipos, $session, $error = ""){
        $this -> smarty -> assign('error', $error);
        $this -> smarty -> assign('session', $session);
        $this -> smarty -> assign('equipos', $equipos);
        $this -> smarty -> display('./templates/equipos.tpl');
    }

    function renderEquipoInfo($equipo, $jugadores, $session){
        $this -> smarty -> assign('equipo', $equipo);
        $this -> smarty -> assign('jugadores', $jugadores);
        $this -> smarty -> assign('session', $session);
        $this -> smarty -> display('./templates/equiposInfo.tpl');
    }

    function relocateEquipos(){
        header("Location:".BASE_URL."equipos");
    }
};