
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Doc_id"); ?></th>
            <th><?php _t("Folder"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            if (!$comment_folder) {
                message("info", "No items");
            }



            foreach ($comment_folder as $comment_folder) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=comment_folder&a=details&id=' . $comment_folder["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=comment_folder&a=edit&id=' . $comment_folder["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=comment_folder&a=delete&id=' . $comment_folder["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $comment_folder["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $comment_folder["contact_id"]);
                echo "<tr id=\"$comment_folder[id]\">";
                echo "<td>$comment_folder[id]</td>";
                echo "<td>$comment_folder[doc_id]</td>";
                echo "<td>$comment_folder[folder]</td>";
                echo "<td>$comment_folder[order_by]</td>";
                echo "<td>$comment_folder[status]</td>";

                echo "<td>$menu</td>";
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Doc_id"); ?></th>
            <th><?php _t("Folder"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
</table>
