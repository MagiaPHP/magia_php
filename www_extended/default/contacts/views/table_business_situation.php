<h3>BS</h3>
<table class="table table-striped" border>
    <thead>
        <tr>         
            <th></th>
            <th colspan="2" class="text-center"><?php _t("Doc"); ?></th>
            <th colspan="2" class="text-center"><?php _t("Movements"); ?></th>                           
        </tr>
        <tr>         
            <th><?php _t("Data"); ?></th>
            <th><?php _t("Out"); ?></th>
            <th><?php _t("In"); ?></th>
            <th class="text-right">(-) <?php //_t("Invoiced");                 ?></th>              
            <th class="text-right">(+) <?php // _t("Total collected");                 ?></th>              
        </tr>
    </thead>   
    <tbody>

        <?php
        if (!$business_situation) {
            message("info", "No items");
        }


        //foreach ($liste_info as $address) {
        $month_actual = null;
        $month = null;
        $total = false;
        $total_out = 0;
        $total_in = 0;
        $strike = false;

        foreach ($business_situation as $bs) {

            $total = $total + $bs['total'];

            if ($bs['doc'] == 'balance') {
                $total_in = $total_in + $bs['total'];
            }

            if ($bs['doc'] == 'invoice') {
                if ($bs['status'] != -10 && $bs['status'] != -20) { // si factura NO es anulada o cancelada
                    $total_out = $total_out + $bs['total'];
                } else {
                    $strike = true;
                }
            }





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

            <?php if ($bs['doc'] == "balance") { ?>


                <tr>
                    <td><?php echo $bs['date_registre']; ?></td>
                    <td></td>
                    <td>
                        <?php echo $bs['doc']; ?>: <?php echo $bs['id']; ?> <br>
                        <?php echo balance_field_id('description', $bs['id']); ?>

                    </td>
                    <td></td>

                    <td class="text-right"><?php echo ($bs['doc'] == "balance") ? moneda($bs['total']) : ""; ?></td>
                    <?php
                    /*  <td class="text-center"><form action="index.php" method="get">
                      <input type="hidden" name="c" value="balance">
                      <input type="hidden" name="a" value="details">
                      <input type="hidden" name="id" value="<?php echo $bs['id'] ?>">
                      <button type="submit" class="btn btn-default"><?php _t("Details"); ?></button>
                      </form> </td> */
                    ?>
                </tr>

            <?php } else { ?>
                <tr>
                    <td><?php echo $bs['date_registre']; ?></td>
                    <td>
                        <?php echo $bs['doc']; ?> : <?php echo $bs['id']; ?><br>
                        <?php echo invoices_field_id('title', $bs['id']); ?>
                    </td>
                    <td></td>

                    <td class="text-right"><?php echo moneda($bs['total']) ?></td>
                    <td></td>
                </tr>

            <?php } ?>





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



