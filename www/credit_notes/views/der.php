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
                "id" => $id
            )
        ),
    );

    tasks_create_html('tmp_der_details', $args);
}
?>

<div class="panel panel-default shadow-container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php _menu_icon("top", "credit_notes"); ?>

            <?php _t("Credit note"); ?>    
        </div>
        <table class="table table-striped">


            <tr>
                <td> 

                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'status');
                    }
                    ?>

                    <?php _t("Status"); ?>

                </td>
                <td>
                    <?php echo _tr($cn->getStatusFormated()); ?>
                </td>
            </tr>


            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'id');
                    }
                    ?>
                    <?php _t("Id"); ?></td><td><?php echo ($cn->getId()); ?>
                </td>
            </tr>


            <?php
            /**
             * 
              <tr>
              <td>
              <?php
              if (modules_field_module('status', "docu")) {
              echo docu_modal_bloc($c, $a, 'Id_formatted');
              }
              ?>
              <?php
              _t("Id formatted");
              ?></td><td><?php echo ($cn->getId_formatted()); ?></td>
              </tr>
              <tr>
              <td>
              <?php
              if (modules_field_module('status', "docu")) {
              echo docu_modal_bloc($c, $a, 'Office_id_counter');
              }
              ?>
              <?php _t("Counter by office"); ?></td>
              <td>
              <?php echo ($cn->getOffice_id_counter()); ?>
              </td>
              </tr>
              <tr>
              <td>
              <?php
              if (modules_field_module('status', "docu")) {
              echo docu_modal_bloc($c, $a, 'Office_id_counter_year');
              }
              ?>
              <?php _t("Counter by office year"); ?></td>
              <td>
              <?php echo ($cn->getOffice_id_counter_year()); ?>
              </td>
              </tr>
              <tr>
              <td>
              <?php
              if (modules_field_module('status', "docu")) {
              echo docu_modal_bloc($c, $a, 'office_id_counter_year_month');
              }
              ?>
              <?php _t("Counter by office year month"); ?></td>
              <td>
              <?php echo ($cn->getOffice_id_counter_year_month()); ?>
              </td>
              </tr>
              <tr>
              <td>
              <?php
              if (modules_field_module('status', "docu")) {
              echo docu_modal_bloc($c, $a, 'office_id_counter_year_trimestre');
              }
              ?>
              <?php _t("Counter by office year trimestre"); ?></td>
              <td>
              <?php echo ($cn->getOffice_id_counter_year_trimestre()); ?>
              </td>
              </tr>
             */
            ?>

            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'invoice');
                    }
                    ?>
                    <?php _t("Invoice"); ?></td>
                <td>
                    <a href="index.php?c=invoices&a=details&id=<?php echo $cn->getInvoice_id(); ?>">
                        <?php echo invoices_numberf($cn->getInvoice_id()); ?>
                    </a>
                </td>
            </tr>


            <?php
            /**
             *             <tr>
              <td>
              <?php
              if (modules_field_module('status', "docu")) {
              echo docu_modal_bloc($c, $a, 'date');
              }
              ?>
              <?php _t("Date"); ?></td>
              <td><?php echo $cn->getDate(); ?></td>
              </tr>
             */
            ?>



            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'date_registre');
                    }
                    ?>
                    <?php _t("Registre date"); ?></td>
                <td><?php echo $cn->getDate_registre(); ?></td>
            </tr>






            <?php
            /**
             *
             *             

              <tr>
              <td>
              <?php
              if (modules_field_module('status', "docu")) {
              echo docu_modal_bloc($c, $a, 'client_id');
              }
              ?>

              <?php _t("Client"); ?>
              </td>
              <td>
              <a href="index.php?c=contacts&a=details&id=<?php echo $cn->getClient_id(); ?>">
              <?php echo contacts_formated($cn->getClient_id()); ?>
              </a>
              </td>
              </tr>
             * 
             *  
             */
            ?>



        </table>
    </div>
</div>


<?php
//  10
//  20
// -10
//vardump($credit_notes['status']);

if (permissions_has_permission($u_rol, "credit_notes", "update")) {

    switch ($credit_notes['status']) {
        case 10: // Registred

            include "der_part_payement_list.php";

            if (_options_option('config_banks_registre')) {
                include "der_banks_lines.php";
            } else {
               // include "der_part_registre_payement.php";
            }


            //include "der_part_registre_payement.php";
            //include "modal_form_payement_registre.php";   
            //    include "der_part_send.php"; 
            //    include "der_part_accept.php"; 
            //    include "der_part_reject.php"; 
            include "der_part_cancel.php";
            //  include "der_part_send_by_email.php"; 
            break;
        case 20: // Money returned
            include "der_part_payement_list.php";
            //    include "der_part_accept.php"; 
            //    include "der_part_reject.php";         
            //    include "der_part_change_status.php"; 
            //include "der_part_send_by_email.php"; 
            break;
        case -10: // Cancel   
            // include "der_part_send_by_email.php"; 
            break;

        default:
            break;
    }
}
?>


