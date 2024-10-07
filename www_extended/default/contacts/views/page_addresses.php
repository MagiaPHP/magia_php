<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">        
        <?php include view("contacts", 'izq_details'); ?>
    </div>


    <div class="col-sm-10 col-md-10 col-lg-10">

        <h2><?php _t("Addresses"); ?></h2>



        <?php include view("contacts", "nav_address"); ?> 

        <?php include "top_details_company.php"; ?>

        <?php
//        if ($addresses) {
//            include "table_contacts_address.php";
//        } else {
//            message('info', 'No items');
//        }
        include "table_contacts_address.php";
        ?>

    </div>
</div>

<?php
/**
 * <div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12">
  <?php
  $logs = logs_seach_by_controller_doc_id('addresses', $id);
  ?>
  <?php include view("logs", "table_index"); ?>
  </div>
  </div>
 */
?>

<?php include view("home", "footer"); ?>  