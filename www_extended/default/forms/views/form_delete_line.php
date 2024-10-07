<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="forms_lines">
    <input type="hidden" name="a" value="ok_delete_field">
    <input type="hidden" name="line_id" value="<?php echo $fle2->getId(); ?>">
    <input type="hidden" name="form_id" value="<?php echo $id; ?>">
    <input type="hidden" name="redi" value="2">

    <div class="form-group">
        <label class="sr-only" for="new_data"><?php _t("order_by"); ?></label>

    </div>
    <button type="submit" class="btn btn-danger">
        <?php _t("Delete line"); ?>
    </button>
</form>