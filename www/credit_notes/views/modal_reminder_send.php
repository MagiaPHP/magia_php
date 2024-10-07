
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_reminder_send_<?php echo $r; ?>">
    <?php _t("Send"); ?>
</button>


<div class="modal fade" id="modal_reminder_send_<?php echo $r; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_reminder_sendLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_reminder_sendLabel"><?php _t("Send Reminder"); ?> <?php echo $r; ?></h4>
            </div>
            <div class="modal-body">
                <?php
                include "form_reminder_send.php";
                ?>
            </div>


        </div>
    </div>
</div>