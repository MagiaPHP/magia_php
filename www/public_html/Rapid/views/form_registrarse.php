
<form action="index.php" method="post" role="form" class="">


    <div class="form-group mt-3">
        <input disabled="" type="text" class="form-control" name="company" id="company" placeholder="<?php _t("Company name"); ?>" required>
    </div>

    <div class="form-group mt-3">
        <input disabled="" type="text" class="form-control" name="vat" id="vat" placeholder="<?php _t("Vat number"); ?>" required>
    </div>

    <div class="form-group mt-3">
        <input disabled="" type="text" class="form-control" name="login" id="email" placeholder="<?php _t("Email"); ?>" required>
    </div>

    <div class="form-group mt-3">
        <input disabled="" type="password" class="form-control" name="password" id="password" placeholder="<?php _t("Password"); ?>" required>
    </div>

    <div class="form-group mt-3">
        <button class="form-control" type="submit" title="Send Message">
            <?php _t("Registre now"); ?>
        </button>
    </div>


</form>