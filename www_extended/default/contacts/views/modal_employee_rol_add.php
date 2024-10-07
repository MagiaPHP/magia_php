

<button 
    type="button" 
    class="btn btn-primary btn-sm" 
    data-toggle="modal" 
    data-target="#employee_rol_add_<?php echo $employees_list_by_company['contact_id']; ?>">
        <?php _t("Add"); ?>
</button>



<div class="modal fade" id="employee_rol_add_<?php echo $employees_list_by_company['contact_id']; ?>" tabindex="-1" 
     role="dialog" 
     aria-labelledby="employee_rol_addLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="employee_rol_addLabel">
                    <?php _t("Add user"); ?>
                </h4>
            </div>
            <div class="modal-body">



                <?php
                include "form_employee_rol_add.php";
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php _t("Close"); ?></button>
            </div>
        </div>
    </div>
</div>