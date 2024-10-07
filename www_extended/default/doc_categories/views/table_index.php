
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Category"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            if (!$doc_categories) {
                message("info", "No items");
            }



            foreach ($doc_categories as $doc_category) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=doc_categories&a=details&id=' . $doc_category["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=doc_categories&a=edit&id=' . $doc_category["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=doc_categories&a=delete&id=' . $doc_category["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $doc_category["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $doc_category["contact_id"]);
                echo "<tr id=\"$doc_category[id]\">";
                echo "<td>$doc_category[id]</td>";
                echo "<td>" . _tr($doc_category["category"]) . "</td>";
                echo "<td>$doc_category[order_by]</td>";
                echo "<td>$doc_category[status]</td>";

                echo "<td>$menu</td>";
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Category"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
</table>
