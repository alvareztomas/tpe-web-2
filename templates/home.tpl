{include file = 'header.tpl'}

<table class="table table-secondary table-hover">
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
                <td>{$mapEquipos[$jugador -> id_equipo_fk]}</td>
            </tr>
        {/foreach}
    </tbody>
</table>

{include file = 'footer.tpl'}