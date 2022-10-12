<?php
    require_once './Model/JugadoresModel.php';
    require_once './Model/EquiposModel.php';
    require_once './View/JugadoresView.php';
    require_once './View/EquiposView.php';

    class JugadoresController{
        private $jugadoresModel;
        private $equiposModel;
        private $jugadoresView;
        private $equiposView;

        function __construct(){
            $this -> jugadoresModel = new JugadoresModel();
            $this -> equiposModel = new EquiposModel();
            $this -> jugadoresView = new JugadoresView();
            $this -> equiposView = new EquiposView();
        }

        function showHome(){
            $jugadores = $this -> jugadoresModel -> getJugadores();
            $equipos = $this -> equiposModel -> getEquipos();
            $this -> jugadoresView -> showHome($jugadores, $equipos);
        }

        function createJugador() {
            $this -> jugadoresModel -> insertJugador($_POST['nombre'], $_POST['nro_camiseta'], $_POST['rol'], $_POST['equipos']);
            $this -> jugadoresView -> relocateHome();
        }

        function showEquipos(){
            $equipos = $this -> equiposModel -> getEquipos();
            $this -> equiposView -> showEquipos($equipos);
        }
    };
