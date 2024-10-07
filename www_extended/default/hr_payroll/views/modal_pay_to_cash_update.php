<a href="#" 
   data-toggle="modal" 
   data-target="#myModal_pay_to_cash_update_<?php echo $payroll->getId(); ?>" 
   >
       <?php echo ($payroll->getPay_to_cash() !== null ) ? moneda($payroll->getPay_to_cash()) : ' ... '; ?>
</a>







<div class="modal fade" id="myModal_pay_to_cash_update_<?php echo $payroll->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_pay_to_cash_update_<?php echo $payroll->getEmployee_id(); ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" 
                    id="myModal_pay_to_cash_update_<?php echo $payroll->getId(); ?>Label">
                    <?php _t("Update"); ?> : <?php echo $payroll->getId(); ?>
                </h4>
            </div>
            <div class="modal-body">


                <form method="post" action="index.php">

                    <input type="hidden" name="c" value="hr_payroll_by_month">
                    <input type="hidden" name="a" value="ok_formula_push">

                    <input type="hidden" name="payroll_id" value="<?php echo $payroll->getId(); ?>">
                    <input type="hidden" name="column" value="pay_to_cash">

                    <input type="hidden" name="redi[redi]" value="5">
                    <input type="hidden" name="redi[c]" value="hr_payroll">
                    <input type="hidden" name="redi[a]" value="by_month">
                    <input type="hidden" name="redi[params]" value="<?php echo "month=$month&year=$year"; ?>">

                    <div class="form-group">
                        <label for="formula"><?php _t("Formula"); ?></label>
                        <textarea class="form-control" name="formula"  rows="5"><?php echo hr_payroll_by_month_get_formula_by_payroll_id_column($payroll->getId(), 'pay_to_cash') ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-default">
                        <?php echo icon("ok"); ?> 
                        <?php _t("Update"); ?>
                    </button>
                </form>

                <br>
                <br>
                <br>

                <?php
                foreach ($payroll->getTags_list() as $key => $tag) {
                    echo "$tag <br>";
                }
                ?>


            </div>




        </div>
    </div>
</div>