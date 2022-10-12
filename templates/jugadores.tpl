{include file = 'header.tpl'}

<div class="d-flex flex-column align-items-center">
    <h3 class="mt-3">Jugadores:</h3>
    <div class="list-group lista-equipos">
        {foreach from=$jugadores item=$jugador}
            <a href="jugadores/{$jugador -> id_jugador}" class="list-group-item list-group-item-action text-center">{$jugador -> nombre_jugador}</a>
        {/foreach}
    </div>
</div>

{include file = 'footer.tpl'}