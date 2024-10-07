<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a name="registrePayments"></a>

            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'registrePayments');
            }
            ?>


            <?php _t("Registre payments"); ?>
        </h3>
    </div>

    <div class="panel-body">


        <?php
        // si tiene activado el banks_registre para usar los extractos 
        // o sino manual 
        // 
        if (_options_option('banks_registre')) {
            // registro de pagos via el bank lines
            //
            //
            //
            //
            //
        } else {
            /**
             * Lista de banco de la oficina que hizo el documento 
             */
            if (!banks_list_by_contact_id($cn->getOffice_id())) {
                Message("info", "This office has no registered banks");
            } else {
                include "modal_form_payement_registre.php";
            }
        }
        ?>
        
        
    </div>
</div>