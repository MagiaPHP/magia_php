<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="comments_files">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="1">



    <?php # comment_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="comment_id"><?php _t("Comment_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="comment_id" class="form-control"  id="comment_id" placeholder="comment_id" value="<?php echo "$comments_files[comment_id]"; ?>" >
        </div>	
    </div>
    <?php # /comment_id ?>

    <?php # file ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="file"><?php _t("File"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="file" class="form-control"  id="file" placeholder="file" value="<?php echo "$comments_files[file]"; ?>" >
        </div>	
    </div>
    <?php # /file ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$comments_files[order_by]"; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$comments_files[status]"; ?>" >
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

