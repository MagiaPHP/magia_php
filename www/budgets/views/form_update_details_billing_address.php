    

<form method="post" action="index.php">

    <input type="hidden" name="c" value="budgets">
    <input type="hidden" name="a" value="ok_change_billing_address">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <?php
    /*    <div class="form-group">
      <label for="contact"><?php _t("Company name"); ?></label>
      <input type="text" class="form-control" id="contact" placeholder="" disabled="" value="<?php echo contacts_formated($budgets['client_id']) ?>">
      </div> */
    ?>



    <?php
    $headoffice_id = offices_headoffice_of_office($budgets['client_id']);
    ?>    




    <table class="table table-contents">
        <thead>
            <tr>                
                <th><?php _t("Office"); ?></th>
                <th><?php _t("Addresses"); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (offices_list_by_headoffice($headoffice_id) as $key => $office) {

                echo "<tr>                
                <td>$office[name]</td>
                    <td>";
                // lista de direcicones por oficina 
                ?>

                <?php foreach (addresses_billing_list_by_contact_id($office['id']) as $key => $address) { ?>
                <div class="radio">
                    <label>
                        <input type="radio" name="new_adress_id" id="new_adress_id" value="<?php echo "$address[id]"; ?>" > 
                        <?php
                        echo "($address[name]) $address[number], $address[address]<br> "
                        . "$address[postcode] - $address[barrio] <br>"
                        . "$address[city] $address[country]";
                        ?>
                    </label>
                </div>
            <?php } ?>


            <hR>


            <?php
            /**
             * Pongo tambien la lista de direcciones de entrega
             */
            foreach (addresses_delivery_list_by_contact_id($office['id']) as $key => $address) {
                ?>
                <div class="radio">
                    <label>
                        <input type="radio" name="new_adress_id" id="new_adress_id" value="<?php echo "$address[id]"; ?>" > 
                        <?php
                        echo "($address[name]) $address[number], $address[address] <br>"
                        . "$address[postcode] - $address[barrio] <br>"
                        . "$address[city] $address[country]";
                        ?>
                    </label>
                </div>
            <?php } ?>





            <?php
            echo "</td>
            </tr>";
        }
        ?>
        </tbody>

    </table>



    <button type="submit" class="btn btn-default"><?php _t("Change"); ?></button>
</form>

