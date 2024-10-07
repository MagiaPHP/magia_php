<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="forms">
    <input type="hidden" name="a" value="ok_push_field">
    <input type="hidden" name="id" value="<?php echo $formss['id']; ?>">
    <input type="hidden" name="field" value="m_disabled">
    <input type="hidden" name="redi" value="2">

    <div class="checkbox">
        <label>
            <input 
                type="checkbox" 
                name="new_data" 
                value="1"
                <?php echo ($formss['m_disabled']) ? " checked " : ""; ?>
                > <?php _t("Disabled"); ?>
        </label>
    </div>

    <button type="submit" class="btn btn-default">
        <?php _t("Disabled"); ?>
    </button>
</form>