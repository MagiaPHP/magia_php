<form class="form-horizontal"  action ="index.php" method ="post" >

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_contact_delete">    
    <input type="hidden" name="contact_id" value="<?php echo $clac['id']; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="redi" value="1">

    <div class="form-group">
        <label class="control-label col-sm-1" for="Delete"></label>
        <div class="col-sm-10">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>  

</form>


