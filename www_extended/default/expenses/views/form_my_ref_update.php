<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_my_ref_update">                    
    <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="2">

    <div class="form-group">
        <label class="sr-only" for="my_ref"><?php _t("My reference"); ?></label>
        <input 
            type="text" 
            class="form-control" 
            id="my_ref" 
            name="my_ref" 
            placeholder=""
            value="<?php echo $expense->getMy_ref(); ?>"
            required=""
            >
    </div>                    

    <button type="submit" class="btn btn-primary">
        <?php echo icon('ok'); ?>
        <?php _t("Save"); ?>
    </button>


</form>