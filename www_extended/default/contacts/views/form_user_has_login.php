<form method="post" action="index.php">
    <div class="form-group">
        <label for="rol"><?php echo _t("Login"); ?></label>
        <input type="text" name="login" class="form-control" id="login"  value="<?php echo users_field_contact_id("login", $id); ?>" disabled="" >
    </div>
    <div class="form-group">
        <label for="rol"><?php echo _t("Rol"); ?></label>
        <input type="text" name="rol" class="form-control" id="rol"  value="<?php echo users_field_contact_id("rol", $id); ?>" disabled="" >
    </div>
</form>

