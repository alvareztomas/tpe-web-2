<?php
    class JugadoresModel{
        private $db;
        
        function __construct(){
            $this -> db = new PDO('mysql:host=localhost;' . 'dbname=db_jugadores;charset=utf8', 'root', '');
        }

        function getJugadores() {
            $sentence = $this -> db -> prepare('SELECT * FROM jugadores');
            $sentence -> execute();
            $jugadores = $sentence -> fetchAll(PDO::FETCH_OBJ);
            return $jugadores;
        }

        function getJugador($id_jugador){
            $sentence = $this -> db -> prepare('SELECT * FROM jugadores WHERE id_jugador = ?');
            $sentence -> execute([$id_jugador]);
            $jugador = $sentence -> fetch(PDO::FETCH_OBJ);
            return $jugador;
        }

        function getJugadorEquipo($id_equipo_fk){
            $sentence = $this -> db -> prepare('SELECT * FROM jugadores WHERE id_equipo_fk = ?');
            $sentence -> execute([$id_equipo_fk]);
            $jugadores = $sentence -> fetchAll(PDO::FETCH_OBJ);
            return $jugadores;
        }

        function updateJugador($nombre, $nro, $rol, $id_equipo, $id_jugador){
            $sentence = $this -> db -> prepare('UPDATE jugadores SET nombre_jugador = ?,nro_camiseta = ?, rol = ?, id_equipo_fk = ? WHERE id_jugador = ?');
            $sentence -> execute([$nombre, $nro, $rol, $id_equipo, $id_jugador]);
        }

        function deleteJugador($id_jugador){
            $sentence = $this -> db -> prepare('DELETE FROM `jugadores` WHERE id_jugador = ?');
            $sentence -> execute([$id_jugador]);
        }
    
        function insertJugador($nombre, $nro, $rol, $id_equipo){
            $sentence = $this -> db -> prepare('INSERT INTO jugadores(nombre_jugador, nro_camiseta, rol, id_equipo_fk) VALUES (?, ?, ?, ?)');
            $sentence -> execute([$nombre, $nro, $rol, $id_equipo]);
        }
    };