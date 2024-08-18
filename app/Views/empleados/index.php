<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>

<h3 class="my-3" id="titulo">Empleados</h3>

<a href="<?= base_url('empleados/new'); ?>" class="btn btn-success">Agregar</a>

<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
    <thead class="table-dark">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Usuario</th>
            <th scope="col">Password</th>
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
                <td><?= $empleado['password']; ?></td>
                <td><?= $empleado['correo']; ?></td>
                <td><?= $empleado['cargo']; ?></td>
                <td><?= $empleado['fecha_nacimiento']; ?></td>
                <td><?= $empleado['rol']; ?></td>
                <td><?= $empleado['sede']; ?></td>
                <td><?= $empleado['departamento']; ?></td>
                <td>
                    <a href="<?= base_url('empleados/' . $empleado['id'] . '/edit'); ?>" class="btn btn-warning btn-sm me-2">Editar</a>

                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-url="<?= base_url('empleados/' . $empleado['id']); ?>">Eliminar</button>
                </td>
            </tr>

        <?php endforeach; ?>

        </tr>

    </tbody>
</table>

<!-- Ventana Modal eliminar usuario -->
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="eliminaModalLabel">Aviso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar este registro?</p>
                </div>
                <div class="modal-footer">
                    <form id="form-elimina" action="" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



<?= $this->endSection('contenido'); ?>

<?= $this->section('script'); ?>

<script>

        const eliminaModal = document.getElementById('eliminaModal')
        if (eliminaModal) {
            eliminaModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const url = button.getAttribute('data-bs-url')

                // Update the modal's content.
                const form = eliminaModal.querySelector('#form-elimina')
                form.setAttribute('action', url)
            })
        }
    </script>

<?= $this->endSection();?>