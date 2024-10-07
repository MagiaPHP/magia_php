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
            <th><?php _t("#"); ?></th>
            <th><?php _t("Pic"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Office"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>            
            <th><?php _t("Language"); ?></th>
            <th><?php _t("User"); ?></th>
            <th><?php _t("Rol"); ?></th>
            <th><?php _t("Status"); ?></th>
            <th><?php _t("Actions"); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Pic"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Office"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>            
            <th><?php _t("Language"); ?></th>
            <th><?php _t("User"); ?></th>
            <th><?php _t("Rol"); ?></th>
            <th><?php _t("Status"); ?></th>
            <th><?php _t("Actions"); ?></th>
        </tr>
    </tfoot>            
    <?php //include "form_contacts_employees_add_sipmle.php"; ?>                        
    <tbody>
        <?php
        $i = 1;
        foreach ($users as $ubo) {

            $rol = users_field_contact_id("rol", $ubo['contact_id']);

            $icon = users_status_icon(users_field_contact_id('status', $ubo['contact_id']));
            $status = (users_field_contact_id('status', $ubo['contact_id']) == 1 ) ? 'Active user' : 'Blocked user';

//                    $lock =  ( users_field_contact_id('status', $ubo['contact_id']) == 0 ) 
//                            ? 
//                            '<span class="glyphicon glyphicon-ban-circle"></span> ' . _tr("Bloqued") 
//                            :
//                            "";
            ?>                 
            <tr <?php
            // coloreamos el ultimpo item ingresado
            if (isset($li) && $li == $ubo['contact_id']) {
                echo 'class ="warning" ';
            }
            ?>>

                <td><?php echo $i++; ?></td>    
                <td><?php echo contacts_picture($ubo["contact_id"], 50, 'image img-circle img-responsive img-thumbnail'); ?></td>    
                <td><?php echo ($ubo["contact_id"]); ?></td>    
                <td><?php echo contacts_formated(contacts_work_at($ubo["contact_id"])); ?></td>   
                <td><?php echo contacts_field_id("name", $ubo["contact_id"]); ?></td>    
                <td><?php echo contacts_field_id("lastname", $ubo["contact_id"]); ?></td>   

                <td><?php echo _languages_field_language('name', users_field_contact_id("language", $ubo['contact_id'])); ?></td>    


                

                <td><?php echo ($ubo["login"]); ?></td>

                <td><?php echo ($rol) ? "$rol " : "$rol"; ?></td>
                <td><?php echo $icon . " " . _tr($status); ?></td>

                <td>
                    <a 
                        href="index.php?c=contacts&a=system&id=<?php echo $ubo['contact_id']; ?>" 
                        class="btn btn-sm btn-primary">
                        <span class="glyphicon glyphicon-eye-open"></span>
                        <?php // _t("Details");    ?>
                    </a>




                    <?php
//                    include "modal_user_password_update.php";
//                    
//                    include "modal_user_rol_update.php";
                    ?>

                    <?php
//                    switch (users_field_contact_id('status', $ubo['contact_id'])) {
//                        case 0:
//                            include "modal_user_approve.php";
//                            break;
//                        case 1:
//                            include "modal_user_block.php";
//                            break;
//                        case -1:
//                            include "modal_user_unblock.php";
//                            break;
//
//                        default:
//                            break;
//                    }
//
//
//
//                    include "modal_user_delete.php";
                    ?>


                </td>

            </tr>
        <?php } ?>
    </tbody>  
</table>