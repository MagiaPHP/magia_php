<?php if (balance_list_by_invoice($id)) { ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><a name="Payments"></a><?php _t("Payments"); ?></h3>
        </div>
        <div class="panel-body">
            <?php
            include "payments_list.php";
            ?>
        </div>
    </div>
<?php } ?>