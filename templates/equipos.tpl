{include file = 'header.tpl'}

<h1>Equipos</h1>

<ul>
    {foreach from=$equipos item=$equipo}
        <li>{$equipo -> nombre_equipo}</li>
    {/foreach}
</ul>

{include file = 'footer.tpl'}