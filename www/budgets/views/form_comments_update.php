<form action="index.php" method="post" class="form-horizontal">
    <input type="hidden" name="c" value="budgets"> 
    <input type="hidden" name="a" value="commentsUpdateOk"> 
    <input type="hidden" name="budget_id" value="<?php echo "$id"; ?>"> 
    <input type="hidden" name="redi['redi']" value="2"> 
    <input type="hidden" name="redi['budget_id']" value="<?php echo "$id"; ?>"> 

    <div class="form-group">
        <div class="col-sm-12">
            <textarea 
                class="form-control" 
                name="comments" 
                placeholder="<?php _t("Your comment here"); ?>"
                rows="2"
                ><?php echo budgets_field_id("comments", $id); ?></textarea>
        </div>
    </div>

    <?php if (permissions_has_permission($u_rol, 'docs_comments', "create")) { ?>
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
                <?php echo icon("plus"); ?>  
                <?php _t("Add comment"); ?>
            </button>
        </div>
    </div>
</form>