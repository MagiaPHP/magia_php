<?php
# MagiaPHP 
# file date creation: 2023-07-20 
?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq.php"; ?>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq_index.php"; ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">

        <h1>

            <?php _t("Add"); ?>
        </h1>

        <?php include view("doc_sections", "form_add"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php // include view("doc_sections", "der_add"); ?>

    </div>
</div>

<?php include view("home", "footer"); ?>

