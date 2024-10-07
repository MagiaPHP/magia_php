
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Controller"); ?></th>
            <th><?php _t("Comments"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            if (!$docs_comments) {
                message("info", "No items");
            }

            foreach ($docs_comments as $docs_comment) {
                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=docs_comments&a=details&id=' . $docs_comment["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=docs_comments&a=edit&id=' . $docs_comment["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=docs_comments&a=delete&id=' . $docs_comment["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $docs_comment["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $docs_comment["contact_id"]);
                echo "<tr id=\"$docs_comment[id]\">";
                echo "<td>$docs_comment[id]</td>";
                echo "<td>" . _tr($docs_comment['controller']) . "</td>";
                echo "<td>$docs_comment[comments]</td>";
                echo "<td>$docs_comment[order_by]</td>";
                echo "<td>$docs_comment[status]</td>";

                echo "<td>$menu</td>";
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Controller"); ?></th>
            <th><?php _t("Comments"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
</table>
