<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_budget_rejected">
    <?php echo icon("remove"); ?>
    <?php _t(budget_status_by_status(40)); ?>
</button>




<div class="modal fade" id="modal_budget_rejected" tabindex="-1" role="dialog" aria-labelledby="modal_budget_rejected">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_budget_rejected"><?php _t("Rejected by customer"); ?></h4>
            </div>
            <div class="modal-body">

                <h2><?php _t("Budgets"); ?> <?php echo $id; ?></h2>

                <?php
                message("warning", "This budget has not been accepted by the client, register it as rejected?")
                ?>

                <p></p>


                <form action="index.php" method="post" class="form-inline" ac>
                    <input type="hidden" name="c" value="budgets">
                    <input type="hidden" name="a" value="ok_rejected">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">  

                    <button type="submit" class="btn btn-danger">
                        <?php echo icon("remove"); ?>
                        <?php _t("Rejected"); ?>
                    </button>

                </form>

                <p></p>





            </div>


        </div>
    </div>
</div>