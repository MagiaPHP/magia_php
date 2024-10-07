
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#hr_modal_precompte_update_<?php echo $employee['contact_id']; ?>">
    <?php echo _tr("Update"); ?>
</button>


<div class="modal fade" id="hr_modal_precompte_update_<?php echo $employee['contact_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="hr_modal_precompte_update_<?php echo $employee['contact_id']; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="hr_modal_precompte_update_<?php echo $employee['contact_id']; ?>Label">
                    
                    <?php _t("Update"); ?> 
                    : 
                        <?php echo $employee['contact_id']; ?>
                    : 
                    <?php echo contacts_formated($employee['contact_id']); ?>
                    
                </h4>
            </div>
            <div class="modal-body">

                <form method="post" action="index.php">

                    <input type="hidden" name="c" value="hr_employee_payroll_items">
                    <input type="hidden" name="a" value="ok_value_push">
                    <input type="hidden" name="employee_id" value="<?php echo $employee['contact_id']; ?>">
                    <input type="hidden" name="code" value="7050">

                    <input type="hidden" name="redi[redi]" value="5">
                    <input type="hidden" name="redi[c]" value="hr_employee_payroll_items">
                    <input type="hidden" name="redi[a]" value="hr">



                    <div class="form-group">
                        <label for="value"><?php _t("Precompte"); ?></label>
                        <input 
                            type="number" 
                            class="form-control" 
                            name="value" 
                            id="value" 
                            placeholder=""
                            value="<?php echo $precompte; ?>"
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