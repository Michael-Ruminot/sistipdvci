<?= $this->extend('layout/plantilla'); ?>

<?= $this->section('contenido'); ?>

<?php if (session()->getFlashdata('error') !== null) { ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php } ?>

<?php if (session()->getFlashdata('message') !== null) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="message">
        <?= session()->getFlashdata('message'); ?>
    </div>
<?php } ?>

<div class="table-responsive mt-3">
    <table id="myTable" class="table align-middle table-hover my-3" aria-describedby="titulo">
        <thead class="table-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Usuario</th>
                <!-- <th scope="col">Password</th> -->
                <th scope="col">Correo</th>
                <th scope="col">Cargo</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Rol</th>
                <th scope="col">Sede</th>
                <th scope="col">Departamento</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($empleados as $empleado) : ?>

                <tr>
                    <td><?= $empleado['nombre']; ?></td>
                    <td><?= $empleado['apellido']; ?></td>
                    <td><?= $empleado['username']; ?></td>
                    <td><?= $empleado['correo']; ?></td>
                    <td><?= $empleado['cargo']; ?></td>
                    <td><?= $empleado['fecha_nacimiento']; ?></td>
                    <td><?= $empleado['rol']; ?></td>
                    <td><?= $empleado['sede']; ?></td>
                    <td><?= $empleado['departamento']; ?></td>
                    <td>
                        <a href="<?= base_url('reset/' . $empleado['id'] . '/edit'); ?>" class="btn btn-primary btn-sm me-2">Cambiar contraseña</a>
                    </td>
                </tr>

            <?php endforeach; ?>

            </tr>

        </tbody>
    </table>
</div>

<?= $this->endSection('contenido'); ?>

<?= $this->section('script'); ?>

<script>
    // Tiempo para mostrar mensaje al crear usuario o activos
    setTimeout(function() {
        var alert = document.getElementById('message');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(function() {
                alert.style.display = 'none';
            }, 200); // Tiempo para la animación de desvanecimiento
        }
    }, 2300); // Tiempo en milisegundos antes de que desaparezca la alerta
</script>

<?= $this->endSection(); ?>