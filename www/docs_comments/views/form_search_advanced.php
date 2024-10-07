<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="docs_comments">
    <input type="hidden" name="a" value="search_advancedOk">
    <input type="hidden" name="redi" value="1">




    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="controller" class="form-control"  id="controller" placeholder="controller" value="">
        </div>	
    </div>
    <?php # controller ?>

    <?php # comments ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Comments"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="comments" class="form-control"  id="comments" placeholder="comments" value="">
        </div>	
    </div>
    <?php # comments ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="">
        </div>	
    </div>
    <?php # order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="">
        </div>	
    </div>
    <?php # status ?>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
