<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="docs_comments">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="1">



    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="controller" class="form-control"  id="controller" placeholder="controller" value="<?php echo "$docs_comments[controller]"; ?>" >
        </div>	
    </div>
    <?php # /controller ?>

    <?php # comments ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="comments"><?php _t("Comments"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="comments" class="form-control"  id="comments" placeholder="comments" value="<?php echo "$docs_comments[comments]"; ?>" >
        </div>	
    </div>
    <?php # /comments ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$docs_comments[order_by]"; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$docs_comments[status]"; ?>" >
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

