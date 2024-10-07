<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php //include view("balance", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("balance", "nav"); ?>


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


        <?php include view("balance", "table_general"); ?>

        <?php
        $pagination->createHtml();
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

