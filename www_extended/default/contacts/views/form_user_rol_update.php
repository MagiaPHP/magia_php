 
<form method="post" action="index.php" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="rol_updateOk">
    <input type="hidden" name="contact_id" value="<?php echo $ubo['contact_id']; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="redi" value="2">



    <?php /*
      <div class="form-group">
      <label for="rol"><?php echo _t("ROL"); ?></label>

      <select name="rol" class="form-control">
      <?php
      foreach (rols_list() as $value) {

      // selecciono
      $selected = ($value['rol'] == users_field_contact_id('rol', $id)) ? " selected " : "";

      // muestro solo los rangos inferiores o iguales
      if ($value['rango'] <= rols_rango_by_rol($u_rol)) {

      echo "<option value=\"$value[rol]\"  $selected  >$value[rol]</option>";
      }
      }
      ?>
      </select>
      </div>
     */ ?>

    <div class="form-group">
        <label for="rol"><?php echo _t("ROL"); ?></label>
        <select name="rol" class="form-control">

            <?php
            // si no es empleado de web, solo puede tener el rol labo            
            // EMPRESAS EXTERNAS
            //
            if (contacts_field_id("owner_id", $ubo['contact_id']) != _options_option("default_id_company")) {

                ###########
                foreach (rols_list_order_by("rango") as $value) {
                    // selecciono
                    $selected = ($value['rol'] == users_field_contact_id('rol', $ubo['contact_id'])) ? " selected " : "";
                    // muestro solo los rangos inferiores o iguales
                    if ($value['rango'] <= $config_rango_max_for_labo) {
                        echo "<option value=\"$value[rol]\"  $selected  >$value[rol]</option>";
                    } else {
                        // echo "<option value=\"$value[rol]\"  $selected  disabled>$value[rol]</option>";
                    }
                }
                #########
            } else {
                ###########
                foreach (rols_list_order_by("rango") as $value) {
                    // selecciono
                    $selected = ($value['rol'] == users_field_contact_id('rol', $ubo['contact_id'])) ? " selected " : "";
                    // muestro solo los rangos inferiores o iguales
                    if ($value['rango'] <= rols_rango_by_rol($u_rol) && $value['rango'] > $config_rango_max_for_labo) {
                        echo "<option value=\"$value[rol]\"  $selected  >$value[rol]</option>";
                    } else {
                        //  echo "<option value=\"$value[rol]\"  $selected  disabled>$value[rol]</option>";
                    }
                }
                #########
            }
            ?>
        </select>

        <p></p>
        <?php
        /*
          echo (contacts_field_id("owner_id", $id) != _options_option("default_id_company")) ?
          message("info", "This contact is an employee of a client, that is why there is only one role.")
          :
          ""
          ;

         */
        ?>
    </div>















    <div class="form-group">
        <label for="password"></label>
        <button type="submit" class="btn btn-default"><?php _t("Change"); ?></button>
    </div>

</form>