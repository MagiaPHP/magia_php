<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
        <h3><?php echo $config_company_name; ?></h3>
        <p><?php echo $config_company_a_number; ?>, <?php echo $config_company_a_address; ?></p>
        <p><?php echo $config_company_a_postal_code; ?> - <?php echo $config_company_a_barrio; ?></p>
        <p><?php echo $config_company_a_city; ?> - <?php echo $config_company_a_country; ?></p>
        <p><?php _t("Tva"); ?>: <?php echo $config_company_tva; ?></p>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6">                        
        <h3><?php echo contacts_formated($budgets['client_id']) ?></h3>

        <?php
        $ba = json_decode($budgets['addresses_billing'], true);
        //vardump($ba);
        ?>




        <p><?php echo $ba['number']; ?>, <?php echo $ba['address']; ?></p>
        <p><?php echo $ba['postcode']; ?> - <?php echo $ba['barrio']; ?></p>
        <p><?php echo $ba['city']; ?> - <?php echo countries_country_by_country_code($ba['country']); ?></p>

        <p><b><?php _t("Tva"); ?>: <?php echo contacts_field_id('tva', contacts_headoffice_of_contact_id($budgets['client_id'])) ?></b></p>
    </div>
</div>



<div class="row">
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading"><?php _t("Date"); ?></div>
            <div class="panel-body">
                <?php echo $budgets['date']; ?>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading"><?php _t("Tva"); ?></div>
            <div class="panel-body"><?php echo contacts_field_id('tva', contacts_headoffice_of_contact_id($budgets['client_id'])) ?>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading"><?php _t("Client number"); ?></div>
            <div class="panel-body"><?php echo $budgets['client_id']; ?>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading"><?php _t("Status"); ?></div>
            <div class="panel-body">
                <?php echo _t(budget_status_by_status($budgets['status'])) ?>
            </div>
        </div>
    </div>
</div>




<div class="panel panel-default">
    <div class="panel-heading"><?php _t("Items"); ?></div>
    <div class="panel-body">


        <table class="table table-striped" >
            <thead>

                <tr>
                    <th>#</th>         

                    <?php if (modules_field_module('status', 'audio')) { ?><th>##</th><?php } ?>        
                    <th><?php _t("Quantity"); ?></th> 
                    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("Code"); ?></th> <?php } ?>                            
                    <th><?php _t("Description"); ?></th>                               
                    <th class="text-right"><?php _t("Price U."); ?></th>
                    <th class="text-right"><?php _t("Sub total"); ?></th>
                    <th class="text-right"><?php _t("Discounts"); ?></th>
                    <th class="text-right"><?php _t("Htva"); ?></th>
                    <th class="text-right"><?php _t("TVA"); ?></th>
                    <th class="text-right"><?php _t("Tvac"); ?></th>
                </tr>
            </thead>

            <tbody>
                <?php
