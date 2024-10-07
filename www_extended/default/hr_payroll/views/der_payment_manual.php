


<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Registre payment"); ?>
    </div>
    <div class="panel-body">
        <?php
        $arg = array(
            "client_id" => null,
            "document" => 'hr_payroll',
            "document_id" => $hr_payroll->getId(),
            "type" => '-1',
            "code" => null,
            "canceled" => null,
            "canceled_code" => null,
            "ce" => '',
            "redi" => array(
                'redi' => 5,
                'c' => "hr_payroll",
                'a' => "payment",
                'params' => "id=" . $hr_payroll->getId(),
            ),
        );

        include view('banks_transactions', 'form_add_small');
        ?>
    </div>
</div>

