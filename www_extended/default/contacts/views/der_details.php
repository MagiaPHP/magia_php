<div class="panel panel-primary">
    <div class="panel-heading"><?php _t("System"); ?></div>
    <div class="panel-body">

        <?php
        if (users_according_contact_id($id)) {
            include "form_user_has_login.php";
        } else {
            include "form_login_add.php";
        }
        ?>
    </div>
</div>

<?php if (users_according_contact_id($contact['id'])) { ?>

    <div class="panel panel-primary">
        <div class="panel-heading"><?php _t("Access to system"); ?></div>
        <div class="panel-body">

            <?php
            if (users_field_contact_id('status', $contact['id']) == 0) {
                include "modal_user_unblock.php";
            } else {
                include "modal_user_block.php";
            }
            ?>
        </div>
    </div>
    <?php
}?>