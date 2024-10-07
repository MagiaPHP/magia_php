
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Label"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            if (!$comments_folders) {
                message("info", "No items");
            }



            foreach ($comments_folders as $comments_folders) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=comments_folders&a=details&id=' . $comments_folders["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=comments_folders&a=edit&id=' . $comments_folders["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=comments_folders&a=delete&id=' . $comments_folders["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $comments_folders["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $comments_folders["contact_id"]);
                echo "<tr id=\"$comments_folders[id]\">";
                echo "<td>$comments_folders[id]</td>";
                echo "<td>$comments_folders[name]</td>";
                echo "<td>$comments_folders[label]</td>";
                echo "<td>$comments_folders[order_by]</td>";
                echo "<td>$comments_folders[status]</td>";

                echo "<td>$menu</td>";
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Label"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
</table>
