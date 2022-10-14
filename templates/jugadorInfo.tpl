{include file = 'header.tpl'}

<div class="d-flex justify-content-center">
    <div class="card mt-3" style="width: 18rem;">
        <h4 class="ms-3">Detalle del jugador</h4>

        <ul class="list-group list-group-flush">
            <li class="list-group-item">Nombre: {$jugador -> nombre_jugador}</li>
            <li class="list-group-item">Camiseta: {$jugador -> nro_camiseta}</li>
            <li class="list-group-item">Posicion: {$jugador -> rol}</li>
            <li class="list-group-item">Equipo: {$equipo -> nombre_equipo}</li>
        </ul>
        <div class="card-body">
            <a href="jugadores" class="card-link">Ir a Jugadores</a>
        </div>
    </div>
</div>

{include file = 'footer.tpl'}