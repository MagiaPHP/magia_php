
<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalDelete_<?php echo $params['id']; ?>">
    <?php echo icon("trash"); ?>
    <?php // _t("Delete"); ?>
</button>


<div class="modal fade" 
     id="myModalDelete_<?php echo $params['id']; ?>" 
     tabindex="-1" 
     role="dialog" 
     aria-labelledby="myModalDelete_<?php echo $params['id']; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalDelete_<?php echo $params['id']; ?>Label">
                    <?php _t("Delete"); ?> : <?php echo $params['id']; ?>
                </h4>
            </div>
            <div class="modal-body">                

                <?php // vardump($params); ?>

                <h4>
                    <?php _t("Are you sure you want to delete this item?"); ?>
                </h4>


            </div>
            <div class="modal-footer">

                <a class="btn btn-danger" href="index.php?c=hr_employee_payroll_items&a=ok_delete&id=<?php echo $params['id']; ?>&redi[redi]=5&redi[c]=contacts&redi[a]=hr_payroll&redi[params]=<?php echo urlencode("id=$params[employee_id]") ?>">
                    <?php echo icon('trash'); ?>
                    <?php echo _t('Delete'); ?>
                </a>
            </div>
        </div>
    </div>
</div>