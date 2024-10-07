<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal_user_block">
    <span class="glyphicon glyphicon-lock"></span>
    <?php _t("Block"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="myModal_user_block" tabindex="-1" role="dialog" aria-labelledby="myModal_user_blockLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_user_blockLabel"><?php _t("System"); ?></h4>
            </div>
            <div class="modal-body">

                <h1><?php _t("Block this user"); ?></h1>

                <p><?php _t("Do you want block this user?"); ?></p>


                <?php
                include "form_user_block.php";
                ?>
            </div>


        </div>
    </div>
</div>

