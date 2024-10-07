<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="docs_comments">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="1">

    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
            <select  name="controller" class="form-control selectpicker" id="controller" data-live-search="true">
                <?php controllers_select("controller", "controller", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /controller ?>

    <?php # comments ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="comments"><?php _t("Comments"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="comments" class="form-control" id="comments" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /comments ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="order_by" class="form-control" id="order_by" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="status" class="form-control" id="status" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
