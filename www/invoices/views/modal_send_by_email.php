
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_send_by_email">
    <?php _t("Send"); ?> 
    <span class="glyphicon glyphicon-new-window"></span>
</button>


<div class="modal fade" id="modal_send_by_email" tabindex="-1" role="dialog" aria-labelledby="modal_send_by_emailLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_send_by_emailLabel">
                    <?php _t("Send by email"); ?> 
                </h4>
            </div>

            <div class="modal-body">
                <?php
                include "form_send_by_email.php";
                ?>
            </div>


        </div>
    </div>
</div>