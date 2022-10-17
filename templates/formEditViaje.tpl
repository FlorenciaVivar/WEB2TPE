{include file="header.tpl"}

<form action="modified/{$trip->id}" method="POST" class="row g-3"  enctype="multipart/form-data">
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Destino</label>
        <input name="destino" value="{$trip->destino}" type="text" class="form-control" required>
        <div class="valid-feedback">
        </div>
    </div>
    <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Fecha</label>
        <input name="fecha" value="{$trip->fecha}" type="text" class="form-control"required>
        <div class="valid-feedback">
        </div>
    </div>
    <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Precio</label>
        <input name="precio" value="{$trip->precio}" type="number" min="1" class="form-control" required>
        <div class="valid-feedback">
        </div>
    </div>
    <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Imagen</label>
        <input name="imagenViaje" id="imageToUpload" type="file" class="form-control" required>
        <div class="valid-feedback">
        </div>
    </div>
    <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Descripcion destino</label>
        <input name="descripcionDestino" value="{$trip->descripcionDestino}" type="text" class="form-control" required>
        <div class="valid-feedback">
        </div>
    </div>
    <div class="col-md-4">
    <label class="form-label">Aerolinea</label>
    <select name="id_aerolinea_fk" class="form-select" required >
        {foreach from= $airlines item=$airline}
                <option value="{$airline->id_aerolinea}" selected>{$airline->nombre}</option>
           
        {/foreach}
         </select>
    </div>
    <button type="submit" class="btn btn-primary ">Guardar</button>
</form>
{include file="footer.tpl"}