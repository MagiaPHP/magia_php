<form method="post" action="index.php">

    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="ok_change_delivery_address">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="form-group">
        <label for="contact"><?php _t("Company name"); ?></label>
        <input type="text" class="form-control" id="contact" placeholder="" disabled="" value="<?php echo contacts_formated($invoices['client_id']) ?>">
    </div>


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
                ?>

                <?php
                // lista de direcicones por oficina 
                //foreach (addresses_delivery_search_by_contact_id_status($office['id'], 1) as $key => $address) {
                foreach (addresses_delivery_list_by_contact_id($office['id'], 1) as $key => $address) {
                    ?>
                <div class="radio">
                    <label>
                        <input type="radio" name="new_adress_id" id="new_adress_id" value="<?php echo "$address[id]"; ?>" <?php // echo $checked ;                               ?> > 
                        <?php
                        echo "($address[name]) $address[number], $address[address]<br>"
                        . "$address[postcode] - $address[barrio] <br>"
                        . "$address[city] $address[country] ";
                        ?>
                    </label>
                </div>
            <?php } ?>

            <hr>

            <?php foreach (addresses_billing_list_by_contact_id($office['id']) as $key => $address) { ?>
                <div class="radio">
                    <label>
                        <input type="radio" name="new_adress_id" id="new_adress_id" value="<?php echo "$address[id]"; ?>" > 
                        <?php
                        echo "($address[name]) $address[number], $address[address]<br> "
                        . "$address[postcode] - $address[barrio]<br> "
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
    <?php
    /*
      -----------------------



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

      foreach (addresses_delivery_search_by_contact_id_status($office['id'], 1) as $key => $address) {
      ?>
      <div class="radio">
      <label>


      <input type="radio" name="new_adress_id" id="new_adress_id" value="<?php echo "$address[id]"; ?>" <?php // echo $checked ;         ?> >

      <?php
      echo "($address[name]) $address[number], $address[address] - "
      . "$address[postcode] - $address[barrio] "
      . "$address[city] $address[country]";
      ?>
      </label>
      </div>
      <?php
      }




      echo "</td>
      </tr>";
      }
      ?>
      </tbody>

      </table>
     */
    ?>


    <button type="submit" class="btn btn-default"><?php _t("Change"); ?></button>
</form>


