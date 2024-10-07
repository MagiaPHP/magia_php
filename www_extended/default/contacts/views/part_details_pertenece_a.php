
<form class="form-horizontal" action ="index.php" method ="get" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $contact['id'] ?>">
    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Office name"); ?></label>	
        <div class="col-sm-8">    		
            <input 
                disabled="" 
                class="form-control" 
                type ="text" 
                name ="type" 
                id="type" 
                value="<?php echo contacts_formated(contacts_field_id('owner_id', $id)) ?>"
                />
        </div>
    </div>	
</form>