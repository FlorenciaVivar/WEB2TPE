{include file="header.tpl"}

<form action="addNewAirline" method="POST" class="row g-3" enctype="multipart/form-data">
    <div class="col-md-4">
        <label class="form-label">Nombre Aerolinea</label>
        <input name="nombre"  type="text" class="form-control" required >
        <div class="valid-feedback">
        </div>
    </div>
    <div class="col-md-4">
        <label  class="form-label">Imagen aerolinea</label>
        <input name="imagenAerolinea" type="file" class="form-control" required >
        <div class="valid-feedback">
        </div>
    </div>
    <button type="submit" class="btn btn-primary ">Guardar</button>
</form>
{include file="footer.tpl"}