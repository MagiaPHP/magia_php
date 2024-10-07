<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>


<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
            <th><?php _t("Id"); ?></th>
            <th><?php _t("My ref."); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Patiente Name"); ?></th>
            <th><?php _t("Patient Lastname"); ?></th>
            <th><?php _t("Remake"); ?></th>
            <th><?php _t("Status"); ?></th>

        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("My ref."); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Patiente Name"); ?></th>
            <th><?php _t("Patient Lastname"); ?></th>
            <th><?php _t("Remake"); ?></th>
            <th><?php _t("Status"); ?></th>
        </tr>
    </tfoot>

    <tbody>
        <?php
        foreach ($orders as $key => $order) {

            $status = orders_status_field_code("status", $order['status']);

            $menu = '<div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      ' . $status . '
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="index.php?c=shop&a=orderDetails&id=' . $order['id'] . '">' . _tr("Details") . '</a></li>
                      <li><a href="index.php?c=shop&a=pdfOrderDetails&id=' . $order['id'] . '">' . _tr("Pdf") . '</a></li>
                   
                    </ul>
                  </div>';
            $menu = '<a href="index.php?c=shop&a=orderDetails&id=' . $order['id'] . '" class="btn btn-default">' . _tr("Details") . '</a> '
                    . '<a href="index.php?c=shop&a=pdfOrderDetails&id=' . $order['id'] . '" class="btn btn-default"> <span class="glyphicon glyphicon-print"></span> ' . _tr("Pdf") . '</a>';

            echo " <tr>
                    <td>$order[id]</td>
                    <td>$order[client_ref]</td>
                    <td>$order[date]</td>      
                        <td>" . contacts_formated_name($order['name']) . "</td>
                        <td>" . contacts_formated_name($order['lastname']) . "</td>
                            
                    
                    <td>$order[remake]</td>                                        
                    <td>$menu</td>
                    
                </tr>";
        }
        ?>
    </tbody>

</table>
