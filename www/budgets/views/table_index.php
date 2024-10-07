<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }




</style>

<script>
    function sellectAll(source) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
</script>


<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, 'table_index');
}
?>





    <table class="table table-striped table-condensed">


        <thead>
            <tr>
                <th></th>
                <th><?php _t("Id"); ?></th>
                <?php if (modules_field_module('status', 'audio')) { ?><th><?php _t("Order"); ?></th><?php } ?><th><?php _t("Invoice"); ?></th>               
                <th><?php _t("Date"); ?></th>                                       
                <th><?php _t("Billing address"); ?></th>                    
                <th><span class="glyphicon glyphicon-map-marker"></span> <?php _t("Delivery address"); ?></th>                    
                <th class="text-right"><?php _t("Total"); ?></th>                                                            
                <th><?php _t("Status"); ?></th>                    
                <th></th>                                                                      
                <?php // if (permissions_has_permission($u_rol, "budgets", "update")) { ?><th></th><?php //} ?>                                                                                          
                <th>
                </th>                                                                                                                                                 
                <?php // if (modules_field_module('status', 'audio')) { ?><th><?php // <span class="glyphicon glyphicon-euro"></span>?></th><?php //} ?>                                                                              
                <?php // if (modules_field_module('status', 'audio')) { ?><th><?php // <span class="glyphicon glyphicon-heart"></span>?></th><?php //} ?>                                                                                                      
                <th>                 
                </th>                                                                                                                                     
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th></th>
                <th><?php _t("Id"); ?></th>
                <?php if (modules_field_module('status', 'audio')) { ?><th><?php _t("Order"); ?></th><?php } ?><th><?php _t("Invoice"); ?></th>               
                <th><?php _t("Date"); ?></th>                                      
                <th><?php _t("Billing address"); ?></th>                    
                <th><span class="glyphicon glyphicon-map-marker"></span> <?php _t("Delivery address"); ?></th>                   
                <th class="text-right"><?php _t("Total"); ?></th>                                                            
                <th><?php _t("Status"); ?></th>                    
                <th></th>                                                                      
                <?php // if (permissions_has_permission($u_rol, "budgets", "update")) { ?><th></th><?php //} ?>                                                                                          
                <th>
                </th>                                                                                                                                                 
                <?php // if (modules_field_module('status', 'audio')) { ?><th><?php // <span class="glyphicon glyphicon-euro"></span>?></th><?php //} ?>                                                                              
                <?php // if (modules_field_module('status', 'audio')) { ?><th><?php // <span class="glyphicon glyphicon-heart"></span>?></th><?php //} ?>                                                                                                      
                <th>                 
                </th>                                                                                                                                     
            </tr>
        </tfoot>

        <tbody>





            <?php
            if (!isset($budgets)) {
                message("info", "No items");
            } else {
                //foreach ($liste_info as $address) {

                $sumaTotal = 0;
                $sumaTax = 0;
                $month_actual = null;
                $month = null;

                foreach ($budgets as $budget) {

                    $bud = new Budgets();
                    $bud->setBudgets($budget['id']);

                    //vardump($bud->getAddresses_billing());
                    // tiene comentarios?
                    $has_comments = (comments_total_by_controller_id("budgets", $budget['id'])) ? true : false;

                    // Si hay
                    // si activo los comments
                    // si tengo permiso 
                    $comment_icon = (
                            $has_comments &&
                            modules_field_module('status', 'comments') &&
                            permissions_has_permission($u_rol, "comments", "read")

                            ) ? "<span class='glyphicon glyphicon-comment'></span>" : "";
                    // 
                    // vardump($budget);
                    //vardump($budget['addresses_billing']);
//                $addresses_billing = (json_decode($budget['addresses_billing'], true));
//                $addresses_delivery = (json_decode($budget['addresses_delivery'], true));
                    // vardump($addresses_delivery);

                    $sumaTotal = $sumaTotal + $budget['total'];
                    $sumaTax = $sumaTax + $budget['tax'];
                    //budgets_update_totals($budget['id']); 
                    //$from_order = orders_budgets_search_order_by_budget($budget['id']) ;
                    //$orders_by_budget = orders_budgets_list_orders_by_budget($budget['id']);
//                switch (count($orders_by_budget)) {
//
//                    case 0:
//                        $from_order = "";
//                        break;
//
//                    case 1:
//                        $from_order = '<a href="index.php?c=orders&a=details&id=' . $orders_by_budget[0]['id'] . '">' . $orders_by_budget[0]['id'] . '</a>';
//                        break;
//
//                    default:
//                        $from_order = "+" . count($orders_by_budget);
//                        break;
//                }



                    $invoice_id = budgets_invoices_search_invoice_by_budget_id($budget['id']);

                    $date = ($budget['date']) ? $budget['date'] : $budget['date_registre'];

                    $month_actual = magia_dates_get_month_from_date($date);
                    ?>


                    <?php
                    if ($month_actual != $month) {
                        $month = $month_actual;
                        ?>            
                        <tr  class='success'>
                            <td colspan="16"><b><?php echo _tr(magia_dates_month($month_actual)); ?></b></td>
                        </tr>
                    <?php } ?>  


                    <tr>

                        <td>
                            <div class="checkbox">
                                <label>
                                    <input 
                                        name="budgets_id[]" 
                                        type="checkbox" 
                                        id="<?php echo $budget['id']; // echo $order->getId();                                  ?>" 
                                        value="<?php echo $budget['id']; // echo $order->getId();                                  ?>" 
                                        disabled

                                        >
                                </label>
                            </div>
                        </td>


                        <td>
                            <a href="index.php?c=budgets&a=details&id=<?php echo "$budget[id]"; ?>">
                                <?php echo "$budget[id]"; ?>
                                <?php echo $comment_icon; ?>
                            </a>
                        </td>


                        <?php if (modules_field_module('status', 'audio')) { ?>                                    
                            <td><?php echo $from_order; ?></td>
                        <?php } ?>



                        <?php if ($invoice_id) { ?>    
                            <td>
                                <a href="index.php?c=invoices&a=details&id=<?php echo "$invoice_id"; ?>">
                                    <?php echo invoices_numberf($invoice_id); ?>
                                </a> 
                            </td>
                        <?php } else { ?>
                            <td></td>
                        <?php } ?>


                        <td><?php echo magia_dates_formated($bud->getDate()); ?></td>

                        <td>
                            <?php
                            echo $bud->getAddresses_billing_formated_html();
                            ?>


                        </td>
                        <td>
                            <?php
                            echo $bud->getAddresses_delivery_formated_html()
                            ?>

                        </td>

                        <td class="text-right"><?php echo monedaf($budget['total'] + $budget['tax']); ?></td>

                        <td><?php echo _tr(budget_status_by_status(($budget['status']))); ?></td>


                        <td>
                            <a class="btn btn-primary btn-sm" href="index.php?c=budgets&a=details&id=<?php echo "$budget[id]"; ?>">
                                <span class="glyphicon glyphicon-file"></span> <?php _t("Details"); ?>
                            </a>
                        </td>




                        <?php if (permissions_has_permission($u_rol, "budgets", "update")) { ?>
                            <td>
                                <a 
                                    class="btn btn-danger btn-sm" 
                                    <?php echo (!budgets_can_be_edit($budget['id'])) ? " disabled " : ""; ?>
                                    href="index.php?c=budgets&a=edit&id=<?php echo "$budget[id]"; ?>">
                                    <span class="glyphicon glyphicon-edit"></span> 
                                    <?php _t("Edit"); ?>
                                </a>
                            </td>

                        <?php } ?>

                        <td>
                            <?php
                            print_dropdown("index.php?c=budgets&a=export_pdf&id=$budget[id]", budgets_field_id('client_id', $budget['id']), false);
                            ?>
                        </td>


                        <?php if (modules_field_module('status', 'audio')) { ?>
                            <td>
                                <?php
                                print_dropdown("index.php?c=budgets&a=export_nde&valued=true&id=$budget[id]", budgets_field_id('client_id', $budget['id']), false, 'glyphicon glyphicon-euro');
                                ?>
                            </td>
                            <td>
                                <?php
                                print_dropdown("index.php?c=budgets&a=export_nde&id=$budget[id]", budgets_field_id('client_id', $budget['id']), false, 'glyphicon glyphicon-heart');
                                ?>
                            </td>
                        <?php } ?>

                        <td>
                            <?php
                            print_dropdown("index.php?c=budgets&a=export_pdf&way=pdf&id=$budget[id]", budgets_field_id('client_id', $budget['id']), false, 'glyphicon glyphicon-floppy-save');
                            ?>
                        </td>

                    </tr>

                    <?php
                    $has_comments = false;
                }
            }
            ?>	



        </tbody>


    </table>

    




