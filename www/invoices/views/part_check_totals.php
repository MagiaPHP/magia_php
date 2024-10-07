<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>
<p>Ultima verificacion jiho invoices 649</p>
<p>En esta tabla se verifica qu los totales de las facturas sean iguales a los totales de las lineas de cada facura </p>

<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
            <th></th>
            <th></th>
            <th class="text-center" colspan="4"><?php _t("Invoices"); ?></th>
            <th class="text-center" colspan="4"><?php _t("lines"); ?></th>
        </tr>
        <tr class="info">
            <th><?php _t("#"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Number"); ?></th>
            <th class="text-right">A <br><?php _t("Total"); ?></th>
            <th class="text-right">B <br><?php _t("Tax"); ?></th>
            <th class="text-right">C=(A+B)<br><?php _t("Total"); ?> + <?php _t("Tax"); ?> (<?php _t("Invoices"); ?>)</th>
            <th class="text-center">D <br><?php _t("count lines"); ?></th>
            <th class="text-right">E <br><?php _t("Total"); ?> </th>
            <th class="text-right">F <br><?php _t("Tax"); ?> </th>
            <th class="text-right">G = (E+F)<br><?php _t("Total"); ?> + <?php _t("Tax"); ?> (<?php _t("lines"); ?>)</th>
            <th class="text-center">H <br><?php _t("Diff"); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach (invoices_list() as $key => $invoice) {
            $lines = invoice_lines_list_by_invoice_id($invoice['id']);
            $count_lines = count($lines);

            $f_total_a = invoices_field_id('total', $invoice["id"]);
            $f_tax_b = invoices_field_id('tax', $invoice["id"]);
            $f_c = ($f_total_a + $f_tax_b);

            $l_sub_total_e = invoice_lines_totalHTVA($invoice['id']);
            $l_lines_tax_f = invoice_lines_totalTVA($invoice['id']);
            $l_g = ($l_sub_total_e + $l_lines_tax_f);
            $l_h = ($f_c - $l_g);

//            $class_info = ($count_lines < 1 || $l_h > 0 ) ? ' style="background-color: yellow" ' : "";
            $class_info = ( (int) $l_h > 0 ) ? ' style="background-color: yellow" ' : "";
            $class_info_lines = ( $count_lines < 1 ) ? ' style="background-color: yellow" ' : "";
            $class_total_invoice = ( $f_c < 1 ) ? ' style="background-color: yellow" ' : "";

//            if ($count_lines) {
            echo '<tr>
            <td>' . $i . '</td>
            <td>' . $invoice["date"] . '</td>
            <td class="danger">' . $invoice["id"] . '</td>
            <td class=" text-right">' . moneda($f_total_a) . '</td>
            <td class=" text-right">' . moneda($f_tax_b) . '</td>
            <td class="danger text-right" ' . $class_total_invoice . '>' . moneda($f_c) . '</td>
            <td class="text-right"  ' . $class_info_lines . '>' . $count_lines . '</td>
            <td class="text-right">' . moneda($l_sub_total_e) . '</td>
            <td class="text-right">' . moneda($l_lines_tax_f) . '</td>
            <td class="text-right">' . moneda($l_g) . '</td>
            <td class="text-right" ' . $class_info . '>' . ((int) $l_h ) . '</td>

        </tr>';
            $i++;
            $class_info = null;
//            }
        }
        ?>
        <tr>
            <td class="text-right"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>    
</table>

<p>Lista completa</p>



