<!--tabla de viajes-->
{include file="header.tpl"}
<table class="table table-striped">
    <thead>
        <tr>
            <th>DESTINO</th>
            <th>FECHA</th>
            <th>PRECIO</th>
            <th>IMAGEN</th>
            <th>AEROLINEA</th>
            <th> </th>
        </tr>
    </thead>

    {foreach from=$trips item=$trip}
        <tr>
            <td>{$trip->destino}</td>
            <td>{$trip->fecha}</td>
            <td>$ {$trip->precio}</td>
            <td><img src="{$trip->imagenViaje}" alt="{$trip->destino}" width="300" height="200"></td>
            <td> {$trip->nombreAerolinea}</td>
            <td>
                <a href="showTrip/{$trip->id}" alt="{$trip->destino}" type="button" class="btn btn-info ml-auto">Ver mas</a>
            </td>
            {if isset($smarty.session.USER_ID)}
            <td>
                <a href="modify/{$trip->id}" type="button" class="btn btn-success ml-auto">Editar</a>
            </td>
            <td>
                <a href="delete/{$trip->id}" type="button" class="btn btn-danger ml-auto">Eliminar</a>
            </td>
            {/if}
        </tr>
{/foreach}


