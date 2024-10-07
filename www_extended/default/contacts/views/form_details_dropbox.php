<h3><?php _t("Dropbox"); ?></h3>

<form class="form-horizontal" method="" action="">

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_discounts_update">
    <input type="hidden" name="contact_id" value="<?php echo $contact['id'] ?>">
    <input type="hidden" name="redi" value="1">



    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Dropbox username"); ?></label>	
        <div class="col-sm-6">    		
            <input  disabled="" 
                    class="form-control" 
                    type ="text " 
                    name ="type" 
                    id="type" 
                    value="<?php echo user_options("dropbox_username", $contact['id']); ?>"
                    />
        </div>
    </div>	



    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Dropbox password"); ?></label>	
        <div class="col-sm-6">    		
            <input  
                disabled="" 
                class="form-control" 
                type ="text" 
                name ="type" 
                id="type" 
                value="<?php echo user_options("dropbox_password", $contact['id']); ?>"


                />
        </div>
    </div>






</form>