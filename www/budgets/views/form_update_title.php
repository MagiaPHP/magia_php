<form class="form-inline" method="post">
    <input type="hidden" name="c" value="budgets">
    <input type="hidden" name="a" value="ok_update_title">
    <input type="hidden" name="budget_id" value="<?php echo $budget->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg['redi']; ?>">
    <input type="hidden" name="redi[id]" value="<?php echo $arg['id']; ?>">


    <div class="form-group">
        <label for="title" class="sr-only"><?php _t("Title"); ?></label>
        <input 
            type="text" 
            class="form-control" 
            id="title" 
            name="title"
            placeholder="" 
            value="<?php echo $budget->getTitle(); ?>">
    </div>

    <button type="submit" class="btn btn-primary">
        <?php _t("Update"); ?>
    </button>

</form>



