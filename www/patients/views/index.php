<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-0">
        <?php //include view("patients" , "izq") ; ?>
    </div>

    <div class="col-lg-12">
        <?php include view("patients", "nav"); ?>


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


        <?php
        include "table_index.php";
        ?>



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

