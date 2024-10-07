<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="employees">
    <input type="hidden" name="a" value="ok_add">  

    <input type="hidden" name="office_id" value="<?php echo (isset($arg['office_id']) && $arg['office_id']) ? $arg['office_id'] : null; ?>">
    <input type="hidden" name="owner_id" value="<?php echo (isset($arg['owner_id']) && $arg['owner_id']) ? $arg['owner_id'] : null; ?>">
    <input type="hidden" name="id" value="<?php echo (isset($arg['id']) && $arg['id']) ? $arg['id'] : null; ?>">


    <input type="hidden" name="redi[redi]" value="<?php echo (isset($arg['redi']) && $arg['redi']) ? $arg['redi'] : 1; ?>">
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg['c']) && $arg['c']) ? $arg['c'] : 'home'; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg['a']) && $arg['a']) ? $arg['a'] : 'index'; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo (isset($arg['params']) && $arg['params']) ? $arg['params'] : ''; ?>">



    <div class="form-group">
        <label class="control-label col-sm-3" for=""><?php _t("Office"); ?></label>
        <div class="col-sm-7">    
            <input 
                type="text" 
                class="form-control" 
                name="officeName" 
                id="officeName"  
                placeholder="<?php echo _t("Office name"); ?>" 
                value="<?php echo contacts_formated($id) ?>"
                disabled=""
                >


        </div>
    </div>


    <div class="form-group">       
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>

        <div class="col-sm-7">    

            <select class="selectpicker" data-live-search="true" name="title" required="">
                <option value=""><?php _t("Select one"); ?></option>

                <?php
                //echo var_dump(contacts_titles_list());
                foreach (contacts_titles_list() as $key => $contacts_titles) {

                    // $selected = ($contacts_titles['abbreviation'] == $contact['title']) ? " selected " : "";
                    ?>
                    <option value="<?php echo $contacts_titles['title'] ?>" 
                            <?php //echo "$selected";?>>
                        <?php echo _t($contacts_titles['title']); ?></option>
                <?php } ?>
            </select>

        </div>
    </div>






    <div class="form-group">
        <label class="control-label col-sm-3" for=""><?php _t("Name"); ?></label>
        <div class="col-sm-7">    
            <input 
                type="text" 
                class="form-control" 
                name="name" 
                id="name"  
                placeholder="<?php echo _t("Name"); ?>" 

                >
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""><?php _t("Lastname"); ?> * </label>
        <div class="col-sm-7">    
            <input 
                type="text" 
                class="form-control" 
                name="lastname" 
                id="lastname"  
                placeholder="<?php echo _t("Lastname"); ?>" 

                >
        </div>
    </div>



    <?php if (modules_field_module('status', 'audio')) { ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="name"><?php _t("Birthdate"); ?></label>
            <div class="col-sm-8">


                <div class="row">

                    <div class="col-xs-3">
                        <select class="form-control" name="day">
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                echo "<option value=\"$i\">$i</option>";
                            }
                            ?>

                        </select>
                    </div>
                    <div class="col-xs-3">
                        <select class="form-control" name="month">
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                echo "<option value=\"$i\">$i " . _tr($months[$i]) . "</option>";
                            }
                            ?>

                        </select>
                    </div>
                    <div class="col-xs-4">
                        <select class="form-control" name="year">
                            <?php
                            for ($i = 1900; $i <= date("Y"); $i++) {
                                echo "<option value=\"$i\">$i</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    <?php }
    ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Job title"); ?></label>        

        <div class="col-sm-7">    

            <select class="selectpicker" data-live-search="true" name="cargo" id="cargo" >
                <?php
                foreach (employees_categories_list() as $key => $category) {

                    echo '<option value="' . $category['category'] . '">' . $category['category'] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>




    <?php
    ############################################################################
    ############################################################################
    ############################################################################
    ############################################################################
    ?>


    <div id="directory-items">
        <div class="form-group directory-item">
            <label class="control-label col-sm-3" for=""><?php _t("Directory"); ?></label>
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
                    placeholder=""
                    >
            </div>
            <div class="col-xs-12 col-md-2 col-lg-2 col-sm-3">
                <button type="button" class="btn btn-danger delete-item"><?php echo icon('trash'); ?> <?php _t("Delete"); ?></button>
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







    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-7">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>  


</form>


<p>
    * <?php _t('Mandatory'); ?>
</p>



