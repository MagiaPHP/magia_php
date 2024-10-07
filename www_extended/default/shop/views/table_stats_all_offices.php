<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">






    <?php foreach (offices_list_by_headoffice($office_id) as $key => $office) { ?>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading_<?php echo $office['id']; ?>">
                <h4 class="panel-title">
                    <a 
                        class="collapsed" 
                        role="button" 
                        data-toggle="collapse" 
                        data-parent="#accordion" 
                        href="#collapse_<?php echo $office['id']; ?>" 
                        aria-expanded="false" 
                        aria-controls="collapse_<?php echo $office['id']; ?>">
                        <?php echo $office['id']; ?> : 
                        <?php echo contacts_formated($office['id']) ?>
                    </a>
                </h4>
            </div>
            <div 
                id="collapse_<?php echo $office['id']; ?>" 
                class="panel-collapse collapse" 
                role="tabpanel" 
                aria-labelledby="heading_<?php echo $office['id']; ?>">

                <div class="panel-body">






                    <table class="table table-striped">           
                        <thead>
                            <tr>                    
                                <th><?php _t("#"); ?></th>    
                                <th><?php _t("Code"); ?></th>    
                                <th><?php _t("Product name"); ?></th>  
                                <th><?php _t("Quantity"); ?></th>              
                                <th class="text-right"><?php _t("SubTotal"); ?></th>  
                                <th class="text-right"><?php _t("Discounts"); ?></th>  
                                <th class="text-right"><?php _t("Total"); ?></th>       

                            </tr>
                        </thead>
                        <tfoot>


                        </tfoot>

                        <tbody>
                            <?php
                            //  vardump($office_id) ;

                            $i = 1;
                            foreach (shop_stats_invoices_by_offices($office['id'], $year, $month) as $key => $value) {

                                $dont_show = array(
                                    "ORDER", "PAT", "SIDEL", "SIDER", "SIDES", "BUDGET"
                                );

                                if (!in_array($value['code'], $dont_show)) {
                                    ?>                                  

                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>

                                        <td>
                                            <?php echo $value['code']; ?>
                                        </td>

                                        <td>
                                            <?php echo products_get_name_by_code($value['code']); ?>
                                        </td>

                                        <td>
                                            <?php echo ($value['quantity']); ?>
                                        </td>



                                        <td class="text-right">
                                            <?php echo monedaf($value['subtotal']); ?>
                                        </td>

                                        <td class="text-right">
                                            <?php echo monedaf($value['discounts']); ?>
                                        </td>

                                        <td class="text-right">
                                            <?php echo monedaf($value['subtotal'] - $value['discounts']); ?>
                                        </td>

                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>                                               
                        </tbody>                                               
                    </table>




                </div>
            </div>
        </div>
    <?php } ?>








</div>



