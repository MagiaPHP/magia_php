<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="doc">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="1">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$doc[id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # id ?>

    <?php # category_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Category_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="category_id" name="category_id" class="form-control"  id="category_id" placeholder="category_id" value="<?php echo "$doc[category_id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # category_id ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Title"); ?></label>
        <div class="col-sm-8">                    
            <input type="title" name="title" class="form-control"  id="title" placeholder="title" value="<?php echo "$doc[title]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # title ?>

    <?php # body ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Body"); ?></label>
        <div class="col-sm-8">                    
            <input type="body" name="body" class="form-control"  id="body" placeholder="body" value="<?php echo "$doc[body]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # body ?>

    <?php # title_icon ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Title_icon"); ?></label>
        <div class="col-sm-8">                    
            <input type="title_icon" name="title_icon" class="form-control"  id="title_icon" placeholder="title_icon" value="<?php echo "$doc[title_icon]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # title_icon ?>

    <?php # sumary ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Sumary"); ?></label>
        <div class="col-sm-8">                    
            <input type="sumary" name="sumary" class="form-control"  id="sumary" placeholder="sumary" value="<?php echo "$doc[sumary]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # sumary ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_by" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$doc[order_by]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$doc[status]"; ?>" disabled="" >
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

