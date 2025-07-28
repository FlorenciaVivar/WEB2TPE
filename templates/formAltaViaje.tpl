{include file="header.tpl"}

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Agregar nuevo viaje</h5>
        </div>
        <div class="card-body">
            <form action="addNew" method="POST" enctype="multipart/form-data" class="row g-4">

                <div class="col-md-6">
                    <label for="destino" class="form-label">Destino</label>
                    <input name="destino" id="destino" type="text" class="form-control" placeholder="Ej: París" required>
                </div>

                <div class="col-md-6">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input name="fecha" id="fecha" type="text" class="form-control" placeholder="Ej: 12/10/2025" required>
                </div>

                <div class="col-md-6">
                    <label for="precio" class="form-label">Precio</label>
                    <input name="precio" id="precio" type="number" min="1" class="form-control" placeholder="Ej: 150000" required>
                </div>

                <div class="col-md-6">
                    <label for="imagenViaje" class="form-label">Imagen del viaje</label>
                    <input name="imagenViaje" id="imagenViaje" type="file" class="form-control">
                </div>

                <div class="col-md-12">
                    <label for="descripcionDestino" class="form-label">Descripción del destino</label>
                    <textarea name="descripcionDestino" id="descripcionDestino" class="form-control" rows="3" placeholder="Contanos sobre el destino..."></textarea>
                </div>

                <div class="col-md-6">
                    <label for="id_aerolinea_fk" class="form-label">Aerolínea</label>
                    <select name="id_aerolinea_fk" id="id_aerolinea_fk" class="form-select" required>
                        {foreach from=$airlines item=$airline}
                            <option value="{$airline->id_aerolinea}">{$airline->nombre}</option>
                        {/foreach}
                    </select>
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-success">Agregar viaje</button>
                </div>

            </form>
        </div>
    </div>
</div>

{include file="footer.tpl"}
