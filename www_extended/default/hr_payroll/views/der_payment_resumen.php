<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Resumen"); ?>
    </div>
    <div class="panel-body">
        <table class="table table-responsive">
            <tbody>
                <tr>
                    <td><?php _t("Total to pay"); ?></td>
                    <td class="text-right"><?php echo moneda($hr_payroll->getTo_pay()); ?></td>
                </tr>

                <tr>
                    <td><?php _t("Already paid"); ?></td>
                    <td class="text-right"><?php echo moneda($hr_payroll->getTotalAlreadyPaid()); ?></td>
                </tr>

                <?php
                // Retrieve the payment status array
                $paymentStatus = $hr_payroll->getPaymentStatus();
                // Determine label class based on the code_error
                switch ($paymentStatus['code_error']) {
                    case -1:
                        $labelClass = 'label-danger'; // Overpayment
                        break;
                    case 0:
                        $labelClass = 'label-warning'; // Pending balance
                        break;
                    case 1:
                        $labelClass = 'label-success'; // Fully paid
                        break;
                    default:
                        $labelClass = 'label-default'; // Default label for unknown status
                }
                ?>

                <tr>
                    <td><?php echo $paymentStatus['message']; ?></td>
                    <td class="text-right">
                        <span class="label <?php echo $labelClass; ?>">
                            <?php echo moneda($paymentStatus['balance']); ?>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
