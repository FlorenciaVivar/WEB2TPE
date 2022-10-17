{include file="header.tpl"}
<div class="card" style="width: 30em;">
  <img src="{$oneTrip->imagenViaje}" alt="{$oneTrip->destino}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{$oneTrip->destino}</h5>
    <p class="card-text">{$oneTrip->descripcionDestino}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Fecha: {$oneTrip->fecha}</li>
    <li class="list-group-item"> Valor: $ {$oneTrip->precio}</li>
    <li class="list-group-item"> Aerolinea:  {$oneTrip->nombreAerolinea}</li>
  </ul>
  <div class="card-body">
    <a href="trips" class="card-link">Volver</a>
  </div>
</div>
{include file="footer.tpl"}