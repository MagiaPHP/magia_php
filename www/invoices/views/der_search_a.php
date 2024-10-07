<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php _t("Invoices"); ?></h3>
    </div>
    <div class="panel-body">

        <table class="table table-striped">

            <tr>
                <td>
                    <?php _t("Status"); ?></td>
                <td><?php echo _tr(invoice_status_by_status($invoices["status"])); ?>
                    <?php //echo $invoices['status'] ; ?>

                    <?php
                    if ($invoices['status'] == 0) {
                        include "modal_change_status_to_registred.php";
                    }


                    if ($invoices['status'] == 10) {
                        include "modal_change_status_to_draf.php";
                    }
                    ?>


                </td>
            </tr>



            <tr>
                <td><?php _t("Type"); ?></td>
                <td>                    
                    <?php echo _t(invoices_type($invoices['type'])); ?>                    
                </td>
            </tr>

            <tr>
                <td><?php _t("Invoice"); ?>-<?php echo _t('counter'); ?></td>
                <td><?php echo invoices_numberf($id); ?></td>
            </tr>

            <tr>
                <td><?php _t("Invoice id"); ?></td>
                <td><?php echo ($id); ?></td>
            </tr>



            <tr>
                <td><?php _t("Budget"); ?></td>
                <td>

                    <?php
// si hay un presupuesto poner el numero del presupuesto, 
// sino poner el numero de presupuestos de esa factura 
                    $total_budgets_by_invoice = count(budgets_invoices_list_budgets_by_invoice_id($id));

                    switch ($total_budgets_by_invoice) {
                        case 0:
                            echo "";
                            break;

                        case 1:
                            echo "<a href=\"index.php?c=budgets&a=details&id=" . (budgets_invoices_list_budgets_by_invoice_id($id)[0]['budget_id']) . "\">" . (budgets_invoices_list_budgets_by_invoice_id($id)[0]['budget_id']) . "</a>";
                            break;

                        default:
                            echo $total_budgets_by_invoice . " " . _tr("Budgets");
                            break;
                    }

// echo invoices_field_id("budget_id" , $id) ; 
                    ?>

                </td>
            </tr>

            <tr>
                <td><?php _t("Credit note"); ?></td>
                <td>
                    <a href="index.php?c=credit_notes&a=details&id=<?php echo $invoices['credit_note_id']; ?>">
                        <?php echo $invoices["credit_note_id"]; ?>
                    </a>
                </td>
            </tr>






            <?php
            /*
              <tr>
              <td><?php _t("Seller") ; ?></td>
              <td><?php echo contacts_formated(invoices_field_id("seller_id" , $id)) ; ?></td>
              </tr>
             */
            ?>
            <tr>
                <td>
                    <?php _t("Client"); ?>
                </td>  


                <td>

                    <?php echo $invoices['client_id']; ?> -                     
                    <a href="index.php?c=contacts&a=details&id=<?php echo $invoices['client_id']; ?>">
                        <?php echo contacts_formated(invoices_field_id("client_id", $id)); ?>
                    </a>
                </td>                    
            </tr>
            <tr>
                <td>
                    <?php _t("Title"); ?>:
                </td>  


                <td>
                    <?php
                    if ($invoices['title']) {

                        if (permissions_has_permission($u_rol, 'invoices', "update")) {

                            modal(uniqid(), "Edit",
                                    array("btn" => 'default', "label" => 'Edit'),
                                    array("c" => 'invoices', "a" => 'form_title_update'),
                                    $params = array("id" => $id), '$rename');
                        }


                        echo $invoices['title'];
                    } else {

                        if (permissions_has_permission($u_rol, 'invoices', "update")) {

                            modal(uniqid(), "Add title",
                                    array("btn" => 'default', "label" => 'Add'),
                                    array("c" => 'invoices', "a" => 'form_title_update'),
                                    $params = array("id" => $id), '$rename');
                        }
                    }
                    ?>                                      
                </td>   
            </tr>

            <?php if (_options_option("config_projects")) { ?>
                <tr>
                    <td>
                        <?php _t("Project"); ?>
                    </td>
                    <td>
                        <?php
                        // vardump(projects_list_by_invoice($id));
                        if (permissions_has_permission($u_rol, 'invoices', "update")) {
                            if (projects_inout_search_by_invoice_id($id)) {
                                include "modal_project_update.php";
                            } else {

                                include "modal_project_insert.php";
                            }
                        } else {
                            // solo ve
                            echo "solo ve";
                        }
                        ?>       
                    </td>
                </tr>
            <?php } ?>




            <?php if (_options_option("config_invoices_see_via_web")) { ?>
                <tr>
                    <td>
                        <?php _t("View via the web"); ?>
                    </td>


                    <td>
                        <?php
                        include "modal_invoices_see_via_web.php";
                        ?>       
                    </td>
                </tr>
            <?php } ?>







            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>






        </table>
    </div>
