<form method="post" action="index.php">
    <input type="hidden" name="c" value="balance">
    <input type="hidden" name="a" value="ok_field_update">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="field" value="ref">
    <input type="hidden" name="redi" value="2">

    <div class="form-group">
        <label for="ref"><?php _t("Reference"); ?></label>
        <input 
            class="form-control"
            type="text" 
            name="new_value" 
            value="<?php echo $balance['ref']; ?>"
            required=""
            >
        <span id="ref" class="help-block">
            <?php _t("Transaction number according to your bank statements "); ?>
        </span>
    </div>

    <button type="submit" class="btn btn-default">
        <?php _t("Update"); ?>
    </button>
</form>