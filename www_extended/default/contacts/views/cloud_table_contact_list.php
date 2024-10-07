<?php
/**
 * 
  <?php if ( 11 == 22 && $txt && $contacts) { ?>
  <h3><span class="label label-warning">Search: <?php echo $txt; ?></span> <span class="label label-primary">New contact</span></h3>
  <?php } else { ?>
  <h3><span class="label label-warning">Search: <?php echo $txt; ?></span> <span class="label label-primary">New contact</span></h3>
  <?php } ?>
 */
?>

<h3><?php _t("List of found contacts"); ?></h3>

<table class="table table-condensed table-striped">
    <thead>
        <tr>
            <th><?php _t("Company"); ?></th>
            <th><?php _t("Vat"); ?></th>
            <th><?php _t("Address"); ?></th>
            <th><?php _t("Postcode"); ?></th>
            <th><?php _t("City"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </thead>
   <?php 
   /**
    *  <tfoot>
        <tr>
            <th><?php _t("Company"); ?></th>
            <th><?php _t("Vat"); ?></th>
            <th><?php _t("Address"); ?></th>
            <th><?php _t("Postcode"); ?></th>
            <th><?php _t("City"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </tfoot>
    */
   ?>
    <?php if ($contacts) { ?> 
        <tbody>
            <?php
            foreach ($contacts as $contact) {

                $address_by_contact = cloud_addresses_billing_by_contact_id($contact['id']);

//                $cloud_contact = cloud_contact_details_by_tva($contact['tva']);
//                $cloud_a = cloud_addresses_billing_by_contact_id($cloud_contact['id']);
//                if ($cloud_contact['id'] == $cloud_contact['owner_id'] && $cloud_contact['tva'] != '') {
//                
                // si es mi tva no loa muestro 
                if (
                // si es mi tva no lo muestro 
                        $contact['tva'] !== contacts_field_id('tva', $u_owner_id ||
                                // si ya esta en mis contactos
                                contacts_field_tva('id', $contact['tva'])
                        )) {

                    echo ' <tr>';
                    echo '<td>' . $contact["name"] . '</td>';
                    echo '<td>' . $contact["tva"] . '</td>';
                    echo '<td>' . $address_by_contact["number"] . ', ' . $address_by_contact["address"] . '</td>';
                    echo '<td>' . $address_by_contact["postcode"] . '</td>';
                    echo '<td>' . $address_by_contact["city"] . '</td>';
                    echo '<td><a href="index.php?c=contacts&a=details&id=' . $contact["id"] . '" class="btn btn-danger">' . _tr("Details") . ' <span class="glyphicon glyphicon-chevron-right"></span> </a></td>';
//                    echo '<td></td>';
//                    echo '<td></td>';
//                    echo '<td></td>';
//                    echo '<td></td>';
                    echo '<td>';
//                    include "cloud_modal_add_to_my_contacts.php";
                    echo '</td>';
                    echo '</tr>';
//                }
                }
            }
            ?>
        </tbody>
    <?php } else {
        ?>
        <tbody>
            <tr>
                <td colspan="6"><?php message("info", "No data found"); ?></td>
            </tr>
            <tr>
                <td colspan="6" class="text-right">
                </td>
            </tr>
        </tbody>
    <?php }
    ?>
</table>