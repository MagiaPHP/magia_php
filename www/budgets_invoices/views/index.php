<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("budgets_invoices", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("budgets_invoices", "nav"); ?>


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
                    <th><?php _t("Budget_id"); ?></th>
                    <th><?php _t("Invoice_id"); ?></th>
                    <th><?php _t("Date_registre"); ?></th>
                    <th><?php _t("Order_by"); ?></th>
                    <th><?php _t("Status"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$budgets_invoices) {
                        message("info", "No items");
                    }


                    //foreach ($liste_info as $address) {
                    foreach ($budgets_invoices as $budgets_invoices) {


                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=budgets_invoices&a=details&id=' . $budgets_invoices["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=budgets_invoices&a=edit&id=' . $budgets_invoices["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=budgets_invoices&a=delete&id=' . $budgets_invoices["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $budgets_invoices["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $budgets_invoices["contact_id"]);
                        echo "<tr id=\"$budgets_invoices[id]\">";
                        echo "<td>$budgets_invoices[id]</td>";
                        echo "<td>$budgets_invoices[budget_id]</td>";
                        echo "<td>$budgets_invoices[invoice_id]</td>";
                        echo "<td>$budgets_invoices[date_registre]</td>";
                        echo "<td>$budgets_invoices[order_by]</td>";
                        echo "<td>$budgets_invoices[status]</td>";

                        echo "<td>$menu</td>";

                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Budget_id"); ?></th>
                    <th><?php _t("Invoice_id"); ?></th>
                    <th><?php _t("Date_registre"); ?></th>
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

