{include file="header.tpl"}

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Agregar nueva Aerolínea</h5>
        </div>
        <div class="card-body">
            <form action="?action=insertAirline" method="POST" enctype="multipart/form-data" class="row g-4">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre de la Aerolínea</label>
                    <input name="nombre" id="nombre" type="text" class="form-control" placeholder="Ej: LATAM" required>
                </div>

                <div class="col-md-6">
                    <label for="imagenAerolinea" class="form-label">Imagen de la Aerolínea</label>
                    <input name="imagenAerolinea" id="imagenAerolinea" type="file" class="form-control">
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary">Guardar Aerolínea</button>
                </div>
            </form>
        </div>
    </div>
</div>

{include file="footer.tpl"}
