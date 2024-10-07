<?php
# MagiaPHP 
# file date creation: 2024-01-25 
?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("emails", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("emails", "izq_config"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("emails", "izq_config"); ?>
        <?php include view("emails_tmp", "der_add"); ?>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6">


        <?php
        /**
         *         <h1>
          <?php _menu_icon("top", 'emails_tmp'); ?>
          <?php _t("Add emails_tmp"); ?>
          </h1>
         */
        ?>


        <?php include view("emails_tmp", "form_add"); ?>
    </div>


</div>

<?php include view("home", "footer"); ?>

