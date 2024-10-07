<form method="post" action="index.php" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_add_user_to_system">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">



    <?php
    /*    <div class="form-group">
      <label for="password"><?php echo _t("Password"); ?></label>
      <input type="text" name="password" class="form-control" id="" placeholder="">
      </div>
     */
    ?>

    <div class="form-group">
        <label for="login"><?php echo _t("Login"); ?></label>
        <input 
            type="email" 
            name="login" 
            class="form-control" 
            id="login" 
            placeholder="email@email.com" 
            value="<?php echo directory_list_by_contact_name($id, "email") ?>"
            readonly=""


            >
    </div>


    <div class="form-group">
        <label for=""><?php echo _t("Password"); ?></label>
        <input 
            type="text" 
            name="password" 
            class="form-control" 
            id="password" 
            placeholder="password" 
            value="<?php echo passwordRandom(); ?>"

            >
    </div>





    <div class="form-group">
        <label for="rol"><?php echo _t("What role for this user"); ?></label>
        <?php
        // vardump(_options_option("default_id_company")); 
        // vardump(contacts_field_id("owner_id", $id)); 
        // vardump(rols_list()); 
        ?>
        <select name="rol" class="form-control">

            <?php
            // si no es empleado de audio, solo puede tener el rol labo 



            if (contacts_field_id("owner_id", $id) != _options_option("default_id_company")) {
                //  if(11 == 22){
                // no empleados
                //

                foreach (rols_list() as $key => $value) {
                    if ($value["rango"] <= $config_rango_max_for_labo) {   // config_localhost.php                                          
                        echo '<option value="' . $value['rol'] . '">' . $value['rol'] . '</option>';
                    }
                }
            } else {
                ###########
                foreach (rols_list() as $value) {
                    // selecciono
                    $selected = ($value['rol'] == users_field_contact_id('rol', $id)) ? " selected " : "";
                    // muestro solo los rangos inferiores o iguales
                    if (
                            $value['rango'] <= rols_rango_by_rol($u_rol) &&
                            $value['rango'] > $config_rango_max_for_labo
                    ) {
                        echo "<option value=\"$value[rol]\"  $selected  >$value[rol]</option>";
                    } else {
                        echo "<option value=\"$value[rol]\"  $selected  disabled>$value[rol]</option>";
                    }
                }
                #########
            }
            ?>
        </select>

        <p></p>
        <?php
        echo (contacts_field_id("owner_id", $id) != _options_option("default_id_company")) ?
                message("info", "This contact is an employee of a client, that s why he has these roles.") :
                ""
        ;
        ?>
    </div>



    <div class="form-group">
        <label for="password"></label>
        <button type="submit" class="btn btn-default"><?php _t("Save"); ?></button>
    </div>




</form>

<ul>
    <?php
    $error = passwordIsGood("");
    if ($error) {
        foreach ($error as $key => $value) {
            echo "<li>$value</li>";
        }
    }
    ?>
</ul>





