<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-md-3">
        <?php include "izq_myInfo.php"; ?>
    </div>
    <div class="col-md-6">              
        <?php // include "nav_address.php"; ?>               
        <?php
        if ((isset($smst) && $smst != false ) && (isset($smst) && $smst != false)) {
            message($smst, $smsm);
        }
        ?>        
        <h2><?php _t("Change Password"); ?></h2> 

        <?php // _t("If you change the password you should re-enter with the new password"); ?>                

        <?php include "form_my_info_changePass.php"; ?>

        <p>
            <?php message("info", "After changing the password, you must re-enter with the new password."); ?>
        </p>

    </div>
</div>
<?php include view("home", "footer"); ?>