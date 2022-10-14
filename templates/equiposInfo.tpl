{include file = 'header.tpl'}

<div class="d-flex justify-content-center">
    <div class="card mt-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{$equipo -> nombre_equipo}</h5>
            <i>Titulos: {$equipo -> cant_titulos} - Liga: {$equipo -> liga}</i>
        </div>
        <h6 class="ms-3">Jugadores:</h6>
        <ul class="list-group list-group-flush">
            {foreach from=$jugadores item=$jugador}
                <a href="jugadores/{$jugador -> id_jugador}" class="list-group-item list-group-item-action">{$jugador -> nombre_jugador}</a>
            {/foreach}
        </ul>
        <div class="card-body">
            <a href="equipos" class="card-link">Ir a Equipos</a>
        </div>
    </div>
</div>

{include file = 'footer.tpl'}