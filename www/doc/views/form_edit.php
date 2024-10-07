<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="doc">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="1">



    <?php # category_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="category_id"><?php _t("Category_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="category_id" class="form-control"  id="category_id" placeholder="category_id" value="<?php echo "$doc[category_id]"; ?>" >
        </div>	
    </div>
    <?php # /category_id ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="title" class="form-control"  id="title" placeholder="title" value="<?php echo "$doc[title]"; ?>" >
        </div>	
    </div>
    <?php # /title ?>

    <?php # body ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="body"><?php _t("Body"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="body" class="form-control"  id="body" placeholder="body" value="<?php echo "$doc[body]"; ?>" >
        </div>	
    </div>
    <?php # /body ?>

    <?php # title_icon ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="title_icon"><?php _t("Title_icon"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="title_icon" class="form-control"  id="title_icon" placeholder="title_icon" value="<?php echo "$doc[title_icon]"; ?>" >
        </div>	
    </div>
    <?php # /title_icon ?>

    <?php # sumary ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="sumary"><?php _t("Sumary"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="sumary" class="form-control"  id="sumary" placeholder="sumary" value="<?php echo "$doc[sumary]"; ?>" >
        </div>	
    </div>
    <?php # /sumary ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$doc[order_by]"; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$doc[status]"; ?>" >
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

