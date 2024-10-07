<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;

    }
</style>



<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
}
?>




<table class="table table-striped table-condensed table-bordered">
    <thead>
        <tr class="info">
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Date_registre"); ?></th>
            <th><?php _t("Client"); ?></th>
            <th><?php _t("Invoice_id"); ?></th>
            <th><?php _t("Invoice_solde"); ?></th>
            <th><?php _t("Reminder"); ?></th>
            <th><?php _t("Reminder_percent"); ?></th>
            <th><?php _t("Invoice_to_add_id"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            foreach ($reminders_invoices as $rem_inv) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=reminders_invoices&a=details&id=' . $rem_inv["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=reminders_invoices&a=edit&id=' . $rem_inv["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=reminders_invoices&a=delete&id=' . $rem_inv["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $rem_inv["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $rem_inv["contact_id"]);
                echo "<tr id=\"$rem_inv[id]\">";
                echo "<td>$rem_inv[id]</td>";
                echo "<td>$rem_inv[date_registre]</td>";
                echo "<td>" . contacts_formated($rem_inv['client_id']) . "</td>";
                echo "<td>$rem_inv[invoice_id]</td>";
                echo "<td>$rem_inv[invoice_solde]</td>";
                echo "<td>$rem_inv[reminder]</td>";
                echo "<td>$rem_inv[reminder_percent]</td>";
                echo "<td>$rem_inv[invoice_to_add_id]</td>";
                echo "<td>$rem_inv[order_by]</td>";
                echo "<td>$rem_inv[status]</td>";

                echo "<td>$menu</td>";

                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Date_registre"); ?></th>
            <th><?php _t("Client"); ?></th>
            <th><?php _t("Invoice_id"); ?></th>
            <th><?php _t("Invoice_solde"); ?></th>
            <th><?php _t("Reminder"); ?></th>
            <th><?php _t("Reminder_percent"); ?></th>
            <th><?php _t("Invoice_to_add_id"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
</table>
