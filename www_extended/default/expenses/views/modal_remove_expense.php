<a href="#" data-toggle="modal" data-target="#modal_remove_expense_<?php echo $pinout->getProject_id(); ?>">
    <span class="glyphicon glyphicon-trash"></span>
</a>

<div 
    class="modal fade" 
    id="modal_remove_expense_<?php echo $pinout->getProject_id(); ?>" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="modal_remove_expenseLabel">


    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="modal_remove_expenseLabel">
                    <?php _t("Cancel payement"); ?> <?php echo $pinout->getProject_id(); ?>
                </h4>

            </div>
            <div class="modal-body">

                <p>
                    <?php _t("You will be removed this expense from this project"); ?>
                </p>

                <p>
                    <a class="btn btn-danger" href="index.php?c=projects_inout&a=ok_remove_expense&project_id=<?php echo $pinout->getProject_id(); ?>&expense_id=<?php echo $expense->getId(); ?>&redi[redi]=6" >
                        <?php _t("Yes, cancel"); ?>
                    </a>
                </p>





            </div>


        </div>
    </div>
</div>
