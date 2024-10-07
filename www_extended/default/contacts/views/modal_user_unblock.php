<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ok_unblock_user">
    <span class="glyphicon glyphicon-ok"></span>
    <?php echo _tr("Unlock"); ?>
</button>


<div class="modal fade" id="ok_unblock_user" tabindex="-1" role="dialog" aria-labelledby="ok_unblock_userLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ok_unblock_userLabel">
                    <?php echo _tr("Atention"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <?php
                //$lock = ( users_field_contact_id('status', $contact['id']) == 0 ) ? '<span class="glyphicon glyphicon-ban-circle"></span>' : "";
                //$icon = users_status_icon(users_field_contact_id('status', $ubo['contact_id']));
                ?>


                <h3>
                    <?php //echo $icon;  ?>
                </h3>






                <?php
                include "form_user_unblock.php";
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

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
    echo docu_modal_bloc($c, $a, 'modal_user_unblock');
}
?>