
<table class="table table-striped" >
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Value"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>

    <tbody class="row_position">
        <?php
        if (!$tax) {
            message("info", "No items");
        }



        foreach ($tax as $tax) {

            $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              ' . _tr("Actions") . '
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=tax&a=details&id=' . $tax["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=tax&a=edit&id=' . $tax["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=tax&a=delete&id=' . $tax["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
            //   $photo = addresses_photos_principal($address["id"]);
            //   $contact_name = contacts_field_id("name", $tax["contact_id"]);
            //   $contact_lastname = contacts_field_id("lastname", $tax["contact_id"]);
            echo "<tr style=\"cursor: all-scroll\" id=\"$tax[id]\">";
            echo "<td>$tax[id]</td>";
            echo "<td>$tax[name]</td>";
            echo "<td>$tax[value]</td>";
            echo "<td>$tax[order_by]</td>";
            echo "<td>$tax[status]</td>";

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
            <th><?php _t("Value"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
</table>




