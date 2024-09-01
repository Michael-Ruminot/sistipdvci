<?= $this->extend('layout/plantilla'); ?>

<?= $this->section('contenido'); ?>

<div class="table-responsive mt-3">
    <h3 class="my-3" id="titulo">Sedes PDV</h3>
    <table id="myTable" class="table align-middle table-hover my-3" aria-describedby="titulo">
        <thead class="table-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Direccion</th>
                <th scope="col">Imagen</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($sedes as $sede) : ?>

                

                <tr>
                    <td><?= $sede['sede']; ?></td>
                    <td><?= $sede['direccion']; ?></td>
                    <td></td>
                </tr>

            <?php endforeach; ?>

            </tr>

        </tbody>
    </table>
</div>

<?= $this->endSection(''); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>