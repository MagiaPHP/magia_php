<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#change_status">

    <?php _t("Change status"); ?>
</button>


<div class="modal fade" id="change_status" tabindex="-1" role="dialog" aria-labelledby="change_statusLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="change_statusLabel">
                    <?php _t("Change status"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <p><?php _t("You can change status here"); ?></p>

                <?php
                include "form_change_status.php";
                ?>
            </div>


        </div>
    </div>
</div>