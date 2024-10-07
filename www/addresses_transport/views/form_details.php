<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="addresses_transport">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$addresses_transport[id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # id ?>

    <?php # addresses_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Addresses_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="addresses_id" name="addresses_id" class="form-control"  id="addresses_id" placeholder="addresses_id" value="<?php echo "$addresses_transport[addresses_id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # addresses_id ?>

    <?php # transport_code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Transport_code"); ?></label>
        <div class="col-sm-8">                    
            <input type="transport_code" name="transport_code" class="form-control"  id="transport_code" placeholder="transport_code" value="<?php echo "$addresses_transport[transport_code]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # transport_code ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

