<!DOCTYPE html>
<?php require 'config.php'; ?>

<html>
    <head>
        <title>Framework</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?= BASE ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/assets/css/style.css">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <script src="https://kit.fontawesome.com/006c66c7a3.js" crossorigin="anonymous"></script>
        <script src="<?= BASE ?>/assets/js/node_modules/jquery/dist/jquery.min.js" ></script>
        <script src="<?= BASE ?>/assets/js/node_modules/jquery/dist/jquery.slim.min.js" ></script>
        <script src="<?= BASE ?>/assets/js/node_modules/jquery/dist/jquery.slim.js" ></script>
        <script src="<?= BASE ?>/assets/js/node_modules/jquery/dist/jquery.js" ></script>
    </head>

    <body>
        <header>
            <div class="container">
                <a href="<?= BASE ?>"><img src="<?= BASE ?>/assets/img/logo.png" title="Home" alt="logo" class="img-logo"></a>
                <div id="menu">
                    <a href="<?= BASE ?>">Inicio</a>
                    <a href="<?= BASE ?>/views/postagens">Postagens</a>
                    <a href="<?= BASE ?>/views/albums">Albums</a>
                    <a href="<?= BASE ?>/views/todos">TO-DOs</a>
                </div>
            </div>
        </header>

        <hr>
        <div id="conteudo" class="container">
