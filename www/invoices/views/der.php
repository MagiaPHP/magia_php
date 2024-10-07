<?php
// crea html 
if (modules_field_module("status", "tasks") && permissions_has_permission($u_rol, "tasks", "read")) {
    $args = array(
        "c" => $c,
        "name" => 'robinson',
        "id" => $id,
        "form" => array(
            "category_id" => null,
            "contact_id" => $u_id,
            "controller" => $c,
            "doc_id" => $id,
            "redi" => array(
                "redi" => "40",
                "c" => $c,
                "id" => $invoices['id']
            )
        ),
    );

    tasks_create_html('tmp_der_details', $args);
}
?>

<?php

include "der_part_status.php";

if (modules_field_module('status', 'projects')) {
    include 'der_part_projects_list.php';
}



//include "der_part_dates.php";
if (
        modules_field_module('status', 'transport') &&
        permissions_has_permission($u_rol, "transport", "read")
) {
    include "der_part_transport.php";
}
?>

<?php
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
if (permissions_has_permission($u_rol, "invoices", "update")) {

//    vardump($invoices['status']); 

    switch ($invoices['status']) {
        case 0: // Draf        
            //    include "der_part_reminders.php";
            //    include "der_part_payement_list.php";
//            include "der_part_registre_payement.php";
            include "der_part_cancel.php";
            // include "der_part_send_to_client.php";
            //    include "der_part_export.php";
            break;

        case 10: // Registre
        case 20: // Cobro parcial
            include "der_part_reminders.php";
            include "der_part_payement_list.php";
            if (_options_option('config_banks_registre')) {
                include "der_banks_lines.php";
            } else {
                include "der_part_registre_payement.php";
            }
            include "der_part_cancel.php";
            // include "der_part_send_to_client.php";
            //    include "der_part_export.php";
            break;

        case 30: // Cobro total
            include "der_part_payement_list.php";
//            include "der_part_registre_payement.php";
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

        //include "der_part_send_by_email.php";
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
?>

<?php
if (
        !modules_field_module('status', 'export') &&
        $u_rol == 'root') {
    ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <?php _menu_icon('top', 'transport'); ?>
                <?php _t("Export"); ?></h3>
        </div>
        <div class="panel-body">
            <?php
            if ($u_rol == 'root') {
                echo '<a href="index.php?c=export&a=invoice_lines&invoice_id=' . $id . '">CSV</a>';
            }
            ?>
        </div>
    </div>

<?php } ?>





<?php
if (
        permissions_has_permission($u_rol, "docs_exchange", "create") &&
        modules_field_module('status', 'docs_exchange')
) {
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <?php _menu_icon('top', 'docs_exchange'); ?>
                <?php _t("To docs exchange"); ?></h3>
        </div>
        <div class="panel-body">
            <a href="index.php?c=invoices&a=ok_send_to_docs_exchange&id=<?php echo $inv->getId(); ?>&redi=1"><?php _t("ok_send_to_docs_exchange"); ?></a>


        </div>
    </div>

<?php } ?>
