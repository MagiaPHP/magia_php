<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="addresses_transport">
    <input type="hidden" name="a" value="search_advancedOk">




    <?php # addresses_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Addresses_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="addresses_id" class="form-control"  id="addresses_id" placeholder="addresses_id" value="">
        </div>	
    </div>
    <?php # addresses_id ?>

    <?php # transport_code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Transport_code"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="transport_code" class="form-control"  id="transport_code" placeholder="transport_code" value="">
        </div>	
    </div>
    <?php # transport_code ?>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
