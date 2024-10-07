<form method="post" action="index">

    <input type="hidden" name="c" value="projects">
    <input type="hidden" name="a" value="ok_add_short">
    <input type="hidden" name="redi[redi]" value="1">

    <div class="form-group">
        <label for="FiledName"><?php _t("FiledName"); ?></label>
        <input type="email" class="form-control" name="FiledName" id="FiledName" placeholder="<?php echo _t("FiledName"); ?>">
    </div>


    <button type="submit" class="btn btn-default">
        <?php echo icon("ok"); ?> 
        <?php _t("Submit"); ?>
    </button>
    
</form>