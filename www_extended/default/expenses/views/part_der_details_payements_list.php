
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Payements List"); ?>
        </h3>
    </div>
    <div class="panel-body">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php _t("Date"); ?></th>
                    <th class="text-right"><?php _t('Total') ?></th>
                    <th class="text-right"><?php _t('Cancel code') ?></th>
                </tr>   
            </thead>
            <?php
            $i = 1;
            $total_total = 0;
            foreach (balance_list_by_expense($expense->getId()) as $key => $blbe) {
                $total = $blbe['total'] + $blbe['tax'];
                $total_total = $total_total + $total;

                $btn_cancel = (!$blbe['canceled_code']) ?
                        ' <a href="index.php?c=expenses&a=ok_payement_cancel&id=' . $blbe['id'] . '"><span class="glyphicon glyphicon-trash"></span></a> ' :
                        $blbe['canceled_code'];

                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . $blbe['date'] . '</td>';
                echo '<td class="text-right">' . moneda($total) . '</td>';
                echo '<td class="text-right">' . $btn_cancel . '</td>';
                echo '</tr>';
                $i++;
            }
            ?>
            <tr>
                <td></td>
                <td class="text-right"><?php _t('Total'); ?></td>
                <td class="text-right"><b><?php echo moneda($total_total); ?></b></td>
                <td></td>
            </tr>
        </table>




    </div>
</div>

