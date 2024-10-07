<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("reminders_invoices", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php include view("reminders_invoices", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php
        if ($reminders_invoices) {
            include view("reminders_invoices", "table_index");
        } else {
            message("info", "No items");
        }
        ?>
    </div>
</div>

<?php include view("home", "footer"); ?> 
