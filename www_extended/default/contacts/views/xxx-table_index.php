<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;

    }
</style>

<table class="table table-striped table-condensed table-bordered">
    <thead>
        <tr class="info">
            <th></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>
            <th><?php _t("Company"); ?></th>
            <th><?php _t("Tva"); ?></th>
            <th><span class="glyphicon glyphicon-map-marker"></span> <?php _t("Billing Address"); ?></th>
            <?php //<th><i class="glyphicon glyphicon-map-marker"></i></th>                      ?>
            <?php echo ( modules_field_module('status', 'audio')) ? "<th>" . _tr("Rol") . "</th>" : ""; ?>
            <?php echo ( modules_field_module('status', 'audio')) ? "<th>" . _tr("Patient") . "</th>" : ""; ?>
        </tr>

    </thead>

    <tfoot>
        <tr class="info">
            <th></th>                                                            
            <th><?php _t("Id"); ?></th>                                                            
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>
            <th><?php _t("Company"); ?></th>
            <th><?php _t("Tva"); ?></th>                  
            <th><span class="glyphicon glyphicon-map-marker"></span><?php _t("Billing Address"); ?></th>                  
            <?php //<th><i class="glyphicon glyphicon-map-marker"></i></th>                       ?>                   
            <?php echo ( modules_field_module('status', 'audio')) ? "<th>" . _tr("Rol") . "</th>" : ""; ?>                                                                                          
            <?php echo ( modules_field_module('status', 'audio')) ? "<th>" . _tr("Patient") . "</th>" : ""; ?>                                                                                          

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
            $in_cloud = false;
            foreach ($contacts as $contact) {

                $adresse = addresses_billing_by_contact_id($contact["owner_id"]);

                // verifica si esta tva esta ya registrado en la nuve 
                //
                // vardump($contact);
                //vardump(($contact['tva']));
                //vardump(cloud_company_details_by_tva($contact['tva']));
                //$in_cloud = ( cloud_company_details_by_tva(contacts_field_id('tva', $contact['owner_id']))) ? '<a href="#"><span class="glyphicon glyphicon-cloud"></span></a>' : "";
                //contacts_formated($id);
                $icon = ($contact['type'] == 1 ) ? '<span class="glyphicon glyphicon-home"></span>' : '<span class="glyphicon glyphicon-user"></span>';
                //$is_patient = (patients_according_company_contact($contact['owner_id'], $contact['id'])) ? _tr("Yes") : "-";
                // $is_employee = (employees_by_company_contact($id, $contact['id'])) ? employees_by_company_contact($id, $contact['id'])[0]['cargo'] : "";
                // $is_employee = (employees_by_company_contact($contact['owner_id'], $contact['id'])) ? "Yes" : "-"; 
//                        $menu = '<div class="dropdown">
//                            <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
//                              ' . _tr("Action") . '
//                              <span class="caret"></span>
//                            </button>
//                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
//                              <li><a href="index.php?c=contacts&a=details&id=' . $contact['id'] . '">' . _tr("Details") . '</a></li>
//                              <li><a href="index.php?c=contacts&a=edit&id=' . $contact['id'] . '">' . _tr("Edit") . '</a></li>
//                            </ul>
//                          </div>';

                $menu = '<a class="btn btn-sm  btn-primary" href="index.php?c=contacts&a=details&id=' . $contact['id'] . '">' . _tr("Details") . '</a>';

                $menu = "";

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
                echo "<td>";
                echo contacts_picture($contact['id'], 20);
                echo "</td>";
                echo "<td>$icon $contact[id]</td>";

                // echo "<td>" . _tr(contacts_type($contact['type'])) . "</td>";
                // echo "<td>$title</td>";
                // echo "<td>" . contacts_formated_lastname($contact['lastname']) . "</td>";
                // si es empresa
                // si es empresa
                // si es empresa
                // si es empresa
                if (contacts_field_id('tva', $contact['owner_id'])) {
                    echo "<td><a href='index.php?c=contacts&a=details&id=$contact[id]'> " . contacts_formated_name($contact['name']) . "</a></td>";
                    echo "<td><a href='index.php?c=contacts&a=details&id=$contact[id]'> " . contacts_formated_name($contact['lastname']) . "</a></td>";
                    echo "<td><a href=\"index.php?c=contacts&a=details&id=" . offices_headoffice_of_office($contact['owner_id']) . "\">" . contacts_formated_name(contacts_field_id("name", offices_headoffice_of_office($contact['owner_id']))) . "</a></td>";
                } else {
                    echo "<td><a href='index.php?c=contacts&a=details&id=$contact[owner_id]'> " . contacts_formated_name($contact['name']) . "</a></td>";
                    echo "<td><a href='index.php?c=contacts&a=details&id=$contact[owner_id]'> " . contacts_formated_name($contact['lastname']) . "</a></td>";
                    echo '<td></td>';
                }
//                echo "<td><a href=\"index.php?c=contacts&a=details&id=$contact[owner_id]\">" . contacts_formated_name(contacts_field_id("name", $contact['owner_id'])) . "</a></td>";
                echo "<td>" . contacts_field_id('tva', $contact['owner_id']) . "</td>";

                if ($adresse) {
                    echo '<td>' . $adresse['number'] . ', ' . $adresse['address'] . '<br>' . $adresse['postcode'] . ' - ' . $adresse['barrio'] . '<br>' . $adresse['city'] . ' - ' . countries_country_by_country_code($adresse['country']) . '</td>';
                } else {
                    echo '<td></td>';
                }




                echo ( modules_field_module('status', 'audio')) ? "<td>" . users_field_contact_id('rol', $contact['id']) . "</td>" : "";
                echo ( modules_field_module('status', 'audio')) ? "<td>$is_patient</td>" : "";
                //echo "<td>$is_employee</td>";                        
                //     echo "<td>$icon_status $rol</td>" ;
                //    echo "<td>" . calculaedad($contact['birthdate']) . "</td>" ;


                if (!modules_field_module('status', 'audio')) {
                    if (modules_field_module('status', 'accounting')) {

                        if (permissions_has_permission($u_rol, "budgets", "create")) {
//                            echo '<td><a href="index.php?c=budgets&a=ok_add&budget_id=null&client_id=' . $contact['id'] . '" class="btn btn-default btn-md">' . _tr("New budget") . '</a></td>';
                        }

                        if (permissions_has_permission($u_rol, "invoices", "create")) {
//                            echo '<td><a href="index.php?c=invoices&a=ok_add&budget_id=null&client_id=' . $contact['id'] . '" class="btn btn-default btn-md">' . _tr("New invoice") . '</a></td>';
                        }
                    }
                }

//                echo "<td>$in_cloud</td>";
                //    echo "<td>$menu</td>";
                echo "</tr>";
                $icon_status = "";
                $i++;
                $in_cloud = false;
            }
            ?>	
        </tr>
    </tbody>

</table>        
