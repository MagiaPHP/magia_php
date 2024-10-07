
<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ok_change_status">
    <?php _t("Edit"); ?>
</button>


<div class="modal fade" id="ok_change_status" tabindex="-1" role="dialog" aria-labelledby="ok_change_statusLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ok_change_statusLabel">
                    <?php _t("Change to registred"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h1><?php _t("Change to registred status"); ?></h1>

                <p>
                    <?php _t("An expense with registered status will be visible by the client from his control panel"); ?>
                </p>


                <form class="form-inline" method="post" action="index.php">

                    <input type="hidden" name="c" value="expenses">
                    <input type="hidden" name="a" value="ok_change_status">
                    <input type="hidden" name="status_code" value="10">
                    <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">
                    <input type="hidden" name="redi[redi]" value="1">

                    <button type="submit" class="btn btn-danger">
                        <?php echo _t("Ok, change"); ?>
                    </button>

                </form>





            </div>
        </div>
    </div>
</div>  