<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="contacts_directory_add">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="contacts_directory_add"><?php _t("Add new data"); ?></h4>
            </div>
            <div class="modal-body">
                <?php //include "form_contacts_directory_add.php"; ?>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading"><?php _t("Employee"); ?></div>
    <div class="panel-body">
        <?php
        if (!offices_headoffice_of_office(employees_office_by_contact($id)) == contacts_work_for($u_id)) {
            message("info", "This contact does not work for your company");
            if (permissions_has_permission($u_rol, 'shop_employees', 'create')) {
                include "modal_form_employee_add.php";
            } else {
                message("info", "You are not authorized to create an employee");
            }
        } else {
            echo employees_field_by_contact_id("cargo", $id);
        }
        ?>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading"><?php _t("Users"); ?></div>
    <div class="panel-body">

        <?php
        if (permissions_has_permission($u_rol, "shop_users", "update")) {

            /**
             * Si puedo crear otras oficinas, puede ver otros usuarios 
             * 
             * sino solo los mios 
             * 
             * 
             */
            // Verifica que trabaje en la empresa

            if (offices_headoffice_of_office(employees_office_by_contact($id)) == contacts_work_for($u_id)) {

                if (permissions_has_permission($u_rol, "shop_offices", "create")) {
                    if (contacts_work_for($id) == contacts_work_for($u_id)) {
                        // trabaja para la misma elporesa 
                        if (users_according_contact_id($id)) {
                            include "form_login_have.php";
                        } else {
                            include "modal_form_login_add.php";
                        }
                    }
                } else {
                    if (contacts_work_at($id) == contacts_work_at($u_id)) {
                        if (users_according_contact_id($id)) {
                            include "form_login_have.php";
                        } else {
                            include "modal_form_login_add.php";
                        }
                    }
                }
            } else {
                message("info", "This contact does not work for your company");
                //  include "modal_form_employee_add.php" ;
            }
        } else {
            message("info", "You are not authorized to update the users");
        }
        ?>
    </div>
</div>



<?php if (users_according_contact_id($contact['id'])) { ?>

    <div class="panel panel-primary">
        <div class="panel-heading"><?php _t("Users access"); ?></div>
        <div class="panel-body">

            <?php
            if (permissions_has_permission($u_rol, "shop_users", "update")) {

                if (users_field_contact_id('status', $contact['id']) == USER_BLOCKED) {
                    echo '<p>' . _t("This user is block") . '</p>';
                    include "modal_user_unblock.php";
                }

                if (users_field_contact_id('status', $contact['id']) == USER_ONLINE) {
                    echo '<p>' . _t("Block this user's access to the system") . '</p>';
                    include "modal_user_block.php";
                }

                if (users_field_contact_id('status', $contact['id']) == USER_WAITING) {
                    echo '<p>' . _t("This user is waiting for approval") . '</p>';
                    include "modal_user_unblock.php";
                }
            } else {
                message("info", "You are not authorized to update the users");
            }
//            if ( users_field_contact_id('status' , $contact['id']) == 0 && permissions_has_permission($u_rol , "shop_users" , "update") ) {
//                include "modal_user_unblock.php" ;
//            } else {
//                if ( permissions_has_permission($u_rol , "shop_users" , "update") ) {
//                    echo '<p>' . _t("Block this user's access to the system") . '</p>' ;
//                    include "modal_user_block.php" ;
//                }
//                
//            }
            ?>
        </div>
    </div>
<?php } ?>