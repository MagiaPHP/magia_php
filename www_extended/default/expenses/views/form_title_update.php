<form class="" method="post" action="index.php">

    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_title_update">
    <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">    
    <input type="hidden" name="redi[redi]" value="2">



    <div class="form-group">
        <label for="date" class="sr-only">
            <?php _t("Title"); ?>
        </label>

        <textarea class="form-control" name="title" id="title"><?php echo $expense->getTitle(); ?></textarea>
    </div>


    <button type="submit" class="btn btn-default">
        <?php echo icon("refresh"); ?>
        <?php _t("Update"); ?>
    </button>

</form>
