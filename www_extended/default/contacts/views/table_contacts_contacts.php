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
            <?php if (modules_field_module('status', 'audio')) { ?>
                <th><?php _t("Patient"); ?></th>            
            <?php } ?>
            <th><?php _t("Employee"); ?></th>            
            <th><?php _t("rol"); ?></th>            
            <th><?php _t("Action"); ?></th>            
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
            <?php if (modules_field_module('status', 'audio')) { ?>
                <th><?php _t("Patient"); ?></th>            
            <?php } ?>
            <th><?php _t("Employee"); ?></th>            
            <th><?php _t("Rol"); ?></th>            
            <th><?php _t("Action"); ?></th>            
        </tr>
    </tfoot>
    <tbody>
        <?php
        //vardump(contacts_list_according_company_and_type($id, 0));
        // lista de todos los contactos de la empresa, no solo de la oficinas 
        // contacts_list_according_company_and_type($owner_id, $type);

        $i = 1;
        foreach ($contacts_list as $clac) {

            $con = new Contact();
            $con->setContacts($id);

            $is_patient = (patients_according_company_contact($id, $clac['id'])) ? "yes " : "-";
            // es empleado de esta oficina o esta sede
//            vardump(employees_by_company_contact($id, $clac['id']));
            //$is_employee = (employees_by_company_contact($owner_id, $clac['id'])) ? employees_by_company_contact($owner_id, $clac['id'])[0]['cargo'] : false;
            $is_employee = (employees_by_company_contact($clac['owner_id'], $clac['id'])) ? true : false;

            if ($is_employee) {
                $cargo = employees_field_by_contact_id('cargo', $clac['id']);
            }

            $rol = (users_field_contact_id('rol', $clac['id']));
            $icon = users_status_icon(users_field_contact_id('status', $clac['id']));
            $is_rol = (users_according_contact_id($clac['id'])) ? "yes" : "-";
            ?>                     
            <?php if ($clac['type'] == 0) { ?>


                <tr <?php
                // coloreamos el ultimpo item ingresado
                if (isset($li) && $li == $clac['id']) {
                    echo 'class ="warning" ';
                }
                ?>>   
                    <td><?php echo $i++; ?></td>
                    <td><?php echo contacts_picture($clac["id"], 50, 'image img-circle img-responsive img-thumbnail'); ?></td>    

                    <td><?php echo $clac['id']; ?></td>

                    <td><?php echo contacts_formated($clac['owner_id']); ?></td>
                    <td><?php echo $clac['name']; ?></td>
                    <td><?php echo $clac['lastname']; ?></td>


                    <?php if (modules_field_module('status', 'audio')) { ?>
                        <td><?php echo $is_patient; ?></td>    
                    <?php } ?>



                    <td>

                        <?php
                        if ($is_employee) {
                            // que cargo ocupa? 



                            echo ($cargo);
                        } else {
                            ?>

                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $clac['id']; ?>">
                                <?php _t("Add like employee"); ?>
                            </button>


                            <div class="modal fade" id="myModal<?php echo $clac['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">
                                                <?php echo contacts_formated($clac['id']); ?>
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php include "form_add_like_employees.php"; ?>
                                        </div>


                                    </div>
                                </div>
                            </div>



                        <?php } ?></td>                          


                    <td><?php echo ($rol) ? "$icon $rol " : "$rol"; ?></td>                       
                    <td>
                        <a 
                            class="btn btn-sm btn-primary" 
                            href="index.php?c=contacts&a=details&id=<?php echo $clac['id']; ?>">
                                <?php _t("Details"); ?>
                        </a>

                        <?php
                        if (permissions_has_permission($u_rol, "contacts", "delete")) {
                            // include "modal_contacts_delete.php";
                        }
                        ?>

                    </td>
                </tr>
            <?php } ?>

        <?php } ?>
    </tbody>  
</table>



