<table class="table table-striped table-bordered">
    <thead>
        <tr class="info">                    
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Description"); ?></th>
            <th class="text-right"><?php echo icon("plus"); ?> <?php _t("Recette"); ?></th>
            <th class="text-right"><?php echo icon("minus"); ?> <?php _t("Depenses"); ?></th>                        
            <th></th>                                                      
            <th></th>                                                      

        </tr>
    </thead>
    <tfoot>
        <tr class="info">                    
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Description"); ?></th>
            <th class="text-right"><?php echo icon("plus"); ?> <?php _t("Recette"); ?></th>
            <th class="text-right"><?php echo icon("minus"); ?> <?php _t("Depenses"); ?></th>                        
            <th></th>                                                      
            <th></th>                                                      

        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            if (!$pettycash) {
                message("info", "No items");
            }


            $sum_total_pos = 0;
            $sum_total_neg = 0;
            $saldo = 0;
            foreach ($pettycash as $pettycash_item) {

                $pcash = new Pettycash();
                $pcash->setPettycash($pettycash_item['id']);

                $saldo = $saldo + $pcash->getTotal();

                if ($pettycash_item['total'] < 0) {
                    $total_neg = monedaf($pcash->getTotal());
                    $total_pos = "";
                    $sum_total_neg = $sum_total_neg + $pcash->getTotal();
                }

                if ($pcash->getTotal() >= 0) {
                    $total_neg = '';
                    $total_pos = monedaf($pcash->getTotal());
                    $sum_total_pos = $sum_total_pos + $pcash->getTotal();
                }


                echo '<tr id="' . $pcash->getId() . '">';
                echo '<td>' . ($pcash->getId()) . '</td>';
                echo '<td>' . magia_dates_formated($pcash->getDate()) . '</td>';
                echo '<td>' . $pcash->getDescription() . '</td>';
                echo '<td class = "text-right">' . $total_pos . '</td>';
                echo '<td class = "text-right">' . $total_neg . '</td>';
                echo '<td class = "text-right">' . moneda($saldo) . '</td>';

                echo '<td>';
                include "modal_edit.php";
                include "modal_delete.php";
                echo '</td>';
                echo "</tr>";
            }
            ?>	
        </tr>

        <tr>

            <td></td>
            <td></td>
            <td></td>

            <td  class="text-right">(a) <?php echo moneda($sum_total_pos); ?></td>
            <td  class="text-right">(b) <?php echo moneda($sum_total_neg); ?></td>
            <td  class="text-right">a - b <?php echo moneda($sum_total_pos - abs($sum_total_neg)); ?></td>
            <td><?php //echo moneda(pettycash_sum_total_by_date(date('Y-m-d')));         ?></td>
        </tr>
    </tbody>

</table>




