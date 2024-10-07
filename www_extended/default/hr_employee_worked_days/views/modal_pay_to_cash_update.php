<a href="" data-toggle="modal" data-target="#modal_pay_to_cash_update_<?php echo $wd->getId(); ?>">
    <?php echo moneda($total_pay_to_cash ?? 0); ?>    
</a>

<div class="modal fade" id="modal_pay_to_cash_update_<?php echo $wd->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="modal_pay_to_cash_update_<?php echo $wd->getId(); ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_pay_to_cash_update_<?php echo $wd->getId(); ?>Label">
                    <?php _t("Update"); ?> <?php echo $wd->getId(); ?>
                </h4>
            </div>
            <div class="modal-body">


                <form method="post" action="index.php">

                    <input type="hidden" name="c" value="hr_employee_worked_days_formule">
                    <input type="hidden" name="a" value="ok_formule_update">
                    <input type="hidden" name="employee_id" value="<?php echo $wd->getEmployee_id(); ?>">
                    <input type="hidden" name="month" value="<?php echo $wd->getMonth_of_payroll(); ?>">
                    <input type="hidden" name="year" value="<?php echo $wd->getYear_of_payroll(); ?>">
                    <input type="hidden" name="column" value="pay_to_cash">

                    <input type="hidden" name="redi[redi]" value="4">

                    <div class="form-group">
                        <label for="value"><?php _t("Pay to cash"); ?></label>
                        <textarea class="form-control" name="formule" rows="5"><?php echo $formule_pay_to_cash; ?></textarea>                                             
                    </div>

                    <button type="submit" class="btn btn-default">
                        <?php echo icon("ok"); ?> 
                        <?php _t("Submit"); ?>
                    </button>
                </form>

                <br>
                <br>


                <?php
                vardump($wd->getTags_list());

                foreach ($wd->getTags_list() as $tag) {
                    echo "$tag <br>";
                }
                ?>







            </div>

        </div>
    </div>
</div>