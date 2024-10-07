<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8">
        <div class="well text-center"><h1><?php _t("Invoice"); ?>: <?php echo $id; ?></h1></div>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php # SAVE ################## ?>
        <?php # SAVE ################## ?>
        <?php # SAVE ################## ?>
        <?php # SAVE ################## ?>
        <?php # SAVE ################## ?>

        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <form class="navbar-form navbar-right">
                        <input type="hidden" name="c" value="invoices"> 
                        <input type="hidden" name="a" value="details"> 
                        <input type="hidden" name="id" value="<?php echo "$id"; ?>"> 
                        <div class="form-group">
                        </div>
                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-disk"></span> <?php _t("Save"); ?></button>
                    </form>

                </div>
            </div>
        </nav>


        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">                                
                <?php include "part_details_billing_address.php"; ?>                                
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">                
                <?php include "part_details_delivery_address.php"; ?>                
            </div>
        </div>








        <div class="panel panel-default">
            <div class="panel-heading">

                <a name="items"><?php _t("items"); ?></a>

            </div>
            <div class="panel-body">
                <table class="table table-striped">




                    <thead>
                        <tr>
                            <th><?php _t("Quantity"); ?></th>
                            <th><?php _t("Description"); ?></th>                            
                            <th class="text-right"><?php _t("Price"); ?></th>
                            <th class="text-right"><?php _t("Tax"); ?></th>
                            <th class="text-right"><?php _t("Discounts"); ?></th>
                            <th class="text-right"><?php _t("Subtotal"); ?></th>
                            <th class="text-right"><?php _t("Tax"); ?></th>
                            <th class="text-right"><?php _t("TVAC"); ?></th>                            
                            <th class="text-right"><?php _t("Action"); ?></th>
                            <th class="text-right"><?php _t("Action"); ?></th>
                        </tr>



                    </thead>




                    <tbody>
                        <?php
                        $items = invoice_lines_list_by_invoice_id($id);
                        $total_subtotal = 0;
                        $total_totaltax = 0;
                        $total_totaltvac = 0;
                        $total_totaldiscounts = 0;

                        foreach ($items as $key => $invoice_items) {

                            $total_subtotal = $total_subtotal + $invoice_items['subtotal'];
                            $total_totaltax = $total_totaltax + $invoice_items['totaltax'];
                            $total_totaltvac = $total_totaltvac + ($invoice_items["subtotal"] + $invoice_items["totaltax"]);
                            $total_totaldiscounts = $total_totaldiscounts + ($invoice_items["totaldiscounts"]);
                            ?>
                            <tr>                            
                                <td><?php echo "$invoice_items[quantity]"; ?></td>
                                <td><?php echo "$invoice_items[description]"; ?></td>
                                <td class="text-right"><?php echo monedaf($invoice_items['price']); ?></td>
                                <td class="text-right"><?php echo ($invoice_items['tax']); ?> %</td>
                                <td class="text-right">
                                    <?php
                                    echo ($invoice_items['discounts_mode'] == '%') ?
                                            " ( $invoice_items[discounts]$invoice_items[discounts_mode] ) " :
                                            "";

                                    echo monedaf($invoice_items['totaldiscounts']);
                                    ?>
                                </td>
                                <td class="text-right"><?php echo monedaf($invoice_items['subtotal']); ?> </td>
                                <td class="text-right"><?php echo monedaf($invoice_items['totaltax']); ?> </td>                                
                                <td class="text-right"><?php echo monedaf($invoice_items["subtotal"] + $invoice_items["totaltax"]); ?> </td>                                

                                <td>

                                    <?php include "modal_items_edit.php"; ?>

                                </td>

                                <td class="text-right"> 
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" 
                                                type="button" 
                                                id="dropdownMenu1" 
                                                data-toggle="dropdown" 
                                                aria-haspopup="true" aria-expanded="true">
                                                    <?php _t("Actions"); ?>
                                            <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                                            <li role="separator" class="divider"></li>
                                            <li>
                                                <a 
                                                    href="index.php?c=invoices&a=linesDeleteOk&id=<?php echo "$invoice_items[id]"; ?>"
                                                    >
                                                        <?php _t("Delete"); ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td></td>

                            </tr>                            

                        <?php } ?>



                        <tr>
                            <td colspan="4" class="text-right"><?php _t("Totals"); ?></td>                                                    
                            <td class="text-right"><?php echo monedaf($total_totaldiscounts); ?></td>
                            <td class="text-right"><?php echo monedaf($total_subtotal); ?></td>
                            <td class="text-right"><?php echo monedaf($total_totaltax); ?></td>
                            <td class="text-right"><?php echo monedaf($total_totaltvac); ?></td>

                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>


                    </tbody>



                    <?php include "form_items_add.php"; ?>


                    <?php //include "modal_form_items_add.php" ; ?>

                    <?php # Tax items total ############################################  ?>
                    <?php
                    $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);
                    //vardump($tax_by_country); 

                    foreach ($tax_by_country as $key => $tax) {
                        ?>                      
                        <tr>
                            <td colspan="4"></td>
                            <td class="text-right"><?php
                                _t("Total tax");
                                echo " $tax[tax] %";
                                ?></td>
                            <td class="text-right"><?php echo monedaf(invoice_lines_total_by_tax($id, $tax['tax'])); ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php } ?>                    
                    <?php # Tax items total ############################################     ?>

                    <tr>
                        <td colspan="5"></td>
                        <td class="text-right" ><?php _t("Advance"); ?></td>
                        <td class="text-right" colspan="2"><?php echo monedaf(invoices_field_id("advance", $id)); ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>


                    <tr>
                        <td colspan="5"></td>
                        <td class="text-right"><?php _t("To pay"); ?></td>                        
                        <td class="text-right" colspan="2"><?php echo monedaf($total_totaltvac - invoices_field_id("advance", $id)); ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>




                </table>
                <a name="items_add"></a>

            </div>
        </div>









        <div class="panel panel-default">
            <div class="panel-heading"><?php _t("Comments"); ?></div>
            <div class="panel-body">
                <?php echo $invoices['comments']; ?>
                <?php
                include "modal_form_comments_update.php";
                ?>
            </div>
        </div>




    </div>


    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php include "der.php"; ?> 
    </div>
</div>





<?php // include("www/home/views/footer.php");  ?>  
<?php include view("home", "footer"); ?>

