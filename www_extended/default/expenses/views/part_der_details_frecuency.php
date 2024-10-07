<?php
###############################################################################
# F R E C U E N C Y
###############################################################################
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Frecuency"); ?>
        </h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <td><?php echo _t("Every"); ?></td>
                <td><?php echo $expense->getEvery(); ?></td>
            </tr>

            <tr>
                <td><?php echo _t("Times"); ?></td>
                <td><?php echo $expense->getTimes(); ?></td>
            </tr>

            <tr>
                <td><?php echo _t("Start date"); ?></td>
                <td><?php echo $expense->getDate_start(); ?></td>
            </tr>

            <tr>
                <td><?php echo _t("End date"); ?></td>
                <td><?php echo $expense->getDate_end(); ?></td>
            </tr>
        </table>
    </div>
</div>
