
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Comment_id"); ?></th>
            <th><?php _t("File"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            if (!$comments_files) {
                message("info", "No items");
            }



            foreach ($comments_files as $comments_files) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=comments_files&a=details&id=' . $comments_files["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=comments_files&a=edit&id=' . $comments_files["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=comments_files&a=delete&id=' . $comments_files["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $comments_files["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $comments_files["contact_id"]);
                echo "<tr id=\"$comments_files[id]\">";
                echo "<td>$comments_files[id]</td>";
                echo "<td>$comments_files[comment_id]</td>";
                echo "<td>$comments_files[file]</td>";
                echo "<td>$comments_files[order_by]</td>";
                echo "<td>$comments_files[status]</td>";

                echo "<td>$menu</td>";
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Comment_id"); ?></th>
            <th><?php _t("File"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
</table>
