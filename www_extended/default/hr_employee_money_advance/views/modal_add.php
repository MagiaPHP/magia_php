
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal_<?php echo $employee['contact_id']; ?>">
    <?php _t("Add"); ?>
</button>


<div class="modal fade" id="myModal_<?php echo $employee['contact_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_<?php echo $employee['contact_id']; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_<?php echo $employee['contact_id']; ?>Label">
                    <?php _t("Add money advance"); ?>
                </h4>
            </div>
            <div class="modal-body">


                <?php
                $params = [];
                $params['id'] = $employee['contact_id'];
                $params['redi'] = '5';
                $params['c'] = 'hr_employee_money_advance';
                $params['a'] = 'index';
                $params['params'] = "month=$month&year=$year";
                include view('hr_employee_money_advance', 'form_add_by_employee', $params);
                ?>



            </div>


        </div>
    </div>
</div>