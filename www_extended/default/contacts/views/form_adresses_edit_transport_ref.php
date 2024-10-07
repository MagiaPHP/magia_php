<form class="form-horizontal" action="index.php" method="post" >

    <input type="hidden" name="c" value="addresses_transport">
    <input type="hidden" name="a" value="ok_edit_ref">
    <input type="hidden" name="addresses_id" value="<?php echo "$addresses_list_by_contact_id[id]"; ?>">
    <input type="hidden" name="contact_id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="transport_code" value="<?php echo $addresses_list_by_contact_id['transport_code']; ?>">
    <input type="hidden" name="redi" value="2">

    <?php
//    vardump($addresses_list_by_contact_id['transport_code']);
    ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for="disabled"><?php _t('Transport'); ?></label>               
        <div class="col-sm-3">    
            <select class="form-control" name="disabled" disabled="">
                <?php
                foreach (transport_list() as $key => $transport) {
                    $selected = ($transport['code'] == addresses_transport_search_by_addresses_id($addresses_list_by_contact_id['id'])) ? " selected " : "";
                    ?>
                    <option value="<?php echo "$transport[code]" ?>" <?php echo $selected; ?>>
                        <?php echo "$transport[name] - " . monedaf($transport['price']); ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="col-sm-3">    
            <input type="text"  
                   name="transport_ref" 
                   class="form-control" 
                   id="transport_ref" 
                   placeholder="<?php _t("Transport ref"); ?>" 
                   value="<?php echo $addresses_list_by_contact_id['transport_ref'] ?>">
        </div>
    </div>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>