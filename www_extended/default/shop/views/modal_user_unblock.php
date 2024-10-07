<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_user_unblock">
    <span class="glyphicon glyphicon-ok"></span>
    <?php _t("Unblock"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="myModal_user_unblock" tabindex="-1" role="dialog" aria-labelledby="myModal_user_unblockLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_user_unblockLabel"><?php _t("System"); ?></h4>
            </div>
            <div class="modal-body">

                <h1><?php _t("Unblock this user"); ?></h1>

                <p><?php _t("Do you want unblock this user?"); ?></p>


                <?php
                include "form_user_unblock.php";
                ?>
            </div>


        </div>
    </div>
</div>

