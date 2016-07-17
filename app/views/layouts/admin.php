<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <base href="<?php echo URL::to('/'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Grandes Libros es la nueva tienda de libros mas grande, confiable y segura. ¿A qué esperas? ¡Compártelo con tus amig@s!">
        <link rel="shortcut icon" href="favicon.ico">
        <title>Bienvenid@ al panel de administración de Grandes Libros</title>
        <!-- Bootstrap core CSS -->
        <link href="packages/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
        <!-- Global js -->
        <script src="packages/jquery/jquery.min.js"></script>
    </head>
    <body>
        <!-- Wrap all page content here -->
        <div id="wrap">
            <?php echo View::make('partial.admin.navbar'); ?>
            <!-- Begin page content -->
            <div class="container page-header">
                <?php echo $content; ?>
            </div>
        </div>
        <?php 
        echo View::make('partial.admin.footer'); 
        echo View::make('partial.admin.dialogs'); 
        echo View::make('partial.admin.js'); ?>
    </body>
</html>