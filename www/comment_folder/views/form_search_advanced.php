<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="comment_folder">
    <input type="hidden" name="a" value="search_advancedOk">
    <input type="hidden" name="redi" value="1">




    <?php # doc_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Doc_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="doc_id" class="form-control"  id="doc_id" placeholder="doc_id" value="">
        </div>	
    </div>
    <?php # doc_id ?>

    <?php # folder ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Folder"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="folder" class="form-control"  id="folder" placeholder="folder" value="">
        </div>	
    </div>
    <?php # folder ?>

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
