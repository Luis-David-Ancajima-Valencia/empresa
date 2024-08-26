<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>

<h3 class="my-3">Editar Articulo</h3>

<?php if (session()->getFlashdata('error') !== null) { ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php } ?>

<form action="<?= base_url('articulos/' . $articulo['id']); ?>" class="row g-3" method="post" autocomplete="off">

    <div class="col-md-8">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $articulo['nombre']; ?>" required>
    </div>

    <div class="col-md-6">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" value="<?= $articulo['precio']; ?>" required>
    </div>

    <div class="col-md-6">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" value="<?= $articulo['stock']; ?>" required>
    </div>
    

    <div class="col-md-6">
        <label for="categoria" class="form-label">Categoria</label>
        <select class="form-select" id="categoria" name="categoria" required>
            <option value="">Seleccionar</option>
            <?php foreach ($categorias as $categoria) : ?>
                <option value="<?= $categoria['id']; ?>" <?php echo ($categoria['id'] == $articulo['id_categoria']) ? 'selected' : ''; ?>><?= $categoria['descripcion']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-12">
        <a href="<?= base_url('articulos'); ?>" class="btn btn-secondary">Regresar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

</form>

<?= $this->endSection(); ?>