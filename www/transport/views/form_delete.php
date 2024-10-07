<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="transport">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text"   name="code" class="form-control" id="code" placeholder="code" value="<?php echo $transport['code']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text"   name="name" class="form-control" id="name" placeholder="name" value="<?php echo $transport['name']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # price ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-8">
            <input type="number"  name="price" class="form-control" id="price" placeholder="price" value="<?php echo $transport['price']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /price ?>

    <?php # tax ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="tax"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">
            <select  name="tax" class="form-control selectpicker" id="tax" data-live-search="true"  disabled="" >
                <?php tax_select("value", "value", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /tax ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number"  name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $transport['order_by']; ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($transport["status"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("ON"); ?></option>
                <option value="0" <?php echo ($transport["status"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Off"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

