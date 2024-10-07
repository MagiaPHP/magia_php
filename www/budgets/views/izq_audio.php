
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php
            _t("Orders ready to add");
            ?>
        </h3>
    </div>


    <div class="panel-body">

        <p>
            Pedidos de la misma empresa que tienen la misma direccion
        </p>




        <table class="table table-striped">
            <tr>
                <td><?php _t("#"); ?></td>
                <td><?php echo _t("Id") ?></td>
                <td><?php echo _t("Patient") ?></td>
                <td><?php echo _t("Action") ?></td>

            </tr>

            <?php
            $i = 1;

//            vardump($budgets['client_id']);
//            vardump(70);
//            vardump($budgets['addresses_delivery']);
//            

            echo "<hr>";

            // vardump(orders_field_id('address_delivery', 302500));
            // vardump(orders_search_by_client_id_status($budgets['client_id'], 70));
            // busco orders por cliente y status 
            // y si es la misma direccion lo aficho
            foreach (orders_search_by_client_id_status($budgets['client_id'], 70) as $orders_search_by_client_id_status) {
                ?>

                <form action="action">
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $orders_search_by_client_id_status['id']; ?></td>
                        <td><?php echo contacts_formated($orders_search_by_client_id_status['patient_id']); ?></td>

                        <td>  <button type="submit" class="btn btn-default">Submit</button></td>
                    </tr>
                </form>
                <?php
                $i++;
            }
            ?>
        </table>


    </div>
</div>



<?php if (orders_budgets_list_orders_by_budget($id)) { ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?php _t("#"); ?></th>
                <th><?php _t("Order"); ?></th>
                <th><?php _t("Patient"); ?></th>                                                     


                <th class="text-right"><?php _t("Action"); ?></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th><?php _t("#"); ?></th>
                <th><?php _t("Order"); ?></th>
                <th><?php _t("Patient"); ?></th>                                                     


                <th class="text-right"><?php _t("Action"); ?></th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            $i = 1;
            foreach (orders_budgets_list_orders_by_budget($id) as $key => $orders) {

                $budget = orders_budgets_search_budget_by_order($orders['id']);

                $order_total_files = (orders_files_total_order_id($orders['id'])) ? orders_files_total_order_id($orders['id']) : "";

                $order_total_files_icon = $order_total_files . ' <span class="glyphicon glyphicon-file"></span> ';

                $status = orders_status_field_code("status", $orders['status']);

                $menuxxx = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              ' . _tr($status) . '
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=orders&a=details&id=' . $orders['id'] . '">' . _tr("Details") . '</a></li>

                            </ul>
                          </div>';

                $menu = '
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal' . $orders['order_id'] . '">';
                $menu .= _tr("Remove");
                $menu .= '</button>


<div class="modal fade" id="myModal' . $orders['order_id'] . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">' . _tr("Remove order from budget") . '</h4>
      </div>
      <div class="modal-body">
          <h3> ' . _tr("Remove this order") . '</h3>
          <p>' . _tr("Do you really want to delete this order from this budget?") . '</p>
          
          
          <form method="post" action="index.php">
              <input type="hidden" name="c" value="budgets">
              <input type="hidden" name="a" value="ok_remove_order_from_budget">
              <input type="hidden" name="order_id" value="' . $orders['order_id'] . '">
              <input type="hidden" name="budget_id" value="' . $id . '">
              
              <h3>' . $orders['order_id'] . '</h3>
       
            <button type="submit" class="btn btn-danger">' . _tr("Remove now") . '</button>
          </form>
          
          
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">' . _tr('Close') . '</button>
        
      </div>
    </div>
  </div>
</div>';

                if (rols_status_search_by_status_code($u_rol, $orders['status'])) {

                    $client_ref = $orders['client_ref'];

                    $lastname = (contacts_field_id("lastname", $orders['patient_id']));
                    $name = (contacts_field_id("name", $orders['patient_id']));
                    $date = $orders['date'];
                    $bac = $orders['bac'];

                    if (isset($txt)) {
                        $orders['id'] = str_ireplace("$txt", "<b>$txt</b>", $orders['id']);
                        $client_ref = str_ireplace($txt, "<b>$txt</b>", $client_ref);
                        $lastname = str_ireplace("$txt", "<b>$txt</b>", $lastname);
                        $lastname = str_ireplace("$txt", "<b>$txt</b>", $lastname);
                        $name = str_ireplace("$txt", "<b>$txt</b>", $name);
                        $date = str_ireplace("$txt", "<b>$txt</b>", $date);
                        $bac = str_ireplace("$txt", "<b>$txt</b>", $bac);
                    }
                    ?>
                    <tr>      
                        <td>                            
                            <?php echo $i; ?>                            
                        </td>


                        <td>
                            <a href="index.php?c=orders&a=details&id=<?php echo $orders['id']; ?>">
                                <?php echo $orders['id']; ?>
                            </a>
                        </td>


                        <td>
                            <a href="index.php?c=contacts&a=details&id=<?php echo $orders['patient_id']; ?>">
                                <?php echo contacts_formated_name($name); ?><br>
                                <?php echo contacts_formated_lastname($lastname); ?>
                            </a>
                        </td>           



                        <td>
                            <?php
                            // solo si no tiene facturas este devis se puede borrar
                            if (!budgets_invoices_search_invoice_by_budget_id($id)) {
                                echo $menu;
                            }
                            ?>
                        </td>


                    </tr>                
                    <?php
                }

                $menu = "";
                $i++;
            }
            ?>
        </tbody>
    </table>

    <?php
} else {
    echo message("info", "You do not have any items");
}
?>










