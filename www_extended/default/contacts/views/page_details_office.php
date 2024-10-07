<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">        
        <?php include view("contacts", 'izq_details'); ?>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">


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

        <?php include "nav_details_company.php"; ?>
        <?php include "top_details_company.php"; ?>
        <?php include "page_details_body_all_contact.php"; ?> 


        <?php
        /**
         *         <?php //include "form_details_company.php";    ?>

          <?php
          //        include "new_modelo.php";

          if ($u_owner_id != 1022) {
          include "form_details_company.php";
          }
          ?>

          <?php include "form_update_name.php"; ?>


          <?php
          //        vardump($company->export());
          //        vardump($company->setTva(200));
          //        vardump($company->getWhy_can_not_edit_tva());

          include "form_update_tva.php";
          ?>


          <?php
          if (_options_option("condif_invoices_monthly")) {
          include "form_update_billing_method.php";
          }
          ?>

          <?php
          //        include "form_update_discounts.php";

          if ($id != 1022) {
          include "form_update_discounts.php";
          }
          ?>
          <?php include "form_update_language.php"; ?>

          <?php
          //        if ($u_owner_id != 1022) {
          //            include "form_update_status.php";
          //        }

          include "form_update_status.php";

          //        include "table_contacts_directory.php";
          //        include "part_company_resumen.php";
          ?>


         */
        ?>






        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
        }
        ?>







        <?php
//vardump($company->getTva());
//vardump($company->setTva(1));
        ?>
        <?php
        if ($u_rol == 'root') {

            //             vardump($company);
            //            vardump($json = $export_data->getExport());
            //
            //            vardump($data = json_decode($json));
            //            vardump($data->tva);
            //            vardump($data->name);
            //            vardump($data->language);
            //            vardump($data->addresses->Billing);
            //            vardump($data->addresses->Billing->_id);
            //            echo "<p>Solo puede ver el root</p>";
            //            include "form_details_dropbox.php";
            //            include "form_details_reset_db.php";
            //               include "form_export_data.php";
        }
        ?>
        <?php //include "form_company_public_data.php";              ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">        
        <?php // include "der2_company.php"; ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">        
        <?php
        if (modules_field_module('status', 'providers')) {
            include "der2_company.php";
        }
        ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">

        <?php include "der_company.php"; ?>
    </div>

</div>


<?php include view("home", "footer"); ?>  

