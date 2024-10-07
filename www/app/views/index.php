<?php include view("home", "header"); ?>  

<div class="container-fluid">

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <hr>
        <?php include view("app", "izq"); ?>
        <hr>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <hr>
        <?php // include view("app", "izq"); ?>
        <?php // include view("app", "nav"); ?>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php include "form_search.php"; ?>
        <?php //include view("app", "invoice"); ?>
    </div>


</div>

<?php include view("home", "footer"); ?> 

