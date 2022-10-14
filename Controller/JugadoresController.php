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
            if(!empty($_POST['nombre']) && ($_POST['nro_camiseta'] >= 0) && !empty($_POST['rol'])){
                $this -> jugadoresModel -> insertJugador($_POST['nombre'], $_POST['nro_camiseta'], $_POST['rol'], $_POST['equipos']);
            }
            $this -> jugadoresView -> relocateJugadores();
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
            $this -> jugadoresView -> relocateJugadores();
        }

        function deleteJugador(){
            $this -> authHelper -> checkLoggedIn();
            $this -> jugadoresModel -> deleteJugador($_POST['jugadores']);
            $this -> jugadoresView -> relocateJugadores();
        }

        function showEquipos(){
            $equipos = $this -> equiposModel -> getEquipos();
            $session = $this -> authHelper -> isLoggedIn();
            $this -> equiposView -> renderEquipos($equipos, $session);
        }

        function showEquipoInfo($id){
            $equipo = $this -> equiposModel -> getEquipo($id);
            if($equipo){
                $jugadores = $this -> jugadoresModel -> getJugadorEquipo($id);
                $session = $this -> authHelper -> isLoggedIn();
                $this -> equiposView -> renderEquipoInfo($equipo, $jugadores, $session);
            }else{
                $this -> equiposView -> relocateEquipos();
            }
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
            if($jugador){
                $equipo = $this -> equiposModel -> getEquipo($jugador->id_equipo_fk);
                $session = $this -> authHelper -> isLoggedIn();
                $this -> jugadoresView -> renderJugadorInfo($jugador, $equipo, $session);
            }else{
                $this -> jugadoresView -> relocateJugadores();
            }
        }

        function createEquipo(){
            $this -> authHelper -> checkLoggedIn();
            if(!empty($_POST['nombre']) && !empty($_POST['liga']) && ($_POST['titulos'] >= 0)){
                $this -> equiposModel -> insertEquipo($_POST['nombre'], $_POST['liga'], $_POST['titulos']);
            }
            $this -> equiposView -> relocateEquipos();
        }

        function modificarEquipo(){
            $this -> authHelper -> checkLoggedIn();
            $equipo = $this -> equiposModel -> getEquipo($_POST['equipos']);
            // Si no se llena algun campo se deja el que esta actualmente
            if (empty($_POST['nombre'])) {
                $_POST['nombre'] = $equipo -> nombre_equipo;
            }
            if (empty($_POST['liga'])) {
                $_POST['liga'] = $equipo -> liga;
            }
            if (empty($_POST['titulos'])) {
                $_POST['titulos'] = $equipo -> cant_titulos;
            }
            $this -> equiposModel -> updateEquipo($_POST['nombre'], $_POST['liga'], $_POST['titulos'], $_POST['equipos']);
            $this -> equiposView -> relocateEquipos();
        }

        function eliminarEquipo(){
            $this -> authHelper -> checkLoggedIn();
            $equipos = $this -> equiposModel -> getEquipos();
            $session = $this -> authHelper -> isLoggedIn();
            try {
                $this -> equiposModel -> deleteEquipo($_POST['equipos']);
                $this -> equiposView -> relocateEquipos();
            } catch (Exception $e) {
                $this -> equiposView -> renderEquipos($equipos, $session, "No se puede eliminar el equipo porque tiene jugadores asociados");
            }
        }
    };
