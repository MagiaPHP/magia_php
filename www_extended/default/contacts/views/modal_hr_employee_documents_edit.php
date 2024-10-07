
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal_hr_employee_documents_edit_<?php echo $hr_employee_documents_item['id']; ?>">
    <?php echo icon("pencil"); ?>
    <?php _t("Edit"); ?>                
</button>

<?php
//vardump($hr_employee_documents_item); 
?>

<div class="modal fade" id="myModal_hr_employee_documents_edit_<?php echo $hr_employee_documents_item['id']; ?>" 
     tabindex="-1" role="dialog" aria-labelledby="myModal_hr_employee_documents_edit_<?php echo $hr_employee_documents_item['id']; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_hr_employee_documents_edit_<?php echo $hr_employee_documents_item['id']; ?>Label">
                    <?php _t("Edit"); ?> <?php echo $hr_employee_documents_item['id']; ?> 
                </h4>
            </div>
            <div class="modal-body">


                <?php
                //vardump($hr_employee_documents_item); 

                include "form_hr_employee_documents_edit.php";
                ?>

            </div>




        </div>
    </div>
</div>