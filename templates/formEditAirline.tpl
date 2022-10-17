{include file="header.tpl"}

<form action="modifiedAirline/{$airline->id_aerolinea}" method="POST" class="row g-3"  enctype="multipart/form-data">
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Nombre Aerolinea</label>
        <input name="nombre" value="{$airline->nombre}" type="text" class="form-control" >
        <div class="valid-feedback">
        </div>
    </div>
    <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Imagen aerolinea</label>
        <input name="imagenAerolinea"  type="file" class="form-control" >
        {* <input name="imagenAerolinea" value="{$airline->imagenAerolinea}" type="file" class="form-control" > *}

        <div class="valid-feedback">
        </div>
    </div>
    <button type="submit" class="btn btn-primary ">Guardar</button>
</form>
{include file="footer.tpl"}