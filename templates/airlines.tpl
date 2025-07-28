{include file="header.tpl"}

<div class="container my-4">
        <h2 class="mb-4 text-center">Aerolíneas</h2>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                {foreach from=$airlines item=$airline}
                        <div class="col">
                                <div class="card h-100 shadow-lg text-center">
                                        <img src="{$airline->imagenAerolinea}" class="card-img-top" alt="{$airline->nombre}" style="height: 200px; object-fit: contain; background-color: #f8f9fa;">
                                        <div class="card-body">
                                                <h5 class="card-title">{$airline->nombre}</h5>
                                                <a href="showTripsByAirline/{$airline->id_aerolinea}" class="btn btn-info btn-sm">Ver viajes disponibles</a>
                                        </div>

                                        {if isset($smarty.session.USER_ID)}
                                                <div class="card-footer d-flex justify-content-center gap-2">
                                                        <a href="modifyAirline/{$airline->id_aerolinea}" class="btn btn-success btn-sm">Editar</a>
                                                        <a href="deleteAirline/{$airline->id_aerolinea}" class="btn btn-danger btn-sm">Eliminar</a>
                                                </div>
                                        {/if}
                                </div>
                        </div>
                {/foreach}
        </div>
</div>

{include file="footer.tpl"}
