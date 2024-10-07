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
            <th><?php //_t("Id");        ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Patient name"); ?></th>                    
            <th><?php _t("Patient lastname"); ?></th>                    
            <th><?php _t("Birthdate"); ?></th>            
            <th class="text-right"><?php _t("Age"); ?></th>            
            <th class="text-center"><?php _t("Orders"); ?></th>            
            <th><?php _t("Action"); ?></th>            
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php //_t("Id");        ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Patient name"); ?></th>                    
            <th><?php _t("Patient lastname"); ?></th>                    
            <th><?php _t("Birthdate"); ?></th>            
            <th class="text-right"><?php _t("Age"); ?></th>            
            <th class="text-center"><?php _t("Orders"); ?></th>            
            <th><?php _t("Action"); ?></th>            
        </tr>
    </tfoot>            
    <tbody>
        <?php
        foreach ($patients_list as $plao) {
            ?>
            <tr>                                                                      
                <td><?php echo contacts_picture($plao["contact_id"], 50, 'image img-circle img-responsive img-thumbnail'); ?></td>    
                <td><?php echo $plao["contact_id"]; ?></td>                          
                <td><?php echo contacts_field_id("name", $plao["contact_id"]); ?></td>    
                <td><?php echo contacts_field_id("lastname", $plao["contact_id"]); ?></td>    
                <td><?php echo contacts_field_id("birthdate", $plao["contact_id"]); ?></td>                               
                <td class="text-right"><?php echo calculaedad($plao["birthdate"]); ?></td>                               
                <td class="text-center"><?php echo orders_total_by_patient_id($plao["contact_id"]) ?></td>                               
                <td><a class="btn btn-sm btn-primary" href="index.php?c=contacts&a=details&id=<?php echo "$plao[contact_id]"; ?>"><?php _t("Details"); ?></a></td>
            </tr>
        <?php } ?>
    </tbody>  
</table>