
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Invoice_id"); ?></th>
            <th><?php _t("Year"); ?></th>
            <th><?php _t("Counter"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            if (!$invoices_counter) {
                message("info", "No items");
            }



            foreach ($invoices_counter as $invoices_counter) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=invoices_counter&a=details&id=' . $invoices_counter["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=invoices_counter&a=edit&id=' . $invoices_counter["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=invoices_counter&a=delete&id=' . $invoices_counter["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $invoices_counter["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $invoices_counter["contact_id"]);
                echo "<tr id=\"$invoices_counter[id]\">";
                echo "<td>$invoices_counter[invoice_id]</td>";
                echo "<td>$invoices_counter[year]</td>";
                echo "<td>$invoices_counter[counter]</td>";

                echo "<td>$menu</td>";
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th><?php _t("Invoice_id"); ?></th>
            <th><?php _t("Year"); ?></th>
            <th><?php _t("Counter"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
</table>
