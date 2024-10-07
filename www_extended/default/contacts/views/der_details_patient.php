<div class="panel panel-primary">
    <div class="panel-heading"><?php _t("Directory"); ?></div>
    <div class="panel-body">        
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th><?php _t("Type"); ?></th>
                    <th><?php _t("Data"); ?></th>
                    <th><?php _t("Action"); ?></th>
                </tr>
            </thead>
            <tbody>                
                <?php foreach (directory_list_by_contact_id($id) as $key => $directory_list_by_contact_id) { ?>                                        
                    <tr>
                        <td><?php echo $directory_list_by_contact_id['name']; ?></td>
                        <td><?php echo $directory_list_by_contact_id['data']; ?></td>
                        <td>


                            <?php include "modal_directory_edit.php"; ?>


                        </td>
                    </tr>                
                <?php } ?>                                
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>   



    </div>
</div>







<div class="panel panel-primary">
    <div class="panel-heading"><?php _t("System"); ?></div>
    <div class="panel-body">

        <?php
        // en la tabla employee no existe no se le puede dar un suario 
        if (employees_by_company_contact(contacts_field_id("owner_id", $id), $id)) {
            /*
             * Solo si es empleado puede tener un login 
             */
            if (users_according_contact_id($id)) {
                include "form_login_have.php";
            } else {
                if (directory_list_by_contact_name($id, "email")) {
                    include "form_login_add.php";
                } else {
                    echo message("info", "This contact does not have a valid email, please add it first");
                }
            }
        } else {
            echo message("info", "Only emplyees can has access to the system");
        }
        ?>
    </div>
</div>



<?php if (users_according_contact_id($contact['id'])) { ?>

    <div class="panel panel-primary">
        <div class="panel-heading"><?php _t("Access to system"); ?></div>
        <div class="panel-body">

            <?php
            if (users_field_contact_id('status', $contact['id']) == 0) {
                include "modal_user_unblock.php";
            } else {
                include "modal_user_block.php";
            }
            ?>
        </div>
    </div>
    <?php
}?>