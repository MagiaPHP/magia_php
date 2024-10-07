<?php
# MagiaPHP 
# file date creation: 2024-04-11 
?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php // include "izq_add.php"; ?></div>

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">


        <?php
        /**
         *         <h1>
          <?php _menu_icon("top", 'blog'); ?>
          <?php _t("Add blog"); ?>
          </h1>
         */
        ?>

        <?php include "form_add.php"; ?>

        <?php // include view("blog", "form_add", $arg = ["redi" => 1]);  ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php // include "der_add.php"; ;  ?>

    </div>
</div>

<?php include view("home", "footer"); ?>

