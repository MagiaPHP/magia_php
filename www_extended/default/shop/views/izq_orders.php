<div class="list-group">
    <a href="#" class="list-group-item active">
        <i class="fas fa-file"></i>
        <?php _t("By status"); ?>
    </a>


    <a href="index.php?c=shop" class="list-group-item"><?php echo _t("All"); ?></a>



    <?php
    foreach (orders_status_list() as $key => $val_status) {
        //  echo '<a href="index.php?c=shop" class="list-group-item">' . $status["status"] . '<span class="badge">'. shop_invoices_total_by_status($status["status"]).'</span> </a>';


        $total_orders = ( users_can_see_others_offices($u_id)) ? shop_orders_total_by_company_status($val_status["code"]) : shop_orders_total_by_office_status($val_status["code"]);

        $total = ($total_orders) ? '<span class="badge">' . $total_orders . '</span>' : "";

        if (in_array($val_status['code'], array(10, 20, 30, 40, 60, 70))) {
            echo '<a href="index.php?c=shop&a=orders_search&w=by_status&status=' . $val_status["code"] . '" class="list-group-item">' . _tr($val_status["status"]) . ' ' . $total . '</a>';
        } else {
            echo '<a href="index.php?c=shop&a=orders_search&w=by_status&status=' . $val_status["code"] . '" class="list-group-item">' . _tr($val_status["status"]) . '</a>';
        }
    }
    ?>


</div>











