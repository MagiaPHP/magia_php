<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">        
        <?php include view("contacts", 'izq_details'); ?>
    </div>


    <div class="col-sm-10 col-md-10 col-lg-10">


        <h2><?php _t("Banks"); ?></h2>


        <?php include "nav_banks.php"; ?> 

        <?php include "top_details_company.php"; ?>

        <?php
        //
        if (1 == 1) {
            include "table_contacts_banks.php";
        } else {
            message('info', 'No items');
        }
        ?>

    </div>
</div>
<?php include view("home", "footer"); ?>  









