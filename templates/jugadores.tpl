{include file = 'header.tpl'}

<div class="d-flex flex-column align-items-center mb-4">
    <h3 class="mt-3">Jugadores:</h3>
    <div class="list-group lista-equipos">
        {foreach from=$jugadores item=$jugador}
            <a href="jugadores/{$jugador -> id_jugador}" class="list-group-item list-group-item-action text-center">{$jugador -> nombre_jugador} - ({$mapEquipos[$jugador -> id_equipo_fk]})</a>           
        {/foreach}
    </div>
</div>
{if $session}
    <div class="container d-flex align-items-center">
        <h6 class="me-3">Agregar jugador:</h6>
        <form action="createJugador" method="post">
            <input type="text" name="nombre" id="nombre" placeholder="Nombre">
            <input type="number" name="nro_camiseta" id="nro_camiseta" placeholder="Camiseta Nro">
            <input type="text" name="rol" id="rol" placeholder="Posicion">
            <select name="equipos" id="equipos">
                {foreach from=$equipos  item=$equipo} 
                    <option value="{$equipo -> id_equipo}">{$equipo -> nombre_equipo}</option>
                {/foreach}
            </select>
            <input type="submit" value="Agregar" class="btn btn-dark">
        </form>
    </div>
    <div class="container d-flex mt-3 align-items-center">
        <h6 class="me-3">Modificar jugador:</h6>
        <form action="updateJugador" method="post">
            <select name="jugadores" id="jugadores">
                {foreach from=$jugadores  item=$jugador} 
                    <option value="{$jugador -> id_jugador}">{$jugador -> nombre_jugador}</option>
                {/foreach}
            </select>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre">
            <input type="number" name="nro_camiseta" id="nro_camiseta" placeholder="Camiseta Nro">
            <input type="text" name="rol" id="rol" placeholder="Posicion">
            <select name="equipos" id="equipos">
                {foreach from=$equipos  item=$equipo} 
                    <option value="{$equipo -> id_equipo}">{$equipo -> nombre_equipo}</option>
                {/foreach}
            </select>
            <input type="submit" value="Modificar" class="btn btn-dark">
        </form>
    </div>
{/if}

{include file = 'footer.tpl'}