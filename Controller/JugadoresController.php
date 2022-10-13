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
            $jugadores = $this -> jugadoresModel -> getJugadores();
            $equipos = $this -> equiposModel -> getEquipos();
            $session = $this -> authHelper -> isLoggedIn();
            foreach ($equipos as $equipo) {
                $mapEquipos[$equipo -> id_equipo] = "$equipo->nombre_equipo";
            };
            $this -> jugadoresView -> renderHome($jugadores, $mapEquipos, $session);
        }

        function createJugador(){
            $this -> authHelper -> checkLoggedIn();
            if(!empty($_POST['nombre']) && !empty($_POST['nro_camiseta']) && !empty($_POST['rol'])){
                $this -> jugadoresModel -> insertJugador($_POST['nombre'], $_POST['nro_camiseta'], $_POST['rol'], $_POST['equipos']);
                $this -> jugadoresView -> relocateHome();
            }else{
                $this -> jugadoresView -> relocateJugadores();
            }
        }

        function updateJugador(){
            $this -> authHelper -> checkLoggedIn();
            $jugador = $this -> jugadoresModel -> getJugador($_POST['jugadores']);
            // Si no se llena algun campo se deja el que esta actualmente
            if (empty($_POST['nombre'])) {
                $_POST['nombre'] = $jugador -> nombre_jugador;
            }
            if (empty($_POST['nro_camiseta'])) {
                $_POST['nro_camiseta'] = $jugador -> nro_camiseta;
            }
            if (empty($_POST['rol'])) {
                $_POST['rol'] = $jugador -> rol;
            }
            $this -> jugadoresModel -> updateJugador($_POST['nombre'], $_POST['nro_camiseta'], $_POST['rol'], $_POST['equipos'], $_POST['jugadores']);
            $this -> jugadoresView -> relocateHome();
        }

        function deleteJugador($id){
            $this -> authHelper -> checkLoggedIn();
            $this -> jugadoresModel -> deleteJugador($id);
            $this -> jugadoresView -> relocateHome();
        }

        function showEquipos(){
            $equipos = $this -> equiposModel -> getEquipos();
            $session = $this -> authHelper -> isLoggedIn();
            $this -> equiposView -> renderEquipos($equipos, $session);
        }

        function showEquipoInfo($id){
            $equipo = $this -> equiposModel -> getEquipo($id);
            $jugadores = $this -> jugadoresModel -> getJugadorEquipo($id);
            $session = $this -> authHelper -> isLoggedIn();
            $this -> equiposView -> renderEquipoInfo($equipo, $jugadores, $session);
        }

        function showJugadores(){
            $jugadores = $this -> jugadoresModel -> getJugadores();
            $equipos = $this -> equiposModel -> getEquipos();
            foreach ($equipos as $equipo) {
                $mapEquipos[$equipo -> id_equipo] = "$equipo->nombre_equipo";
            };
            $session = $this -> authHelper -> isLoggedIn();
            $this -> jugadoresView -> renderJugadores($jugadores, $equipos, $mapEquipos, $session);
        }

        function showJugadorInfo($id){
            $jugador = $this -> jugadoresModel -> getJugador($id);
            $equipo = $this -> equiposModel -> getEquipo($jugador->id_equipo_fk);
            $session = $this -> authHelper -> isLoggedIn();
            $this -> jugadoresView -> renderJugadorInfo($jugador, $equipo, $session);
        }
    };
