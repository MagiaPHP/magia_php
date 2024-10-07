<a href="#" 
   data-toggle="modal" 
   data-target="#myModal_value_round_update_<?php echo $payroll->getId(); ?>" 
   >
       <?php echo ($payroll->getValue_round() !== null ) ? moneda($payroll->getValue_round()) : ' ... '; ?>
</a>


<div class="modal fade" id="myModal_value_round_update_<?php echo $payroll->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_value_round_update_<?php echo $payroll->getEmployee_id(); ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" 
                    id="myModal_value_round_update_<?php echo $payroll->getId(); ?>Label">
                    <?php _t("Update"); ?> : <?php echo $payroll->getId(); ?>
                </h4>
            </div>
            <div class="modal-body">


                <form method="post" action="index.php">

                    <input type="hidden" name="c" value="hr_payroll">
                    <input type="hidden" name="a" value="ok_update_value_round">
                    <input type="hidden" name="id" value="<?php echo $payroll->getId(); ?>">

                    <input type="hidden" name="redi[redi]" value="5">
                    <input type="hidden" name="redi[c]" value="hr_payroll">
                    <input type="hidden" name="redi[a]" value="by_month">
                    <input type="hidden" name="redi[params]" value="<?php echo "month=$month&year=$year"; ?>">

                    <div class="form-group">
                        <label for="value_round"><?php _t("Value round"); ?></label>
                        <input 
                            type="number" 
                            step="any"
                            class="form-control" 
                            name="value_round" 
                            id="value_round" 
                            placeholder=""
                            value="<?php echo $payroll->getValue_round(); ?>"

                            >
                    </div>

                    <button type="submit" class="btn btn-default">
                        <?php echo icon("ok"); ?> 
                        <?php _t("Update"); ?>
                    </button>
                </form>




            </div>



        </div>
    </div>
</div>