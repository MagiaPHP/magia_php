

<form class="form-horizontal" action ="index.php" method ="post" id="add_company" >
    
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_add">
    
    <input type="hidden" name="type" value="1">
    <input type="hidden" name="is_headoffice" value="1">

    <input type="hidden" name="owner_id" value="<?php echo (isset($arg['owner_id']) && $arg['owner_id']) ? $arg['owner_id'] : null; ?>">


    <input type="hidden" name="redi[redi]" value="<?php echo (isset($arg['redi']) && $arg['redi']) ? $arg['redi'] : 1; ?>">
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg['c']) && $arg['c']) ? $arg['c'] : 'home'; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg['a']) && $arg['a']) ? $arg['a'] : 'index'; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo (isset($arg['params']) && $arg['params']) ? $arg['params'] : ''; ?>">





    <div class="form-group">
        <label class="control-label col-sm-3" for="office_id"><?php _t("Office"); ?></label>
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
        <label class="control-label col-sm-3" for="name"><?php _t("Company"); ?></label>
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


        <label class="control-label col-sm-3" for="tva"></label>

        <div class="col-sm-3">                
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




    <div class="form-group">
        <label class="control-label col-sm-3" for=""><?php _t("Billing Address"); ?></label>
        <div class="col-sm-3">    
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
        <label class="control-label col-sm-3" for="postcode"></label>
        <div class="col-sm-3">    
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

        <label class="control-label col-sm-3" for="region"></label>
        <div class="col-sm-5">    
        </div>


        <div class="col-sm-9">    
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
            <label class="control-label col-sm-3" for="transport_code"><?php _t('Transport'); ?></label>
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
    ############################################################################
    ############################################################################
    ############################################################################
    ############################################################################
    ?>


    <div id="directory-items">
        <div class="form-group directory-item">
            <label class="control-label col-sm-3" for=""><?php _t("Directory Name"); ?></label>
            <div class="col-sm-3"> 
                <select class="form-control directory-select" name="directory[0][name]" id="directory[0][name]">
                    <option value="null"><?php _t('Select one'); ?></option>
                    <?php
                    foreach (directory_names_list() as $key => $directory) {
                        echo '<option value="' . $directory['name'] . '">' . _tr($directory['name']) . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <input 
                    type="text" 
                    class="form-control" 
                    name="directory[0][data]" 
                    id="directory[0][data]"  
                    placeholder="<?php echo _t("+322123456"); ?>"
                    >
            </div>
            <div class="col-xs-12 col-md-2 col-lg-2 col-sm-3">
                <button type="button" class="btn btn-danger delete-item"><?php _t("Delete"); ?></button>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3" for="postcode"></label>
        <div class="col-sm-3">    
            <a href="#" id="add-directory-item" class="btn btn-primary"><?php echo icon("plus"); ?></a>
        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-3"></div>
    </div>
    <script>
        let directoryCount = 1;  // Contador para los items del directorio
        let selectedOptions = [];  // Array para guardar las opciones seleccionadas

        // Cuando el botón "Add directory item" se presiona
        document.getElementById('add-directory-item').addEventListener('click', function (e) {
            e.preventDefault();  // Evita el comportamiento por defecto del enlace

            // Clonar el último elemento de la lista
            const directoryItems = document.getElementById('directory-items');
            const newItem = document.querySelector('.directory-item').cloneNode(true);

            // Cambiar los nombres e IDs de los inputs para que sean únicos
            const newNameSelect = newItem.querySelector('select');
            const newDataInput = newItem.querySelector('input[type="text"]');

            newNameSelect.name = `directory[${directoryCount}][name]`;
            newDataInput.name = `directory[${directoryCount}][data]`;
            newDataInput.value = '';  // Limpiar el campo de texto

            // Agregar el botón de eliminar
            const deleteButton = newItem.querySelector('.delete-item');
            deleteButton.onclick = function () {
                newItem.remove(); // Eliminar la línea del directorio
            };

            // Filtrar las opciones seleccionadas
            updateOptions(newNameSelect);

            directoryItems.appendChild(newItem);  // Añade el nuevo item al DOM

            directoryCount++;  // Incrementa el contador para el próximo item
        });

        // Para cada cambio en los selectores
        document.addEventListener('change', function (e) {
            if (e.target && e.target.classList.contains('directory-select')) {
                selectedOptions = Array.from(document.querySelectorAll('.directory-select')).map(select => select.value);
                // Actualiza las opciones en todos los selectores
                document.querySelectorAll('.directory-select').forEach(select => {
                    updateOptions(select);
                });
            }
        });

        // Función que actualiza las opciones de un select para ocultar las seleccionadas
        function updateOptions(select) {
            const options = Array.from(select.options);
            options.forEach(option => {
                if (selectedOptions.includes(option.value) && option.value !== select.value) {
                    option.disabled = true;  // Desactiva la opción si ya fue seleccionada en otro lugar
                } else {
                    option.disabled = false;  // Habilita las opciones no seleccionadas
                }
            });
        }
    </script>



    <?php
    ############################################################################
    ############################################################################
    ############################################################################
    ############################################################################
    ?>







    <?php /**


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
     * 
     */ ?>







    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">

        </div>      							
    </div>  






</form>

































