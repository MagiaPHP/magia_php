<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<div class="shadow-container">

    <table class="table table-striped table-condensed">




        <thead>
            <tr class="info">         
                <th><?php _t("Id"); ?></th>
                <th><?php _t("Dates"); ?></th>
                <th><?php _t("Ref"); ?></th>
                <th><?php _t("Description"); ?></th>
                <th><?php _t("ce"); ?></th>
                <th><?php _t("account_number"); ?></th>
                <th><?php _t("Type"); ?></th>
                <th><?php _t("Client"); ?></th>                                
                <th><?php _t("Expense"); ?></th>
                <th><?php _t("Invoice"); ?></th>
                <th><?php _t("Credit note"); ?></th>                                        
                <th class="text-right">(-) <?php _t("Total"); ?></th>              
                <th class="text-right">(+) <?php _t("Total"); ?></th>              
                <th><?php _t("Canceled code"); ?></th>
                <th><?php _t("Action"); ?></th>
            </tr>
        </thead>  
        <tfoot>
            <tr class="info">         
                <th><?php _t("Id"); ?></th>
                <th><?php _t("Dates"); ?></th>
                <th><?php _t("ref"); ?></th>
                <th><?php _t("Description"); ?></th>
                <th><?php _t("ce"); ?></th>
                <th><?php _t("account_number"); ?></th>
                <th><?php _t("Type"); ?></th>
                <th><?php _t("Client"); ?></th>                                
                <th><?php _t("Expense"); ?></th>
                <th><?php _t("Invoice"); ?></th>
                <th><?php _t("Credit note"); ?></th>                                        
                <th class="text-right">(-) <?php _t("Total"); ?></th>              
                <th class="text-right">(+) <?php _t("Total"); ?></th>              
                <th><?php _t("Canceled code"); ?></th>
                <th><?php _t("Action"); ?></th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            $month_actual = null;
            $month = null;
            $total_out = false;
            $total_in = false;

            foreach ($balance as $balance_items) {

                if ($balance_items['client_id']) {
                    $client_id = $balance_items['client_id'];
                } elseif ($balance_items['invoice_id']) {
                    $client_id = invoices_field_id("client_id", $balance_items['invoice_id']);
                }

                $tvac = $balance_items['sub_total'] + $balance_items['tax'];
                if ($tvac >= 0) {
                    // es positivo 
                    $total_in = $total_in + $tvac;
                } else {
                    // es negativo 
                    $total_out = $total_out + $tvac;
                }
                $month_actual = magia_dates_get_month_from_date($balance_items['date_registre']);

                $class = ($balance_items['canceled_code'] ) ? " danger " : "";
                ?>

                <?php
                //
                if ($month_actual != $month) {
                    $month = $month_actual;
                    ?>            
                    <tr  class='success '>
                        <td colspan="15"><b><?php echo _tr(magia_dates_month($month_actual)); ?></b></td>
                    </tr>
                <?php } ?> 
                <tr class="<?php echo $class; ?>">

                    <td><?php echo $balance_items['id']; ?></td>
                    <td>
                        <?php echo "$balance_items[date_registre]"; ?><br>
                    </td>
                    <td>
                        <?php echo $balance_items['ref']; ?>
                    </td>
                    <td>
                        <?php echo $balance_items['description']; ?>
                    </td>
                    <td>
                        <?php echo $balance_items['ce']; ?>
                    </td>
                    <td>
                        <?php echo $balance_items['account_number']; ?>
                    </td>
                    <td><?php echo balance_type($balance_items['type']); ?></td>
                    <td>
                        <a href="index.php?c=contacts&a=details&id=<?php echo $client_id; ?>">
                            <?php echo contacts_formated($client_id) ?>
                        </a>
                    </td>
                    <td>
                        <a href="index.php?c=expenses&a=details&id=<?php echo $balance_items['expense_id']; ?>">
                            <?php echo $balance_items['expense_id']; ?>
                        </a> 
                    </td>
                    <td class="text-right">
                        <a href="index.php?c=invoices&a=details&id=<?php echo $balance_items['invoice_id']; ?>">
                            <?php echo invoices_numberf($balance_items['invoice_id']); ?>
                        </a> 
                    </td>
                    <td>
                        <a href="index.php?c=credit_notes&a=details&id=<?php echo $balance_items['credit_note_id']; ?>">
                            <?php echo $balance_items['credit_note_id']; ?>
                        </a> 
                    </td>                                             
                    <td class="text-right">
                        <?php
                        if ($tvac < 0) {
                            echo moneda($tvac);
                        }

                        if ($tvac == 0) {
                            echo moneda($tvac);
                        }
                        ?>
                    </td>
                    <td class="text-right">
                        <?php
                        if ($tvac > 0) {
                            echo "" . moneda($tvac);
                        }

                        if ($tvac == 0) {
                            echo moneda($tvac);
                        }
                        ?>
                    </td>
                    <td class="text-center">
                        <a href="index.php?c=balance&a=search&w=cancelCode&txt=<?php echo $balance_items['canceled_code']; ?>">
                            <?php echo $balance_items['canceled_code']; ?>
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="index.php" method="get">
                            <input type="hidden" name="c" value="balance">
                            <input type="hidden" name="a" value="details">
                            <input type="hidden" name="id" value="<?php echo $balance_items['id'] ?>">
                            <button type="submit" class="btn btn-default btn-xs"><?php _t("Details"); ?></button>
                        </form>
                    </td>
                </tr>
            <?php } ?>	
        </tbody>

        <tr>
            <td colspan="11"></td>
            <td class="text-right"><?php echo moneda($total_out); ?></td>
            <td class="text-right"><?php echo moneda($total_in); ?></td>        
            <td colspan="2"></td>
        </tr>

        <tr>
            <td colspan="11"></td>
            <?php
            $res = abs($total_in) - abs($total_out);
            ?>
            <td class="text-right"><?php echo (($res < 0 ) ? moneda($res) : ""); ?></td>
            <td class="text-right"><?php echo (($res >= 0 ) ? moneda($res) : ""); ?></td>            
            <td colspan="2"></td>
        </tr>
    </table>

</div>

<br>
<br>

<?php
$pagination->createHtml();
?>


