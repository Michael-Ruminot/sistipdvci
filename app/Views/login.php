<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>SISTIPDV - Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- CSS-->
    <link rel="stylesheet" href="<?= base_url('css/estilo.css'); ?>" type="text/css" />
</head>

<body class="login">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card form-login" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <img src="<?= base_url('img/logo.png'); ?>" class="mt-4 img-fluid">
                            <div class="margin-form">
                                <h1 class="fs-3 card-title fw-bold mt-5">Acceso a sistema TI</h1>
                                <p class="mb-5">Favor ingresa tu usuario y contraseña</p>
                                <form method="POST" action="<?= base_url('auth'); ?>" autocomplete="off">

                                    <?= csrf_field(); ?>

                                    <div data-mdb-input-init class="form-outline form-white mb-4">
                                        <input type="text" class="form-control" name="username" id="username" required autofocus>
                                        <label class="mb-2" for="usuario">Usuario</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline form-white mb-5">
                                        <input type="password" class="form-control form-control-lg" name="password" id="password" required>
                                        <label for="password">Contraseña</label>
                                    </div>

                                    <?php if (session()->getFlashdata('error') !== null) { ?>
                                        <div class="alert alert-danger">
                                            <?= session()->getFlashdata('error'); ?>
                                        </div>
                                    <?php } ?>

                                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-dark btn-lg btn-login" type="submit">INGRESAR</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>