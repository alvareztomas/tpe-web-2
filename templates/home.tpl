{include file = 'header.tpl'}

<h1>Jugadores</h1>
<a href="team-list">Ver lista de equipos</a>

<table class="table table-dark table-hover">
    <thead>
        <th>Nombre</th>
        <th>Numero</th>
        <th>Posicion</th>
        <th>Equipo</th>
    </thead>
    <tbody>
        {foreach from=$jugadores  item=$jugador}
            <tr>
                <td>{$jugador -> nombre_jugador}</td>
                <td>{$jugador -> nro_camiseta}</td>
                <td>{$jugador -> rol}</td>
                <td><a href="equipos/{$jugador -> id_equipo_fk}">{$mapEquipos[$jugador -> id_equipo_fk]}</a></td>
            </tr>
        {/foreach}
    </tbody>
</table>

<form action="create-jugador" method="post">
    <input type="text" name="nombre" id="nombre">
    <input type="number" name="nro_camiseta" id="nro_camiseta">
    <input type="text" name="rol" id="rol">
    <select name="equipos" id="equipos">
        {foreach from=$equipos  item=$equipo} 
            <option value="{$equipo -> id_equipo}">{$equipo -> nombre_equipo}</option>
        {/foreach}
    </select>
    <input type="submit" value="Guardar">
</form>

{include file = 'footer.tpl'}