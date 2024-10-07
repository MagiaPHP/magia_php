<?php include "header.php"; ?>


<div class="row">

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php if (modules_field_module('status', 'tasks')) { ?>

            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#"><?php _t("Tasks"); ?></a></li>
            </ul>
            <?php include view('tasks', 'table_index'); ?>

        <?php } ?>




    </div>


    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "der.php"; ?>
    </div>




</div>


<?php include "footer.php"; ?>