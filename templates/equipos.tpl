{include file = 'header.tpl'}

<div class="d-flex flex-column align-items-center">
    <h3 class="mt-3">Equipos:</h3>
    <div class="list-group lista-equipos">
        {foreach from=$equipos item=$equipo}
            <a href="equipos/{$equipo -> id_equipo}" class="list-group-item list-group-item-action text-center">{$equipo -> nombre_equipo}</a>
        {/foreach}
    </div>
</div>

{include file = 'footer.tpl'}