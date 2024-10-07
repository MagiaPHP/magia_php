

<form class="form-horizontal" action ="index.php" method ="post" id="add_company" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_add">

    <input type="hidden" name="redi[redi]" value="<?php echo (isset($arg['redi']) && $arg['redi']) ? $arg['redi'] : 1; ?>">
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg['c']) && $arg['c']) ? $arg['c'] : 'home'; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg['a']) && $arg['a']) ? $arg['a'] : 'index'; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo (isset($arg['params']) && $arg['params']) ? $arg['params'] : ''; ?>">



    <div class="form-group">
        <label class="control-label col-sm-2" for="office_id"><?php _t("Office"); ?></label>
        <div class="col-sm-8">    
            <select class="form-control" name="office_id" id="office_id" >
                <?php
                foreach (offices_list_by_headoffice($u_owner_id) as $key => $office) {
                    echo '<option value="' . $office['id'] . '">' . contacts_formated($office['id']) . '</option>';
                }
                ?>
            </select>
        </div>     
    </div>



    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Company"); ?></label>
        <div class="col-sm-8">    
            <input type="text"  
                   name="name" 
                   class="form-control" 
                   id="name" 
                   placeholder="<?php _t("Company ABC"); ?>" 
                   value="<?php echo (isset($company_cloud)) ? $company_cloud["name"] : null; ?>"
                   required="">
        </div>     
    </div>




    <div class="form-group">


        <label class="control-label col-sm-2" for="tva"></label>

        <div class="col-sm-2">                
            <select class="form-control selectpicker" name="prefix_vat" data-live-search="true" >
                <?php
                foreach (countries_list() as $key => $country) {

                    $selected_country = ($country['countryCode'] == 'BE') ? " selected " : "";

                    echo '<option value="' . $country['countryCode'] . '" ' . $selected_country . '>' . $country['countryCode'] . ' : ' . _tr($country['countryName']) . '</option>';
                }
                ?>             
            </select>
        </div>


        <div class="col-sm-5">    
            <input 
                type="text"  
                name="tva" 
                class="form-control" 
                id="tva" 
                placeholder="<?php _t("Company number"); ?>" 
                <?php //echo (isset($company_cloud)) ? $company_cloud["tva"] : null;   ?>
                <?php //echo ($company_cloud["tva"]) ? ' readonly="" ' : '';  ?>
                value="<?php echo isset($tva) ? $tva : null; ?>"
                readonly=""
                required=""
                >
        </div>

        <div class="col-sm-1">    
            <a class="btn btn-danger btn-sm" href="index.php?c=contacts&a=add"><?php _t("Changer"); ?></a>
        </div>

    </div>


    <?php
    /**
     *     <div class="form-group">

      <label class="control-label col-sm-2" for="name"><?php _t("Contact"); ?></label>
      <div class="col-sm-2">
      <select class="form-control" name="title">
      <?php
      foreach (contacts_titles_list() as $key => $ct) {
      $selected = ($ct['title'] == $company_cloud['_title']) ? " selected " : "";
      ?>
      <option value="<?php echo $ct['title']; ?>" <?php echo $selected; ?>><?php echo _tr($ct['title']); ?></option>
      <?php } ?>
      </select>
      </div>

      <div class="col-sm-3">
      <input type="text"
      name="name"
      class="form-control"
      id="name"
      placeholder="<?php _t("Name"); ?>"
      value="<?php echo (isset($company_cloud)) ? $company_cloud["c_name"] : null; ?>"
      required=""
      >
      </div>

      <div class="col-sm-3">
      <input
      type="text"
      name="lastname"
      class="form-control"
      id="lastname"
      placeholder="<?php _t("Lastname"); ?>"
      value="<?php echo (isset($company_cloud)) ? $company_cloud["lastname"] : null; ?>"

      required=""
      >
      </div>
      </div>

     */
    ?>

    <hr>


    <?php
    /*    <div class="form-group">
      <label class="control-label col-sm-2" for="addressName"><?php _t("Address") ; ?></label>
      <div class="col-sm-8">
      <select  class="form-control" name="addressName">
      <?php
      // siempre sera billiing en la sede
      foreach ( addresses_name() as $addressName ) {

      $selected = ($addressName == "Billing" ) ? " selected " : "" ;

      if( $addressName == "Billing" ){
      echo '<option value="' . $addressName . '" ' . $selected . '>' . $addressName . '</option>' ;
      }


      }
      ?>
      </select>
      </div>
      </div>
     */
    ?>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Billing Address"); ?></label>
        <div class="col-sm-2">    
            <input 
                type="text"  
                name="number" 
                class="form-control" 
                id="number" 
                placeholder="<?php _t("Number"); ?>" 
                >
        </div>


        <div class="col-sm-6">    
            <input type="text" 
                   name="address" 
                   class="form-control" 
                   id="address" 
                   placeholder="<?php _t("Address"); ?>">
        </div>
    </div>






    <div class="form-group">
        <label class="control-label col-sm-2" for="postcode"></label>
        <div class="col-sm-2">    
            <input type="text"  
                   name="postcode" 
                   class="form-control" 
                   id="postcode" 
                   placeholder="<?php _t("Postal code"); ?>">
        </div>

        <div class="col-sm-3">    
            <input type="text"  
                   name="barrio" 
                   class="form-control" 
                   id="barrio" 
                   placeholder="<?php _t("Municipality"); ?>">
        </div>

        <div class="col-sm-3">    
            <input 
                type="text"  
                name="city" 
                class="form-control" 
                id="city" 
                placeholder="<?php _t("City"); ?>">
        </div>
    </div>



    <div class="form-group">

        <label class="control-label col-sm-2" for="region"></label>
        <div class="col-sm-5">    
        </div>


        <div class="col-sm-8">    
            <select class="form-control" name="country">
                <?php
                foreach (countries_list() as $key => $country_item) {
                    $selected = ($country_item['countryCode'] == addresses_billing_by_contact_id($u_owner_id)['country']) ? " selected " : "";
                    echo "<option value=\"$country_item[countryCode]\" $selected >" . _tr($country_item['countryName']) . "</option>";
                }
                ?>
            </select>
        </div>
    </div>


    <?php if (permissions_has_permission($u_rol, "contacts", "create") && modules_field_module("status", "transport")) { ?> 

        <div class="form-group">
            <label class="control-label col-sm-2" for="transport_code"><?php _t('Transport'); ?></label>
            <div class="col-sm-3">    
                <select class="form-control" name="transport_code">
                    <?php foreach (transport_list() as $key => $transport) { ?>
                        <option value="<?php echo "$transport[code]" ?>">
                            <?php echo "$transport[name] - " . monedaf($transport['price']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>

    <?php } ?>

    <hr>










    <?php
    /*


      <div class="form-group">
      <label class="control-label col-sm-2" for="position"><?php _t("Position"); ?></label>
      <div class="col-sm-4">
      <input type="text"  name="position" class="form-control" id="contactName" placeholder="<?php _t("Position") ; ?>: <?php _t("Manager"); ?>, <?php _t("Secretary"); ?>, <?php _t("Employee"); ?>" value="Manager">
      </div>

      <div class="col-sm-4">
      <input type="text"  name="ref" class="form-control" id="ref" placeholder="<?php _t("Ref") ; ?>" value="Ref">
      </div>

      </div> */
    ?>



    <?php
    /**
     * 

     */
    ?>


    <?php if (modules_field_module('status', 'audio')) { ?>
        <div class="row form-group">
            <label class="control-label col-sm-2" for="rol"><?php _t("System"); ?></label>
            <div class="col-sm-3">    
                <select class="form-control" name="rol">
                    <?php
                    foreach (rols_list() as $key => $rol) {
                        if ($rol['rango'] == $config_rango_max_for_labo) {
                            ?>
                            <option <?php echo $rol['rol']; ?>><?php echo $rol['rol']; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="col-sm-5">    
                <input type="text" class="form-control" name="password" placeholder="<?php _t("Password"); ?>" value="">
            </div>
        </div>

    <?php } else { ?>



    <?php } ?>



    <?php /*
      <div class="form-group">
      <label class="control-label col-sm-2" for="email"></label>
      <div class="col-sm-2">
      <select class="form-control">
      <option><?php _t("Email"); ?></option>
      </select>

      </div>


      <div class="col-sm-6">
      <input type="text"  name="email" class="form-control" id="email" placeholder="" >
      </div>
      </div>
     */ ?>
















    <div class="form-group">
        <label class="control-label col-sm-2" for="email"><?php _t("Email"); ?></label>
        <div class="col-sm-8">

            <input 
                type="email" 
                name="email" 
                class="form-control" 
                id="email" 
                placeholder="<?php _t("info@email.com"); ?>"

                >
        </div>

        <span id="emailError" style="color: red; display: none;">
            <?php _t("The email is already registered"); ?>
        </span>


    </div>





    <script>
        $(document).ready(function () {

            // Verificar cuando el campo de email pierde el foco
            $('#email').on('blur', function () {

                var email = $('#email').val(); // Obtener el valor del email

                // Solo continuar si el campo de email no está vacío
                if (email !== '') {
                    // Enviar solicitud AJAX para verificar el email en la base de datos
                    $.ajax({
                        url: 'www_extended/default/contacts/controllers/check_email.php', // El archivo PHP en el servidor
                        method: 'POST', // Método de envío
                        data: {email: email}, // Los datos a enviar
                        dataType: 'json', // Esperar una respuesta JSON
                        success: function (response) {
                            if (response.status === 'exists') {
                                // Si el email ya existe, mostrar mensaje de error
                                $('#emailError').show();
                            } else {
                                // Si el email no existe, ocultar el mensaje de error
                                $('#emailError').hide();
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
                        }
                    });
                }
            });

            // Verificación final cuando se intenta enviar el formulario
            $('#add_company').on('submit', function (event) {
                // Si el mensaje de error está visible (correo existente), prevenir el envío del formulario
                if ($('#emailError').is(':visible')) {
                    event.preventDefault();
                    alert('<?php echo _tr("Please use a different email address. This one is already registered."); ?>');
                }
            });

        });
    </script>







    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">

        </div>      							
    </div>  






</form>

































