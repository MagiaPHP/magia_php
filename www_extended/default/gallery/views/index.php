<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-lg-9">
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
//        include "index_thumbnail.php";
        ?>

        <?php include "part_index.php"; ?>





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

