<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="forms_lines">
    <input type="hidden" name="a" value="ok_push_field">
    <input type="hidden" name="id" value="<?php echo $fle2->getId(); ?>">
    <input type="hidden" name="field" value="order_by">
    <input type="hidden" name="redi" value="2">

    <div class="form-group">
        <label class="sr-only" for="new_data"><?php _t("order_by"); ?></label>
        <input 
            type="text" 
            class="form-control" 
            id="new_data" 
            name="new_data" 
            placeholder=""
            value="<?php echo $fle2->getOrder_by(); ?>"
            >
    </div>
    <button type="submit" class="btn btn-default">
        <?php _t("Order by"); ?>
    </button>
</form>