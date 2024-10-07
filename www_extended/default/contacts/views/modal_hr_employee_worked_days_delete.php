<!-- Button trigger modal -->
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_hr_employee_worked_days_delete_<?php echo $line['id']; ?>">
    <?php echo icon("trash"); ?>
</button>


<div class="modal fade" id="modal_hr_employee_worked_days_delete_<?php echo $line['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_hr_employee_worked_days_delete_<?php echo $line['id']; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_hr_employee_worked_days_delete_<?php echo $line['id']; ?>Label">
                    <?php _t("Delete"); ?> <?php echo $line['id']; ?> 
                </h4>
            </div>
            <div class="modal-body">

                <h4>
                    <?php _t("Are you sure you want to delete this item?"); ?>
                </h4>


            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" 
                   href="index.php?c=hr_employee_worked_days&a=ok_delete&id=<?php echo $line["id"]; ?>&redi[redi]=5&redi[c]=contacts&redi[a]=hr_employee_worked_days&redi[params]=<?php echo urlencode("id=$id&month=$month&year=$year"); ?>">
                       <?php echo icon("trash"); ?> 
                       <?php _t("Delete"); ?>
                </a>
            </div>
        </div>
    </div>
</div>