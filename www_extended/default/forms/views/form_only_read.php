<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="forms_lines">
    <input type="hidden" name="a" value="ok_push_field">
    <input type="hidden" name="id" value="<?php echo $fle2->getId(); ?>">
    <input type="hidden" name="field" value="m_only_read">
    <input type="hidden" name="redi" value="2">

    <div class="checkbox">
        <label>
            <input 
                type="checkbox" 
                name="new_data" 
                value="1"
                <?php echo ( $fle2->getM_only_read()) ? " checked " : ""; ?>
                > <?php _t("m_only_read"); ?>
        </label>
    </div>

    <button type="submit" class="btn btn-default">
        <?php _t("m_only_read"); ?>
    </button>
</form>