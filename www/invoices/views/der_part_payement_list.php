<?php if (balance_list_by_invoice($id)) { ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <?php
                if (modules_field_module('status', "docu")) {
                    echo docu_modal_bloc($c, $a, 'payments', array('c' => $c, 'a' => $a, 'id' => $id));
                }
                ?>

                <a name="Payments"></a><?php _t("Payments"); ?>
            </h3>
        </div>
        <div class="panel-body">
            <?php
            include "payments_list.php";
            ?>

            <a href="index.php?c=balance"><?php _t("See all payments"); ?></a>


        </div>
    </div>
<?php } ?>