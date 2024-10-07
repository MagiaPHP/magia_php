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




<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
            <th>#</th>
            <th></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Client ref"); ?></th>
            <th><?php _t("Patient"); ?></th>                        
            <th><?php _t("Office"); ?></th>                        
            <th><?php _t("Delivery address"); ?></th>                                                                   
            <th><?php _t("Create by"); ?></th>                                            
            <th><?php _t("Details"); ?></th>
        </tr>
    </thead>            
    <tfoot>
        <tr>
            <th>#</th>
            <th></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Client ref"); ?></th>
            <th><?php _t("Patient"); ?></th>                        
            <th><?php _t("Office"); ?></th>                        
            <th><?php _t("Delivery address"); ?></th>                               
            <th><?php _t("Create by"); ?></th>                                            
            <th><?php _t("Details"); ?></th>
        </tr>
    </tfoot>
    <tbody>

        <?php
        $i = 1;
        $month = null;
        $month_actual = null;
        foreach ($orders as $orders_list_by_company_id) {
            $order = new Orders();
            $order->setOrders($orders_list_by_company_id['id']);
            $date = ($orders_list_by_company_id['date']) ? $orders_list_by_company_id['date'] : $orders_list_by_company_id['date_registre'];
            $month_actual = magia_dates_get_month_from_date($date);

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

                <td>
                    <?php echo $i++; ?>
                </td>

                <?php ### / SELECT ALL ########################################################   ?>                                                
                <td>
                    <div class="checkbox">
                        <label>
                            <input 
                                name="order_id[]" 
                                type="checkbox" 
                                id="<?php echo $order->getId(); ?>" 
                                value="<?php echo $order->getId(); ?>"
                                checked=""
                                >
                        </label>
                    </div>
                </td>
                <?php ### SELECT ALL #########################################################   ?>                     

                <td>
                    <a 
                        href="index.php?c=orders&a=details&id=<?php echo $orders_list_by_company_id['id']; ?>"
                        >
                            <?php echo $orders_list_by_company_id["id"]; ?>
                    </a>
                    -<?php echo $order->getBac(); ?>

                </td>

                <td><?php echo $order->getDate(); ?></td>
                <td><?php echo $order->getClient_ref(); ?></td>


                <td>
                    <a 
                        href="index.php?c=contacts&a=details&id=<?php echo $order->getPatient_id(); ?>"
                        ><?php echo contacts_formated($order->getPatient_id()); ?>
                    </a>
                </td>


                <td>
                    <a 
                        href="index.php?c=contacts&a=details&id=<?php echo $order->getCompany_id(); ?>"
                        ><?php echo contacts_formated($order->getCompany_id()); ?>
                    </a>
                </td>


                <td class="">
                    <?php // echo $order->getAddress_delivery_id();  ?>
                    <?php echo addresses_show_formated($orders_list_by_company_id['address_delivery']); ?></td>                    
                <td>
                    <a 
                        href="index.php?c=contacts&a=details&id=<?php echo $order->getCreate_by() ?>"
                        >
                            <?php echo contacts_formated($order->getCreate_by()); ?>
                    </a> 

                    <?php if ($order->getBehalf_of()) { ?> 

                        <br>
                        <?php echo _t("on behalf of"); ?>
                        <br>

                        <a 
                            href="index.php?c=contacts&a=details&id=<?php echo $order->getBehalf_of() ?>"
                            ><?php echo contacts_formated($order->getBehalf_of()); ?>
                        </a> 

                    <?php } ?>


                </td>




                <td>

                    <?php
                    $class = ($order->getStatus() == 70) ? "info" : "default";
                    ?>

                    <a 
                        href="index.php?c=orders&a=details&id=<?php echo $order->getId(); ?>"

                        <?php ?>

                        class="btn btn-<?php echo $class; ?>"
                        >
                            <?php echo _t(orders_status_field_code("status", $orders_list_by_company_id['status'])); ?>
                    </a>


                </td>        
            </tr>
        <?php }
        ?>
    </tbody>  
</table>

