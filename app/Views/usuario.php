<?php echo $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>

<?php 
    if (session()->getFlashdata('error')) {
        echo '<div class="alert alert-danger">'.session()->getFlashdata('error').'</div>';
    }
?>

<h1>Bienvenido perfil usuariooooooo</h1>

<h2>Hola <?php echo session()->get('nombre'); ?> <?php echo session()->get('apellido'); ?></h2>


<a href="<?php echo base_url('logout') ?>" class="btn btn-primary btn-sm">Cerrar sesión</a>


<?= $this->endSection('contenido'); ?>

<?= $this->section('script'); ?>



<?= $this->endSection(); ?>