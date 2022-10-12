<?php
    require_once './libs/smarty/libs/Smarty.class.php';

class JugadoresView{
    private $smarty;

    function __construct(){
        $smarty = new Smarty();
    }
    
    function showHome($jugadores, $equipos){
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <base href="'.BASE_URL.'">
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>TPE</title>
        </head>

        <body>
            <h1>Jugadores</h1>
            <a href="team-list">Ver lista de equipos</a>

            <ul>
                <?php
                foreach ($jugadores as $jugador) {
                    echo "<li>" . $jugador->nombre_jugador . "</li>";
                }
                ?>
            </ul>

            <form action="create-jugador" method="post">
                <input type="text" name="nombre" id="nombre">
                <input type="number" name="nro_camiseta" id="nro_camiseta">
                <input type="text" name="rol" id="rol">
                <select name="equipos" id="equipos">
                    <?php
                    foreach ($equipos as $equipo) {
                        echo '<option value="' . $equipo->id_equipo . '">' . $equipo->nombre_equipo . "</option>";
                    }
                    ?>
                </select>
                <input type="submit" value="Guardar">
            </form>

        </body>

        </html>
<?php
    }

    function relocateHome(){
        header("Location:".BASE_URL."home");
    }
}