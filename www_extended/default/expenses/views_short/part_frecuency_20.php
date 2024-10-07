<?php
//vardump($expense->getDate_start());
//vardump($expense->getEvery());
//vardump($expense->getTimes());
?>

20
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th><?php _t('Date') ?></th>
            <th class="text-right"><?php _t('Total') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total = 0;
        $total_general = null;

        for ($i = 1; $i <= $expense->getTimes(); $i++) {
            $total = $expense->getTotal() + $expense->getTax();
            $total_general = $total_general + $total;

            switch ($expense->getEvery()) {
                case 'day':
                    $date_start = magia_dates_add_day($expense->getDate_start(), $i);
                    break;
                case 'month':
                    $date_start = magia_dates_add_month($expense->getDate_start(), $i);
                    break;
                case 'tri':
                    $date_start = magia_dates_add_month($expense->getDate_start(), ($i * 3));
                    break;
                case 'sem':
                    $date_start = magia_dates_add_month($expense->getDate_start(), $i * 3);
                    break;
                case 'year':
                    $date_start = magia_dates_add_month($expense->getDate_start(), $i * 12);
                    break;

                default:
                    break;
            }



            echo '<tr>';
            echo '<td>' . $i . '</td>';
            echo '<td>' . magia_dates_formated($date_start) . '</td>';
            echo '<td class="text-right">' . moneda($total) . '</td>';
            echo '</tr>';
        }
        ?>

        <tr>
            <td></td>
            <td></td>
            <td class="text-right"><?php echo moneda($total_general); ?></td>
        </tr>

    </tbody>
</table>