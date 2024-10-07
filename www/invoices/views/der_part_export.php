<?php if (permissions_has_permission($u_rol, "export", "read")) { ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a name="registrePayments"></a>
                <?php _t("Export"); ?>
            </h3>
        </div>
        <div class="panel-body">

            <?php
            include "modal_form_export.php";
            ?>

        </div>
    </div>

<?php } ?>