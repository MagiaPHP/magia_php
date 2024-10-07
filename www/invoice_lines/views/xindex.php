<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("invoice_lines", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("invoice_lines", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php
// https://api.jquery.com/prop/
        ?>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Invoice_id"); ?></th>
                    <th><?php _t("Code"); ?></th>
                    <th><?php _t("Quantity"); ?></th>
                    <th><?php _t("Description"); ?></th>
                    <th><?php _t("Price"); ?></th>
                    <th><?php _t("Discounts"); ?></th>
                    <th><?php _t("Discounts_mode"); ?></th>
                    <th><?php _t("Tax"); ?></th>
                    <th><?php _t("Order_by"); ?></th>
                    <th><?php _t("Status"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$invoice_lines) {
                        message("info", "No items");
                    }


                    //foreach ($liste_info as $address) {
                    foreach ($invoice_lines as $invoice_lines) {


                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=invoice_lines&a=details&id=' . $invoice_lines["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=invoice_lines&a=edit&id=' . $invoice_lines["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=invoice_lines&a=delete&id=' . $invoice_lines["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $invoice_lines["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $invoice_lines["contact_id"]);
                        echo "<tr id=\"$invoice_lines[id]\">";
                        echo "<td>$invoice_lines[id]</td>";
                        echo "<td>$invoice_lines[invoice_id]</td>";
                        echo "<td>$invoice_lines[code]</td>";
                        echo "<td>$invoice_lines[quantity]</td>";
                        echo "<td>$invoice_lines[description]</td>";
                        echo "<td>$invoice_lines[price]</td>";
                        echo "<td>$invoice_lines[discounts]</td>";
                        echo "<td>$invoice_lines[discounts_mode]</td>";
                        echo "<td>$invoice_lines[tax]</td>";
                        echo "<td>$invoice_lines[order_by]</td>";
                        echo "<td>$invoice_lines[status]</td>";

                        echo "<td>$menu</td>";

                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Invoice_id"); ?></th>
                    <th><?php _t("Code"); ?></th>
                    <th><?php _t("Quantity"); ?></th>
                    <th><?php _t("Description"); ?></th>
                    <th><?php _t("Price"); ?></th>
                    <th><?php _t("Discounts"); ?></th>
                    <th><?php _t("Discounts_mode"); ?></th>
                    <th><?php _t("Tax"); ?></th>
                    <th><?php _t("Order_by"); ?></th>
                    <th><?php _t("Status"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </tfoot>
        </table>




        <?php
        /*
          Export:
          <a href="index.php?c=addresses&a=export_json">JSON</a>
          <a href="index.php?c=addresses&a=export_pdf">pdf</a>
         */
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

