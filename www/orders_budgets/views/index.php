<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("orders_budgets", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("orders_budgets", "nav"); ?>


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
                    <th><?php _t("Order_id"); ?></th>
                    <th><?php _t("Budget_id"); ?></th>
                    <th><?php _t("Date_registre"); ?></th>
                    <th><?php _t("Order_by"); ?></th>
                    <th><?php _t("Status"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$orders_budgets) {
                        message("info", "No items");
                    }


                    //foreach ($liste_info as $address) {
                    foreach ($orders_budgets as $orders_budgets) {


                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=orders_budgets&a=details&id=' . $orders_budgets["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=orders_budgets&a=edit&id=' . $orders_budgets["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=orders_budgets&a=delete&id=' . $orders_budgets["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $orders_budgets["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $orders_budgets["contact_id"]);
                        echo "<tr id=\"$orders_budgets[id]\">";
                        echo "<td>$orders_budgets[id]</td>";
                        echo "<td>$orders_budgets[order_id]</td>";
                        echo "<td>$orders_budgets[budget_id]</td>";
                        echo "<td>$orders_budgets[date_registre]</td>";
                        echo "<td>$orders_budgets[order_by]</td>";
                        echo "<td>$orders_budgets[status]</td>";

                        echo "<td>$menu</td>";

                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Order_id"); ?></th>
                    <th><?php _t("Budget_id"); ?></th>
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

