<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <?php include "izq.php" ?>
    </div>

    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
        <?php include "nav.php"; ?>


        <?php
        if ($_REQUEST && $error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <h3><?php _t('Text without translations'); ?></h3>

        <?php
        include "table_index3.php";
        ?>


    </div>
    
    
</div>

<?php include view("home", "footer"); ?> 

