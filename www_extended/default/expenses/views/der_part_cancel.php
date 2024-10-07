<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a name="cancel"></a>

            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'cancel', array('c' => $c, 'a' => $a, 'id' => $id));
            }
            ?>
            <?php _t("Cancel"); ?>                      
        </h3>
    </div>

    <div class="panel-body">
        <?php
        /**
         * Cuando un expense se puede anular?
         * no este en ningun projecto 
         * no haya pagos 
         * 
         */
        if ($expense->can_be_cancel()) {
            ?>
            <p><?php _t("Cancel this expense"); ?></p>

            <form action="index.php" method="post" class="form-inline">
                <input type="hidden" name="c" value="expenses">
                <input type="hidden" name="a" value="ok_change_status">
                <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">
                <input type="hidden" name="status_code" value="-10">
                <input type="hidden" name="redi[redi]" value="1">

                <button type="submit" class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove"></span>
                    <?php _t("Cancel"); ?>
                </button>
            </form>

            <?php
        } else {

            echo '<p>' . _tr("Reasons why this document cannot be canceled") . '</p>';

            foreach ($expense->getWhy_cant_be_cancelled() as $why) {
                message('info', $why);
            }
            ?>
            <form action="index.php" method="get" class="form-inline" ac>                           
                <button type="submit" class="btn btn-danger" disabled="">
                    <span class="glyphicon glyphicon-remove"></span>
                    <?php _t("Cancel"); ?>
                </button>
            </form>


        <?php }
        ?>


    </div>
</div>