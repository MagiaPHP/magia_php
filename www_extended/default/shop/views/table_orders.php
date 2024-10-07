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
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><span class="glyphicon glyphicon-comment"></span></th>
            <th><?php _t("Office"); ?></th>
            <th><?php _t("My ref."); ?></th>
            <?php /* <th><?php _t("Registre date") ; ?></th> */ ?>
            <th><?php _t("Patiente Name"); ?></th>
            <th><?php _t("Patient Lastname"); ?></th>
            <th><?php _t("Remake from"); ?></th>                                        
            <th><?php _t("Side"); ?></th>                                        
            <th><?php _t("Date Delivery"); ?></th>
            <th><?php _t("Discount"); ?></th>
            <th><?php _t("Status"); ?></th>
            <th><?php _t("Print"); ?></th>
            <th><?php _t("Details"); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><span class="glyphicon glyphicon-comment"></span></th>
            <th><?php _t("Office"); ?></th>
            <th><?php _t("My ref."); ?></th>
            <?php /* <th><?php _t("Registre date") ; ?></th> */ ?>
            <th><?php _t("Patiente Name"); ?></th>
            <th><?php _t("Patient Lastname"); ?></th>
            <th><?php _t("Remake from"); ?></th>   
            <th><?php _t("Side"); ?></th>                                        
            <th><?php _t("Date Delivery"); ?></th>
            <th><?php _t("Discount"); ?></th>
            <th><?php _t("Status"); ?></th>
            <th><?php _t("Print"); ?></th>
            <th><?php _t("Details"); ?></th>
        </tr>
    </tfoot>

    <tbody>
        <?php
        //
        $date_actual = null;
        $date_day = null;
        $i = 1;

        foreach ($orders as $key => $order) {

            $date_day = date_parse_from_format('Y-m-d', $order['date'])['day'];
            $date_month = date_parse_from_format('Y-m-d', $order['date'])['month'];
            $status = orders_status_field_code("status", $order['status']);
            $express = ( $order['express'] ) ? _tr("Express") : "";
            $total_comments = ( shop_comments_total_by_order($order['id']) ) ? shop_comments_total_by_order($order['id']) : "";
            // vardump(shop_comments_total_by_order($order['id'])); 
            $comments = ( $total_comments ) ? '' . $total_comments : "";
            $dif_day = ceil((magia_dates_day_between(substr($order['date'], 0, 10), $order['date_delivery'])) / 86400);

            switch ($dif_day) {
                case 1:
                    $icon = '<span class="label label-warning"><span class="glyphicon glyphicon-fire"></span></span>';
                    break;
                case 4:
                    $icon = '<span class="glyphicon glyphicon-time"></span>';
                    break;
                default:
                    $icon = '<span class="glyphicon glyphicon-calendar"></span>';
                    break;
            }



            // <li><a href="index.php?c=shop&a=pdfOrderDetails&id='.$order['id'].'">'._tr("Pdf").'</a></li>
//                    $menu = '<div class="dropdown">
//                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
//                      ' . _tr($status) . '
//                      <span class="caret"></span>
//                    </button>
//                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
//                      <li><a href="index.php?c=shop&a=orderDetails&id=' . $order['id'] . '">' . _tr("See") . '</a></li>
//                      <li><a href="index.php?c=shop&a=pdfOrderDetails&id=' . $order['id'] . '">' . _tr("PDF") . '</a></li>                 
//                    </ul>
//                  </div>';
            // $menu = '<a href="index.php?c=shop&a=orderDetails&id=' . $order['id'] . '" class="btn btn-default btn-sm">' . _tr("See") . '</a>'; 
            $menu = "";

            $menu .= ' <a href="index.php?c=shop&a=pdfOrderDetails&id=' . $order['id'] . '" class="btn btn-default btn-sm" target="new"><span class="glyphicon glyphicon-print"></span> ' . _tr("Pdf") . '</a>';

            $delivery_days = ( $order['delivery_days'] == 1 ) ? $order['delivery_days'] . " " . _tr("Working day after reception") : $order['delivery_days'] . " " . _tr("Working days after reception");

            $date_delivery = ( $order['date_delivery'] != null ) ? $order['date_delivery'] : $delivery_days;

            echo " <tr>";

            if ($date_day != $date_actual) {
                echo "<td class='success' colspan=15><b>" . _tr("Day") . ": $date_day  " . _tr(magia_dates_month($date_month)) . "</b></td></tr></tr>";
            }

            echo "<td>$i</td>";

            echo "<td>" . shop_orders_id_formated($order['id'], true) . "</td>";

            echo ($comments) ? "<td><span class=\"glyphicon glyphicon-comment\"></span> $comments </td>" : "<td></td>";

            echo "<td><a href=\"index.php?c=shop&a=offices_details&id=$order[company_id]\">" . contacts_formated($order['company_id']) . "</a></td>";
            echo "<td class=\"text-center\">$order[client_ref]</td>";
            echo "<td><a href=\"index.php?c=shop&a=patients_details&id=$order[patient_id]\">$order[name]</td>";
            echo "<td><a href=\"index.php?c=shop&a=patients_details&id=$order[patient_id]\">$order[lastname]</td>";
            echo "<td class=\"text-center\">" . shop_orders_id_formated($order['remake'], 1) . "</td>";

            //echo "<td>$icon $order[date_delivery] +$dif_day </td>";                                         
            echo "<td>$order[side]</td>";

            // si es Thermotec
            if (orders_is_thermotec($order['id'])) {

                echo "<td>$date_delivery</td>";
            } else {
                echo "<td>$date_delivery</td>";
            }
            echo "<td>";
            echo ($order['discount']) ? "$order[discount] %" : "";
            echo "</td> ";

            echo "<td>" . _tr($status) . "</td>";

            echo "<td>$menu</td>";

            echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=shop&a=orderDetails&id=' . $order['id'] . '"><span class="glyphicon glyphicon-eye-open"></span> ' . _tr("See") . '</a></td>';
            // echo '<td><a class="btn btn-sm btn-default" href="index.php?c=shop&a=orderRemake&id=' . $order['id'] . '"><span class="glyphicon glyphicon-copy"></span> ' . _tr("Remake") . '</a></td>'; 
            echo "</tr>";

            $date_actual = $date_day;
            $i++;
        }
        ?>
    </tbody>

</table>

<?php
$pagination->createHtml();
?>

