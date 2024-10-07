<?php include view("home", "header"); ?>  


<?php include view("invoices", "nav"); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">


        <?php
        if ($_REQUEST && $error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("invoices", "top"); ?>

        <?php
        if ($invoices) {
            include "part_index_previews.php";
            // la paginacion esa dentro 
        } else {
            message('info', 'No invoices was found');
        }
        ?>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <?php
        include "der_preview.php";
        ?>

    </div>

</div>

<?php include view("home", "footer"); ?> 




