
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal_update_total_hours_<?php echo $date; ?>">
    <?php echo icon("refresh"); ?>
</button>


<div class="modal fade" id="myModal_update_total_hours_<?php echo $date; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_update_total_hours_<?php echo $date; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_update_total_hours_<?php echo $date; ?>Label">
                    <?php echo _t("Update"); ?> : <?php echo $date; ?>
                </h4>
            </div>

            <div class="modal-body">

                <div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active" ><a href="#all_<?php echo $date; ?>" aria-controls="all" role="tab" data-toggle="tab"><?php _t("All at once"); ?></a></li>
                        <li role="presentation"                ><a href="#one_<?php echo $date; ?>" aria-controls="one" role="tab" data-toggle="tab"><?php _t("By worker"); ?></a></li>

                    </ul>
                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane active" id="all_<?php echo $date; ?>">
                            <br>
                            <p>

                                <?php _t("You can register the same number of hours for all workers"); ?>
                            </p>
                            <?php include view('hr_employee_worked_days', 'form_update_total_hours_by_all') ?>
                        </div>


                        <div role="tabpanel" class="tab-pane " id="one_<?php echo $date; ?>">
                            <br>
                            <p>

                                <?php _t("You can record different hours for each worker"); ?>
                            </p>
                            <?php include view('hr_employee_worked_days', 'form_update_total_hours_by_one') ?>
                        </div>


                    </div>
                </div>



            </div>
        </div>
    </div>
</div>