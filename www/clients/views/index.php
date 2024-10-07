<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("clients", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("clients", "nav"); ?>


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
                    <th><?php _t("Contact_id"); ?></th>
                    <th><?php _t("Date"); ?></th>
                    <th><?php _t("Discount"); ?></th>
                    <th><?php _t("Order_by"); ?></th>
                    <th><?php _t("Status"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$clients) {
                        message("info", "No items");
                    }


                    //foreach ($liste_info as $address) {
                    foreach ($clients as $clients) {


                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=clients&a=details&id=' . $clients["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=clients&a=edit&id=' . $clients["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=clients&a=delete&id=' . $clients["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $clients["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $clients["contact_id"]);
                        echo "<tr id=\"$clients[id]\">";
                        echo "<td>$clients[id]</td>";
                        echo "<td>$clients[contact_id]</td>";
                        echo "<td>$clients[date]</td>";
                        echo "<td>$clients[discount]</td>";
                        echo "<td>$clients[order_by]</td>";
                        echo "<td>$clients[status]</td>";

                        echo "<td>$menu</td>";

                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Contact_id"); ?></th>
                    <th><?php _t("Date"); ?></th>
                    <th><?php _t("Discount"); ?></th>
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

