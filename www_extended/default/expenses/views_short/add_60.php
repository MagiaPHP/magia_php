<?php
# MagiaPHP 
# file date creation: 2024-01-08 
?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq_add.php"; ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'expenses'); ?>
            <?php _t("Preview"); ?>
        </h1>

        <?php
        // select provider
        include "part_add_00.php";
        include "part_add_05.php";
        include "part_add_10.php";
        include "part_add_20.php";
        include "part_add_25.php";
        include "part_add_30.php";
        include "part_add_35.php";
        include "part_add_40.php";
        include "part_add_50.php";
//        include "part_add_60.php";
        //    include "part_add_70.php";
        include "form_add_60.php";
        include "part_add_cancel.php";
        ?>





    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php // include "der_add.php";  ?>

    </div>
</div>

<?php include view("home", "footer"); ?>

