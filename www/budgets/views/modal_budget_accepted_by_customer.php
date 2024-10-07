<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_budget_accepted_by_customer">
    <?php echo icon("ok"); ?>
    <?php _t("Accepted by customer"); ?>
</button>

<div class="modal fade" id="modal_budget_accepted_by_customer" tabindex="-1" role="dialog" aria-labelledby="modal_budget_accepted_by_customer">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_budget_accepted_by_customer"><?php _t("Accepted by customer"); ?></h4>
            </div>
            <div class="modal-body">

                <h2><?php _t("Budgets"); ?> <?php echo $id; ?></h2>

                <p>
                    <?php _t("Registre like accepted by customer"); ?>
                </p>


                <form action="index.php" method="post" class="form-inline" ac>
                    <input type="hidden" name="c" value="budgets">
                    <input type="hidden" name="a" value="ok_accepted_by_customer">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">  
                    <input type="hidden" name="redi[redi]" value="1">  


                    <button type="submit" class="btn btn-primary">
                        <?php echo icon("ok"); ?>

                        <?php _t("Accepted by customer");
                        ?>
                    </button>
                </form>

                <p></p>





            </div>


        </div>
    </div>
</div>