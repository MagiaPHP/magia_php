<script>
    function sellectAll(source) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
</script>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;

    }
</style>



<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
}
?>




<table class="table table-striped table-condensed table-bordered">
    <thead>
        <tr class="info">        
            <?php # <th><input type="checkbox"></th>?>
            <th></th>
            <th><?php _t("Id"); ?></th>
            <?php if (modules_field_module('status', 'audio')) { ?>                                    
                <th><?php _t("Orders"); ?></th>
            <?php } ?>
            <th><?php _t("Invoice"); ?></th>                                                            
            <th><?php _t("Date_registre"); ?></th>                    
            <th><?php _t("Cliente_id"); ?></th>                    
            <th class="text-right"><?php _t("Total"); ?></th>                                                            
            <th><?php _t("Status"); ?></th>                    
            <th><?php // _t("Details");          ?></th>                                                                      
            <th><?php // _t("Edit");          ?></th>                              
            <th></th>
            <?php
            /**
             * <th><span class="glyphicon glyphicon-print"></span></th>
             */
            ?>                                                                      
            <?php if (modules_field_module('status', 'audio')) { ?>
                <?php
                /**
                 *                 <th><span class="glyphicon glyphicon-euro"></span></th>                                                                      
                  <th><span class="glyphicon glyphicon-heart"></span></th>
                 */
                ?> 
            <?php } ?>                                                                    
            <th></th>
            <?php
            /**
             * <th><span class="glyphicon glyphicon-floppy-save"></span></th> 
             */
            ?>
        </tr>
    </thead>
    <tfoot>
        <tr class="info">         
            <?php # <th><input type="checkbox"></th>?>
            <th></th>
            <th><?php _t("Id"); ?></th>
            <?php if (modules_field_module('status', 'audio')) { ?>                                    
                <th><?php _t("Orders"); ?></th>
            <?php } ?>
            <th><?php _t("Invoice"); ?></th>                                                            
            <th><?php _t("Date_registre"); ?></th>                    
            <th><?php _t("Cliente_id"); ?></th>                    
            <th class="text-right"><?php _t("Total"); ?></th>                                                            
            <th><?php _t("Status"); ?></th>                    
            <th><?php // _t("Details");          ?></th>                                                                      
            <th><?php // _t("Edit");          ?></th>                              
            <th></th>
            <?php
            /**
             * <th><span class="glyphicon glyphicon-print"></span></th>
             */
            ?>                                                                      
            <?php if (modules_field_module('status', 'audio')) { ?>
                <?php
                /**
                 *                 <th><span class="glyphicon glyphicon-euro"></span></th>                                                                      
                  <th><span class="glyphicon glyphicon-heart"></span></th>
                 */
                ?> 
            <?php } ?>                                                                    
            <th></th>
            <?php
            /**
             * <th><span class="glyphicon glyphicon-floppy-save"></span></th> 
             */
            ?>
        </tr>
    </tfoot>
    <tbody>

        <?php
        $from_order = '';
        $orders_by_budget = '';
        $month = null;
        $month_actual = null;

        foreach ($budgets as $budget) {
            // Cuenta los pedidos segun el presupuesto 
            $invoice_id = budgets_invoices_search_invoice_by_budget_id($budget['id']);
            
//            $orders_by_budget = orders_budgets_list_orders_by_budget($budget['id']) ?? null;
            $orders_by_budget = [];

            switch (count($orders_by_budget)) {
                case 0:
                    $from_order = "";
                    break;
                case 1:
                    $from_order = '<a href="index.php?c=orders&a=details&id=' . $orders_by_budget[0]['id'] . '">' . $orders_by_budget[0]['id'] . '</a>';
                    break;
                default:
                    $from_order = "+" . count($orders_by_budget);
                    break;
            }
            $date = ($budget['date']) ? $budget['date'] : $budget['date_registre'];
            $month_actual = magia_dates_get_month_from_date($date);
            //----------------
            ?>

            <?php
            if ($month_actual != $month) {
                $month = $month_actual;
                ?> 
                <tr>
                    <td colspan="15">
                        <b>
                            <?php echo _tr(magia_dates_month($month_actual)); ?>
                        </b>
                    </td>
                </tr>
                <?php
            }
            ?>


            <tr>


                <?php if ($status == 10) { ?>
                    <td>
                        <div class="checkbox">
                            <label>
                                <input 
                                    name="budgets_id[]" 
                                    type="checkbox" 
                                    id="<?php echo $budget['id']; ?>" 
                                    value="<?php echo $budget['id']; ?>"
                                    checked=""
                                    >
                            </label>
                        </div>
                    </td>
                <?php } else { ?>
                    <td>
                        <div class="checkbox">
                            <label>
                                <input 
                                    name="order_id[]" 
                                    type="checkbox" 
                                    id="<?php //echo $order->getId();                   ?>" 
                                    value="<?php // echo $order->getId();                  ?>"
                                    disabled
                                    >
                            </label>
                        </div>
                    </td>
                <?php } ?>


                <?php ### SELECT ALL #########################################################      ?>   



                <td><?php echo "$budget[id]"; ?></td>

                <?php if (modules_field_module('status', 'audio')) { ?>                                    
                    <td><?php echo $from_order; ?></td>
                <?php } ?>

                <td>
                    <a href="index.php?c=invoices&a=details&id=<?php echo $invoice_id; ?>">
                        <?php echo $invoice_id; ?>
                    </a>

                </td>                            

                <td><?php echo "$budget[date_registre]"; ?></td>

                <td>
                    <a 
                        href="index.php?c=contacts&a=details&id=<?php echo $budget['client_id']; ?>">
                            <?php echo contacts_formated($budget['client_id']); ?>
                    </a>
                </td>

                <td class="text-right"><?php echo monedaf($budget['total'] + $budget['tax']); ?></td>

                <td><?php echo budget_status_by_status($budget['status']); ?></td>


                <td>
                    <a 
                        class="btn btn-primary btn-sm" 
                        href="index.php?c=budgets&a=details&id=<?php echo "$budget[id]"; ?>">
                        <span class="glyphicon glyphicon-file"></span>
                        <?php _t("Details"); ?></a>                        
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
                    <?php /**
                      <div class="dropdown">
                      <button class="btn btn-sm btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <span class="glyphicon glyphicon-print"></span>
                      <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <?php foreach (_languages_list_by_status(1) as $key => $lang) { ?>
                      <li><a href="index.php?c=budgets&a=export_pdf&id=<?php echo $budget['id']; ?>&lang=<?php echo $lang['language']; ?>" target="_print"><?php echo _t($lang['name']); ?></a></li>
                      <?php } ?>
                      </ul>
                      </div>
                     * 
                     */ ?>
                    <?php
                    print_dropdown("index.php?c=budgets&a=export_pdf&id=$budget[id]", budgets_field_id('client_id', $budget['id']), false);
                    ?>




                </td>                        





                <?php if (modules_field_module('status', 'audio')) { ?>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="glyphicon glyphicon-euro"></span>                                    
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <?php foreach (_languages_list_by_status(1) as $key => $lang) { ?>
                                    <li><a href="index.php?c=budgets&a=export_nde&id=<?php echo $budget['id']; ?>&lang=<?php echo $lang['language']; ?>&valued=true" target="_print"><?php echo _t($lang['name']); ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </td>
                <?php } ?>




                <?php if (modules_field_module('status', 'audio')) { ?>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="glyphicon glyphicon-heart"></span>                                    
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <?php foreach (_languages_list_by_status(1) as $key => $lang) { ?>
                                    <li><a href="index.php?c=budgets&a=export_nde&id=<?php echo $budget['id']; ?>&lang=<?php echo $lang['language']; ?>" target="_print"><?php echo _t($lang['name']); ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </td>
                <?php } ?>



                <td>

                    <?php
                    /**
                     *                     <div class="dropdown">
                      <button class="btn btn-sm btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <span class="glyphicon glyphicon-floppy-save"></span>
                      <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <?php foreach (_languages_list_by_status(1) as $key => $lang) { ?>
                      <li><a href="index.php?c=budgets&a=export_pdf&way=pdf&id=<?php echo $budget['id']; ?>&lang=<?php echo $lang['language']; ?>" target="_print"><?php echo _t($lang['name']); ?></a></li>
                      <?php } ?>
                      </ul>
                      </div>
                     */
                    ?>

                    <?php
                    print_dropdown("index.php?c=budgets&a=export_pdf&way=pdf&id=$budget[id]", budgets_field_id('client_id', $budget['id']), false, 'glyphicon glyphicon-floppy-save');
                    ?>


                </td>



                <?php
                /*
                  <td>
                  <div class="dropdown">
                  <button
                  class="btn btn-default dropdown-toggle"
                  type="button"
                  id="dropdownMenu1"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="true">

                  <?php _t("Actions") ; ?>
                  <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <li><a href="index.php?c=budgets&a=details&id=<?php echo "$budget[id]" ; ?>"><?php _t("Details") ; ?></a></li>
                  <li><a href="index.php?c=budgets&a=edit&id=<?php echo "$budget[id]" ; ?>"><?php _t("Edit") ; ?></a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="index.php?c=budgets&a=edit&id=<?php echo "$budget[id]" ; ?>"><?php _t("Pdf") ; ?></a></li>
                  </ul>
                  </div>
                  </td>
                 */
                ?>


            </tr>

            <?php
        }
        ?>	

    </tbody>


</table>


