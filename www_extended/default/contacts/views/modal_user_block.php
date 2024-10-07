
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ok_block_user">
    <span class="glyphicon glyphicon-lock"></span>
    <?php echo _tr("Block"); ?>
</button>


<div class="modal fade" id="ok_block_user" tabindex="-1" role="dialog" aria-labelledby="ok_block_userLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ok_block_userLabel">
                    <?php echo _tr("Atention"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h2><?php _t("Block user"); ?></h2>

                <p>    
                    <?php echo _t("The user can currently enter the system, if he blocks it he will no longer be able to enter it, are you sure he wants to block it?"); ?>
                </p>


                <?php
                include "form_user_block.php";
                ?>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <?php _t("Close"); ?>
                </button>

            </div>
        </div>
    </div>
</div>


<br>
<br>

<?php
if (modules_field_module('status', "docu")) {
    // nombre del archivo sin el punto ni la extencion 
    // form_search_by_office.php > form_search_by_office
    // en los form, al final
    //
    echo docu_modal_bloc($c, $a, 'modal_user_block');
}
?>






