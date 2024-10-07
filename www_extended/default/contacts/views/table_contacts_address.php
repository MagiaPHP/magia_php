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


<table class="table table-striped table-condensed">
    <thead>
        <tr>                 
            <th><?php //_t("Type");               ?></th>
            <th><?php _t("Number"); ?></th>                    
            <th><?php _t("Address"); ?></th>                    
            <th><?php _t("Postcode"); ?></th>
            <th><?php _t("Barrio"); ?></th>
            <th><?php _t("City"); ?></th>                    
            <th><?php _t("Country"); ?></th>
            <?php if (modules_field_module('status', 'transport')) { ?> <th><?php _t("Transport"); ?></th><?php } ?>
            <?php if (modules_field_module('status', 'transport')) { ?> <th><?php _t("Transport ref."); ?></th><?php } ?>
            <?php if (modules_field_module('status', 'audio')) { ?> <th><?php _t("Orders"); ?></th><?php } ?>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($addresses as $key => $addresses_list_by_contact_id) {

            $lock = ($addresses_list_by_contact_id['status'] == 0 ) ? '<span class="glyphicon glyphicon-lock"></span>' : "";
            $tr_lock = ($addresses_list_by_contact_id['status'] == 0 ) ? ' class="danger" ' : "";
            ?>                                       
            <tr <?php echo $tr_lock; ?>>                    
                <td><?php echo "$lock " . _tr($addresses_list_by_contact_id['name']); ?></td>
                <td><?php echo "$addresses_list_by_contact_id[number]"; ?></td>       
                <td><?php echo "$addresses_list_by_contact_id[address]"; ?></td>       
                <td><?php echo "$addresses_list_by_contact_id[postcode]"; ?></td>                   
                <td><?php echo "$addresses_list_by_contact_id[barrio]"; ?></td>                   
                <td><?php echo "$addresses_list_by_contact_id[city]"; ?></td>                                                                               
                <td><?php echo countries_country_by_country_code($addresses_list_by_contact_id['country']); ?></td> 

                <?php
                // Si el modulo transporte esta activado
                if (modules_field_module('status', 'transport')) {
                    ?>  

                    <td>
                        <?php
                        // si hay transporte edita
                        // sino
                        // agrega
                        if ($addresses_list_by_contact_id['transport_code']) {
                            include "modal_adresses_edit_transport.php";
                            //  echo "edit"; 
                        } else {
                            include "modal_adresses_add_transport.php";
                            //echo "add"; 
                        }
                        ?>
                        <?php echo $addresses_list_by_contact_id['transport_code'] ?>
                    </td> 

                    <td><?php
                        // si hay transporte edita la referencia
                        if ($addresses_list_by_contact_id['transport_code']) {
                            include "modal_adresses_edit_transport_ref.php";
                            //  echo "edit"; 
                        }
                        echo $addresses_list_by_contact_id['transport_ref']
                        ?></td> 



                <?php } ?>

                <?php
                // Si el modulo audio esta activado
                if (modules_field_module('status', 'audio')) {
                    ?> 
                    <td><?php //echo orders_list_by_office_id_status($company_id, $status);              ?></td> 
                <?php } ?>


                <td>
                    <?php
                    if (permissions_has_permission($u_rol, "addresses", "update")) {
                        include "modal_adresses_edit.php";
                    }
                    ?>
                </td>

                <td>

                    <?php
                    if ($addresses_list_by_contact_id['name'] !== "Billing") {
                        if (permissions_has_permission($u_rol, "addresses", "delete")) {
                            include "modal_adresses_delete.php";
                        }
                    }
                    ?>
                </td>
                <td>



                    <?php
                    if ($addresses_list_by_contact_id['name'] !== "Billing") {
                        if ($addresses_list_by_contact_id['status'] == 1) {
                            if (permissions_has_permission($u_rol, "addresses", "update")) {
                                include "modal_addresses_block.php";
                            }
                        } else {
                            if (permissions_has_permission($u_rol, "addresses", "update")) {
                                include "modal_addresses_unblock.php";
                            }
                        }
                    }
                    ?>
                </td>



            </tr>
            <?php
            $tr_lock = "";
        }
        ?>
    </tbody>


    <form class="form-horizontal" action ="index.php" method ="post" >
        <input type="hidden" name="c" value="addresses">
        <input type="hidden" name="a" value="ok_add">
        <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
        
        <input type="hidden" name="redi[redi]" value="5">
        <input type="hidden" name="redi[c]" value="contacts">
        <input type="hidden" name="redi[a]" value="addresses">
        <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">

        <tr>

            <td>
                <select  class="form-control" name="name">
                    <?php
                    foreach (addresses_name() as $addressName) {

                        $selected = ( isset($address['name']) && $addressName == $address['name'] ) ? " selected " : "";

//                        if ($addressName == "Billing" && !contacts_is_headoffice($id)) {
//
//                            echo '<option value="' . $addressName . '" ' . $selected . ' disabled>' . _tr($addressName) . ' (' . _tr('Only headoffice') . ')</option>';
//                        } else {
//                            echo '<option value="' . $addressName . '" ' . $selected . '>' . _tr($addressName) . '</option>';
//                        }


                        echo '<option value="' . $addressName . '" ' . $selected . '>' . _tr($addressName) . '</option>';

                        //
                        //
                        //
                        //
                        //
                        //
                    }
                    ?>
                </select>
            </td>

            <td>
                <input type="text"  name="number" class="form-control" id="number" placeholder="<?php _t("Number"); ?>" required="">
            </td>

            <td>
                <input type="text"  name="address" class="form-control" id="address" placeholder="<?php _t("Address"); ?>" required="">
            </td>

            <td>
                <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="<?php _t("Postal code"); ?>">
            </td>

            <td>
                <input type="text"  name="barrio" class="form-control" id="barrio" placeholder="<?php _t("Municipality"); ?>">
            </td>

            <td>
                <input type="text"  name="city" class="form-control" id="city" placeholder="<?php _t("City"); ?>">
            </td>



            <td>
                <select class="form-control" name="country">
                    <?php
                    foreach (countries_list() as $key => $value) {
                        $selected = (offices_country_headoffice($id) === $value['countryCode']) ? " selected " : "";
                        echo "<option value=\"$value[countryCode]\" $selected >" . (_tr($value['countryName'])) . "</option>";
                    }
                    ?>
                </select>
            </td>

            <td>
                <input class="btn btn-default" type ="submit" value ="<?php _t("Add"); ?>">
            </td>

            <td></td>
            <td></td>
        </tr>


    </form>


</table>

