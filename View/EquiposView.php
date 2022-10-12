<?php
    require_once './libs/smarty/libs/Smarty.class.php';

class EquiposView{
    private $smarty;

    function __construct(){
        $this -> smarty = new Smarty();
    }

    function renderEquipos($equipos){
        $this -> smarty -> assign('equipos', $equipos);
        $this -> smarty -> display('./templates/equipos.tpl');
    }

    function renderEquipoInfo($equipo, $jugadores){
        $this -> smarty -> assign('equipo', $equipo);
        $this -> smarty -> assign('jugadores', $jugadores);
        $this -> smarty -> display('./templates/equiposInfo.tpl');
    }
};