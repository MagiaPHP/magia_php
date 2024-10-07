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


                <?php if (!modules_field_module('status', 'shop')) { ?>

                    <?php include view("home", "form_new_account"); ?>

                    <?php
                } else {

                    message('info', 'Module is inactive');
                }
                ?>

                <?php //include "form_new_account.php";  ?>

            </div>
        </div>
    </div>
    <div class="col-lg-4"></div>
</div>

<?php include "footer.php"; ?>
