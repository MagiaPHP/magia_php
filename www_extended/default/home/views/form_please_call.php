<form class="form-signin" method="post">

    <p class="text-center">
        <?php logo(200, "img-responsive"); ?>
    </p>

    <h2 class="form-signin-heading text-center"><?php _t("Forget password"); ?></h2>

    <div class="form-group">
        <?php message('info', "Please call $config_company_tel"); ?>
    </div>



    <bR>

    <p class="text-center">
        <?php _t("Forget password"); ?> | 
        <a href="index.php?c=home"><?php _t("Login"); ?></a>

        <?php if (modules_field_module('status', 'audio') && AUTO_REGISTRE) { ?>
            |  <a href="index.php?c=home&a=new_account"><?php _t("New account"); ?></a>
        <?php } ?>

</form>