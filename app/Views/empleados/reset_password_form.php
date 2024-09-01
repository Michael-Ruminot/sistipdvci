<?= $this->extend('layout/plantilla'); ?>

<?= $this->section('contenido'); ?>

<h3 class="my-3">Cambiar contraseña</h3>

<?php if (session()->getFlashdata('error') !== null) {?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php } ?>

<form action="<?= base_url('reset/' .$empleado['id']); ?>" class="row g-3" method="POST" autocomplete="off">

    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="empleado_id" value="<?= $empleado['id']; ?>">

    <div class="col-md-4">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="col-md-4">
        <label for="repassword" class="form-label">Repite Password</label>
        <input type="password" class="form-control" id="repassword" name="repassword" required>
    </div>

    <div class="col-12">
        <a href="<?= base_url('reset'); ?>" class="btn btn-secondary">Regresar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

</form>



<?= $this->endSection('contenido'); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>