{include file="header.tpl"}

<div class="container my-4">
    <h2 class="mb-4 text-center">Listado de Viajes</h2>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        {foreach from=$trips item=$trip}
            <div class="col">
                <div class="card h-100 shadow-lg">
                    <img src="{$trip->imagenViaje}" class="card-img-top" alt="{$trip->destino}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{$trip->destino}</h5>
                        <p class="card-text mb-1"><strong>Fecha:</strong> {$trip->fecha}</p>
                        <p class="card-text mb-1"><strong>Precio:</strong> $ {$trip->precio}</p>
                        <p class="card-text"><strong>Aerolínea:</strong> {$trip->nombreAerolinea}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between flex-wrap gap-2">
                        <a href="showTrip/{$trip->id}" class="btn btn-info btn-sm">Ver más</a>

                        {if isset($smarty.session.USER_ID)}
                            <div class="btn-group" role="group">
                                <a href="modify/{$trip->id}" class="btn btn-success btn-sm">Editar</a>
                                <a href="delete/{$trip->id}" class="btn btn-danger btn-sm">Eliminar</a>
                            </div>
                        {/if}
                    </div>
                </div>
            </div>
        {/foreach}
    </div>
</div>

{include file="footer.tpl"}
