<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a name="registrePayments"></a>
            <?php _t("Registre payments"); ?>
        </h3>
    </div>
    <div class="panel-body">
        <?php
        if (!banks_list_by_contact_id($u_owner_id)) {
            Message("info", "Please add a bank account");
        } else {
            if ($expense->getStatus() == 0) {
                message('info', 'Change to registered status to make payments', '<span class="glyphicon glyphicon-lamp"></span>');
            } else {
                include "modal_payement_registre.php";
            }
        }
        ?>
    </div>
</div>

