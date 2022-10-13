<?php
    require_once './Model/JugadoresModel.php';
    require_once './Model/EquiposModel.php';
    require_once './View/JugadoresView.php';
    require_once './View/EquiposView.php';
    require_once './Helpers/AuthHelper.php';

    class JugadoresController{
        private $jugadoresModel;
        private $equiposModel;
        private $jugadoresView;
        private $equiposView;
        private $authHelper;

        function __construct(){
            $this -> jugadoresModel = new JugadoresModel();
            $this -> equiposModel = new EquiposModel();
            $this -> jugadoresView = new JugadoresView();
            $this -> equiposView = new EquiposView();
            $this -> authHelper = new AuthHelper();
        }

        function showHome(){
            // $this -> authHelper -> checkLoggedIn();
            $jugadores = $this -> jugadoresModel -> getJugadores();
            $equipos = $this -> equiposModel -> getEquipos();
            foreach ($equipos as $equipo) {
                $mapEquipos[$equipo -> id_equipo] = "$equipo->nombre_equipo";
            };
            $this -> jugadoresView -> renderHome($jugadores, $equipos, $mapEquipos);
        }

        function createJugador() {
            $this -> jugadoresModel -> insertJugador($_POST['nombre'], $_POST['nro_camiseta'], $_POST['rol'], $_POST['equipos']);
            $this -> jugadoresView -> relocateHome();
        }

        function showEquipos(){
            $equipos = $this -> equiposModel -> getEquipos();
            $this -> equiposView -> renderEquipos($equipos);
        }

        function showEquipoInfo($id){
            $equipo = $this -> equiposModel -> getEquipo($id);
            $jugadores = $this -> jugadoresModel -> getJugadorEquipo($id);
            $this -> equiposView -> renderEquipoInfo($equipo, $jugadores);
        }

        function showJugadores(){
            $jugadores = $this -> jugadoresModel -> getJugadores();
            $this -> jugadoresView -> renderJugadores($jugadores);
        }

        function showJugadorInfo($id){
            $jugador = $this -> jugadoresModel -> getJugador($id);
            $this -> jugadoresView -> renderJugadorInfo($jugador);
        }
    };
