<?php
    class EquiposModel{
        private $db;
        
        function __construct(){
            $this -> db = new PDO('mysql:host=localhost;' . 'dbname=db_jugadores;charset=utf8', 'root', '');
        }

        function getEquipos() {
            $sentence = $this -> db -> prepare('SELECT * FROM equipos');
            $sentence -> execute();
            $equipos = $sentence -> fetchAll(PDO::FETCH_OBJ);
            return $equipos;
        }

        function getEquipo($id_equipo){
            $sentence = $this -> db -> prepare('SELECT * FROM equipos WHERE id_equipo = ?');
            $sentence -> execute([$id_equipo]);
            $equipo = $sentence -> fetch(PDO::FETCH_OBJ);
            return $equipo;
        }

        function updateEquipo($nombre, $liga, $titulos, $id_equipo){
            $sentence = $this -> db -> prepare('UPDATE equipos SET nombre_equipo = ?, liga = ?, cant_titulos = ? WHERE id_equipo = ?');
            $sentence -> execute([$nombre, $liga, $titulos, $id_equipo]);
        }

        function deleteEquipo($id_equipo){
            $sentence = $this -> db -> prepare('DELETE FROM `equipos` WHERE id_equipo = ?');
            $sentence -> execute([$id_equipo]);
        }
    
        function insertEquipo($nombre, $liga, $titulos){
            $sentence = $this -> db -> prepare('INSERT INTO equipos(nombre_equipo, liga, cant_titulos) VALUES (?, ?, ?)');
            $sentence -> execute([$nombre, $liga, $titulos]);
        }
    };