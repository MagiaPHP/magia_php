<?php include view("home", "header"); ?> 


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 text-center">
        <form>
            <input type="hidden" name="c" value="credit_notes"> 
            <input type="hidden" name="a" value="details"> 
            <input type="hidden" name="id" value="<?php echo $cn->getId(); ?>"> 
            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-danger">
                <span class="glyphicon glyphicon-floppy-disk"></span> 
                <?php _t("Save"); ?>
            </button>
        </form>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
</div>




<br><br>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="shadow-container">





            <?php
            if ($_REQUEST) {
                foreach ($error as $key => $value) {
                    message("info", "$value");
                }
            }
            ?>

            <?php
            /**
             *             <?php # SAVE ################## ?>
              <?php # SAVE ################## ?>
              <?php # SAVE ################## ?>
              <?php # SAVE ################## ?>
              <?php # SAVE ################## ?>

              <div class="row">

              <?php if (IS_MULTI_VAT) { ?>
              <div class="col-sm-12 col-md-3 col-lg-3">
              <?php include "part_details_office.php"; ?>
              </div>
              <?php } ?>




              <div class="col-sm-12 col-md-3 col-lg-3">
              <?php include "part_details_company.php"; ?>
              </div>

              <div class="col-sm-12 col-md-3 col-lg-3">
              <?php include "part_details_dates.php"; ?>
              </div>

              <div class="col-sm-12 col-md-3 col-lg-3">
              <?php include "part_details_billing_address.php"; ?>
              </div>

              <div class="col-sm-12 col-md-3 col-lg-3">
              <?php
              if (_options_option('config_address_use_delivery')) {
              // include "part_details_delivery_address.php";
              }
              ?>
              </div>

              </div>



             */
            ?>



            <div class="container-fluid">                
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <?php echo logo(150); ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                    
                    <h2 class="text-right">
                        <?php _t("Credit note"); ?> 
                    </h2>

                    <h4 class="text-right">  
                        <a href="index.php?c=contacts&a=details&id=<?php echo $cn->getOffice_id(); ?>">
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
                        <small>
                            <a href="#" data-toggle="modal" data-target="#mychange_client" >
                                <?php echo icon("pencil"); ?>                                    
                            </a>
                        </small>

                        <a href="index.php?c=contacts&a=details&id=<?php echo $cn->getClient_id(); ?>">
                            <?php echo contacts_formated($cn->getClient_id()); ?>
                        </a>
                    </h3>

                    <p>
                        <a href="#" data-toggle="modal" data-target="#myModalBilling" >
                            <?php echo icon("pencil"); ?>                                    
                        </a>
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
                            <td class="text-right"><?php _t("Credit note date") ?></td><td>
                                <a href="#" data-toggle="modal" data-target="#dateEdit" >
                                    <?php echo icon("pencil"); ?>                                    
                                </a>
                                <?php echo $cn->getDate(); ?>
                            </td>
                        </tr>


                        <tr>
                            <td class="text-right"><?php _t("Payement due") ?></td><td>

                                <?php echo $cn->getDate(); ?>
                            </td>
                        </tr>



                        <tr class="danger">
                            <td class="text-right"><b><?php _t("Amount Due") ?></b></td><td><b></b></td>
                        </tr>


                    </table>

                </div>

            </div>



            <?php
            ####################################################################
            ############# DATE #################################################
            ####################################################################
            ?>           
            <div class="modal fade" id="dateEdit" tabindex="-1" role="dialog" aria-labelledby="dateEditLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button 
                                type="button" 
                                class="close" 
                                data-dismiss="modal" 
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="dateEditLabel">
                                <?php _t("Edit"); ?>
                            </h4>
                        </div>
                        <div class="modal-body">

                            <p>
                                <?php _t("The document date"); ?>
                            </p>

                            <?php include "form_date_update.php"; ?>   
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php _t("Close"); ?></button>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            ####################################################################
            ####################################################################
            ####################################################################
            ####################################################################
            ?>        
            <div class="modal fade" id="myModalBilling" tabindex="-1" role="dialog" aria-labelledby="myModalBillingLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalBillingLabel">
                                <?php _t('Change billing address'); ?>
                            </h4>
                        </div>
                        <div class="modal-body">

                            <p><?php _t("Please choose an address"); ?></p>

                            <?php
                            include "form_update_details_billing_address.php";
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            ####################################################################
            ####################################################################
            # CAmbio de empresa
            ####################################################################
            ?>
            <div class="modal fade" id="mychange_client" tabindex="-1" role="dialog" aria-labelledby="mychange_clientLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="mychange_clientLabel">
                                <?php _t('Change client'); ?>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <p><?php _t("Please choose an new client"); ?></p>
                            <?php
                            include "form_change_client.php";
                            ?>
                        </div>
                    </div>
                </div>
            </div>


























            <table class="table table-striped">
                <thead>
                    <tr class="success">
                        <th><?php _t("#"); ?></th>
                        <th><?php _t("Description"); ?></th>
                        <th><?php _t("Quantity"); ?></th>
                        <th class="text-right"><?php _t("Value"); ?></th>
                        <th class="text-right"><?php _t("Sub total"); ?></th>
                        <th class="text-right"><?php _t("Htva"); ?></th>
                        <th class="text-right"><?php _t("Tva"); ?></th>
                        <th class="text-right"><?php _t("Tvac"); ?></th>
                        <th class=""><?php _t("Edit"); ?></th>
                        <th class=""><?php _t("Delete"); ?></th>
                    </tr>
                </thead>

                <tbody class="row_position">
                    <?php
                    $i = 1;
                    $subtotal = 0;
                    $totaltax = 0;
                    $totaltaxc = 0;
                    $i = 1;
                    foreach (credit_note_lines_list_by_credit_note_id($cn->getId()) as $key => $item) {
                        $subtotal = $subtotal + $item['subtotal'];
                        $totaltax = $totaltax + $item['totaltax'];
                        $totaltaxc = $totaltaxc + $item['totaltaxc'];
                        $class = ( stripos($item['description'], "---") == false ) ? "" : " success ";
                        ?>
                        <tr class="<?php echo $class; ?>" id="<?php echo "$item[id]"; ?>">    
                            <?php if (!$class) { ?> 
                                <td><?php echo "$i"; ?></td>                                    
                                <td><?php echo "$item[description]"; ?></td>
                                <td><?php echo "$item[quantity]"; ?></td>                                    
                                <td class="text-right"><?php echo moneda($item['value']); ?> </td>
                                <td class="text-right"><?php echo moneda($item['subtotal']); ?> </td>                                    
                                <td class="text-right">(<?php echo moneda($item['tax']); ?> %) <?php echo moneda($item['totaltax']); ?></td>                                                                                                   
                                <td class="text-right"><?php echo moneda($item["totaltaxc"]); ?> </td>                                
                                <td class="text-right"><?php echo moneda($item["totaltaxc"]); ?> </td>                                

                            <?php } else { ?> 

                                <td><?php echo "$item[quantity]"; ?></td>        
                                <td colspan="7"><?php echo strtoupper($item[description]); ?></td>

                            <?php } ?>


                            <td><?php include "modal_items_edit.php"; ?></td>

                            <td class=""> 

                                <a class="btn btn-danger btn-md" href="index.php?c=credit_notes&a=linesDeleteOk&id=<?php echo "$item[id]"; ?>">
                                    <span class="glyphicon glyphicon-trash"></span>             
                                    <?php // _t("Delete"); ?>
                                </a>

                            </td>
                        </tr>                            

                        <?php
                        $i++;
                    }
                    ?>

                    <tr>
                        <th><?php _t("#"); ?></th>
                        <th><?php _t("Description"); ?></th>
                        <th><?php _t("Quantity"); ?></th>
                        <th class="text-right"><?php _t("Value"); ?></th>
                        <th class="text-right"><?php _t("Sub total"); ?></th>
                        <th class="text-right"><?php _t("Htva"); ?></th>
                        <th class="text-right"><?php _t("Tva"); ?></th>
                        <th class="text-right"><?php _t("Tvac"); ?></th>
                        <th class=""><?php _t("Edit"); ?></th>
                        <th class=""><?php _t("Delete"); ?></th>
                    </tr>

                    <tr>
                        <td colspan="4" class="text-right"><?php _t("Totals"); ?></td>                                                                                
                        <td class="text-right"><?php echo moneda($subtotal); ?></td>
                        <td class="text-right"><?php // echo moneda($subtotal);                  ?></td>                            
                        <td class="text-right"><?php echo moneda($totaltax); ?></td>
                        <td class="text-right"><?php echo moneda($totaltaxc); ?></td>
                        <td></td>                            
                        <td></td>

                    </tr>
                    <?php
                    /*
                      <?php # Tax items total ############################################   ?>
                      <?php foreach ( tax_list() as $key => $tax ) { ?>
                      <tr>
                      <td colspan=""></td>
                      <td colspan=""></td>
                      <td colspan=""></td>
                      <td colspan=""></td>
                      <td colspan=""></td>
                      <td colspan="2" class="text-right">
                      <?php
                      _t("Total tax") ;
                      echo " $tax[value] %" ;
                      ?>
                      </td>
                      <td colspan="2" class="text-right"><?php echo moneda(credit_note_lines_total_by_tax($id , $tax['value'])) ; ?></td>
                      <td></td>
                      <td></td>
                      </tr>
                      <?php } ?> */
                    ?>             

                    <?php # Tax items total ############################################       ?>

                    <?php
                    /* <tr>
                      <td colspan="6"></td>
                      <td class="text-right"><?php _t("Advance"); ?></td>
                      <td class="text-right"><?php echo monedaf(credit_notes_field_id("advance", $id)); ?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr> */
                    ?>

                    <tr>
                        <td colspan="6" class="text-right"><?php _t("To refund"); ?></td>                        
                        <td colspan="2"class="text-right"  ><?php echo moneda($subtotal + $totaltax - credit_notes_field_id("returned", $id)); ?></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td colspan="11">
                            <?php // include "form_items_add.php"; ?>
                        </td>
                    </tr>   


                </tbody>
            </table>








            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php include "form_items_add.php"; ?>
                        </div>
                    </div>


                </div>
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
            </div>












            <?php
            include view("credit_notes", "part_comments");
            ?>







        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>



</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 text-center">
        <form>
            <input type="hidden" name="c" value="credit_notes"> 
            <input type="hidden" name="a" value="details"> 
            <input type="hidden" name="id" value="<?php echo $cn->getId(); ?>"> 
            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-danger">
                <span class="glyphicon glyphicon-floppy-disk"></span> 
                <?php _t("Save"); ?>
            </button>
        </form>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
</div>


<?php
/**
 * <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
 */
?>

<?php include view("home", "footer"); ?>

