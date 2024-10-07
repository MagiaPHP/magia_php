<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="credit_note_lines">
    <input type="hidden" name="a" value="search_advancedOk">




    <?php # credit_note_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Credit_note_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="credit_note_id" class="form-control"  id="credit_note_id" placeholder="credit_note_id" value="">
        </div>	
    </div>
    <?php # credit_note_id ?>

    <?php # quantity ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Quantity"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="quantity" class="form-control"  id="quantity" placeholder="quantity" value="">
        </div>	
    </div>
    <?php # quantity ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Description"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="description" class="form-control"  id="description" placeholder="description" value="">
        </div>	
    </div>
    <?php # description ?>

    <?php # value ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Value"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="value" class="form-control"  id="value" placeholder="value" value="">
        </div>	
    </div>
    <?php # value ?>

    <?php # tax ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="tax" class="form-control"  id="tax" placeholder="tax" value="">
        </div>	
    </div>
    <?php # tax ?>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