</div>

<?php
################################################################################
#### D A T E S #################################################################
################################################################################
################################################################################
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php _t("Dates"); ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">

            <tr>
                <td><?php _t("Invoice date"); ?></td>
                <td><?php echo $invoices["date"]; ?></td>
            </tr>


            <tr>
                <td><?php _t("Expiration date"); ?></td>
                <td>
                    <?php
                    if ($invoices['date_expiration']) {

                        echo $invoices['date_expiration'];

                        if (permissions_has_permission($u_rol, 'invoices', "update")) {

//
//                            modal(uniqid(), _tr("Edit expiration date"),
//                                    array("btn" => 'default', "label" => 'Edit'),
//                                    array("c" => 'invoices', "a" => 'form_date_expiration_update'),
//                                    $params = array(
//                                "id" => $id,
//                                "date" => $invoices['date_expiration']
//                                    ), '$rename');
                        } // fin de permisos 
                    } else {

                        if (permissions_has_permission($u_rol, 'invoices', "update")) {
//
//                            modal(uniqid(), _tr("Add expiration date"),
//                                    array("btn" => 'default', "label" => 'Add'),
//                                    array("c" => 'invoices', "a" => 'form_date_expiration_update'),
//                                    $params = array("id" => $id), '$rename');
                        }
                    }
                    ?>                                      
                </td>        


            </tr>



            <tr>
                <td><?php _t("Registre date"); ?></td>
                <td><?php echo $invoices["date_registre"]; ?></td>
            </tr>





        </table>
    </div>
</div>

<?php
################################################################################
################################################################################
# T R A N S P O R T 
################################################################################ 
################################################################################ 

if (
        modules_field_module('status', 'transport') &&
        permissions_has_permission($u_rol, "transport", "read")
) {
    ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <?php _menu_icon('top', 'transport'); ?>
                <?php _t("Transport"); ?></h3>
        </div>
        <div class="panel-body">

            <?php if ($code_transport_in_invoice) { ?>


                <table class="table table-striped">

                    <tr>
                        <td><?php _t('Transport'); ?></td>
                        <td><?php
                            foreach ($code_transport_in_invoice as $key => $value) {
                                echo "$value ";
                            };
                            ?>
                        </td>
                    </tr>

                </table>
                <?php
            } else {

                message('info', 'Not transport in this invoice');
            }
            ?>

        </div>
    </div>

<?php } ?>




<?php
if (permissions_has_permission($u_rol, "invoices", "update")) {

    switch ($invoices['status']) {
        case 0: // Draf        
            //    include "der_part_reminders.php";
            //    include "der_part_payement_list.php";
            //    include "der_part_registre_payement.php";
            include "der_part_cancel.php";
            // include "der_part_send_to_client.php";
            //    include "der_part_export.php";
            break;

        case 10: // Registre
        case 20: // Cobro parcial
            include "der_part_reminders.php";
            include "der_part_payement_list.php";
            include "der_part_registre_payement.php";
            include "der_part_cancel.php";
            // include "der_part_send_to_client.php";
            //    include "der_part_export.php";
            break;

        case 30: // Cobro total
            include "der_part_payement_list.php";
            include "der_part_cancel.php";
            // include "der_part_send_to_client.php";
            //    include "der_part_export.php";
            break;

        case -10: // Cancel
            include "der_part_payement_list.php";
            // include "der_part_send_to_client.php";
            //   include "der_part_export.php";
            break;

        case -20: // Cancel and credit note created
            include "der_part_payement_list.php";
            // include "der_part_send_to_client.php";
            //      include "der_part_export.php";
            break;

        default:
            break;
    }
}
// debe haber una opcion en la base de datos
// INSERT INTO `_options` (`id`, `option`, `data`, `group`) VALUES (NULL, 'config_mail', '1', '20')

if ($config_mail) {

    if (permissions_has_permission($u_rol, "emails", "create")) {

        include "der_part_send_by_email.php";
        //    echo "s"; 
    } else {

        //       echo "n";
    }
} else {
    // message('info', '$config_mail is inactived');
    // echo "x"; 
}

//vardump($config_mail);


//   include "der_part_social_network.php";
