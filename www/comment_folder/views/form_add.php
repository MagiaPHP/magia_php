<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="comment_folder">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="1">

    <?php # doc_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="doc_id"><?php _t("Doc_id"); ?></label>
        <div class="col-sm-8">
            <select  name="doc_id" class="form-control selectpicker" id="doc_id" data-live-search="true">
                <?php comments_read_select("order_id", "order_id", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /doc_id ?>

    <?php # folder ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="folder"><?php _t("Folder"); ?></label>
        <div class="col-sm-8">
            <select  name="folder" class="form-control selectpicker" id="folder" data-live-search="true">
                <?php comments_folders_select("name", "name", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /folder ?>

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
