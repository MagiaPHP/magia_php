<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="credit_note_lines">
    <input type="hidden" name="a" value="addOk">

    <?php # credit_note_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="credit_note_id"><?php _t("Credit_note_id"); ?></label>
        <div class="col-sm-8">
            <select  name="credit_note_id" class="form-control selectpicker" id="credit_note_id" data-live-search="true">
                <?php credit_notes_select("id", "id", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /credit_note_id ?>

    <?php # quantity ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="quantity"><?php _t("Quantity"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="quantity" class="form-control" id="quantity" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /quantity ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="description" class="form-control" id="description" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /description ?>

    <?php # value ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="value"><?php _t("Value"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="value" class="form-control" id="value" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /value ?>

    <?php # tax ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="tax"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="tax" class="form-control" id="tax" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /tax ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
