

<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
}
?>


<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Company"); ?></th>
            <th><?php _t("Vat format error"); ?></th>           
            <th><?php _t("Vat Correct"); ?></th>                      
            <th><?php _t("Action"); ?></th>            
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Company"); ?></th>
            <th><?php _t("Vat format error"); ?></th>           
            <th><?php _t("Vat Correct"); ?></th>                      
            <th><?php _t("Action"); ?></th>             
        </tr>
    </tfoot>
    <tbody>
        <?php
        foreach ($contacts_list as $clac) {

            $tva_formated = tva_formated($clac['tva']);

            //$is_patient = (patients_according_company_contact($id, $clac['id'])) ? "yes " : "-";
//            $is_employee = (employees_by_company_contact($id, $clac['id'])) ? employees_by_company_contact($id, $clac['id'])[0]['cargo'] : false;
//            $is_rol = (users_according_contact_id($clac['id'])) ? "yes" : "-";
            ?>                     
            <?php if ($tva_formated != $clac['tva']) { ?>
                <tr>    
                    <td><?php echo $clac['id']; ?></td>
                    <td><?php echo $clac['name']; ?></td>
                    <td><?php echo $clac['tva']; ?></td>                   
                    <td><?php echo $tva_formated ?></td>                    
                    <td>
                        <a 
                            class="btn btn-sm btn-default" 
                            href="index.php?c=contacts&a=details&id=<?php echo $clac['id']; ?>">
                                <?php _t("Details"); ?>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
    </tbody>  
</table>



