<?php
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-30 16:08:33 
#################################################################################
?>



<form class="form-horizontal" id="license-form"  action="index.php" method="post" >
    <input type="hidden" name="c" value="veh_drivers">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="contact_id" value="<?php echo (isset($arg["contact_id"])) ? $arg["contact_id"] : ""; ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">



    <?php # country     ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="country"><?php _t("Country"); ?> * </label>
        <div class="col-sm-8">
            <select name="country" class="form-control selectpicker" id="country" data-live-search="true" required="">

                <?php
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     
                //countries_select("countryCode", array("countryName"), "", array());

                foreach (countries_list() as $key => $country) {

                    $country_u_owner_id = addresses_billing_by_contact_id($u_owner_id)['country'];

                    $country_selected = ($country['countryCode'] == $country_u_owner_id ) ? ' selected ' : '';

                    echo '<option value="' . $country['countryCode'] . '" ' . $country_selected . '>' . _tr($country['countryName']) . '</option>';
                }
                ?>                        
            </select>
        </div>	
    </div>
    <?php # /country    ?>


    <?php # license  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="license"><?php _t("License"); ?> * </label>
        <div class="col-sm-8">
            <select name="license" class="form-control selectpicker" id="license" data-live-search="true"  required="">

                <?php
                foreach (veh_driver_licenses_list() as $key => $license) {
                    echo '<option value="' . $license['category'] . '">' . ($license['category']) . ' - ' . _tr($license['description']) . ' </option>';
                }
                ?>                        
            </select>
        </div>	
    </div>
    <?php # /country     ?>



    <?php
    /**
     *     <?php # type     ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="type"><?php _t("Type"); ?></label>
      <div class="col-sm-8">
      <input type="text" name="type" class="form-control" id="type" placeholder="type" value="" >
      </div>
      </div>
      <?php # /type     ?>
     */
    ?>

    <input type="hidden" name="type" class="form-control" id="type" placeholder="type" value="xxx" >



    <?php # number    ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="number"><?php _t("Number"); ?> * </label>
        <div class="col-sm-8">
            <input type="text" name="number" class="form-control" id="number" placeholder="<?php _t("License number"); ?>" value=""  required="" >
            <small id="number-error" class="text-danger"></small> <!-- Error message -->
        </div>	
    </div>
    <?php # /number     ?>


    <?php # date_start    ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t("Date_start"); ?> * </label>
        <div class="col-sm-8">
            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date start" value=""  required="" >
        </div>	
    </div>
    <?php # /date_start     ?>

    <?php # date_end    ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t("Date_end"); ?> * </label>
        <div class="col-sm-8">
            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date end" value=""   required="">
        </div>	
    </div>
    <?php # /date_end     ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>

<br>
<br>
<p>
    * <?php _t("Mandatory"); ?>
</p>



<?php
// Supongamos que tienes una variable PHP
$mensaje_error = _tr("The combination of country and license number is already registered");
$error_ajax = _tr("Error in AJAX request");
$error_try_again = _tr("An error occurred. Please try again.");
$error_write_number = _tr("Please enter a license number");
?>

<script>
    $(document).ready(function () {
        // Verificación al salir del campo número
        $('#number').on('blur', function () {
            let country = $('#country').val();
            let number = $(this).val();

            // Verificar solo si el número no está vacío
            if (number) {
                // Hacer llamada AJAX para verificar si ya existe la combinación país/número
                $.ajax({
                    url: "www_extended/default/veh_drivers/controllers/check_license.php", // Aquí puedes cambiar a tu archivo

                    method: 'POST',
                    dataType: 'json',
                    data: {
                        ajax: 'check_license', // Esto indica que es una solicitud AJAX
                        country: country,
                        number: number
                    },
                    success: function (response) {
                        if (response.status === 'exists') {
                            $('#number-error').text('<?php echo addslashes($mensaje_error); ?>'); // Usar la variable PHP aquí
                        } else if (response.status === 'available') {
                            $('#number-error').text(''); // Limpiar mensaje de error
                        } else {
                            $('#number-error').text('<?php echo addslashes($error_try_again); ?>');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $('#number-error').text('<?php echo addslashes($error_ajax); ?>' + textStatus);
                        console.log('<?php echo addslashes($error_ajax); ?>:', errorThrown);
                    }
                });
            } else {
                $('#number-error').text('<?php echo addslashes($error_write_number); ?>');
            }
        });

        // Validación en el envío del formulario
        $('#license-form').on('submit', function (e) {
            e.preventDefault(); // Evitar que el formulario se envíe directamente

            let country = $('#country').val();
            let number = $('#number').val();

            // Puedes hacer una validación adicional si es necesario
            if ($('#number-error').text() === '') {
                // Si no hay errores, enviar el formulario
                $('#license-form')[0].submit();
            } else {
                $('#number-error').text('<?php echo addslashes($error_try_again); ?>'); // Mensaje de error si el número es inválido
            }
        });
    });
</script>

