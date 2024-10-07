<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo _t("Date"); ?></th>
            <th  class="text-right"><?php echo _t("Value"); ?></th>
            <th  class="text-right"><?php echo _t("Irf"); ?></th>
            <th  class="text-right"><?php echo _t("Total"); ?></th>
            <th><?php echo _t("Payement Date"); ?></th>
        </tr>

        <?php
//        vardump($investments);

        $i = 1;
        foreach (investment_lines_search_by('investment_id', $investments->getId()) as $key => $line) {
            echo '<tr>';
            echo '<td>' . $i . '</td>';
            echo '<td>' . $line["date"] . '</td>';
            echo '<td  class="text-right">' . $line["value"] . '</td>';
            echo '<td  class="text-right">' . $line["irf"] . '</td>';
            echo '<td  class="text-right">' . moneda($line["value"] - $line["irf"]) . '</td>';
            echo '<td>' . $line["date_payment"] . '</td>';
            echo '</tr>';
        }
        ?>
        <tr>
            <td>*</td>
            <td></td>
            <td class="text-right"><?php echo moneda(); ?></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </thead>
</table>

<hr>
Generar propuesta
<hr>
<?php
//        vardump($investments);
//vardump($sec_entre_dos_fechas = magia_dates_day_between($investments->getDate_start(), "2024-01-25"));
//vardump($sec_entre_dos_fechas / (60 * 60 * 24));

$int_anual = (($investments->getAmount() * $investments->getRate()) / 100);
$int_diario = (($investments->getAmount() * $investments->getRate()) / 100) / 360;
$int_total_ganado = $int_diario * $investments->getDays();

vardump($n_days = magia_dates_day_between('12/26/2023', '01/25/2024') / (60 * 60 * 24));

vardump($n_days * $int_diario);

// 31 enero 21.58 / 0.72 
// 29 fe 31.99
// 31 mar 27.99
// 30 ab 29.99
// 31 mayo 32.99
// ------------------
// 25 marzo 04 > 6dias
// 24 habil abil  > 23 dias
// 29 dias 
//  
// 
//vardump(array(
//    '$int_anual' => $int_anual,
//    '$int_diario' => $int_diario,
//    '$int_total_ganado' => $int_total_ganado,
//    '$int_este_mes' => 0,
//));
?>

<p>by Year : <?php echo ($int_anual); ?></p>
<p>By day : <?php echo ($int_diario); ?></p>
<p>Total in  <?php echo $investments->getDays(); ?> days: <?php echo ($int_total_ganado); ?></p>


<table class="table table-striped" border>
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo _t("Date"); ?></th>
            <th  class="text-right"><?php echo _t("Value"); ?></th>
            <th  class="text-right"><?php echo _t("Irf"); ?></th>
            <th  class="text-right"><?php echo _t("Total"); ?></th>
        </tr>

        <?php
        $count = 1;
        $total_total = 0;
        $int_total_ganado = 0;
        $n_days = magia_dates_day_between($investments->getDate_start(), '2024-01-25') / (60 * 60 * 24);

        vardump($n_days);

        while ($i <= $investments->getDays()) {

            echo '<tr>';
            echo '<td>' . $count++ . '</td>';
            echo '<td>' . 0 . '</td>';
            echo '<td>' . 0 . '</td>';
            echo '<td class="text-right">' . moneda(0) . '</td>';
            echo '<td class="text-right">' . moneda($n_days / $int_diario) . ' ---- </td>';
            echo '<td class="text-right">' . moneda($investments->getRetention()) . '</td>';
            echo '<td class="text-right">' . moneda($investments->getRetention()) . '</td>';
            echo '</tr>';
            $i = $i + 1;
        }
        ?>
        <tr>
            <td>*</td>
            <td></td>
            <td class="text-right"><?php echo moneda(0); ?></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

    <form method="post" action="index">
        <input type="hidden" name="c" value="investment_lines"> 
        <input type="hidden" name="a" value="ok_add"> 
        <input type="hidden" name="investment_id" value="<?php echo $investments->getId(); ?>"> 
        <input type="hidden" name="redi" value="1"> 

        <?php echo vardump($investments->getId()); ?>

        <tr> 
            <td></td>
            <td><input class="form-control" type="date" name="date" value=""></td>
            <td><input class="form-control" type="text" name="value" value=""></td>
            <td><input class="form-control" type="text" name="irf" value=""></td>
            <td><input type="submit" name="sumit"></td>
        </tr>
    </form>

</thead>
</table>
