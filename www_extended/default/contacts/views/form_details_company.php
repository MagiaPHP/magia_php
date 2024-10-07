<form class="form-horizontal" method="" action="">

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_discounts_update">
    <input type="hidden" name="contact_id" value="<?php echo $contact['id'] ?>">
    <input type="hidden" name="redi" value="1">

    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Id"); ?></label>	
        <div class="col-sm-6">    		
            <input  
                disabled="" 
                class="form-control" 
                type ="text " 
                name ="type" 
                id="type" 
                value="<?php echo ($contact['id']) ?>"/>
        </div>
    </div>	

</form>


<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
}
?>