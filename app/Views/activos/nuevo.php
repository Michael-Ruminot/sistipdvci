<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>

<h3 class="my-3">Nuevo activo</h3>

<?php if (session()->getFlashdata('error') !== null) {?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php } ?>

<form action="<?= base_url('activos'); ?>" class="row g-3" method="post" autocomplete="off">

    <div class="col-md-4">
        <label for="serie" class="form-label">Serie</label>
        <input type="text" class="form-control" id="serie" name="serie" required autofocus>
    </div>

    <div class="col-md-4">
        <label for="modelo" class="form-label">Modelo</label>
        <input type="text" class="form-control" id="modelo" name="modelo" required>
    </div>

    <div class="col-md-4">
        <label for="fabricante" class="form-label">Fabricante</label>
        <input type="text" class="form-control" id="fabricante" name="fabricante" required>
    </div>

    <div class="col-md-4">
        <label for="descripcion" class="form-label">Descripcion</label>
        <input type="password" class="form-control" id="descripcion" name="descripcion" required>
    </div>

    <div class="col-md-4">
        <label for="mantencion" class="form-label">Última mantención</label>
        <input type="date" class="form-control" id="mantencion" name="mantencion" required>
    </div>

    <div class="col-md-4">
        <label for="tipo" class="form-label">Tipo</label>
        <select class="form-select" id="tipo" name="tipo" required>
            <option value="">Seleccionar</option>
            <?php foreach($tipoactivos as $tipoactivo): ?>
                <option value="<?= $tipoactivo['id']; ?>"><?= $tipoactivo['tipo']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-4">
        <label for="sede" class="form-label">Sede</label>
        <select class="form-select" id="sede" name="sede" required>
            <option value="">Seleccionar</option>
            <?php foreach($sedes as $sede): ?>
                <option value="<?= $sede['id']; ?>"><?= $sede['sede']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-4">
        <label for="empleado" class="form-label">Asignado a</label>
        <select class="form-select" id="empleado" name="empleado" required>
            <option value="">Seleccionar</option>
            <?php foreach($empleados as $empleado): ?>
                <option value="<?= $empleado['id']; ?>"><?= $empleado['correo']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>


    <div class="col-12">
        <a href="<?= base_url('activos'); ?>" class="btn btn-secondary">Regresar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

</form>



<?= $this->endSection(); ?>