{include file="header.tpl"}
<div class="card mx-auto mt-5 mb-5 shadow-lg rounded-4" style="width: 30em;">

  <img src="{$oneTrip->imagenViaje}" alt="{$oneTrip->destino}" class="card-img-top" style="height: 250px; object-fit: cover;">
  <div class="card-body">
    <h5 class="card-title">{$oneTrip->destino}</h5>
    <p class="card-text text-muted">{$oneTrip->descripcionDestino}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><i class="bi bi-calendar-event"></i> Fecha: {$oneTrip->fecha}</li>
    <li class="list-group-item"><i class="bi bi-currency-dollar"></i> Valor: $ {$oneTrip->precio}</li>
    <li class="list-group-item"><i class="bi bi-airplane"></i> Aerolínea: {$oneTrip->nombreAerolinea}</li>

  </ul>
  <div class="card-body text-center">
    <a href="trips" class="btn btn-outline-primary">← Volver</a>
  </div>
</div>
{include file="footer.tpl"}