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
            <th></th>            
            <th><?php _t("Id"); ?></th>            
            <th><?php _t("Name"); ?></th>            
            <th><?php _t("Lastname"); ?></th>            
            <th><?php _t("Office"); ?></th>
            <th><?php _t("Reference"); ?></th>
            <th><?php _t("Position in company"); ?></th>

            <th><?php _t("Actions"); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th></th>            
            <th><?php _t("Id"); ?></th>            
            <th><?php _t("Name"); ?></th>            
            <th><?php _t("Lastname"); ?></th>            
            <th><?php _t("Office"); ?></th>
            <th><?php _t("Reference"); ?></th>
            <th><?php _t("Position in company"); ?></th>

            <th><?php _t("Actions"); ?></th>
        </tr>
    </tfoot>            
    <?php //include "form_contacts_employees_add_sipmle.php"; ?>                        
    <tbody>
        <?php
        foreach ($employees_list as $employees_list_by_company) {

            $rol = users_field_contact_id("rol", $employees_list_by_company['contact_id']);
            $icon = users_status_icon(users_field_contact_id('status', $employees_list_by_company['contact_id']));

//                    $lock =  ( users_field_contact_id('status', $employees_list_by_company['contact_id']) == 0 ) 
//                            ? 
//                            '<span class="glyphicon glyphicon-ban-circle"></span> ' . _tr("Bloqued") 
//                            :
//                            "";
            ?>                 
            <tr <?php
            // coloreamos el ultimpo item ingresado
            if (isset($li) && $li == $employees_list_by_company['contact_id']) {
                echo 'class ="warning" ';
            }
            ?>>
                <td><?php echo contacts_picture($employees_list_by_company["contact_id"], 50, 'image img-circle img-responsive img-thumbnail'); ?></td>    
                <td><?php echo ($employees_list_by_company["contact_id"]); ?></td>    
                <td><?php echo contacts_field_id("name", $employees_list_by_company["contact_id"]); ?></td>    
                <td><?php echo contacts_field_id("lastname", $employees_list_by_company["contact_id"]); ?></td>   

                <td><?php echo contacts_formated($employees_list_by_company['company_id']); ?></td>
                <td><?php echo ($employees_list_by_company["owner_ref"]); ?></td>
                <td><?php echo employees_by_company_contact($employees_list_by_company['company_id'], $employees_list_by_company['contact_id'])[0]['cargo']; ?></td>


                <?php
                /**
                 * <td>
                  <?php
                  if ($rol) {
                  echo "$icon $rol ";
                  } else {
                  include "modal_employee_rol_add.php";
                  }
                  ?>
                  </td>
                 */
                ?>


                <td>
                    <a 
                        href="index.php?c=contacts&a=details&id=<?php echo $employees_list_by_company['contact_id']; ?>" 
                        class="btn btn-sm btn-primary">
                            <?php _t("Details"); ?>
                    </a>

                    <?php
                    /**
                     * En lugar de borrar el empleado, 
                     * dar la posibilidad de bloquear el usuario
                     * 
                     */
                    if (permissions_has_permission($u_rol, "employees", "delete")) {
                        //  include "modal_employe_delete.php";
                    }
                    ?>
                </td>

            </tr>
        <?php } ?>
    </tbody>  
</table>


