<?php include view("home", "header"); ?>  
<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">        
        <?php
        //include "izq.php" ;
//        if ( contacts_field_id("type" , $id) == 1 ) { // si es una compani
//            include "izq_details_company.php" ;
//        } else {
//            include "izq_details_contact.php" ;
//        }
        ?>                    
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12">
        <?php
        if ($_REQUEST && $a) {
            foreach ($error as $key => $value) {
                message("warning", "$value");
            }
        }
        ?>
        <?php
        if ((isset($smst) && $smst != false ) && (isset($smst) && $smst != false)) {
            message($smst, $smsm);
        }
        ?>
        <?php // include "nav.php"; ?>  



        <?php
        if (!$contacts_list) {
            message('info', 'No contacts found');
        }
        ?>

        <h3><?php _t('Check Vat format number'); ?></h3>

        <p><?php _t("VAT numbers must meet the following characteristics"); ?></p>
        <ul>
            <li><?php _t("It should only have letters and numbers"); ?> </li>
            <li><?php _t("The letters will be uppercase"); ?></li>
            <li><?php _t("It must not have spaces, points, lines or any other character"); ?></li>
        </ul>


        <?php
        if (contacts_list_errors_tva()) {
            ?>


            <h3><?php _t('Error list'); ?></h3>

            <?php
            include view('contacts', 'table_check_tva');
        } else {
            ?>
            <?php
        }
        ?>



        <a class="btn btn-lg btn-primary" href="index.php?c=contacts&a=ok_check_tva">
            <?php _t("Click here to correct all errors"); ?>
        </a>



        <?php
        /*        <a href="index.php?c=contacts&a=export_csv">Export</a> */
        ?>

        <?php
//        $pagination->createHtml();
        ?>


    </div>
</div>
<?php include view("home", "footer"); ?>  
