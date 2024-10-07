
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Category_id"); ?></th>
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Body"); ?></th>
            <th><?php _t("Title_icon"); ?></th>
            <th><?php _t("Sumary"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            if (!$doc) {
                message("info", "No items");
            }



            foreach ($doc as $doc) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=doc&a=details&id=' . $doc["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=doc&a=edit&id=' . $doc["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=doc&a=delete&id=' . $doc["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $doc["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $doc["contact_id"]);
                echo "<tr id=\"$doc[id]\">";
                echo "<td>$doc[id]</td>";
                echo "<td>$doc[category_id]</td>";
                echo "<td>$doc[title]</td>";
                echo "<td>$doc[body]</td>";
                echo "<td>$doc[title_icon]</td>";
                echo "<td>$doc[sumary]</td>";
                echo "<td>$doc[order_by]</td>";
                echo "<td>$doc[status]</td>";

                echo "<td>$menu</td>";
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Category_id"); ?></th>
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Body"); ?></th>
            <th><?php _t("Title_icon"); ?></th>
            <th><?php _t("Sumary"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
</table>
