
<form action="index.php" method="post" role="form" class="">

    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="identification">

    <div class="form-group mt-3">
        <input type="text" class="form-control" name="login" id="email" placeholder="<?php _t("Email"); ?>" required>
    </div>

    <div class="form-group mt-3">
        <input type="password" class="form-control" name="password" id="password" placeholder="<?php _t("Password"); ?>" required>
    </div>

    <div class="form-group mt-3">
        <button class="form-control" type="submit" title="Send Message">
            <?php _t("Login"); ?>
        </button>
    </div>


</form>