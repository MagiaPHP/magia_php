<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="addressUpdate">        
    <input type="hidden" name="id" value="<?php echo $address['id']; ?>">      

    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Name"); ?></label>
        <div class="col-sm-8">    
            <input type="text"  name="name" class="form-control" id="name" placeholder=" " readonly="" value="<?php echo $address['name']; ?>" disabled="" >
        </div>

    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Address"); ?></label>
        <div class="col-sm-2">    
            <input type="text"  name="number" class="form-control" id="number" placeholder="<?php _t("Number"); ?>" value="<?php echo $address['number']; ?>" disabled="">
        </div>
        <div class="col-sm-6">    
            <input type="text"  name="address" class="form-control" id="address" value="<?php echo $address['address']; ?>" disabled="">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="postcode"></label>
        <div class="col-sm-2">    
            <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="<?php _t("Postal code"); ?>" value="<?php echo $address['postcode']; ?>" disabled="">
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="barrio" class="form-control" id="barrio" placeholder="<?php _t("Barrio"); ?>" value="<?php echo $address['barrio']; ?>" disabled="">
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="city" class="form-control" id="city" placeholder="<?php _t("City"); ?>" value="<?php echo $address['city']; ?>" disabled="">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="region"><?php _t("Country"); ?></label>
        <div class="col-sm-8">    
            <input type="text"  name="region" class="form-control" id="region" placeholder="<?php _t("Region"); ?>" value="<?php echo countries_name($address['country']); ?>" disabled="">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="region"><?php _t("Transport"); ?></label>
        <div class="col-sm-8">    
            <input type="text"  name="" class="form-control" id="" placeholder="" value="<?php echo addresses_transport_search_by_addresses_id($address['id']); ?>" disabled="">
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php _t("Edit"); ?></button>
        </div>      							
    </div>    

</form>