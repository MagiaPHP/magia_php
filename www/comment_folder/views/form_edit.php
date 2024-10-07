<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="comment_folder">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="1">



    <?php # doc_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="doc_id"><?php _t("Doc_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="doc_id" class="form-control"  id="doc_id" placeholder="doc_id" value="<?php echo "$comment_folder[doc_id]"; ?>" >
        </div>	
    </div>
    <?php # /doc_id ?>

    <?php # folder ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="folder"><?php _t("Folder"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="folder" class="form-control"  id="folder" placeholder="folder" value="<?php echo "$comment_folder[folder]"; ?>" >
        </div>	
    </div>
    <?php # /folder ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$comment_folder[order_by]"; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$comment_folder[status]"; ?>" >
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

