<?php include view("home", "header"); ?> 

<?php include "nav_details.php"; ?>

<div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8">



        <div class="shadow-container">



            <div class="container-fluid">                
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <?php echo logo(150); ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                    
                    <h2 class="text-right">
                        <?php _t("Credit note"); ?> 
                    </h2>

                    <h4 class="text-right">  
                        <a href="index.php?c=contacts&a=details&id=<?php echo $cn->getOffice_id();  ?>">
                            <?php echo contacts_formated($cn->getOffice_id()); ?>                        
                        </a>
                    </h4>

                    <p class="text-right">
                        <?php
                        echo addresses_formated_html(addresses_array_to_json(addresses_billing_by_contact_id($cn->getOffice_id())));
                        ?>    
                    </p>
                    <br>
                </div>
            </div>

            <hr>

            <div class="container-fluid">

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">


                    <small><?php _t("Invoice to"); ?>: </small>

                    <h3>
                        <a href="index.php?c=contacts&a=details&id=<?php echo $cn->getClient_id(); ?>">
                            <?php echo contacts_formated($cn->getClient_id()); ?>
                        </a>
                    </h3>

                    <p>

                        <?php
                        echo addresses_formated_html($cn->getAddresses_billing());
                        ?>
                    </p>





                    <p><?php _t('Vat number'); ?>: <?php echo contacts_field_id('tva', $cn->getClient_id()); ?></p>

                    <p class="text-primary"><?php echo directory_by_contact_name($cn->getClient_id(), 'Email') ?? ''; ?></p>
                    <p class="text-primary"><?php echo directory_by_contact_name($cn->getClient_id(), 'GSM') ?? ''; ?></p>


                </div>


                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                    <table class="table">
                        <tr>
                            <td class="text-right">
                                <?php _t("Credit note number"); ?>    
                            </td>
                            <td><?php echo $cn->getId_formatted(); ?></td>
                        </tr>
                        <tr>
                            <td class="text-right">
                                <?php _t("Invoice number"); ?>    
                            </td>
                            <td><?php echo $cn->getInvoice_id(); ?></td>
                        </tr>
                        <tr>
                            <td class="text-right"><?php _t("Credit note date") ?></td><td><?php echo $cn->getDate(); ?></td>
                        </tr>
                        <tr>
                            <td class="text-right"><?php _t("Payement due") ?></td><td><?php echo $cn->getDate(); ?></td>
                        </tr>

                        <tr class="danger">
                            <td class="text-right"><b><?php _t("Amount Due") ?></b></td><td><b></b></td>
                        </tr>


                    </table>

                </div>

            </div>
























            <?php
            if ($_REQUEST) {
                foreach ($error as $key => $value) {
                    message("info", "$value");
                }
            }
            ?>



            <?php
            /**
             *             <div class="row">


              <?php if (IS_MULTI_VAT) { ?>
              <div class="col-sm-12 col-md-4 col-lg-4">
              <?php include "part_details_office.php"; ?>
              </div>
              <?php } ?>



              <div class="col-sm-12 col-md-4 col-lg-4">
              <?php include "part_details_company.php"; ?>
              </div>


              <div class="col-sm-12 col-md-4 col-lg-4">
              <?php include "part_details_billing_address.php"; ?>
              </div>

              <div class="col-sm-12 col-md-4 col-lg-4">
              <?php
              //                if (_options_option('config_address_use_delivery')) {
              //                    include "part_details_delivery_address.php";
              //                }
              ?>
              </div>
              </div>
             */
            ?>







            <?php
            /**
             *             <div class="panel panel-default">
              <div class="panel-heading">
              <?php
              if (modules_field_module('status', "docu")) {
              echo docu_modal_bloc($c, $a, 'items');
              }
              ?>
              <?php _t("Items"); ?></div>
              <div class="panel-body">
              </div>
              </div>
             */
            ?>





            <table class="table table-striped">
                <thead>
                    <tr class="success">                        
                        <th><?php _t("Description"); ?></th>
                        <th class="text-center"><?php _t("Quantity"); ?></th>
                        <th class="text-right"><?php _t("Value"); ?></th>
                        <th class="text-right"><?php _t("Sub total"); ?></th>
                        <th class="text-right"><?php _t("Tva"); ?></th>
                        <th class="text-right"><?php _t("Tvac"); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $subtotal = 0;
                    $totaltax = 0;
                    $totaltaxc = 0;
                    foreach (credit_note_lines_list_by_credit_note_id($cn->getId()) as $key => $items) {
                        $class = ( strstr($items['description'], "ORDER") ) ? "info" : ""; // en la posicion cero   
                        $subtotal = $subtotal + $items['value'];
                        $totaltax = $totaltax + $items['totaltax'];
                        $totaltaxc = $totaltaxc + $items['totaltaxc'];
                        ?>   
                        <tr class="<?php echo $class; ?>">                                                        
                            <td><?php echo "$items[description]"; ?></td>
                            <td class="text-center"><?php echo "$items[quantity]"; ?></td>                                
                            <td class="text-right"><?php echo moneda($items['value']); ?> </td>
                            <td class="text-right"><?php echo moneda($items['subtotal']); ?> </td>
                            <td class="text-right">(<?php echo ($items['tax']); ?> %) <?php echo moneda($items['totaltax']); ?></td>
                            <td class="text-right"><?php echo moneda($items['totaltaxc']); ?> </td>
                        </tr>

                    <?php } ?>
                </tbody>
                <tr>
                    <td colspan="3" class="text-right"><?php _t("Totals"); ?></td>                                                    
                    <td class="text-right"><?php echo moneda($subtotal); ?></td>
                    <td class="text-right"><?php echo moneda($totaltax); ?></td>
                    <td class="text-right info"><b><?php echo moneda($totaltaxc); ?></b></td>               
                </tr>

                <?php # Tax items total ############################################    ?>
                <?php
                $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);
                //vardump($tax_by_country); 

                foreach ($tax_by_country as $key => $tax) {
                    ?>  
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2" class="text-right"><?php
                            _t("Total tax");
                            echo " $tax[tax] %";
                            ?>
                        </td>
                        <td class="text-right">
                            <?php
//                                vardump($id);
//                                vardump($tax['value']);
                            echo moneda(credit_note_lines_total_by_tax($id, $tax['tax']));
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                <?php # Tax items total ############################################     ?>

                <?php
                /*
                  <tr>
                  <td colspan="6" class="text-right"><?php _t("Advance"); ?></td>
                  <td class="text-right"><?php echo moneda(credit_notes_field_id("advance", $id)); ?></td>
                  </tr> */
                ?>

                <tr>
                    <td colspan="5" class="text-right"><b><?php _t("Already refund"); ?></b></td>                        
                    <td class="text-right"><?php echo moneda(credit_notes_field_id("returned", $id)); ?></td>
                </tr>

                <tr>
                    <td colspan="5" class="text-right"><?php _t("To refund"); ?></td>                        
                    <td class="text-right info" class="text-right"><?php echo moneda($totaltaxc - credit_notes_field_id("returned", $id)); ?></td>

                </tr>
            </table>





            <?php
            /*
              <div class="panel panel-default">
              <div class="panel-body">
              <?php _t("Comunication"); ?>:  <?php echo $credit_notes['ce']; ?>
              </div>
              </div>
             */
            ?>


            <h4>
                <?php _t("Comments"); ?>
            </h4>

            <p>
                <?php echo $cn->getComments(); ?>
            </p>



            <?php
            /**
             *             <div class="panel panel-default">
              <div class="panel-heading">

              <?php
              if (modules_field_module('status', "docu")) {
              echo docu_modal_bloc($c, $a, 'comments');
              }
              ?>

              <?php _t("Comments"); ?>
              </div>
              <div class="panel-body">

              </div>
              </div>
             */
            ?>



            <hr>
        </div>
    </div>


    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php include "der.php";
        ?> 
    </div>
</div>



<?php include view("home", "footer"); ?>