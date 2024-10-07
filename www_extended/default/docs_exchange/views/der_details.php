<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t('Sender'); ?>
    </div>
    <div class="panel-body">



        <p>
            <b><?php echo $docs_ex->getSender_name(); ?></b>
            <br>
            Av de la castillas 8<br>
            1020 - Laken <br>
            Bruselas - Belgica <br>
            <b>Tva</b> : <?php echo $docs_ex->getSender_tva(); ?><br>
        </p>

        <p>La empresa ABC le a enviado esta factura, ud puede aceptarla, rechazarla, o pedir alguna modificacion</p>

        <p>
            La empresa ABC ya es parte de sus contactos
        </p>

        <p>
            Ud. no tiene registrada a la empresa ABC entre sus contactos
        </p>

        <?php
        vardump($docs_ex);
        ?>





    </div>
</div>

<?php
vardump($docs_exchange->getStatus());

if ($docs_exchange->getStatus() == 0) {
    include "part_aceept_document.php";
    include "part_ask_modification.php";
    include "part_no_aceept_document.php";
} else {
    include "part_already_aceept_document.php";
}
?>

