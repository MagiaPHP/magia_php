<?php include "header.php"; ?>

<style>

    body {

        background-image:url("https://picsum.photos/1920/1080");
        opacity: 0.99;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>


<div class="container-fluid">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <br>


        <div class="panel panel-default">
            <div class="panel-body">

                <?php
                if ($_REQUEST) {
                    foreach ($error as $key => $value) {
                        message("info", "$value");
                    }
                }

                include view("home", 'form_please_call_robinson');

                /*                 * *
                 * 1 solicita la recuperacion de la clave 
                 * registro solicitud valida por una hora 
                 * mando email con enlace para reiniciar clave
                 * el usuario acede a nueva pagina y accede para cambiar clave
                 * 
                 * 
                 */
                ?>
            </div>
        </div>
    </div>
    <div class="col-lg-4"></div>
</div>


<?php include "footer.php"; ?>