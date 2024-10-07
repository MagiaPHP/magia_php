<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="comments_files">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="1">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$comments_files[id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # id ?>

    <?php # comment_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Comment_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="comment_id" name="comment_id" class="form-control"  id="comment_id" placeholder="comment_id" value="<?php echo "$comments_files[comment_id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # comment_id ?>

    <?php # file ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("File"); ?></label>
        <div class="col-sm-8">                    
            <input type="file" name="file" class="form-control"  id="file" placeholder="file" value="<?php echo "$comments_files[file]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # file ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_by" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$comments_files[order_by]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$comments_files[status]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # status ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

