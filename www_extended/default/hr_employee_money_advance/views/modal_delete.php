
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal_<?php echo $params['id']; ?>">
    <?php echo icon("trash"); ?>
    <?php // _t("Delete"); ?>
</button>


<div class="modal fade" id="myModal_<?php echo $params['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_<?php echo $params['id']; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_<?php echo $params['id']; ?>Label">
                    <?php echo _t("Delete"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h4>
                    <?php _t("Are you sure you want to delete"); ?>?
                </h4>

                <?php
                $link = "index.php?c=hr_employee_money_advance&a=ok_delete&id=$params[id]&redi[redi]=$params[redi]&redi[c]=$params[c]&redi[a]=$params[a]&redi[params]=$params[params]";
                ?>

            </div>

            <div class="modal-footer">

                <a class="btn btn-danger" 
                   href="<?php echo $link; ?>">
                       <?php echo icon("trash"); ?>
                       <?php _t("Delete"); ?>
                </a>

            </div>
        </div>
    </div>
</div>