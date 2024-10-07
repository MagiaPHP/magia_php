
<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ok_budget_id_push">
    <?php _t("Update"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="ok_budget_id_push" tabindex="-1" role="dialog" aria-labelledby="ok_budget_id_pushLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ok_budget_id_pushLabel">
                    <?php _t("Budget id"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <h1><?php _t("Update budget id"); ?></h1>
                <p>
                    <?php _t("If this document refers to a budget, you can record the budget number here"); ?>
                </p>


                <form class="form-inline" method="post" action="index.php">

                    <input type="hidden" name="c" value="expenses">
                    <input type="hidden" name="a" value="ok_budget_id_push">
                    <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">
                    <input type="hidden" name="redi[redi]" value="1">

                    <div class="form-group">
                        <label class="sr-only" for="budget_id"><?php _t("Budget id"); ?></label>
                        <input 
                            type="text" 
                            class="form-control" 
                            name="budget_id" 
                            id="budget_id" 
                            required=""
                            value="<?php echo $expense->getBudget_id() ?>"
                            placeholder="">
                    </div>

                    <button type="submit" class="btn btn-danger">
                        <?php echo _t("Ok, change"); ?>
                    </button>

                </form>





            </div>
        </div>
    </div>
</div>  