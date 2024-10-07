<form action="index.php" method="post" class="form-horizontal">
    <input type="hidden" name="c" value="expenses"> 
    <input type="hidden" name="a" value="commentsUpdateOk"> 
    <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>"> 
    <input type="hidden" name="redi[redi]" value="1"> 


    <div class="form-group">
        <div class="col-sm-12">
            <textarea 
                class="form-control" 
                name="comments" 
                placeholder="<?php _t("Your comment here"); ?>"
                rows="2"
                ><?php echo expenses_field_id("comments", $id); ?></textarea>
        </div>
    </div>

    <?php if (permissions_has_permission($u_rol, 'docs_comments', "creatssssssssssssssssssse")) { ?>
        <div class="form-group">
            <div class="col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="save" value="1"> <?php _t("Register comment"); ?>
                    </label>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="form-group">
        <div class="col-sm-offset-0 col-sm-12">
            <button type="submit" class="btn btn-default">
                <?php echo icon("refresh"); ?>  
                <?php _t("Change"); ?>
            </button>
        </div>
    </div>
</form>