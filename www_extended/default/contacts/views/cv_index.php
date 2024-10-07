<table class="table table-striped">
    <thead>
        <tr>
            <th></th>                                                                  
            <th><?php _t("Id"); ?></th>                                                                  
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Company name"); ?></th>
            <th><?php _t("Lastname"); ?></th>
            <th><?php _t("Company"); ?></th>                 
            <?php //<th><i class="glyphicon glyphicon-map-marker"></i></th>   ?>                  
            <?php echo ( modules_field_module('status', 'audio')) ? "<th>" . _tr("Patient") . "</th>" : ""; ?>
            <?php echo (!modules_field_module('status', 'audio') && permissions_has_permission($u_rol, "budgets", "create")) ? "<th>" . _tr("Action") . "</th>" : ""; ?>                                                                                          
            <?php echo (!modules_field_module('status', 'audio') && permissions_has_permission($u_rol, "invoices", "create")) ? "<th>" . _tr("Action") . "</th>" : ""; ?>                                                                                          


            <th><?php _t("Details"); ?></th>                                          
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th></th>                                                            
            <th><?php _t("Id"); ?></th>                                                            
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Company name"); ?></th>
            <th><?php _t("Lastname"); ?></th>
            <th><?php _t("Company"); ?></th>

            <?php //<th><i class="glyphicon glyphicon-map-marker"></i></th>?>                   
            <?php echo ( modules_field_module('status', 'audio')) ? "<th>" . _tr("Patient") . "</th>" : ""; ?>                                                                                          
            <?php echo (!modules_field_module('status', 'audio') && permissions_has_permission($u_rol, "budgets", "create")) ? "<th>" . _tr("Action") . "</th>" : ""; ?>                                                                                          
            <?php echo (!modules_field_module('status', 'audio') && permissions_has_permission($u_rol, "invoices", "create")) ? "<th>" . _tr("Action") . "</th>" : ""; ?>                                                                                          


            <th><?php _t("Details"); ?></th>                                          
        </tr>
    </tfoot>
    <tbody>
        <tr>



    <div class="row">
        <?php foreach ($contacts as $contact) { ?> 
            <div class="col-sm-6 col-md-2">
                <div class="thumbnail">
                    <img src="https://picsum.photos/300/200" alt="...">
                    <div class="caption">
                        <h3><?php echo "$contact[name]"; ?></h3>
                        <h4>[company_name]</h4>
                        <p>[company_name]</p>
                        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>


    <?php
    if (!$contacts_list) {
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
        echo contacts_picture($contact['id'], 20);
        echo "</td>";
        echo "<td>$icon $contact[id]</td>";

        // echo "<td>" . _tr(contacts_type($contact['type'])) . "</td>";
        echo "<td>$title</td>";
        echo "<td>" . contacts_formated_name($contact['name']) . "</td>";
        echo "<td>" . contacts_formated_lastname($contact['lastname']) . "</td>";
        echo "<td><a href=\"index.php?c=contacts&a=details&id=$contact[owner_id]\">" . contacts_formated_name(contacts_field_id("name", $contact['owner_id'])) . "</a></td>";
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

        echo "<td>$menu</td>";
        echo "</tr>";
        $icon_status = "";
        $i++;
    }
    ?>	
</tr>
</tbody>

</table>        
