<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="docs_comments">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="1">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$docs_comments[id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # id ?>

    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">                    
            <input type="controller" name="controller" class="form-control"  id="controller" placeholder="controller" value="<?php echo "$docs_comments[controller]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # controller ?>

    <?php # comments ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Comments"); ?></label>
        <div class="col-sm-8">                    
            <input type="comments" name="comments" class="form-control"  id="comments" placeholder="comments" value="<?php echo "$docs_comments[comments]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # comments ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_by" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$docs_comments[order_by]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$docs_comments[status]"; ?>" disabled="" >
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

