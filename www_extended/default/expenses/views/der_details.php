

    <?php
//vardump(balance_total_total_by_expense($expense->getId())); 
//vardump($expense->getStatus());

    switch ($expense->getStatus()) {
        case 0: // Draf        
            include "der_part_status.php";
            break;

        case 5: // registred
            //include "der_part_preview.php";
            include "der_part_status.php";
//        include 'panel_references.php';
            if (modules_field_module('status', 'projects')) {
                include 'der_part_projects_list.php';
            }
//        include "der_part_dates.php";
//        include "der_part_export.php";
//        include "der_banks_lines.php";
//        include "der_part_reminders.php";
//        include "der_part_send_by_email.php";
//        include "der_part_send_to_client.php";
//        include "der_part_social_network.php";
//        include "der_part_transport.php";
//        include "der_preview.php";
//        include "der_banks_lines.php";

            include "der_part_payement_list.php";

            if (_options_option('config_banks_registre')) {
                include "der_part_btn_pay.php";
            } else {
                // include "der_part_registre_payement.php";
                include "der_part_btn_pay_manual.php";
            }


            include "der_part_cancel.php";
            break;

        case 10: // to pay
            //include "der_part_preview.php";
            include "der_part_status.php";
//        include 'panel_references.php';
            if (modules_field_module('status', 'projects')) {
                include 'der_part_projects_list.php';
            }
            //
            include "der_part_payement_list.php";
            //
            if (_options_option('config_banks_registre')) {
                include "der_part_btn_pay.php";
            } else {
                include "der_part_btn_pay_manual.php";
            }
            break;

        case 20: // partial payement
            //include "der_part_preview.php";
            include "der_part_status.php";
//        include 'panel_references.php';
            if (modules_field_module('status', 'projects')) {
                include 'der_part_projects_list.php';
            }
            //
            include "der_part_payement_list.php";
            if (_options_option('config_banks_registre')) {
                include "der_part_btn_pay.php";
            } else {
                include "der_part_btn_pay_manual.php";
            }
            break;

        case 30: // full payement
            //include "der_part_preview.php";
            include "der_part_status.php";
//        include 'panel_references.php';
            if (modules_field_module('status', 'projects')) {
                include 'der_part_projects_list.php';
            }
//        include "der_part_dates.php";
            //include "der_part_export.php";
            if (balance_list_by_expense($expense->getId())) {
                include "der_part_payement_list.php";
            }
            break;

        case -10: // cancel
            //include "der_part_preview.php";
            include "der_part_status.php";
            //include 'panel_references.php';
            if (modules_field_module('status', 'projects')) {
                include 'der_part_projects_list.php';
            }
            break;
        case -20: // cancel AND recupereds
            break;

        default:
            break;
    }
    ?>


    <?php
    /**
      <div class="panel panel-default">
      <div class="panel-heading">
      <h3 class="panel-title">
      <a name="cancel"></a>

      <?php
      if (modules_field_module('status', "docu")) {
      echo docu_modal_bloc($c, $a, 'cancel', array('c' => $c, 'a' => $a, 'id' => $id));
      }
      ?>
      <?php _t("Cancel"); ?>
      </h3>
      </div>

      <div class="panel-body">

      <h3><?php _t("Cancel this expense"); ?></h3>

      <p>
      <?php _t("Change the status of this document to canceled"); ?>
      </p>

      <?php
      include "modal_details_cancel.php";
      ?>

      </div>
      </div>
     */
    ?>


