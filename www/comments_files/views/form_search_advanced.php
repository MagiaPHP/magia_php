<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="comments_files">
    <input type="hidden" name="a" value="search_advancedOk">
    <input type="hidden" name="redi" value="1">




    <?php # comment_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Comment_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="comment_id" class="form-control"  id="comment_id" placeholder="comment_id" value="">
        </div>	
    </div>
    <?php # comment_id ?>

    <?php # file ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("File"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="file" class="form-control"  id="file" placeholder="file" value="">
        </div>	
    </div>
    <?php # file ?>

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
