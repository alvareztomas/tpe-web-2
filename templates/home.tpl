{include file = 'header.tpl'}

<table class="table table-secondary table-hover">
    <thead>
        <th>Nombre</th>
        <th>Numero</th>
        <th>Posicion</th>
        <th>Equipo</th>
        {if $session}    
            <th>Accion</th>
        {/if}
    </thead>
    <tbody>
        {foreach from=$jugadores  item=$jugador}
            <tr>
                <td>{$jugador -> nombre_jugador}</td>
                <td>{$jugador -> nro_camiseta}</td>
                <td>{$jugador -> rol}</td>
                <td><a href="equipos/{$jugador -> id_equipo_fk}">{$mapEquipos[$jugador -> id_equipo_fk]}</a></td>
                {if $session} 
                    <td><a class="btn btn-danger" href="delete/{$jugador -> id_jugador}">Borrar Jugador</a></td>
                {/if}
            </tr>
        {/foreach}
    </tbody>
</table>

{include file = 'footer.tpl'}