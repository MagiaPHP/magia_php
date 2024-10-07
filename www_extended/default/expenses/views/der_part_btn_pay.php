<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">

            <a name="make_payement"></a>

            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'make_payement', array('c' => $c, 'a' => $a, 'id' => $id));
            }
            ?>

            <?php _t("Make payment"); ?>                      

        </h3>
    </div>

    <div class="panel-body">

        <p>
            <?php _t("Record your transactions using bank statements"); ?>

        </p>

        <form action="index.php" method="get" class="form-inline">
            <input type="hidden" name="c" value="expenses">
            <input type="hidden" name="a" value="details_payement">
            <input type="hidden" name="id" value="<?php echo $expense->getId(); ?>">

            <button type="submit" class="btn btn-primary">
                <?php echo icon("shopping-cart"); ?>
                <?php _t("Click to pay"); ?>
            </button>

        </form>


    </div>
</div>