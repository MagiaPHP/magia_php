<?php include "header.php"; ?>



<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6">
            <hr>
            <?php logo(); ?>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6">
            <hr>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3><?php _t("Recovery password"); ?></h3>
                    <?php include "form_recovery_password.php"; ?>
                </div>
            </div>

        </div>
    </div>
</div>


<?php include "footer.php"; ?>