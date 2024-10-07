<?php include view("home", "header"); ?>
<div class="row">
    <?php
    /*    <div class="col-md-2">
      <?php include "izq_myInfo.php"; ?>
      </div> */
    ?>

    <div class="col-md-0">
        <?php //include "izq_myContacts.php"; ?>
    </div>

    <div class="col-md-2">
        <?php include "izq_contacts.php"; ?>
    </div>

    <div class="col-md-7">  


        <h1><?php _t("Permissions"); ?></h1>

        <?php
        // include "system_by_contacts.php";

        if (isset($_REQUEST['sms'])) {
            $sms = clean($_REQUEST['sms']);

            switch ($sms) {
                case 1:
                    message('info', 'Update');
                    break;
                case 2:
                    message('danger', 'User blocked');
                    break;

                default:
                    break;
            }
        }
        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php _t("Controllers"); ?></th>
                    <th><?php _t("Create"); ?></th>
                    <th><?php _t("Read"); ?></th>
                    <th><?php _t("Update"); ?></th>
                    <th><?php _t("Delete"); ?></th>            
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th><?php _t("Controllers"); ?></th>
                    <th><?php _t("Create"); ?></th>
                    <th><?php _t("Read"); ?></th>
                    <th><?php _t("Update"); ?></th>
                    <th><?php _t("Delete"); ?></th>            
                </tr>
                </thead>
            <tbody>
                <?php
                $i = 1;
                foreach (permissions_search_by_rol(users_field_contact_id("rol", $id)) as $key => $value) {

                    $yes = '<span class="glyphicon glyphicon-ok"></span>';
                    ?>
                    <tr>                                            
                        <td><?php echo $i++; ?></td>

                        <td>
                            <?php echo ($value['controller']); ?>
                        </td>

                        <td><?php echo ($value['crud'][0]) ? $yes : "-"; ?></td>
                        <td><?php echo ($value['crud'][1]) ? $yes : "-"; ?></td>
                        <td><?php echo ($value['crud'][2]) ? $yes : "-"; ?></td>
                        <td><?php echo ($value['crud'][3]) ? $yes : "-"; ?></td>                                                                                                        
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </tbody>  
        </table>


    </div>

    <div class="col-md-3">
        <?php
        if (permissions_has_permission($u_rol, "shop_system", "update")) {
            include "der_system.php";
        } else {
            message("info", "You cannot update the system");
        }
        ?>
    </div>
</div>
<?php include view("home", "footer"); ?>