{include file="header.tpl"}

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Modificar Viaje</h5>
        </div>
        <div class="card-body">
            <form action="modified/{$trip->id}" method="POST" enctype="multipart/form-data" class="row g-4">

                <div class="col-md-6">
                    <label class="form-label">Destino</label>
                    <input name="destino" value="{$trip->destino}" type="text" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Fecha</label>
                    <input name="fecha" value="{$trip->fecha}" type="text" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Precio</label>
                    <input name="precio" value="{$trip->precio}" type="number" min="1" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Descripción del destino</label>
                    <input name="descripcionDestino" value="{$trip->descripcionDestino}" type="text" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nueva imagen (opcional)</label>
                    <input name="imagenViaje" type="file" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Aerolínea</label>

                    <select name="id_aerolinea_fk" class="form-select" required>
                        {foreach from=$airlines item=$airline}
                            <option value="{$airline->id_aerolinea}" {if $airline->id_aerolinea == $trip->id_aerolinea_fk}selected{/if}>
                                {$airline->nombre}
                            </option>
                        {/foreach}
                    </select>
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>

            </form>
        </div>
    </div>
