{include file="header.tpl" }
<table class="table table-striped">
        <thead>
                <tr>
                        <th>AEROLINEA</th>
                        <th>IMAGEN</th>
                        <th> </th>
                </tr>
        </thead>
        {foreach from=$airlines item=$airline }
                <tr>
                        <td>{$airline->nombre}</td>
                        <td>  {* <a href="showTripsByAirline/{$airline->id_aerolinea} "> *}
                                <img src="{$airline->imagenAerolinea}" alt="{$airline->nombre}" width="200" height="200"> </td>
                        <td>
                                <a href="showTripsByAirline/{$airline->id_aerolinea}" type="button" class="btn btn-info ml-auto">Ver viajes disponibles</a>
                        </td>
                        {if isset($smarty.session.USER_ID)}
                        <td>
                                <a href="modifyAirline/{$airline->id_aerolinea}" type="button" class="btn btn-success ml-auto">Editar</a>
                        </td>
                        <td>
                                <a href="deleteAirline/{$airline->id_aerolinea}" type="button" class="btn btn-danger ml-auto">Eliminar</a>
                        </td>
                        {/if}
                </tr>
        {/foreach}

