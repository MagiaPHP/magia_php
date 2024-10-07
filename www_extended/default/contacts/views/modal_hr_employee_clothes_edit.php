
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_table_hr_employee_clothes_edit<?php echo $hr_employee_clothes_item['id']; ?>">
    <?php echo icon("pencil"); ?>
    <?php _t("Edit"); ?>
</button>


<div class="modal fade" id="modal_table_hr_employee_clothes_edit<?php echo $hr_employee_clothes_item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_table_hr_employee_clothes_edit<?php echo $hr_employee_clothes_item['id']; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_table_hr_employee_clothes_edit<?php echo $hr_employee_clothes_item['id']; ?>Label">
                    <?php _t("Edit"); ?> <?php // echo $hr_employee_clothes_item['id']; ?> 
                </h4>
            </div>
            <div class="modal-body">


                <?php
                include "form_hr_employee_clothes_edit.php";
                ?>

            </div>




        </div>
    </div>
</div>