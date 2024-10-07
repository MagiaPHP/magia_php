<ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="#">Home</a></li>
    <li role="presentation"><a href="#">Profile</a></li>
    <li role="presentation"><a href="#">Messages</a></li>
</ul>


<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Payments list"); ?>
    </div>
    <div class="panel-body">
        <?php
        include view('banks_transactions', 'table_payments_list');
        ?>
    </div>
</div>




<?php
//vardump(array('$hr_payroll->getTo_pay()', $hr_payroll->getTo_pay()));
//
//vardump(array('$hr_payroll->getTotalAlreadyPaid()', $hr_payroll->getTotalAlreadyPaid()));
//
//vardump(array('$hr_payroll->getStatus()', ($hr_payroll->getStatus())));
// usar pago manual o pago con lineas bancarias?
// usar pago manual o pago con lineas bancarias?
// usar pago manual o pago con lineas bancarias?
// usar pago manual o pago con lineas bancarias?
//vardump(array('config_banks_registre', _options_option('config_banks_registre')));

if ($hr_payroll->getStatus() == $hr_payroll::STATUS_UNPAID) {

    if (_options_option('config_banks_registre')) {
        include "der_payment_bank_lines.php";
    } else {
        include "der_payment_manual.php";
    }
    //
    //
    //
    //
    //

    include "der_payment_resumen.php";
} else {
    include "der_payment_resumen.php";

    message('info', 'Payroll already paid');
}
?>





