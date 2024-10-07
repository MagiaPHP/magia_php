<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;

    }
</style>



<?php
$contacts_index_cols_to_show = _options_option('contacts_index_cols_to_show');

$colsToShow = ($contacts_index_cols_to_show) ? json_decode($contacts_index_cols_to_show, true) : null;
?>

<table class="table table-striped table-condensed">
    <thead>
        <tr>
            <?php contacts_index_generate_column_headers($colsToShow); ?>
            <th><?php _t("Details"); ?></th>
        </tr>

    </thead>

    <?php
    /**
     *     <tfoot>
      <tr class="info">
      <?php contacts_index_generate_column_headers($colsToShow); ?>
      <th><?php _t("Details"); ?></th>
      </tr>
      </tfoot>
     */
    ?>

    <tbody>
        <tr>
            <?php
//            vardump(_options_option('contacts_index_cols_to_show')); 


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

                $contacts_array = (_options_option('contacts_index_cols_to_show')) ? json_decode(_options_option('contacts_index_cols_to_show'), true) : null;

                if ($contacts_array) {
                    foreach ($contacts_array as $key => $col_to_show_in_contact) {

                        foreach (directory_names_list() as $key => $dnl) {

                            if ($dnl['name'] == $col_to_show_in_contact) {
                                $contact[$col_to_show_in_contact] = directory_by_contact_name($contact['id'], $dnl['name']);
                            }
                        }

                        switch ($col_to_show_in_contact) {
                            case 'id':
                                echo '<td><a href="index.php?c=contacts&a=details&id=' . $contact[$col_to_show_in_contact] . '">' . $contact[$col_to_show_in_contact] . '</a></td>';
                                break;

                            case 'owner_id':
                                echo '<td><a href="index.php?c=contacts&a=details&id=' . $contact[$col_to_show_in_contact] . '">' . contacts_formated($contact[$col_to_show_in_contact]) . '</a></td>';
                                break;

                            case 'discounts':
                                $discounts = (isset($contact[$col_to_show_in_contact])) ? $contact[$col_to_show_in_contact] . '%' : '';
                                echo '<td>' . $discounts . '</td>';
                                break;

                            case 'language':
                                echo '<td>' . _tr(_languages_field_language('name', $contact[$col_to_show_in_contact])) . '</td>';
                                break;

                            //------------------------------------------------------
                            case 'Email':
                                echo '<td><a href="mailto:' . $contact[$col_to_show_in_contact] . '">' . ($contact[$col_to_show_in_contact]) . '</a></td>';
                                break;
                            case 'Web':
                            case 'Facebook':
                            case 'Twiter':
                                echo '<td><a target="_new" href="' . $contact[$col_to_show_in_contact] . '">' . ($contact[$col_to_show_in_contact]) . '</a></td>';
                                break;
                            case 'Tel':
                            case 'Tel2':
                            case 'Tel3':
                            case 'GSM':
                                echo '<td><a href="tel:' . $contact[$col_to_show_in_contact] . '">' . ($contact[$col_to_show_in_contact]) . '</a></td>';
                                break;

                            case 'nsame':
                                echo ($contact['owner_id'] !== $contact['id']) ? '<td><a href="index.php?c=contacts&a=details&id=' . $contact[$col_to_show_in_contact] . '">' . contacts_formated($contact[$col_to_show_in_contact]) . '</a></td>' : '<td></td>';
                                break;

                            // Botones ---------------------------------------------

                            default:
                                echo '<td>' . $contact[$col_to_show_in_contact] . '</td>';

                                break;
                        }
                    }
                }

                echo '<td><a class="btn btn-xs btn-primary" href="index.php?c=contacts&a=details&id=' . $contact['id'] . '">' . _tr("Details") . '</a></td>';

                echo "</tr>";
                $icon_status = "";
                $i++;
                $in_cloud = false;
            }
            ?>	


        </tr>
    </tbody>

</table>        


