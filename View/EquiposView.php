<?php
    require_once './libs/smarty/libs/Smarty.class.php';

class EquiposView{
    private $smarty;

    function __construct(){
        $this -> smarty = new Smarty();
    }

    function showEquipos($equipos){
        $this -> smarty -> assign('equipos', $equipos);
        $this -> smarty -> display('./templates/equipos.tpl');
    }
};