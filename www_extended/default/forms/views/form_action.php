<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="forms">
    <input type="hidden" name="a" value="ok_push_field">
    <input type="hidden" name="id" value="<?php echo $forms['id']; ?>">
    <input type="hidden" name="field" value="m_action">
    <input type="hidden" name="redi" value="2">

    <div class="form-group">
        <label class="sr-only" for="new_data"><?php _t("m_action"); ?></label>
        <input 
            type="text" 
            class="form-control" 
            id="new_data" 
            name="new_data" 
            placeholder=""
            value="<?php echo $forms['m_action']; ?>"
            >
    </div>
    <button type="submit" class="btn btn-default">
        <?php _t("m_action"); ?>
    </button>
</form>