{include file = 'header.tpl'}

<h1>{$equipo -> nombre_equipo}</h1>
<span>Titulos: {$equipo -> cant_titulos}</span>
<span>Liga: {$equipo -> liga}</span>

<h2>Jugadores</h2>
<ul>
    {foreach from=$jugadores item=$jugador}
        <li>{$jugador -> nombre_jugador}</li>
    {/foreach}
</ul>

{include file = 'footer.tpl'}