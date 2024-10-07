<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>


<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info"> 
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Invoice"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Client"); ?></th>
            <th class="text-right"><?php _t("Total"); ?></th>
            <th class="text-right"><?php _t("Advance"); ?></th>
            <th class="text-right"><?php _t("Solde"); ?></th>
            <th><?php _t("Reminders"); ?></th>
            <th><?php _t("Status"); ?></th>                          
            <th><span class="glyphicon glyphicon-print"></span></th>                                                                                                                                          
        </tr>
    </thead>
    <tfoot>


    </tfoot>
    <tbody>
        <?php
        $month = null;
        $month_actual = null;
        $i = 1;

        $total_total = 0;
        $total_advance = 0;
        $del = false;

        foreach ($invoices as $invoice) {
            $r1 = ($invoice['r1']) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "";
            $r2 = ($invoice['r2']) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "";
            $r3 = ($invoice['r3']) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "";
            $type = ($invoice['type'] == "M" ) ? "M" : "";

            $class = ( $invoice['type'] == "M" ) ? "warning" : "";

            if ($invoice['status'] != -10 && $invoice['status'] != -20) {

                $total_total = $total_total + ($invoice['total'] + $invoice['tax']);
                $total_advance = $total_advance + $invoice['advance'];
            }


            if ($invoice['status'] == -10 || $invoice['status'] == -20) {

                $del = true;
            }

            // lista de budgets by invoices
            $budgets_by_invoice = budgets_invoices_list_budgets_by_invoice_id($invoice['id']);

            switch (count($budgets_by_invoice)) {

                case 0:
                    $from_budget = "";
                    break;

                case 1:
                    $from_budget = '<a href="index.php?c=budgets&a=details&id=' . $budgets_by_invoice[0]['id'] . '">' . $budgets_by_invoice[0]['id'] . '</a>';
                    break;

                default:
                    //$from_budget = "+1";
                    $from_budget = "+" . count($budgets_by_invoice);
                    break;
            }

            // si no hay fecha, cojemos la fecha de registro 
            $date = ($invoice['date']) ? $invoice['date'] : $invoice['date_registre'];

            $month_actual = magia_dates_get_month_from_date($date);
            ?>
            <?php
            if ($month_actual != $month) {
                $month = $month_actual;
                ?>            
                <tr>
                    <td colspan="14"><b>
                            <?php echo _tr(magia_dates_month($month_actual)); ?></b></td>
                </tr>
            <?php } ?>

            <tr class="<?php echo $class; ?>">  



                <td>
                    <?php echo ($invoice['id']); ?>
                </td>

                <td>
                    <?php echo invoices_numberf($invoice['id']); ?>
                </td>


                <td><?php echo "$invoice[date]"; ?></td>




                <td>

                    <?php
                    echo magia_make_link(
                            // enlace
                            "index.php?c=contacts&a=details&id=$invoice[client_id]",
                            // label
                            contacts_formated($invoice['client_id']),
                            // si array, ve si tiene permisos
                            array("rol" => $u_rol, "c" => 'contacts', "a" => "read"));
                    ?>





                    <p><?php // echo $invoice['title'];                 ?></p>
                </td>


                <td class="text-right">
                    <?php echo ($del) ? "<del>" : ""; ?>
                    <?php echo moneda($invoice['total'] + $invoice['tax']); ?>
                    <?php echo ($del) ? "</del>" : ""; ?>
                </td>


                <td class="text-right">
                    <?php echo ($del) ? "<del>" : ""; ?>
                    <?php echo moneda($invoice['advance']); ?>
                    <?php echo ($del) ? "</del>" : ""; ?>
                </td>


                <td class="text-right">
                    <?php echo ($del) ? "<del>" : ""; ?>
                    <?php echo moneda($invoice['total'] + $invoice['tax'] - $invoice['advance']); ?>
                    <?php echo ($del) ? "</del>" : ""; ?>
                </td>


                <td><?php echo "$r1 $r2 $r3"; ?></td>


                <td><?php echo _t(invoice_status_by_status($invoice['status'])); ?></td>


                <td>                     
                    <?php if ($invoice['status'] != 0) { ?>
                        <a 
                            class="btn btn-sm btn-primary" 
                            href="index.php?c=shop&a=invoices_export_pdf&id=<?php echo "$invoice[id]"; ?>&code=<?php echo "$invoice[code]"; ?>" target="_print"
                            <?php // echo (!invoices_can_be_edit($invoice["id"])) ? " disabled " : "";    ?>
                            >
                            <span class="glyphicon glyphicon-print"></span> <?php _t("Print"); ?>
                        </a>


                    <?php } ?>
                </td>





            </tr>
            <?php
            $del = false;
            $i++;
        }
        ?>


        <tr>   
            <?php
//            $class = "";
//            foreach ($_user_config_invoices_cols as $key => $col) {
//
////                switch ($key) {
////                    case 'total':
////                        echo '<th class="text-right">'.moneda($total_total).'</th>'; 
////                        break;
////                    case 'advance':
////                        echo '<th class="text-right">'.moneda($total_advance).'</th>'; 
////                        break;
////                    case 'solde':
////                        echo '<th class="text-right">'.moneda($total_total - $total_advance).'</th>'; 
////                        break;
////
////                    default:
////                        break;
////                }
//
//                if ($col['show']) {
//                    echo '<th></th>';
//                }
//            }
            ?>

            <?php
            /*            <?php if (permissions_has_permission($u_rol, "invoices", "update")) { ?><td><?php _t("Edit"); ?></td><?php } ?>                  
              <td><span class="glyphicon glyphicon-print"></span></td>
              <td><span class="glyphicon glyphicon-floppy-save"></span></td> */
            ?>  
        </tr>



    </tbody>
</table>

<p><?php echo _t("M = Monthly"); ?></p>
