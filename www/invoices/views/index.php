<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-md-3 col-lg-2">
        <?php include view("invoices", "izq"); ?>
    </div>
    <div class="col-md-9 col-lg-10">

        <?php include view("invoices", "nav2"); ?>


        <?php
        if ($_REQUEST && $error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("invoices", "top"); ?>

        <?php
        if (isset($txt)) {
            switch ($txt) {
                case '-h':
                case '--help':
                case '-a':
                case '--ayuda':
                    include view("invoices", "help");

                    break;

                default:
                    break;
            }
        }



        if ($invoices) {
            
            include "part_index.php";
            // la paginacion esa dentro 
        } else {
            message('info', 'No invoices was found');
        }
        ?>

    </div>
</div>

<?php include view("home", "footer"); ?> 




