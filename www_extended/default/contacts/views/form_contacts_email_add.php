<form class="form-horizontal" action ="index.php" method ="post" >

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_email_add">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
    <input type="hidden" name="redi" value="1">





    <div class="form-group">
        <label class="control-label col-sm-3" for="email"><?php _t("Email"); ?></label>

        <div class="col-sm-8">    
            <input type="email"  
                   name="email" 
                   class="form-control" 
                   id="email" 
                   placeholder="name@mail.com" 
                   required="">
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-sm-3" for="submit"></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>  






</form>