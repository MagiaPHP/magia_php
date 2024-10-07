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
                    <th><?php _t("Credit_note_id"); ?></th>
                    <th><?php _t("Quantity"); ?></th>
                    <th><?php _t("Description"); ?></th>
                    <th><?php _t("Value"); ?></th>
                    <th><?php _t("Tax"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$credit_note_lines) {
                        message("info", "No items");
                    }


                    //foreach ($liste_info as $address) {
                    foreach ($credit_note_lines as $credit_note_lines) {


                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=credit_note_lines&a=details&id=' . $credit_note_lines["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=credit_note_lines&a=edit&id=' . $credit_note_lines["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=credit_note_lines&a=delete&id=' . $credit_note_lines["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $credit_note_lines["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $credit_note_lines["contact_id"]);
                        echo "<tr id=\"$credit_note_lines[id]\">";
                        echo "<td>$credit_note_lines[id]</td>";
                        echo "<td>$credit_note_lines[credit_note_id]</td>";
                        echo "<td>$credit_note_lines[quantity]</td>";
                        echo "<td>$credit_note_lines[description]</td>";
                        echo "<td>$credit_note_lines[value]</td>";
                        echo "<td>$credit_note_lines[tax]</td>";

                        echo "<td>$menu</td>";

                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Credit_note_id"); ?></th>
                    <th><?php _t("Quantity"); ?></th>
                    <th><?php _t("Description"); ?></th>
                    <th><?php _t("Value"); ?></th>
                    <th><?php _t("Tax"); ?></th>

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

