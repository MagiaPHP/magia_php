<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="credit_note_lines">
    <input type="hidden" name="a" value="deleteOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$credit_note_lines[id]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Credit_note_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="credit_note_id" name="credit_note_id" class="form-control"  id="credit_note_id" placeholder="credit_note_id" value="<?php echo "$credit_note_lines[credit_note_id]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Quantity"); ?></label>
        <div class="col-sm-8">                    
            <input type="quantity" name="quantity" class="form-control"  id="quantity" placeholder="quantity" value="<?php echo "$credit_note_lines[quantity]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Description"); ?></label>
        <div class="col-sm-8">                    
            <input type="description" name="description" class="form-control"  id="description" placeholder="description" value="<?php echo "$credit_note_lines[description]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Value"); ?></label>
        <div class="col-sm-8">                    
            <input type="value" name="value" class="form-control"  id="value" placeholder="value" value="<?php echo "$credit_note_lines[value]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">                    
            <input type="tax" name="tax" class="form-control"  id="tax" placeholder="tax" value="<?php echo "$credit_note_lines[tax]"; ?>" disabled="" >
        </div>	
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

