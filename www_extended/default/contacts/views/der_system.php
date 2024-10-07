<?php
/* <div class="panel panel-primary">
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
  <td><!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_<?php echo "$directory_list_by_contact_id[id]"; ?>">
  <?php _t("Edit"); ?>
  </button>
  <!-- Modal -->
  <div class="modal fade" id="myModal_<?php echo "$directory_list_by_contact_id[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_<?php echo "$directory_list_by_contact_id[id]"; ?>Label">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModal_<?php echo "$directory_list_by_contact_id[id]"; ?>Label">
  <?php _t("Edit data info"); ?>
  </h4>
  </div>
  <div class="modal-body">
  <?php //echo "$directory_list_by_contact_id[id]"; ?>
  <?php include "form_contacts_directory_edit.php"; ?>
  </div>
  </div>
  </div>
  </div></td>
  </tr>
  <?php } ?>
  <tr>
  <td></td>
  <td></td>
  <td></td>
  </tr>
  </tbody>
  </table>

  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  <?php _t("Add new"); ?>
  </button>

  </div>
  </div> */
?>


<?php include view('contacts', 'der_hr_employee_documents_all'); ?>




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="contacts_directory_add">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="contacts_directory_add"><?php _t("Add new data"); ?></h4>
            </div>
            <div class="modal-body">
                <?php include "form_contacts_directory_add.php"; ?>
            </div>
        </div>
    </div>
</div>




<div class="panel panel-primary">
    <div class="panel-heading"><?php _t("Users"); ?></div>
    <div class="panel-body">

        <?php
        if (permissions_has_permission($u_rol, "users", "update")) {


            // en la tabla employee no existe no se le puede dar un suario 
            if (employees_by_company_contact(contacts_field_id("owner_id", $id), $id)) {
                /*
                 * Solo si es empleado puede tener un login 
                 */

//                 vardump(contacts_have_user($id, directory_id_by_contact_name($id, 'Email'), directory_id_by_contact_name($id, 'Email')));
//                 echo "<hr>"; 
//                 vardump(users_according_contact_id($id));
//                 
//                 vardump((directory_id_by_contact_name($id, 'Email')));
//                 vardump((directory_list_by_contact_name($id, 'Email')));
//                 (users_according_email(directory_list_by_contact_name($id, 'Email')));


                if ((users_according_email(directory_list_by_contact_name($id, 'Email')))) {

                    include "form_login_have.php";
                } else {
                    if (directory_list_by_contact_name($id, "email")) {
                        echo "<p>" . _t("This user does not have access to the system") . "</p>";
                        include "modal_form_login_add.php";
                    } else {
                        echo message("info", "This contact does not have a valid email, please add it first");
                        include "modal_contacts_email_add.php";
                    }
                }
            } else {
                echo message("info", "Only emplyees can has access to the system");
            }
        } else {
            echo message("info", "This contact does not have a valid email, please add it first");
        }
        ?>




    </div>
</div>





<?php if (users_according_contact_id($contact['id'])) { ?>

    <div class="panel panel-primary">
        <div class="panel-heading"><?php _t("Access to system"); ?></div>
        <div class="panel-body">

            <?php
            if (contacts_field_id('status', contacts_work_at($id)) <= 0) {
                message('info', "The office is not actived");
            }

            switch (users_field_contact_id('status', $contact['id'])) {
                case -1: // bloqueado
                    echo "<h3>" . _t("Unblock user") . "</h3>";
                    include "modal_user_unblock.php";
                    break;

                case 0: // Wait                                
                    //    echo __LINE__;
                    include "modal_user_approve.php";
                    // include "modal_user_unblock.php";
                    break;

                case 1: // on line
                    //    echo __LINE__;
                    echo "<h3>" . _t("Block user") . "</h2>";
                    include "modal_user_block.php";
                    break;

                default:
                    //    echo __LINE__;
                    //    vardump(users_field_contact_id('status', $contact['id']));
                    break;
            }




            if (users_field_contact_id('status', $id) == 0) {
                //  include "modal_user_unblock.php";
            } else {
                //  include "modal_user_block.php";
            }
            ?>
        </div>
    </div>
<?php }
?>




<?php if (users_according_contact_id($contact['id'])) { ?>

    <div class="panel panel-danger">
        <div class="panel-heading"><?php _t("Access to system"); ?></div>
        <div class="panel-body">

            <?php
            include 'modal_user_delete.php';
            ?>

            <br>
            <br>            
            <?php
            if (modules_field_module('status', "docu")) {
                // nombre del archivo sin el punto ni la extencion 
                // form_search_by_office.php > form_search_by_office
                // en los form, al final
                //
                echo docu_modal_bloc($c, $a, 'modal_user_delete');
            }
            ?>


        </div>
    </div>
<?php }
?>

<?php
/*


  <div class="panel panel-default">
  <div class="panel-heading"><?php _t("Add new data"); ?></div>
  <div class="panel-body">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#contacts_directory_add">
  <?php _t("New"); ?>
  </button>

  </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="contacts_directory_add" tabindex="-1" role="dialog" aria-labelledby="contacts_directory_addLabel">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="contacts_directory_addLabel">
  <?php _t("Add new Data directory"); ?>
  </h4>
  </div>
  <div class="modal-body">
  <?php include "form_contacts_directory_add.php"; ?>
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary">Save changes</button>
  </div>
  </div>
  </div>
  </div> */
?>