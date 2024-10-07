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
            <th><?php _t("Order id"); ?></th>
            <th><?php _t("Company"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Client ref"); ?></th>
            <th><?php _t("Patient"); ?></th>                        
            <th><?php _t("Bac"); ?></th>                                            
            <th><?php _t("Action"); ?></th>
        </tr>
    </thead>            
    <tfoot>
        <tr>
            <th><?php _t("Order id"); ?></th>
            <th><?php _t("Company"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Client ref"); ?></th>
            <th><?php _t("Patient"); ?></th>                        
            <th><?php _t("Bac"); ?></th>                                            
            <th><?php _t("Action"); ?></th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach (orders_list_by_patient_id($id) as $orders_list_by_patient) { ?>
            <tr>                                            
                <td><?php echo $orders_list_by_patient["id"]; ?></td>
                <td><?php echo contacts_formated(contacts_field_id("owner_id", $orders_list_by_patient["patient_id"])); ?></td>
                <td><?php echo $orders_list_by_patient["date"]; ?></td>
                <td><?php echo $orders_list_by_patient["client_ref"]; ?></td>
                <td><?php echo contacts_formated($orders_list_by_patient["patient_id"]); ?></td>
                <td><?php echo $orders_list_by_patient["bac"]; ?></td>                    
                <td>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <?php echo orders_status_field_code("status", $orders_list_by_patient['status']); ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="index.php?c=orders&a=details&id=<?php echo $orders_list_by_patient['id']; ?>"><?php _t("Details"); ?></a></li>                                
                        </ul>  
                </td>        
            </tr>
        <?php } ?>
    </tbody>  
</table>