<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <base href="<?php echo URL::to('/'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Grandes Libros es la nueva tienda de libros donde puedes encontrar súper ofertas. ¿A qué esperas? ¡Compártelo con tus amig@s!">
        <link rel="shortcut icon" href="favicon.ico">
        <title>Bienvenid@ a Grandes Libros, la nueva tienda de libros</title>
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
            <?php echo View::make('partial.guest.navbar'); ?>
            <!-- Begin page content -->
            <div class="container page-header">
                <?php 
                echo $content; 
                echo View::make('partial.guest.blockquotes'); ?>      
            </div>
        </div>
        <?php 
        echo View::make('partial.guest.footer'); 
        echo View::make('partial.guest.dialogs'); 
        echo View::make('partial.guest.js'); ?>
    </body>
</html>