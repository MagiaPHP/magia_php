
<?php include view("home", "header"); ?>                
<?php include view("doc", "nav"); ?> 
<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">       
        <?php //include "izq.php"; ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">

        <h1>
            <?php _menu_icon("top", 'doc_translations'); ?>
            <?php _t("Doc_translations edit"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view('doc_translations', 'form_edit_2'); ?>
        <hr>

        <a 
            class="btn btn-danger"
            href="index.php?c=doc_translations&a=delete&id=xxxxxxxxx&l=yyyyyyyyyyyy"><?php _t("Delete"); ?></a>

    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">


        <?php // include "der.php"; ?>

    </div>
</div>

<?php include view("home", "footer"); ?>

