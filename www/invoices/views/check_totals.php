<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-md-3 col-lg-2">
        <?php include view("invoices", "izq"); ?>
    </div>

    <div class="col-md-9 col-lg-10">

        <?php include view("invoices", "nav"); ?>

        <?php
        if ($_REQUEST && $error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("invoices", "top"); ?>

        <?php
        // esto verifica si los totales de la factura correspoonde a los totales de cada linea de la factura 


        include "part_check_totals.php";
        ?>

    </div>
</div>

<?php include view("home", "footer"); ?> 




