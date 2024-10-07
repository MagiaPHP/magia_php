<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="addresses_transport">
    <input type="hidden" name="a" value="addOk">

    <?php # addresses_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="addresses_id"><?php _t("Addresses_id"); ?></label>
        <div class="col-sm-8">
            <select  name="addresses_id" class="form-control selectpicker" id="addresses_id" data-live-search="true">
                <?php _select("", "", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /addresses_id ?>

    <?php # transport_code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="transport_code"><?php _t("Transport_code"); ?></label>
        <div class="col-sm-8">
            <select  name="transport_code" class="form-control selectpicker" id="transport_code" data-live-search="true">
                <?php _select("", "", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /transport_code ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
