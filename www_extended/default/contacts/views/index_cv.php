<?php include view("home", "header"); ?>   

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include "izq.php"; ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-9">
        <?php
        include "nav.php";
        ?>        



        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>






        <div class="row">

            <?php foreach ($contacts_list as $contact) { ?>

                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="..." alt="...">
                        <div class="caption">
                            <h4><?php echo contacts_formated($contact['id']); ?></h4>
                            <p>...</p>
                            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Type"); ?></th>
                    <th><?php _t("Name"); ?></th>
                    <th><?php _t("Lastname"); ?></th>
                    <th><?php _t("Hearing center"); ?></th>
                    <th><?php _t("Birthday"); ?></th>                    
                    <th><i class="fas fa-map-marker"></i></th>                    
                    <th><?php _t("Rol"); ?></th>                    
                    <th><?php _t("Status"); ?></th>                                          
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$contacts_list) {
                        message('info', 'No items');
                    }


                    //foreach ($liste_info as $contact) {
                    foreach ($contacts_list as $contact) {

                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              ' . _tr("Action") . '
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=contacts&a=details&id=' . $contact['id'] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=contacts&a=edit&id=' . $contact['id'] . '">' . _tr("Edit") . '</a></li>
                            </ul>
                          </div>';

                        $has_login = (users_according_contact_id($contact['id'])) ? _tr("Yes") : "";
                        $rol = users_field_contact_id("rol", $contact['id']);
                        $has_delivery_address = (addresses_billing_by_contact_id($contact['id'])) ? "D" : "";
                        $has_billing_address = (addresses_delivery_by_contact_id($contact['id'])) ? "B" : "";
                        $lock = ( users_field_contact_id('status', $contact['id']) == 0 ) ? '<i class="fas fa-lock"></i>' : "";

                        echo "<tr>";
                        echo "<td>$contact[id]</td>";

                        echo "<td>" . _tr(contacts_type($contact['type'])) . "</td>";
                        //echo "<td>" . $contact['title'] . "</td>";
                        echo "<td>$contact[name]</td>";

                        echo "<td>" . strtoupper($contact['lastname']) . "</td>";
                        echo "<td>" . contacts_field_id("name", $contact['owner_id']) . "</td>";
                        echo "<td>$contact[birthdate]</td>";
                        echo "<td>$has_billing_address / $has_delivery_address</td>";
                        echo "<td>$lock " . _tr($rol) . "</td>";
                        echo "<td>$menu</td>";
                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Owner"); ?></th>
                    <th><?php _t("Type"); ?></th>

                    <th><?php _t("Name"); ?></th>
                    <th><?php _t("Lastname"); ?></th>
                    <th><?php _t("Birthday"); ?></th>                    
                    <th><?php _t("Rol"); ?></th>                    
                    <th><?php _t("Status"); ?></th>                                          
                </tr>
            </tfoot>
        </table>        

    </div>
</div>
<?php include view("home", "footer"); ?>  

