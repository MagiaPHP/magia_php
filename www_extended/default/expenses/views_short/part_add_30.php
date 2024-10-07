<div class="panel panel-default">
    <div class="panel-body">
        <h3>
            <?php _t('Totals'); ?>
        </h3>


        Desde tal fecha hasta tal fecha hacer el total 



        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th class="text-right"><?php // _t('Totals');   ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php _t('Total HTVA'); ?></td>
                    <td class="text-right"><?php echo moneda($expense->getTotal()); ?></td>
                </tr>

                <tr>
                    <td><?php _t('Tva'); ?></td>
                    <td class="text-right"><?php echo moneda($expense->getTax()); ?></td>
                </tr>


                <tr>
                    <td><?php _t('Total TVAC'); ?></td>
                    <td class="text-right"><?php echo moneda($expense->getTotal() + $expense->getTax()); ?></td>
                </tr>



            </tbody>
        </table>



    </div>
</div>

