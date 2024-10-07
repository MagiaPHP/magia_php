<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'registrePayments', array('c' => $c, 'a' => $a, 'id' => $id));
            }
            ?>

            <a name="registrePayments"></a>
            <?php _t("Recording payments manually"); ?>
        </h3>
    </div>
    <div class="panel-body">

        <?php
        if ($inv->getStatus() == 30) {
            message('info', 'The invoice is registered as collected in full');
        } else {
            if (!banks_list_by_contact_id(contacts_field_id("owner_id", $u_id))) {
                Message("info", "Please add a bank account");
            } else {

                if ($inv->getStatus() == 0) {
                    message('info', 'Change to registered status to make payments', '<span class="glyphicon glyphicon-lamp"></span>');
                } else {
                    include "modal_form_payement_registre.php";
                }
            }
        }
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
  echo docu_modal_bloc($c, $a, 'registrePayments', array('c' => $c, 'a' => $a, 'id' => $id));
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