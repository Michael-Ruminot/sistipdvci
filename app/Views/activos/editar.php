<?php echo $this->extend('layout/plantilla'); ?>

<?= $this->section('contenido'); ?>

<h3 class="my-3">Modificar activo</h3>

<?php if (session()->getFlashdata('error') !== null) { ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php } ?>

<form action="<?= base_url('activos/' . $activo['id']); ?>" class="row g-3" method="POST" autocomplete="off" enctype="multipart/form-data">

    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="activo_id" value="<?= $activo['id']; ?>">

    <div class="col-md-4">
        <label for="serie" class="form-label">Serie</label>
        <input type="text" class="form-control" id="serie" name="serie" value="<?= $activo['serie'] ?>" required autofocus>
    </div>

    <div class="col-md-4">
        <label for="modelo" class="form-label">Modelo</label>
        <input type="text" class="form-control" id="modelo" name="modelo" value="<?= $activo['modelo'] ?>" required>
    </div>

    <div class="col-md-4">
        <label for="fabricante" class="form-label">Fabricante</label>
        <input type="text" class="form-control" id="fabricante" name="fabricante" value="<?= $activo['fabricante'] ?>" required>
    </div>

    <div class="col-md-4">
        <label for="descripcion" class="form-label">Descripcion</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $activo['descripcion'] ?>" required>
    </div>

    <div class="col-md-4">
        <label for="mantencion" class="form-label">Última mantención</label>
        <input type="date" class="form-control" id="mantencion" name="mantencion" value="<?= $activo['mantencion'] ?>">
    </div>

    <div class="col-md-4">
        <label for="tipo" class="form-label">Tipo</label>
        <select class="form-select" id="tipo" name="tipo" required>
            <option value="">Seleccionar</option>
            <?php foreach ($tipoactivos as $tipoactivo): ?>
                <option value="<?= $tipoactivo['id']; ?>" <?php echo ($tipoactivo['id'] == $activo['id_tipo']) ? 'selected' : ''; ?>><?= $tipoactivo['tipo']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-4">
        <label for="sede" class="form-label">Sede</label>
        <select class="form-select" id="sede" name="sede" required>
            <option value="">Seleccionar</option>
            <?php foreach ($sedes as $sede): ?>
                <option value="<?= $sede['id']; ?>" <?php echo ($sede['id'] == $activo['id_sede']) ? 'selected' : ''; ?> ><?= $sede['sede']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-4">
        <label for="formFile" class="form-label">Selecciona un archivo</label>
        <input class="form-control" type="file" id="image" name="image" accept="image/png, image/jpeg, application/pdf">
    </div>

    <div class="col-md-4">

        <label for="empleado" class="form-label">Asignado a</label>
        <select class="form-select" id="empleado" name="empleado" required>
            <option value="">Seleccionar</option>
            <?php foreach ($empleados as $empleado): ?>
                <option value="<?= $empleado['id']; ?>" <?php echo ($empleado['id'] == $activo['id_empleado']) ? 'selected' : ''; ?> ><?= $empleado['nombre']; ?> <?= $empleado['apellido']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>


    <div class="col-12">
        <a href="<?= base_url('activos'); ?>" class="btn btn-secondary">Regresar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

</form>



<?= $this->endSection(); ?>