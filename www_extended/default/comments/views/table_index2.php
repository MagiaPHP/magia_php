
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Sender_id"); ?></th>
            <th><?php _t("Doc"); ?></th>
            <th><?php _t("Doc_id"); ?></th>
            <th><?php _t("Comment"); ?></th>
            <th><?php _t("contact_id"); ?></th>
            <th><?php _t("date_read"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            if (!$comments) {
                message("info", "No items");
            }



            foreach ($comments as $comment) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=comments&a=details&id=' . $comment["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=comments&a=edit&id=' . $comment["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=comments&a=delete&id=' . $comment["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $comment["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $comment["contact_id"]);
                echo "<tr id=\"$comment[id]\">";
                echo "<td>$comment[id]</td>";
                echo "<td>$comment[date]</td>";
                echo "<td>$comment[sender_id]</td>";
                echo "<td>$comment[doc]</td>";
                echo "<td>$comment[doc_id]</td>";
                echo "<td>$comment[comment]</td>";
                echo "<td>$comment[contact_id]</td>";
                echo "<td>$comment[date_read]</td>";
                echo "<td>$comment[order_by]</td>";
                echo "<td>$comment[status]</td>";

                echo "<td>$menu</td>";
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Sender_id"); ?></th>
            <th><?php _t("Doc"); ?></th>
            <th><?php _t("Doc_id"); ?></th>
            <th><?php _t("Comment"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
</table>
