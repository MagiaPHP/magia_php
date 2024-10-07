<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view('config', 'izq'); ?>
    </div>

    <div class="col-lg-2">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-lg-8">
        <?php include "nav.php"; ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php
// https://api.jquery.com/prop/
        ?>

        <?php include "table_tax_by_country.php"; ?>


        <?php
        /*
          Export:
          <a href="index.php?c=addresses&a=export_json">JSON</a>
          <a href="index.php?c=addresses&a=export_pdf">pdf</a>
         */
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

