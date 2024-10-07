
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal_hr_employee_civil_status_delete">
    <?php echo icon("trash"); ?>
    <?php _t("Delete"); ?>
</button>


<div class="modal fade" id="myModal_hr_employee_civil_status_delete" tabindex="-1" role="dialog" aria-labelledby="myModal_hr_employee_civil_status_deleteLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_hr_employee_civil_status_deleteLabel">
                    <?php _t("Delete"); ?> <?php echo $hr_employee_civil_status_item['id']; ?> 
                </h4>
            </div>

            <div class="modal-body">
                <?php _t("Are you sure you want to delete this item?"); ?>
            </div>

            <div class="modal-footer">

                <a class="btn btn-danger btn-md"
                   href="index.php?c=hr_employee_civil_status&a=ok_delete&id=<?php echo $hr_employee_civil_status_item['id']; ?>&redi[redi]=5&redi[c]=contacts&redi[a]=hr_employee_civil_status&redi[params]=id=<?php echo $id; ?>"><?php echo icon("trash"); ?> <?php _t("Delete"); ?></a>

            </div>
        </div>
    </div>
</div>