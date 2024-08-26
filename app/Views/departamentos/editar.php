<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>

<h3 class="my-3">Modificar Departamento</h3>

<?php if (session()->getFlashdata('error') !== null) { ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php } ?>

<form action="<?= base_url('departamentos/' . $departamento['id']); ?>" class="row g-3" method="post" autocomplete="off">

    <!--<input type="hidden" name="_method" value="put">-->
    <input type="hidden" name="departamento_id" value="<?= $departamento['id']; ?>">

    <div class="col-md-8">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $departamento['nombre']; ?>" required autofocus>
    </div>

    <div class="col-md-4">
        <label for="clave" class="form-label">Descripcion</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $departamento['descripcion']; ?>" >
    </div>

    <div class="col-12">
        <a href="<?= base_url('departamentos'); ?>" class="btn btn-secondary">Regresar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

</form>

<?= $this->endSection(); ?>