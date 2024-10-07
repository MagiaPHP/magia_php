
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Doc_id"); ?></th>
            <th><?php _t("Language"); ?></th>
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Body"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            if (!$doc_translations) {
                message("info", "No items");
            }



            foreach ($doc_translations as $doc_translations) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=doc_translations&a=details&id=' . $doc_translations["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=doc_translations&a=edit&id=' . $doc_translations["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=doc_translations&a=delete&id=' . $doc_translations["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $doc_translations["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $doc_translations["contact_id"]);
                echo "<tr id=\"$doc_translations[id]\">";
                echo "<td>$doc_translations[id]</td>";
                echo "<td>$doc_translations[doc_id]</td>";
                echo "<td>$doc_translations[language]</td>";
                echo "<td>$doc_translations[title]</td>";
                echo "<td>$ doc_translations[body]</td>";
                echo "<td>$doc_translations[order_by]</td>";
                echo "<td>$doc_translations[status]</td>";

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
            <th><?php _t("Language"); ?></th>
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Body"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
</table>
