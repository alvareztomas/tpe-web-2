{include file = 'header.tpl'}

<div class="d-flex flex-column align-items-center mb-3">
    <h3 class="mt-3">Equipos:</h3>
    <div class="list-group lista-equipos">
        {foreach from=$equipos item=$equipo}
            <a href="equipos/{$equipo -> id_equipo}" class="list-group-item list-group-item-action text-center">{$equipo -> nombre_equipo}</a>
        {/foreach}
    </div>
</div>
{if $session}
    <div class="container d-flex align-items-center mb-3">
        <h6 class="me-3">Agregar:</h6>
        <form action="crearEquipo" method="post">
            <input type="text" name="nombre" id="nombre" placeholder="Nombre">
            <input type="text" name="liga" id="liga" placeholder="Liga">
            <input type="number" name="titulos" id="titulos" placeholder="Cant Titulos">
            <input type="submit" value="Submit" class="btn btn-dark">
        </form>
    </div>
    <div class="container d-flex align-items-center mb-3">
        <h6 class="me-3">Modificar:</h6>
        <form action="modificarEquipo" method="post">
            <select name="equipos" id="equipos">
                {foreach from=$equipos  item=$equipo} 
                    <option value="{$equipo -> id_equipo}">{$equipo -> nombre_equipo}</option>
                {/foreach}
            </select>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre">
            <input type="text" name="liga" id="liga" placeholder="Liga">
            <input type="number" name="titulos" id="titulos" placeholder="Cant Titulos">
            <input type="submit" value="Submit" class="btn btn-dark">
        </form>
    </div>
    <div class="container d-flex align-items-center mb-3">
        <h6 class="me-3">Eliminar:</h6>
        <form action="eliminarEquipo" method="post">
            <select name="equipos" id="equipos">
                {foreach from=$equipos  item=$equipo} 
                    <option value="{$equipo -> id_equipo}">{$equipo -> nombre_equipo}</option>
                {/foreach}
            </select>
            <input type="submit" value="Submit" class="btn btn-dark">
        </form>
    </div>
    {if $error !== ""}
        <p class="alert alert-danger mt-3">{$error}</p>
    {/if}
{/if}

{include file = 'footer.tpl'}