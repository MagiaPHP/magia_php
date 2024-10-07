<a href="#" 
   data-toggle="modal" 
   data-target="#total_sold_<?php echo $prbm->getEmployee_id(); ?>" >
       <?php echo moneda($total_total_sold); ?>
</a>

<div class="modal fade" id="total_sold_<?php echo $prbm->getEmployee_id(); ?>" tabindex="-1" role="dialog" aria-labelledby="total_sold_<?php echo $prbm->getEmployee_id(); ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="total_sold_<?php echo $prbm->getEmployee_id(); ?>Label">
                    <?php _t("Update"); ?>
                </h4>
            </div>
            <div class="modal-body">


                <form method="post" action="index.php">

                    <input type="hidden" name="c" value="hr_payroll_by_month">
                    <input type="hidden" name="a" value="ok_formule_update">
                    <input type="hidden" name="employee_id" value="<?php echo $prbm->getEmployee_id(); ?>">
                    <input type="hidden" name="month" value="<?php echo $prbm->getMonth_of_payroll(); ?>">
                    <input type="hidden" name="year" value="<?php echo $prbm->getYear_of_payroll(); ?>">
                    <input type="hidden" name="column" value="total_sold">

                    <input type="hidden" name="redi[redi]" value="6">

                    <div class="form-group">
                        <label for="value"><?php _t("Total sold"); ?></label>

                        <textarea 
                            class="form-control" 
                            name="formule" 
                            id="total_sold_<?php echo $prbm->getEmployee_id(); ?>" 
                            rows="5"><?php echo $formule_total_sold; ?>  <?php //echo $prbm->getEmployee_id(); ?></textarea>    

                        

                    </div>

                    <div class="form-group">                        
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="all_employees" value="1"> <?php _t("Register this formula for all employees"); ?>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-default">
                        <?php echo icon("ok"); ?> 
                        <?php _t("Submit"); ?>
                    </button>

                </form>



                <br>


                <code>
                    ( %salary_hour% * %worked_hours% ) - ( %precompte% + %meal_vouchers% + %fine_withdrawal% + %money_advance_bank% + %money_advance_cash% ) + %driver%
                </code>

                <br>
                <br>

                <?php
                foreach ($prbm->getTags_list() as $key => $tag) {
                    echo '' . $tag . '<br>';
                    //$tag . '<br>';
                }
                ?>


            </div>




        </div>
    </div>
</div>