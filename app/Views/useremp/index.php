<?= $this->extend('layout/plantillauser'); ?>

<?= $this->section('contenido'); ?>

<div class="table-responsive mt-3">
    <h3 class="my-3" id="titulo">Empleados</h3>
    <br>
    <table id="myTable" class="table align-middle table-hover my-3" aria-describedby="titulo">
        <thead class="table-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Usuario</th>
                <th scope="col">Correo</th>
                <th scope="col">Cargo</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Sede</th>
                <th scope="col">Departamento</th>
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
                    <td><?= $empleado['sede']; ?></td>
                    <td><?= $empleado['departamento']; ?></td>
                </tr>

            <?php endforeach; ?>

            </tr>

        </tbody>
    </table>
</div>

<?= $this->endSection(''); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>
