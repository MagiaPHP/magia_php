<?php echo contacts_field_id('tva', $u_owner_id); ?>

<table class="table table-striped">
    <thead>
        <tr class="info">
            <?php
            $checked_array = json_decode(_options_option("config_docs_exchange_show_col_from_table"), true);
            foreach (docs_exchange_db_col_list_from_table($c) as $th) {
                if (isset($checked_array[$th]) || !isset($checked_array)) {
                    echo "<th>" . _tr(ucfirst($th)) . "</th>";
                }
            }
            ?>
            <th><?php _t("Action"); ?></th>                                                      
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
            <?php
            //$checked_array = json_decode(_options_option("config_docs_exchange_show_col_from_table"), true);
            foreach (docs_exchange_db_col_list_from_table($c) as $th) {
                if (isset($checked_array[$th]) || !isset($checked_array)) {
                    echo "<th>" . _tr(ucfirst($th)) . "</th>";
                }
            }
            ?>
            <th><?php _t("Action"); ?></th>                                                      
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            if (!$docs_exchange) {
                message("info", "No items");
            }

            foreach ($docs_exchange as $docs_exchange) {
                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=docs_exchange&a=details&id=' . $docs_exchange["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=docs_exchange&a=edit&id=' . $docs_exchange["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=docs_exchange&a=delete&id=' . $docs_exchange["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                echo "<tr id=\"$docs_exchange[id]\">";
                //
                $checked_array = json_decode(_options_option("config_docs_exchange_show_col_from_table"), true);
                //
                foreach (docs_exchange_db_col_list_from_table($c) as $th) {
                    if (isset($checked_array[$th]) || !isset($checked_array)) {
                        //
                        echo "<td>$docs_exchange[$th]</td>";
                        //
                    }
                }

                echo "<td>$menu</td>";
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
</table>
<?php
$pagination->createHtml();
?>
