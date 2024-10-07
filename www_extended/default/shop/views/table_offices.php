<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>


<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">                   
            <th><?php _t("Pic"); ?></th>  
            <th><?php _t("#"); ?></th>  
            <th><?php _t("Id"); ?></th>  
            <th><?php _t("Office name"); ?></th>    
            <th><?php _t("Billing address"); ?></th>  
            <th><?php _t("Delivery address"); ?></th>  
            <th><?php _t("Users"); ?></th>  
            <th><?php _t("Actions"); ?></th>       

        </tr>
    </thead>
    <tfoot>
        <tr>                    
            <th><?php _t("Pic"); ?></th>  
            <th><?php _t("#"); ?></th>  
            <th><?php _t("Id"); ?></th>  
            <th><?php _t("Office name"); ?></th>    
            <th><?php _t("Billing address"); ?></th>  
            <th><?php _t("Delivery address"); ?></th>  
            <th><?php _t("Users"); ?></th>  
            <th><?php _t("Actions"); ?></th>       

        </tr>
    </tfoot>

    <tbody>
        <?php
        if (!$offices) {
            message('info', "Not data");
        }

        $i = 1;
        $addresses_delivery_array = array();
        foreach ($offices as $key => $office) {

            // lista de direcciones
            $addresses_delivery_array = addresses_delivery_search_by_contact_id($office['id']);

            if ($addresses_delivery_array) {
                // me cojo la primera
                $addresses_delivery_json = json_encode($addresses_delivery_array[0]);
            } else {
                // me cojo la primera
                $addresses_delivery_json = null;
            }



            // la direccio de facturacon
            $addresses_billing = addresses_billing_by_contact_id($office['id']);
            ?>                                  

            <tr>
                <td><?php echo contacts_picture($office["id"]); ?></td> 
                <td>
                    <?php echo "$i"; ?>
                </td>

                <?php
                /* <td>
                  <?php echo "$office[id]"; ?>
                  </td>

                  <td>
                  <?php echo "$office[owner_id]"; ?>
                  </td> */
                ?>



                <td>
                    <?php echo $office['id']; ?>
                </td> 
                <td>

                    <a href="index.php?c=shop&a=offices_details&id=<?php echo "$office[id]"; ?>">                        
                        <?php echo contacts_formated_name($office["name"]); ?>
                    </a>

                    <br>

                    <?php echo ($office['id'] == $office['owner_id']) ? _t("Headoffice") : ""; ?><br>
                    <?php
                    if ($office['tva']) {
                        echo _t("TVA") . " " . $office['tva'];
                    }
                    ?>


                </td> 



                <td>

                    <?php
                    //addresses_show_formated($addresses_billing);

                    addresses_show_formated(json_encode(addresses_billing_by_contact_id(offices_headoffice_of_office($office['id']))));
                    ?>



                </td> 


                <td>



                    <?php
                    addresses_show_formated($addresses_delivery_json);

                    echo "<br>";

                    echo ( count($addresses_delivery_array) > 1 ) ? '<a href="index.php?c=shop&a=adresses_by_office&id=' . $office['id'] . '" class="btn btn-primary" >' . _tr("See all") . '</a>' : " ";

                    //echo "$addresses_delivery[number], $addresses_delivery[address]  <br>";
                    //echo "$addresses_delivery[postcode] $addresses_delivery[barrio] <br>";
                    //echo "$addresses_delivery[city] -  $addresses_delivery[country] <br>";
                    ?>



                </td> 

                <td>
                    <?php
                    //vardump(employees_list_by_company($office['id']));

                    foreach (employees_list_by_office($office['id']) as $key => $ebc) {
                        ?>
                        <a href="index.php?c=shop&a=contacts_details&id=<?php echo $ebc['contact_id']; ?>">
                            <?php echo contacts_formated($ebc['contact_id']); ?>
                        </a>
                        <?php echo users_rol_according_contact_id($ebc['contact_id']) ?>
                        <br>  

                    <?php } ?>


                    <?php //////////////////////////////////////////////////////////  ?>



                    <?php
                    if (permissions_has_permission($u_rol, 'shop_users', "create")) {
                        include "modal_offices_users_add.php";
                    }
                    ?>





                </td>   






                <td>
                    <a href="index.php?c=shop&a=offices_details&id=<?php echo "$office[id]"; ?>" class="btn btn-primary btn-sm"><?php _t("Details"); ?></a>

                    <?php
                    if (permissions_has_permission($u_rol, 'shop_offices', "delessssste")) {
                        include "modal_offices_delete.php";
                    }
                    ?>

                </td>  



                <?php /*
                 *   
                  <td>
                 * <td><a href="index.php?c=shop&a=offices_details&id=<?php echo "$office[id]"; ?>"><?php echo contacts_formated_name($office["name"]); ?></a></td>                                  

                 * <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <?php _t("Actions"); ?>
                  <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <li><a href="index.php?c=shop&a=order_choose_date&contact_id=<?php echo "$office[id]"; ?>"><?php _t("New order"); ?></a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="index.php?c=shop&a=contacts_details&id=<?php echo "$office[id]"; ?>"><?php _t("Details"); ?></a></li>
                  <li><a href="index.php?c=shop&a=contacts_update&id=<?php echo "$office[id]"; ?>"><i class="fas fa-edit"></i> <?php _t("Edit"); ?></a></li>

                  </ul>
                  </div> */ ?>

                <?php
                /* <a href="index.php?c=shop&a=contacts_details&id=<?php echo "$office[id]"; ?>" class="btn btn-default btn-sm"><?php _t("Details"); ?></a>
                  <a href="index.php?c=shop&a=contacts_update&id=<?php echo "$office[id]"; ?>" class="btn btn-default btn-sm"><?php _t("Edit"); ?></a>

                 * 
                 * 
                 * 
                 * <a href="index.php?c=shop&a=order_choose_date&contact_id=<?php echo "$office[id]"; ?>" class="btn btn-primary btn-sm"><?php _t("New order"); ?></a>
                 * 
                 * 
                 * 
                 * </td>

                 */
                ?>



            </tr>
            <?php
            $i++;
        }
        ?>                                               
    </tbody>                                               
</table>

