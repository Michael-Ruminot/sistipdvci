<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>

<h3 class="my-3" id="titulo">Activos</h3>

<a href="<?= base_url('activos/new'); ?>" class="btn btn-success">Agregar</a>

<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
    <thead class="table-dark">
        <tr>
            <th scope="col">Serie</th>
            <th scope="col">Modelo</th>
            <th scope="col">Fabricante</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Última mantención</th>
            <th scope="col">Tipo</th>
            <th scope="col">Sede</th>
            <th scope="col">Asignado A:</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach ($activos as $activo) : ?>

            <tr>
                <td><?= $activo['serie']; ?></td>
                <td><?= $activo['modelo']; ?></td>
                <td><?= $activo['fabricante']; ?></td>
                <td><?= $activo['descripcion']; ?></td>
                <td><?= $activo['mantencion']; ?></td>
                <td><?= $activo['tipo']; ?></td>
                <td><?= $activo['sede']; ?></td>
                <td><?= $activo['empleado']; ?> <?= $activo['empleadoApellido']; ?></td>
                <td>
                    <a href="<?= base_url('activos/' . $activo['id'] . '/edit'); ?>" class="btn btn-warning btn-sm me-2">Editar</a>

                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-url="<?= base_url('empleados/' . $activo['id']); ?>">Eliminar</button>
                </td>
            </tr>

        <?php endforeach; ?>

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

<?= $this->endSection(); ?>