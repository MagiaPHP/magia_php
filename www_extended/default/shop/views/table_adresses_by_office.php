<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Type"); ?></th>
            <th><?php _t("Office"); ?></th>
            <th><?php _t("Address"); ?></th>                    
            <th><?php _t("Postcode"); ?></th>
            <th><?php _t("Municipality"); ?></th>
            <th><?php _t("City"); ?></th>                    
            <th><?php _t("Country"); ?></th>
            <th><?php _t("Transport"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Type"); ?></th>
            <th><?php _t("Office"); ?></th>
            <th><?php _t("Address"); ?></th>                    
            <th><?php _t("Postcode"); ?></th>
            <th><?php _t("Municipality"); ?></th>
            <th><?php _t("City"); ?></th>                    
            <th><?php _t("Country"); ?></th>
            <th><?php _t("Transport"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        foreach ($adresses as $key => $address) {
            $menu = '<div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      ' . _tr("Action") . '
                      
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">                                            
                      <li><a href="index.php?c=shop&a=addressDetails&id=' . $address["id"] . '">' . _tr("Details") . '</a></li>
                      <li><a href="index.php?c=shop&a=addressUpdate&id=' . $address["id"] . '">' . _tr("Edit") . '</a></li>                            
                    </ul>
                  </div>';

            echo "<tr>                    
                    <td>$address[id]</td>
                    <td>$address[name]</td>
                    <td>" . contacts_field_id("name", $address["contact_id"]) . "</td>    
                    <td>$address[number], $address[address]</td>                                               
                    <td>$address[postcode]</td>                   
                    <td>$address[barrio]</td>                   
                    <td>$address[city]</td>                                                        
                    <td>" . countries_name($address['country']) . "</td>                                       
                    <td>" . transport_field_code('name', addresses_transport_search_by_addresses_id($address['id'])) . "</td>                                                            
                    <td>";

            if (permissions_has_permission($u_rol, "shop_addresses", "update")) {

                include "modal_addresses_edit.php";
            }

            if (strtolower($address['name']) !== "billing") {
// por el momento solo puede desactivar una direccion de entrega
// no borrarla
// Me hice muchos rollos para el control
// 
//                if (permissions_has_permission($u_rol, "shop_addresses", "delete")) {
//
//                    include "modal_addresses_delete.php";
//                }


                if ($address['status'] == 1) {
                    if (permissions_has_permission($u_rol, "shop_addresses", "update")) {

                        include "modal_addresses_block.php";
                    }
                } else {
                    if (permissions_has_permission($u_rol, "shop_addresses", "update")) {

                        include "modal_addresses_unblock.php";
                    }
                }
            }
            echo "</td>
                </tr>";
        }
        ?>

    </tbody>

</table>
