<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("balance", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("balance", "nav"); ?>


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
                    <th><?php _t("Client_id"); ?></th>
                    <th><?php _t("Invoice_id"); ?></th>
                    <th><?php _t("Credit_note_id"); ?></th>
                    <th><?php _t("Type"); ?></th>
                    <th><?php _t("Account_number"); ?></th>
                    <th><?php _t("Sub_total"); ?></th>
                    <th><?php _t("Tax"); ?></th>
                    <th><?php _t("Total"); ?></th>
                    <th><?php _t("Ref"); ?></th>
                    <th><?php _t("Description"); ?></th>
                    <th><?php _t("Ce"); ?></th>
                    <th><?php _t("Date"); ?></th>
                    <th><?php _t("Date_registre"); ?></th>
                    <th><?php _t("Code"); ?></th>
                    <th><?php _t("Canceled"); ?></th>
                    <th><?php _t("Canceled_code"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$balance) {
                        message("info", "No items");
                    }


                    //foreach ($liste_info as $address) {
                    foreach ($balance as $balance) {


                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=balance&a=details&id=' . $balance["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=balance&a=edit&id=' . $balance["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=balance&a=delete&id=' . $balance["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $balance["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $balance["contact_id"]);
                        echo "<tr id=\"$balance[id]\">";
                        echo "<td>$balance[id]</td>";
                        echo "<td>$balance[client_id]</td>";
                        echo "<td>$balance[invoice_id]</td>";
                        echo "<td>$balance[credit_note_id]</td>";
                        echo "<td>$balance[type]</td>";
                        echo "<td>$balance[account_number]</td>";
                        echo "<td>$balance[sub_total]</td>";
                        echo "<td>$balance[tax]</td>";
                        echo "<td>$balance[total]</td>";
                        echo "<td>$balance[ref]</td>";
                        echo "<td>$balance[description]</td>";
                        echo "<td>$balance[ce]</td>";
                        echo "<td>$balance[date]</td>";
                        echo "<td>$balance[date_registre]</td>";
                        echo "<td>$balance[code]</td>";
                        echo "<td>$balance[canceled]</td>";
                        echo "<td>$balance[canceled_code]</td>";

                        echo "<td>$menu</td>";

                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Client_id"); ?></th>
                    <th><?php _t("Invoice_id"); ?></th>
                    <th><?php _t("Credit_note_id"); ?></th>
                    <th><?php _t("Type"); ?></th>
                    <th><?php _t("Account_number"); ?></th>
                    <th><?php _t("Sub_total"); ?></th>
                    <th><?php _t("Tax"); ?></th>
                    <th><?php _t("Total"); ?></th>
                    <th><?php _t("Ref"); ?></th>
                    <th><?php _t("Description"); ?></th>
                    <th><?php _t("Ce"); ?></th>
                    <th><?php _t("Date"); ?></th>
                    <th><?php _t("Date_registre"); ?></th>
                    <th><?php _t("Code"); ?></th>
                    <th><?php _t("Canceled"); ?></th>
                    <th><?php _t("Canceled_code"); ?></th>

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

