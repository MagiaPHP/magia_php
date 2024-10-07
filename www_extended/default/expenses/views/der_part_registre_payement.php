
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'registrePayments', array('c' => $c, 'a' => $a, 'id' => $id));
            }
            ?>
            <a name="registrePayments"></a>
            <?php _t("Manual payment registration"); ?>
        </h3>
    </div>

    <div class="panel-body">

        <p>
            <?php _t("Record your transactions manually, remember that you can use your bank statements to facilitate these important operations"); ?>
        </p>

        <?php
        switch ($expense->getStatus()) {
            case 0:
                message("info", "This document is as a draft, you must put it ready to pay if you want to make payments");
                break;

            case 5: // registred            
            case 10: // to pay 
            case 20: // parcial pago
                // se puede hacer pagos
                include "modal_form_payement_registre.php";
                break;

            case 30: // full pago             
                message("info", "Document paid in full");
                break;

            case -10: // Cancelado
                message("info", "Canceled document");
                break;
            case -20: // Canceled and recovered
                message("info", "Cancel");
                // ya no se puede hacer pagos 
                break;

            default:
                break;
        }



//        if ($expense->getStatus() == 30) {
//            message('info', 'The invoice is registered as collected in full');
//        } else {
//            if (!banks_list_by_contact_id(contacts_field_id("owner_id", $u_id))) {
//                Message("info", "Please add a bank account");
//            } else {
//
//                if ($expense->getStatus() == 0) {
//                    message('info', 'Change to registered status to make payments', '<span class="glyphicon glyphicon-lamp"></span>');
//                } else {
//                    include "modal_form_payement_registre.php";
//                }
//            }
//        }
//        
        ?>
    </div>
</div>

<?php
/**
 * 
  <div class="panel panel-default">
  <div class="panel-heading">
  <h3 class="panel-title">
  <?php
  if (modules_field_module('status', "docu")) {
  echo docu_modal_bloc($c, $a, 'registrePayments'  , array('c' => $c, 'a' => $a, 'id' => $id));
  }
  ?>

  <a name="registrePayments"></a>
  <?php _t("Registre payments"); ?>
  </h3>
  </div>
  <div class="panel-body">
  NEW


  <a class="btn btn-primary" href="index.php?c=invoices&a=registre_payement&id=<?php echo $id; ?>">
  <?php _t("Registre payments"); ?>
  </a>


  </div>
  </div>





 */
?>