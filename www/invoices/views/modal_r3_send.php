
<button type="button" class="btn-sm btn btn-primary" data-toggle="modal" data-target="#modal_reminder_send_<?php echo $r; ?>">
    <?php _t("Save"); ?>
</button>


<div class="modal fade" id="modal_reminder_send_<?php echo $r; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_reminder_sendLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_reminder_sendLabel"><?php _t("Record reminder"); ?> : <?php _t("Formal notice"); ?> <?php echo $r; ?></h4>
            </div>
            <div class="modal-body">

                <h3>
                    <?php echo _t("Record reminder"); ?> : <?php _t("Formal notice"); ?>
                </h3>

                <p>
                    <?php _t("You want to record the reminder?"); ?>
                </p>

                <?php
                include "form_r3_send.php";
                ?>
            </div>


        </div>
    </div>
</div>