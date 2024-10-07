<form action="index.php" method="post" class="form-horizontal">
    <input type="hidden" name="c" value="invoices"> 
    <input type="hidden" name="a" value="commentsUpdateOk"> 
    <input type="hidden" name="invoice_id" value="<?php echo "$id"; ?>"> 

    <div class="form-group">
        <div class="col-sm-12">
            <textarea 
                class="form-control" 
                name="comments" 
                id="comments" 
                placeholder="<?php _t("Comments"); ?>"
                rows="5"
                ><?php echo invoices_field_id("comments", $id); ?></textarea>
        </div>
    </div>

    <?php if (permissions_has_permission($u_rol, 'docs_comments', "create")) { ?>

        <div class="form-group">
            <div class="col-sm-12">

                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="save" value="1"> <?php _t("Register comment"); ?>
                    </label>
                </div>
            </div>
        </div>

    <?php } ?>

    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-default"><?php _t("Add comment"); ?></button>
        </div>
    </div>


</form>