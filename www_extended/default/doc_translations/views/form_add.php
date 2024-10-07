<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="doc_translations">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="1">

    <?php # doc_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="doc_id"><?php _t("Doc_id"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="doc_id" class="form-control" id="doc_id" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /doc_id ?>

    <?php # language ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="language"><?php _t("Language"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="language" class="form-control" id="language" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /language ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="title" class="form-control" id="title" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /title ?>

    <?php # body ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="body"><?php _t("Body"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="body" class="form-control" id="body" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /body ?>

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
