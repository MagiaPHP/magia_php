<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="doc">
    <input type="hidden" name="a" value="search_advancedOk">
    <input type="hidden" name="redi" value="1">




    <?php # category_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Category_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="category_id" class="form-control"  id="category_id" placeholder="category_id" value="">
        </div>	
    </div>
    <?php # category_id ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Title"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="title" class="form-control"  id="title" placeholder="title" value="">
        </div>	
    </div>
    <?php # title ?>

    <?php # body ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Body"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="body" class="form-control"  id="body" placeholder="body" value="">
        </div>	
    </div>
    <?php # body ?>

    <?php # title_icon ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Title_icon"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="title_icon" class="form-control"  id="title_icon" placeholder="title_icon" value="">
        </div>	
    </div>
    <?php # title_icon ?>

    <?php # sumary ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Sumary"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="sumary" class="form-control"  id="sumary" placeholder="sumary" value="">
        </div>	
    </div>
    <?php # sumary ?>

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
