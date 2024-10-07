
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Company_id"); ?></th>
            <th><?php _t("Company_ref"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>
            <th><?php _t("Birthday"); ?></th>
            <th><?php _t("Age"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Company_id"); ?></th>
            <th><?php _t("Company_ref"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>
            <th><?php _t("Birthday"); ?></th>
            <th><?php _t("Age"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </tfoot>

    <tbody>
        <tr>
            <?php
            if (!$patients) {
                message("info", "No items");
            }


            //foreach ($liste_info as $address) {
            foreach ($patients as $patients) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=patients&a=details&id=' . $patients["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=patients&a=edit&id=' . $patients["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=patients&a=delete&id=' . $patients["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $patients["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $patients["contact_id"]);
                echo "<tr id=\"$patients[id]\">";
                echo "<td>$patients[id]</td>";
                echo "<td>$patients[company_id]</td>";
                echo "<td>$patients[company_ref]</td>";
                echo "<td>" . contacts_formated_name($patients[contact_id]) . "</td>";
                echo "<td>" . contacts_formated_lastname($patients[contact_id]) . "</td>";
                echo "<td>$patients[date]</td>";
                echo "<td>$patients[order_by]</td>";
                echo "<td>$patients[status]</td>";

                echo "<td>$menu</td>";

                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>

</table>


