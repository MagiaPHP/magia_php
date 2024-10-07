C/Mes

<?php
vardump($expense->getDate_start());
vardump($expense->getDate_end());
$diff = magia_dates_day_between($expense->getDate_start(), $expense->getDate_end());

vardump($diff);
vardump((366 * 24 * 60 * 60));
?>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>date</th>
            <th>total</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        <?php for ($m = 1; $m <= 12; $m++) { ?>
            <tr>
                <td>1</td>
                <td><?php echo magia_dates_month_add($expense->getDate_start(), $m) ?><?php echo $m; ?></td>
                <td class="text-right"><?php echo moneda(121); ?></td>
                <td>Registred</td>
            </tr>
        <?php } ?>
    </tbody>

</table>