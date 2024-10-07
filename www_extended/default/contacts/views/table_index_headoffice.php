<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>
<table class="table table-striped table-condensed">
    <thead>
        <tr class="info">
            <th></th>                                                                  
            <th><?php _t("Id"); ?></th>                                                                  
            <th><?php //_t("Title");    ?></th>
            <th><?php _t("Tva"); ?></th>
            <th><?php _t("Discounts"); ?></th>
            <th><?php _t("Company"); ?></th>
            <th><?php _t("Offices"); ?></th>
            <th><?php // _t("Company");    ?></th>                 
            <?php //<th><i class="glyphicon glyphicon-map-marker"></i></th>   ?>                  
            <?php // echo ( modules_field_module('status', 'audio')) ? "<th>" . _tr("Patient") . "</th>" : ""; ?>
            <?php echo (!modules_field_module('status', 'audio') && permissions_has_permission($u_rol, "budgets", "create")) ? "<th>" . _tr("Action") . "</th>" : ""; ?>                                                                                          
            <?php echo (!modules_field_module('status', 'audio') && permissions_has_permission($u_rol, "invoices", "create")) ? "<th>" . _tr("Action") . "</th>" : ""; ?>                                                                                          



        </tr>
    </thead>
    <tfoot>
        <tr>
            <th></th>                                                                  
            <th><?php _t("Id"); ?></th>                                                                  
            <th><?php //_t("Title");    ?></th>
            <th><?php _t("Tva"); ?></th>
            <th><?php _t("Discounts"); ?></th>
            <th><?php _t("Company"); ?></th>
            <th><?php _t("Offices"); ?></th>
            <th><?php // _t("Company");    ?></th>                 
            <?php //<th><i class="glyphicon glyphicon-map-marker"></i></th>   ?>                  
            <?php // echo ( modules_field_module('status', 'audio')) ? "<th>" . _tr("Patient") . "</th>" : ""; ?>
            <?php echo (!modules_field_module('status', 'audio') && permissions_has_permission($u_rol, "budgets", "create")) ? "<th>" . _tr("Action") . "</th>" : ""; ?>                                                                                          
            <?php echo (!modules_field_module('status', 'audio') && permissions_has_permission($u_rol, "invoices", "create")) ? "<th>" . _tr("Action") . "</th>" : ""; ?>                                                                                                                      
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            if (!$contacts) {
                message('info', 'No items');
            }

            $i = 1;

            $total_total = 0;
            $total_advance = 0;
            $del = false;

            foreach ($contacts_list as $contact) {


                $icon = ($contact['type'] == 1 ) ? '<span class="glyphicon glyphicon-home"></span>' : '<span class="glyphicon glyphicon-user"></span>';

                $is_patient = (patients_according_company_contact($contact['owner_id'], $contact['id'])) ? _tr("Yes") : "-";
                // $is_employee = (employees_by_company_contact($id, $contact['id'])) ? employees_by_company_contact($id, $contact['id'])[0]['cargo'] : "";
                // $is_employee = (employees_by_company_contact($contact['owner_id'], $contact['id'])) ? "Yes" : "-"; 
//                        $menu = '<div class="dropdown">
//                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
//                              ' . _tr("Action") . '
//                              <span class="caret"></span>
//                            </button>
//                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
//                              <li><a href="index.php?c=contacts&a=details&id=' . $contact['id'] . '">' . _tr("Details") . '</a></li>
//                              <li><a href="index.php?c=contacts&a=edit&id=' . $contact['id'] . '">' . _tr("Edit") . '</a></li>
//                            </ul>
//                          </div>';

                $menu = '<a class="btn btn-md  btn-primary" href="index.php?c=contacts&a=details&id=' . $contact['id'] . '">' . _tr("Details") . '</a>';

                $has_login = (users_according_contact_id($contact['id'])) ? true : false;

                $title = ( $contact['title'] ) ? _tr($contact['title']) : "";

                $rol = ( users_field_contact_id("rol", $contact['id']) != "" ) ? _tr(users_field_contact_id("rol", $contact['id'])) : "";

                $has_billing_address = (addresses_billing_by_contact_id($contact['id'])) ? "D" : "";

                $has_delivery_address = (addresses_delivery_by_contact_id($contact['id'])) ? "B" : "";

                $status = users_field_contact_id('status', $contact['id']);

                $icon_status = users_status_icon($status);

//                $lock = (
//                        users_field_contact_id('status' , $contact['id']) === '0'
//                        ) ? '<i class="fas fa-lock"></i>' : "" ;

                echo "<tr>";
                //   echo vardump($icon_status); 
                //echo "<td>$i</td>" ;
                echo "<td>";
                echo contacts_picture($contact['id'], 100);
                echo "</td>";

                echo "<td>$icon $contact[id]</td>";

                // echo "<td>" . _tr(contacts_type($contact['type'])) . "</td>";
                echo "<td>$title</td>";

                echo "<td>$contact[tva]</td>";
                echo '<td class="">';
                echo ($contact['discounts']) ? $contact['discounts'] . "%" : "";
                echo "</td>";

                echo "<td><a href=\"index.php?c=contacts&a=details&id=$contact[id]\">" . contacts_formated_name(contacts_field_id("name", $contact['id'])) . "</a></td>";
                echo "<td>";

                echo "<ul>";
                foreach (offices_list_by_headoffice($contact['id']) as $key => $office) {
                    echo "<li><a href=\"index.php?c=contacts&a=details&id=$office[id]\">" . contacts_formated_name(contacts_field_id("name", $office['id'])) . "</a></li>";
                }
                echo "</ul>";

                echo "</td>";
                // echo "<td><a href=\"index.php?c=contacts&a=details&id=$contact[owner_id]\">" . contacts_formated_name(contacts_field_id("name", $contact['owner_id'])) . "</a></td>";
                //    echo "<td>$contact[birthdate]</td>" ;
                //echo "<td>$has_billing_address / $has_delivery_address</td>";

                echo ( modules_field_module('status', 'audio')) ? "<td>$is_patient</td>" : "";
                //echo "<td>$is_employee</td>";                        
                //     echo "<td>$icon_status $rol</td>" ;
                //    echo "<td>" . calculaedad($contact['birthdate']) . "</td>" ;


                if (!modules_field_module('status', 'audio')) {

                    if (permissions_has_permission($u_rol, "budgets", "create")) {
                        echo '<td><a href="index.php?c=budgets&a=ok_add&budget_id=null&client_id=' . $contact['id'] . '" class="btn btn-default btn-md">' . _tr("New budget") . '</a></td>';
                    }

                    if (permissions_has_permission($u_rol, "invoices", "create")) {
                        echo '<td><a href="index.php?c=invoices&a=ok_add&budget_id=null&client_id=' . $contact['id'] . '" class="btn btn-default btn-md">' . _tr("New invoice") . '</a></td>';
                    }
                }

                //    echo "<td>$menu</td>";
                echo "</tr>";
                $icon_status = "";
                $i++;
            }
            ?>	
        </tr>
    </tbody>

</table>        