//$items = budget_lines_list_by_budget_id($id);   
                $total_sub_total = 0;
                $total_tax = 0;
                $total_tvac = 0;
                $total_discounts = 0;
                $class = "";
                $separator = false;

                $transport_subtotal = 0;
                $transport_tax = 0;
                $transport_tvac = 0;
                $transport_discounts = 0;
                $transport_class = "";
                $transport_separator = false;
                $i = 1;
                $j = 2;
                $q = 1;

                $new_order = false;

                foreach (budget_lines_list_by_budget_id_without_transport($budgets['id']) as $key => $budget_items) {

                    if (stripos($budget_items['description'], "---") !== FALSE) {
                        $class = " success ";
                        $separator = true;
                    }

                    $class = ( strstr($budget_items['code'], "ORDER") ) ? "info" : $class; // en la posicion cero  
                    $class = ( strstr($budget_items['code'], "SIDE") ) ? "danger" : $class; // en la posicion cero  
                    //            //    
                    // No traduzco en caso que sea

                    if (
                            $budget_items['code'] == 'ORDER' ||
                            $budget_items['code'] == 'PAT' ||
                            $budget_items['code'] == 'POST'
                    ) {
                        $description = $budget_items['description'];
                    } else {
                        // Si es modulo audio tradusco, sino 
                        // no traduzco 
                        $description = (modules_field_module('status', 'audio')) ? _tr($budget_items['description']) : ($budget_items['description']);
                    }


                    $new_order = ( $budget_items['code'] == 'ORDER' ) ? true : false;

                    $price = $budget_items['price'];
                    $sub_total = $budget_items['quantity'] * $budget_items['price'];
                    $discounts = $budget_items['discounts'];
                    $discounts_mode = $budget_items['discounts_mode'];

                    if ($discounts_mode == "%") {
                        $discounts_in_value = ($discounts > 0 ) ? ( ($sub_total * $discounts) / 100 ) : (0);
                        $discounts_html = "-($discounts %) " . moneda($discounts_in_value);
                    } else {
                        $discounts_in_value = $discounts;
                        $discounts_html = "-" . moneda($discounts);
                    }

                    $thtva = $sub_total - $discounts_in_value;

                    $totaltax = ($thtva) ? ($thtva * $budget_items['tax']) / 100 : 0;

                    $ttvac = $thtva + $totaltax;

                    //////////////Totales generales

                    $total_sub_total = $total_sub_total + $sub_total;
                    $total_tax = $total_tax + $totaltax;
                    $total_tvac = $total_tvac + $ttvac;
                    $total_discounts = $total_discounts + $discounts_in_value;
                    ?>   



                    <?php
                    if ($new_order && $i > 1) {
                        $q = 1;
                        // SOLO PARA web
                        // SOLO PARA web
                        // SOLO PARA web
                        // SOLO PARA web
                        // SOLO PARA web
                        // SOLO PARA web
                        ?> 
                        <tr>
                            <th><?php echo $i++; ?></th>         
                            <?php if (modules_field_module('status', 'audio')) { ?><th>##</th><?php } ?>  
                            <th><?php _t("Quantity"); ?></th>        

                            <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("Code"); ?></th> <?php } ?>                            
                            <th><?php _t("Description"); ?></th>                               
                            <th class="text-right"><?php _t("Price U."); ?></th>
                            <th class="text-right"><?php _t("Sub total"); ?></th>
                            <th class="text-right"><?php _t("Discounts"); ?></th>
                            <th class="text-right"><?php _t("Htva"); ?></th>
                            <th class="text-right"><?php _t("TVA"); ?></th>
                            <th class="text-right"><?php _t("Tvac"); ?></th>
                        </tr>
                    <?php } ?>

                    <?php
                    if (_options_option('config_budgets_show_tr_no_price')) {
                        include view('budgets', 'details_tr_price');
                    } else {
                        if (intval($budget_items['price'])) {
                            include view('budgets', 'details_tr_price');
                        } else {
                            include view('budgets', 'details_tr_no_price');
                        }
                    }
                    ?>


                    <?php
                    $class = "";
                    $separator = false;
                }
                ?>
            </tbody>

            <tr>
                <th>#</th>                        
                <?php if (modules_field_module('status', 'audio')) { ?><th>##</th><?php } ?>        
                <th><?php _t("Quantity"); ?></th> 
                <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("Code"); ?></th> <?php } ?>                            
                <th><?php _t("Description"); ?></th>                               
                <th class="text-right"><?php _t("Price U."); ?></th>
                <th class="text-right"><?php _t("Sub total"); ?></th>
                <th class="text-right"><?php _t("Discounts"); ?></th>
                <th class="text-right"><?php _t("Htva"); ?></th>
                <th class="text-right"><?php _t("TVA"); ?></th>
                <th class="text-right"><?php _t("Tvac"); ?></th>
            </tr>



            <tr>
                <?php if (modules_field_module('status', 'audio')) { ?>
                    <td></td>
                    <td></td>
                <?php } else { ?>
                    <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>
                <?php } ?>
                <td colspan="4" class="text-right"><?php _t("Totals"); ?></td>                                                    
                <td class="text-right"><?php echo moneda($total_sub_total); ?></td>
                <td class="text-right"><?php echo moneda($total_discounts); ?></td>
                <td class="text-right"><?php echo moneda($total_sub_total - $total_discounts); ?></td>
                <td class="text-right"><?php echo moneda($total_tax); ?></td>
                <td class="text-right info"><b><?php echo moneda($total_tvac); ?></b></td>               
            </tr>




            <?php if (modules_field_module('status', 'transport') || budget_lines_list_transport_by_budget_id($id)) { ?>
                <?php #####################################################################   ?>
                <?php ### T R A N S P O R T ###############################################   ?>    
                <?php #####################################################################   ?>
                <?php #####################################################################  ?>
                <?php #####################################################################  ?>
                <?php #####################################################################  ?>    
                <tr>
                    <th colspan="8"><?php _t("Transport"); ?></th>       
                    <?php if (modules_field_module('status', 'audio')) { ?><td></td><?php } ?>        
                    <?php if (modules_field_module('status', 'transport')) { ?><td></td><?php } ?>        
                </tr>    
                <tr>
                    <th>#</th>        
                    <?php if (modules_field_module('status', 'audio')) { ?> <th>##</th> <?php } ?>            
                    <th><?php _t("Quantity"); ?></th>    
                    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("Code"); ?></th> <?php } ?>        
                    <th><?php _t("Description"); ?></th>
                    <th class="text-right"><?php _t("Price U."); ?></th>
                    <th class="text-right"><?php _t("Sub total"); ?></th>        
                    <th class="text-right"><?php _t("Discounts"); ?></th>
                    <th class="text-right"><?php _t("Htva"); ?></th>
                    <th class="text-right"><?php _t("TVA"); ?></th>
                    <th class="text-right"><?php _t("Tvac"); ?></th>
                </tr>        
                <tr>
                    <?php
                    //$items = budget_lines_list_by_budget_id($id);   
//        $transport_subtotal = 0;
//        $transport_tax = 0;
//        $transport_tvac = 0;        
//        $transport_discounts = 0;
//        $transport_class = "";
//        $transport_separator = false;
                    $i = 1;

                    foreach (budget_lines_list_transport_by_budget_id($budgets['id']) as $key => $transport_item) {
                        $transport_subtotal = $transport_subtotal + $transport_item['subtotal'];
                        $transport_tax = $transport_tax + $transport_item['totaltax'];
                        $transport_tvac = $transport_tvac + ($transport_item["subtotal"] + $transport_item["totaltax"]);
                        $transport_discounts = $transport_discounts + ($transport_item["totaldiscounts"]);
                        $transport_description = $transport_item['description'];
                        ?>   
                    <tr class="<?php echo $class; ?>">
                        <?php if (modules_field_module('status', 'audio')) { ?><td></td><?php } ?>  
                        <td><?php echo $i++; ?></td>
                        <td><?php echo "$transport_item[quantity]"; ?></td>
                        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td><?php echo "$transport_item[code]"; ?></td> <?php } ?>  

                        <td><?php echo $transport_description; ?></td>
                        <td class="text-right"><?php echo moneda($transport_item['price']); ?> </td>
                        <td class="text-right"><?php echo moneda($transport_item['quantity'] * $transport_item['price']); ?> </td>
                        <td class="text-right">
                            <?php
                            echo ($transport_item['discounts_mode'] == '%') ?
                                    " ( $transport_item[discounts]$transport_item[discounts_mode] ) " : "";
                            echo moneda($transport_item['totaldiscounts']);
                            ?>
                        </td>  
                        <td class="text-right"><?php echo moneda($transport_item['subtotal']); ?> </td>
                        <td class="text-right">
                            (<?php echo "$transport_item[tax]"; ?> %) <?php echo moneda($transport_item['totaltax']); ?> </td>                                                                
                        <td class="text-right"><?php echo moneda($transport_item['subtotal'] + $transport_item['totaltax']); ?> </td>                                
                    </tr>
                    <?php
                    $class = "";
                    $separator = false;
                }
                ?>
                </tr>        
                <tr>
                    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>  

                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right"><?php _t("Totals"); ?></td>                                                    
                    <td class="text-right"><?php echo moneda($transport_subtotal + $transport_discounts); ?></td>
                    <td class="text-right"><?php echo moneda($transport_discounts); ?></td>
                    <td class="text-right"><?php echo moneda($transport_subtotal); ?></td>
                    <td class="text-right"><?php echo moneda($transport_tax); ?></td>
                    <td class="text-right info"><b><?php echo moneda($transport_tvac); ?></b></td> 
                </tr>    
                <?php #####################################################################   ?>
                <?php ###  // T R A N S P O R T ###########################################   ?>    
                <?php #####################################################################   ?>
                <?php #####################################################################   ?>
                <?php #####################################################################  ?>
            <?php } ?>    
            <?php # Tax items total ############################################     ?>
            <?php
            $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id(u_owner_id())['country']);

            foreach ($tax_by_country as $key => $tax) {
                ?>                        
                <tr>
                    <th></th>        
                    <?php if (modules_field_module('status', 'audio')) { ?>
                        <th></th>
                        <th></th>
                        <th></th>
                    <?php } else { ?>
                        <th></th>
                        <?php if (modules_field_module('status', 'products')) { ?><th></th><?php } ?>
                    <?php } ?>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="2" class="text-right">
                        <?php
                        _t("Total tax");
                        echo " $tax[tax] %";
                        ?>
                    </td>
                    <td class="text-right">
                        <?php echo moneda(budget_lines_total_by_tax($id, $tax['tax'])); ?>
                    </td>
                    <td></td>
                </tr>
            <?php } ?>                    
            <?php # Tax items total ############################################     ?>
            <tr>
                <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>
                <?php if (modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>
                <td></td>   
                <td></td>   
                <td></td>   
                <td></td>   
                <td></td>   
                <td></td>   
                <td colspan="2" class="text-right"><b><?php _t("To pay"); ?></b></td>                        
                <td class="text-right info"><b><?php echo moneda(($total_tvac + $transport_tvac) - budgets_field_id("advance", $id)); ?></b></td>
            </tr>
        </table>
    </div>
</div>



<div class="panel panel-default">
    <div class="panel-heading"><?php _t("Comunication"); ?></div>
    <div class="panel-body">
        <?php echo $budgets['ce']; ?>
    </div>
</div>





<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">



        <?php /*                        <div class="panel panel-danger">
          <div class="panel-heading"><?php _t("Reject this budget"); ?></div>
          <div class="panel-body">
          <h2><?php _t("Reject"); ?></h2>


          <p>
          <?php _t("Ud. puede rechazar esta oferta o dejar un mensaje"); ?>
          </p>


          <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">
          <?php _t("Reject"); ?>
          </button>



          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>
          <div class="modal-body">


          <form action="index.php" method="post">
          <input type="hidden" name="c" value="app">
          <input type="hidden" name="a" value="ok_accept">
          <input type="hidden" name="id" value="<?php echo "$id"; ?>">
          <input type="hidden" name="code" value="<?php echo "$code"; ?>">
          <div class="form-group">
          <label for="cn"><?php _t("Your client number"); ?></label>
          <input
          type="text"
          class="form-control"
          id="cn"
          name="cn"
          placeholder="<?php _t("Write here you client number"); ?>"
          value=""
          required=""
          >
          </div>
          <div class="checkbox">
          <label>
          <input
          type="checkbox"
          required=""
          name="is_ok"
          > <?php _t("Yes, i accept this budget"); ?>
          </label>
          </div>
          <button type="submit" class="btn btn-primary btn-block">
          <?php _t("Click here to reject this budget"); ?>
          </button>
          </form>


          </div>


          </div>
          </div>
          </div>






          </div>
          </div>

         */ ?>



    </div>



</div>











