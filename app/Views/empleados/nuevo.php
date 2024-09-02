<?php echo $this->extend('layout/plantilla'); ?>
<?= $this->section('contenido'); ?>

<h3 class="my-3">Nuevo empleado</h3>

<?php if (session()->getFlashdata('error') !== null) { ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php } ?>

<form action="<?= base_url('empleados'); ?>" id="formcreate" class="row g-3" method="post" autocomplete="off">

    <div class="col-md-4">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= set_value('nombre') ?>" required autofocus>
    </div>

    <div class="col-md-4">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" value="<?= set_value('apellido') ?>" required>
    </div>

    <div class="col-md-4">
        <label for="username" class="form-label">Usuario</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username') ?>" required>
    </div>

    <div class="col-md-4">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password') ?>" required>
    </div>

    <div class="col-md-4">
        <label for="correo" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="correo" name="correo" value="<?= set_value('correo') ?>">
    </div>

    <div class="col-md-4">
        <label for="cargo" class="form-label">Cargo</label>
        <input type="text" class="form-control" id="cargo" name="cargo" value="<?= set_value('cargo') ?>" required>
    </div>

    <div class="col-md-4">
        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= set_value('fecha_nacimiento') ?>" required>
    </div>

    <div class="col-md-4">
        <label for="rol" class="form-label">Rol</label>
        <select class="form-select" id="rol" name="rol" required>
            <option value="">Seleccionar</option>
            <?php foreach ($roles as $roles): ?>
                <option value="<?= $roles['id']; ?>"><?= $roles['rol']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-4">
        <label for="sede" class="form-label">Sede</label>
        <select class="form-select" id="sede" name="sede" required>
            <option value="">Seleccionar</option>
            <?php foreach ($sedes as $sede): ?>
                <option value="<?= $sede['id']; ?>"><?= $sede['sede']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-4">
        <label for="departamento" class="form-label">Departamento</label>
        <select class="form-select" id="departamento" name="departamento" required>
            <option value="">Seleccionar</option>
            <?php foreach ($departamentos as $departamento): ?>
                <option value="<?= $departamento['id']; ?>"><?= $departamento['nombre']; ?></option>
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