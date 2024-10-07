<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-lg-9">
        <?php include "nav.php"; ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php
// https://api.jquery.com/prop/
        ?>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Addresses_id"); ?></th>
                    <th><?php _t("Transport_code"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$addresses_transport) {
                        message("info", "No items");
                    }


                    //foreach ($liste_info as $address) {
                    foreach ($addresses_transport as $addresses_transport) {


                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=addresses_transport&a=details&id=' . $addresses_transport["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=addresses_transport&a=edit&id=' . $addresses_transport["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=addresses_transport&a=delete&id=' . $addresses_transport["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $addresses_transport["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $addresses_transport["contact_id"]);
                        echo "<tr id=\"$addresses_transport[id]\">";
                        echo "<td>$addresses_transport[id]</td>";
                        echo "<td>$addresses_transport[addresses_id]</td>";
                        echo "<td>$addresses_transport[transport_code]</td>";

                        echo "<td>$menu</td>";

                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Addresses_id"); ?></th>
                    <th><?php _t("Transport_code"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </tfoot>
        </table>




        <?php
        /*
          Export:
          <a href="index.php?c=addresses&a=export_json">JSON</a>
          <a href="index.php?c=addresses&a=export_pdf">pdf</a>
         */
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

