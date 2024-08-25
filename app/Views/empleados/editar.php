<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>

<h3 class="my-3">Modificar empleado</h3>

<?php if (session()->getFlashdata('error') !== null) {?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php } ?>

<form action="<?= base_url('empleados/' .$empleado['id']); ?>" class="row g-3" method="POST" autocomplete="off">

    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="empleado_id" value="<?= $empleado['id']; ?>">

    <div class="col-md-4">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $empleado['nombre'] ?>" required autofocus>
    </div>

    <div class="col-md-4">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $empleado['apellido'] ?>" required>
    </div>

    <div class="col-md-4">
        <label for="username" class="form-label">Usuario</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= $empleado['username'] ?>" required>
    </div>

    <div class="col-md-4">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="<?= $empleado['password'] ?>" required>
    </div>

    <div class="col-md-4">
        <label for="correo" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="correo" name="correo" value="<?= $empleado['correo'] ?>">
    </div>

    <div class="col-md-4">
        <label for="cargo" class="form-label">Cargo</label>
        <input type="text" class="form-control" id="cargo" name="cargo" value="<?= $empleado['cargo'] ?>" required>
    </div>

    <div class="col-md-4">
        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= $empleado['fecha_nacimiento'] ?>" required>
    </div>

    <div class="col-md-4">
        <label for="rol" class="form-label">Rol</label>
        <select class="form-select" id="rol" name="rol" required>
            <option value="">Seleccionar</option>
            <?php foreach($roles as $rol): ?>
                <option value="<?= $rol['id']; ?>" <?php echo ($rol['id'] == $empleado['id_rol']) ? 'selected' : ''; ?>><?= $rol['rol']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-4">
        <label for="sede" class="form-label">Sede</label>
        <select class="form-select" id="sede" name="sede" required>
            <option value="">Seleccionar</option>
            <?php foreach($sedes as $sede): ?>
                <option value="<?= $sede['id']; ?>" <?php echo ($sede['id'] == $empleado['id_sede']) ? 'selected' : ''; ?>><?= $sede['sede']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-4">
        <label for="departamento" class="form-label">Departamento</label>
        <select class="form-select" id="departamento" name="departamento" required>
            <option value="">Seleccionar</option>
            <?php foreach($departamentos as $departamento): ?>
                <option value="<?= $departamento['id']; ?>" <?php echo ($departamento['id'] == $empleado['id_departamento']) ? 'selected' : ''; ?>><?= $departamento['nombre']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-12">
        <a href="<?= base_url('empleados'); ?>" class="btn btn-secondary">Regresar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

</form>



<?= $this->endSection('contenido'); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>