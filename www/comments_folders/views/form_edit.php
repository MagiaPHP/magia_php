<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="comments_folders">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="1">



    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="name" class="form-control"  id="name" placeholder="name" value="<?php echo "$comments_folders[name]"; ?>" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # label ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="label"><?php _t("Label"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="label" class="form-control"  id="label" placeholder="label" value="<?php echo "$comments_folders[label]"; ?>" >
        </div>	
    </div>
    <?php # /label ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$comments_folders[order_by]"; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$comments_folders[status]"; ?>" >
        </div>	
    </div>
    <?php # /status ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

