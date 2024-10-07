<?php include view("home", "header"); ?>  
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <?php include "nav.php"; ?>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <?php // include "izq.php"; ?>
                <?php include "izq.php"; ?>
                <?php // include "izq_details_by_modele_doc.php"; ?>


            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <?php //include "izq_details.php"; ?>
            </div>          
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        <?php include "part_iframe_pdf_example.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?> 






