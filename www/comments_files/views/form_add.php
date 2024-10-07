<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="comments_files">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="1">

    <?php # comment_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="comment_id"><?php _t("Comment_id"); ?></label>
        <div class="col-sm-8">
            <select  name="comment_id" class="form-control selectpicker" id="comment_id" data-live-search="true">
                <?php comments_select("id", "id", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /comment_id ?>

    <?php # file ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="file"><?php _t("File"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="file" class="form-control" id="file" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /file ?>

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
