

<table class="table table-striped" border>

    <tbody>
        <?php
        if (!$invoices) {
            message("info", "No items");
        }


        //foreach ($liste_info as $address) {
        $month_actual = null;
        $month = null;
        $total = false;
        $total_out = 0;
        $total_in = 0;
        $strike = false;

        foreach ($invoices as $bs) {

            $total = $total + $bs['total'];
            $total_out = $total_out + $bs['total'];

            $month_actual = magia_dates_get_month_from_date($bs['date_registre']);
            ?>
            <?php
            if ($month_actual != $month) {
                $month = $month_actual;
                ?>            
                <tr>
                    <td colspan="5"><b><?php echo _trc(magia_dates_month($month_actual)); ?></b></td>
                </tr>
            <?php } ?>  






            <tr>
                <td><?php echo $bs['date_registre']; ?></td>
                <td>
                    invoice <?php echo $bs['id']; ?><br>
                    <?php echo invoices_field_id('title', $bs['id']); ?>
                </td>
                <td></td>

                <td class="text-right"><?php echo moneda($bs['total']) ?></td>
                <td></td>
            </tr>


            <?php
            $strike = false;
        }
        ?>	

    </tbody>

    <tr>
        <td colspan="3"></td>
        <td class="text-right">(a) <?php echo moneda($total_out); ?></td>
        <td class="text-right">(b) <?php echo moneda($total_in); ?></td>        
    </tr>


    <tr>
        <td colspan="3" class="text-right">b - a </td>
        <?php
        $res = abs($total_in) - abs($total_out);
        ?>
        <td class="text-right"><?php echo (($res < 0 ) ? moneda($res) : ""); ?></td>
        <td class="text-right"><?php echo (($res >= 0 ) ? moneda($res) : ""); ?></td>            


    </tr>

</table>



