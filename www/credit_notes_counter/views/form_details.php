<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="credit_notes_counter">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="1">



    <?php # credit_note_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Credit_note_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="credit_note_id" name="credit_note_id" class="form-control"  id="credit_note_id" placeholder="credit_note_id" value="<?php echo "$credit_notes_counter[credit_note_id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # credit_note_id ?>

    <?php # year ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Year"); ?></label>
        <div class="col-sm-8">                    
            <input type="year" name="year" class="form-control"  id="year" placeholder="year" value="<?php echo "$credit_notes_counter[year]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # year ?>

    <?php # counter ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Counter"); ?></label>
        <div class="col-sm-8">                    
            <input type="counter" name="counter" class="form-control"  id="counter" placeholder="counter" value="<?php echo "$credit_notes_counter[counter]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # counter ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

