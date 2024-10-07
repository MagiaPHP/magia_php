
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Order_id"); ?></th>
            <th><?php _t("Contact_id"); ?></th>
            <th><?php _t("Date_read"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            if (!$comments_read) {
                message("info", "No items");
            }



            foreach ($comments_read as $comments_read) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=comments_read&a=details&id=' . $comments_read["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=comments_read&a=edit&id=' . $comments_read["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=comments_read&a=delete&id=' . $comments_read["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $comments_read["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $comments_read["contact_id"]);
                echo "<tr id=\"$comments_read[id]\">";
                echo "<td>$comments_read[id]</td>";
                echo "<td>$comments_read[order_id]</td>";
                echo "<td>$comments_read[contact_id]</td>";
                echo "<td>$comments_read[date_read]</td>";
                echo "<td>$comments_read[order_by]</td>";
                echo "<td>$comments_read[status]</td>";

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
            <th><?php _t("Contact_id"); ?></th>
            <th><?php _t("Date_read"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
</table>
