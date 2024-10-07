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

            <?php _t("Edit"); ?>
        </h1>

        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>  

        <?php //include view("doc_sections", "form_edit"); ?>

        <p><?php _t("Edit name"); ?></p>

        <?php include 'form_edit_section.php'; ?>

        <br>

        <p><?php _t("Edit order"); ?></p>


        <?php include 'form_edit_order_by.php'; ?>


        <br>
        <hr>

        <?php include 'modal_delete.php'; ?>











    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php // include view("doc_sections", "der_edit"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
