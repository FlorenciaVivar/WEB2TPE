{include file="header.tpl"}

<form action="addNew" method="POST" class="row g-3" enctype="multipart/form-data" >

    <div class="col-md-4">
        <label class="form-label">Destino</label>
        <input name="destino" type="text" class="form-control" required>
        <div class="valid-feedback">
        </div>
    </div>
    <div class="col-md-4">
        <label class="form-label">Fecha</label>
        <input name="fecha" type="text" class="form-control" required>
        <div class="valid-feedback">
        </div>
    </div>
    <div class="col-md-4">
        <label class="form-label">Precio</label>
        <input name="precio" type="number" min ="1" class="form-control" required>
        <div class="valid-feedback">
        </div>
    </div>
    <div class="col-md-4">
        <label class="form-label">Imagen viaje</label>
        <input name="imagenViaje" type="file" class="form-control" required>
        <div class="valid-feedback">
        </div>
    </div>
    <div class="col-md-4">
        <label class="form-label">Descripcion destino</label>
        <input name="descripcionDestino" type="text" class="form-control">
        <div class="valid-feedback">
        </div>
    </div>
    <div class="col-md-4">
    <label class="form-label">Aerolinea</label>
    <select name="id_aerolinea_fk" class="form-select"  >
        {foreach from= $airlines item=$airline}
                <option value="{$airline->id_aerolinea}" selected>{$airline->nombre}</option>
           
        {/foreach}
         </select>
    </div>
        <button type="submit" class="btn btn-primary ">Agregar viaje</button>
    </form>
    {include file="footer.tpl"}