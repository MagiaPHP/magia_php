<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<script>
    function sellectAll(source) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
</script>


<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, 'table_index');
}
?>


<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">

            <th><?php _t("Id"); ?></th>
            <th><?php _t("Invoice"); ?></th>
            <th ><?php _t("Budget"); ?></th>
            <th ><?php _t("Credit note"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Client"); ?></th>
            <th class="text-right"><?php _t("Total"); ?></th>
            <th class="text-right"><?php _t("Advance"); ?></th>
            <th class="text-right"><?php _t("Solde"); ?></th>
            <th><span class="glyphicon glyphicon-thumbs-down"></span></th>
            <th><?php _t("Status"); ?></th>
            <th></th>
            <th></th>
            <th></th>

            <th></th>

        </tr>
    </thead>
    <tfoot>
        <tr class="info">

            <th><?php _t("Id"); ?></th>
            <th><?php _t("Invoice"); ?></th>
            <th ><?php _t("Budget"); ?></th>
            <th ><?php _t("Credit note"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Client"); ?></th>
            <th class="text-right"><?php _t("Total"); ?></th>
            <th class="text-right"><?php _t("Advance"); ?></th>
            <th class="text-right"><?php _t("Solde"); ?></th>
            <th><span class="glyphicon glyphicon-thumbs-down"></span></th>
            <th><?php _t("Status"); ?></th>
            <th></th>
            <th></th>

            <th></th>
            <th></th>

        </tr>
    </tfoot>

    <tbody>
        <?php
        if (!isset($invoices)) {
            message("info", "No items");
        } else {
            //foreach ($liste_info as $address) {
            $month = null;
            $month_actual = null;
            $i = 1;
            $total_total = 0;
            $total_advance = 0;
            $del = false;

            foreach ($invoices as $invoice) {

//                vardump($invoice);
                // pone al dia los numeros de factura
                //
                //
                // ingreso en el contador 
//                $year = magia_dates_get_year_from_date($invoice['date']); 
//                
//                invoices_counter_add(
//                        $invoice['id'], $year, invoices_counter_next_number($year), 1, 1
//                );
//                //
//                
//                vardump($invoice);

                $is_in_cloud = (docs_exchange_search_by_reciver_tva_doc_type_doc_id(contacts_field_id('tva', $u_owner_id), 'invoices', $invoice['id'])) ? true : false;
                // tiene comentarios?
                $has_comments = (comments_total_by_controller_id("invoices", $invoice['id'])) ? true : false;
                // Si hay
                // si activo los comments
                // si tengo permiso 
                $comment_icon = (
                        $has_comments &&
                        modules_field_module('status', 'comments') &&
                        permissions_has_permission($u_rol, "comments", "read")

                        ) ? "<span class='glyphicon glyphicon-comment'></span>" : "";
                //
                //

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
                    <tr  class='success'>
                        <td colspan="17">
                            <b>
                                <?php echo _tr(magia_dates_month($month_actual)); ?>
                            </b>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                <tr>  

                    <?php ### / SELECT ALL ########################################################    ?>                                                
                    <?php
                    /**
                     * 
                     *
                     *                     <td>
                      <div class="checkbox">
                      <label>
                      <input
                      name="invoices_id[]"
                      type="checkbox"
                      id="<?php echo $invoice['id']; // echo $order->getId();                            ?>"
                      value="<?php echo $invoice['id']; // echo $order->getId();                            ?>"
                      >
                      </label>
                      </div>
                      </td>
                     *  
                     */
                    ?>
                    <?php ### SELECT ALL #########################################################     ?> 

                    <td>
                        <a href="index.php?c=invoices&a=details&id=<?php echo ($invoice['id']); ?>">
                            <?php echo ($invoice['id']); ?>
                            <?php echo $comment_icon; ?>
                        </a>
                    </td>

                    <td class="<?php echo $class; ?>">
                        <a href="index.php?c=invoices&a=details&id=<?php echo ($invoice['id']); ?>">
                            <?php echo invoices_numberf($invoice['id']); ?>
                        </a>
                        <?php echo $type; ?>
                    </td>

                    <td><?php echo $from_budget; ?></td>

                    <td><?php echo "$invoice[credit_note_id]"; ?></td>

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
                        <p><?php echo $invoice['title']; ?></p>
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

                    <td class="">
                        <?php echo _t(invoice_status_by_status($invoice['status'])); ?>
                    </td>

                    <td>                     
                        <a class="btn btn-sm btn-primary" href="index.php?c=invoices&a=details&id=<?php echo "$invoice[id]"; ?>">
                            <span class="glyphicon glyphicon-file"></span> 
                            <?php //_t("Details"); ?>
                        </a>
                    </td>

                    <?php if (permissions_has_permission($u_rol, "invoices", "update")) { ?>
                        <td>                     
                            <a 
                                class="btn btn-sm btn-danger" 
                                href="index.php?c=invoices&a=edit&id=<?php echo "$invoice[id]"; ?>"
                                <?php echo (!invoices_can_be_edit($invoice["id"])) ? " disabled " : ""; ?>
                                >
                                <span class="glyphicon glyphicon-edit"></span> 
                                <?php //_t("Edit"); ?>
                            </a>
                        </td>
                    <?php } ?>

                    <td>
                        <?php
                        print_dropdown("index.php?c=invoices&a=export_pdf&id=$invoice[id]", invoices_field_id('client_id', $invoice['id']), false);
                        ?>
                    </td>

                    <td>
                        <?php
                        print_dropdown("index.php?c=invoices&a=export_pdf&way=pdf&&id=$invoice[id]", invoices_field_id('client_id', $invoice['id']), false, 'glyphicon glyphicon-floppy-save');
                        ?>

                    </td>

                    <?php
                    /**
                     * 
                      <td>
                      <?php echo ($is_in_cloud) ? '<a href="#"><span class="glyphicon glyphicon-cloud"></span></a>' : ""; ?>
                      </td>
                     */
                    ?>

                </tr>


                <?php
                $del = false;
                $i++;
            }
        }
        ?>

        <tr>
            <td colspan="7">
                <?php // echo $i;   ?>
            </td>
            <td class="text-right"><b><?php echo moneda($total_total); ?></b></td>
            <td class="text-right"><b><?php echo moneda($total_advance); ?></b></td>
            <td class="text-right"><b><?php echo moneda($total_total - $total_advance); ?></b></td>
            <td colspan="7"></td>
        </tr>



        <?php
        // <tr>   
//            $class = "";
//            foreach ($_user_config_invoices_cols as $key => $col) {
//
//                switch ($key) {
//                    case 'total':
//                        echo '<th class="text-right">'.moneda($total_total).'</th>'; 
//                        break;
//                    case 'advance':
//                        echo '<th class="text-right">'.moneda($total_advance).'</th>'; 
//                        break;
//                    case 'solde':
//                        echo '<th class="text-right">'.moneda($total_total - $total_advance).'</th>'; 
//                        break;
//
//                    default:
//                        break;
//                }
//
//                if ($col['show']) {
//                    echo '<th></th>';
//                }
//            }
        //        </tr>
        ?>



    </tbody>
</table>

<p>
    <?php
    /**
      echo _t("M = Monthly");
     */
    ?>
</p>
