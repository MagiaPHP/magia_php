<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;

    }
</style>


<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
}
?>



<table class="table table-striped table-condensed table-bordered">
    <thead>
        <tr class="info">
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Hearing center"); ?></th>
            <th><?php _t("Tva"); ?></th>                           
            <th><?php _t("Action"); ?></th>                                          
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Hearing center"); ?></th>
            <th><?php _t("Tva"); ?></th>                           
            <th><?php _t("Action"); ?></th>                                          
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            foreach ($companies as $company) {

                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              ' . _tr("Action") . '
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=contacts&a=details&id=' . $company['contact_id'] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=contacts&a=edit&id=' . $company['contact_id'] . '">' . _tr("Edit") . '</a></li>
                            </ul>
                          </div>';

                $has_login = (users_according_contact_id($company['contact_id'])) ? "Yes" : "";

                echo "<tr>";
                echo "<td>$company[id]</td>";
                echo "<td>" . contacts_field_id("name", $company['contact_id']) . "</td>";
                echo "<td>$company[tva]</td>";
                /*
                  echo "<td>". contacts_field_id("name", $company['owner_id'])."</td>";
                  echo "<td>" . contacts_type($company['type']) . "</td>";
                  echo "<td>" . $company['title'] . "</td>";
                  echo "<td>$company[name]</td>";
                  echo "<td>" . strtoupper($company['lastname']) . "</td>";
                  echo "<td>$company[birthdate]</td>";
                  echo "<td>$has_login</td>";

                 */
                echo "<td>$menu</td>";
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
</table>





