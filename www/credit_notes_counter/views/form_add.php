<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="credit_notes_counter">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="1">

    <?php # credit_note_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="credit_note_id"><?php _t("Credit_note_id"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="credit_note_id" class="form-control" id="credit_note_id" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /credit_note_id ?>

    <?php # year ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="year"><?php _t("Year"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="year" class="form-control" id="year" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /year ?>

    <?php # counter ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="counter"><?php _t("Counter"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="counter" class="form-control" id="counter" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /counter ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
