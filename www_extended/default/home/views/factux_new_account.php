<?php include "header.php"; ?>
<style>

    body {
        background-image:url("1920x1080.jpg");
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
    <div class="col-lg-4">
        <?php //include "izq_new.php"; ?>    
    </div>
    <div class="col-lg-4">
        <br>
        <div class="panel panel-default">
            <div class="panel-body">

                <p class="text-center">
                    <?php logo(200, "img-responsive"); ?>
                </p>

                <h2 class="form-signin-heading text-center"><?php _t("New account"); ?></h2>

                <p>

                </p>


                <?php
                if (modules_field_module('status', 'shop')) {
                    include view("home", "form_factux_new_account");
                } else {
                    message('Info', 'Modulo shop in disabled');
                }
                ?>



            </div>
        </div>
    </div>
    <div class="col-lg-4"></div>
</div>

<?php include "footer.php"; ?>