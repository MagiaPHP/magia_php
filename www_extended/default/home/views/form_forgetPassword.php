<form class="form-signin" method="post">
    <input type="hidden" name="c" value="home">
    <input type="hidden" name="a" value="ok_forgetPassword">

    <p class="text-center">
        <?php logo(200, "img-responsive"); ?>
    </p>

    <h2 class="form-signin-heading text-center"><?php _t("Forget password"); ?></h2>

    <div class="form-group">
        <input type="email" placeholder="email" name="email" class="form-control">
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit"><?php _t("Change password"); ?></button>

    <bR>

    <p class="text-center">
        <?php _t("Forget password"); ?> | 
        <a href="index.php?c=home"><?php _t("Login"); ?></a>


        <?php if (modules_field_module('status', 'audio')) { ?>
            |  <a href="index.php?c=home&a=new_account"><?php _t("New account"); ?></a>
        <?php } ?>

</form>