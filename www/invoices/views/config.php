<?php include view("home", "header"); ?>  


<?php include view("invoices", "nav"); ?>


<div class="row">
    <div class="col-md-3 col-lg-2">
        <?php include view("invoices", "izq_config"); ?>
    </div>
    <div class="col-md-9 col-lg-10">
        <?php
        if ($_REQUEST && $error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>







    </div>
</div>

<?php include view("home", "footer"); ?> 




