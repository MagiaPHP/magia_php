<form action="index.php" method="post">
    <input type="hidden" name="c" value="credit_notes"> 
    <input type="hidden" name="a" value="commentsUpdateOk"> 
    <input type="hidden" name="credit_note_id" value="<?php echo "$id"; ?>"> 



    <div class="form-group">
        <label for="comments" control-label"><?php _t("Comments"); ?></label>
        <textarea 
            class="form-control" 
            name="comments" 
            id="comments"
            rows="5"
            required
            ><?php echo credit_notes_field_id("comments", $id); ?></textarea>
    </div>


    <?php if (permissions_has_permission($u_rol, 'docs_comments', "create")) { ?>

        <div class="form-group">
            <label for="comments" control-label"></label>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="save" value="1"> <?php _t("Register comment"); ?>
                </label>
            </div>
        </div>

    <?php } ?>

    <div class="form-group">
        <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>

    </div>
</form>