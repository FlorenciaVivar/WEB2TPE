{include file="header.tpl"}
<div class="container mt-4 mb-5">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="card shadow-lg rounded-4">
        <img src="{$oneTrip->imagenViaje}" alt="{$oneTrip->destino}" class="card-img-top" style="height: 250px; width: 100%; object-fit: cover; border-radius: 8px;">
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
    </div>
  </div>
</div>

{include file="footer.tpl"}