<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="comments">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="1">



    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date" class="form-control"  id="date" placeholder="date" value="<?php echo "$comments[date]"; ?>" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # sender_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="sender_id"><?php _t("Sender_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="sender_id" class="form-control"  id="sender_id" placeholder="sender_id" value="<?php echo "$comments[sender_id]"; ?>" >
        </div>	
    </div>
    <?php # /sender_id ?>

    <?php # doc ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="doc"><?php _t("Doc"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="doc" class="form-control"  id="doc" placeholder="doc" value="<?php echo "$comments[doc]"; ?>" >
        </div>	
    </div>
    <?php # /doc ?>

    <?php # doc_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="doc_id"><?php _t("Doc_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="doc_id" class="form-control"  id="doc_id" placeholder="doc_id" value="<?php echo "$comments[doc_id]"; ?>" >
        </div>	
    </div>
    <?php # /doc_id ?>

    <?php # comment ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="comment"><?php _t("Comment"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="comment" class="form-control"  id="comment" placeholder="comment" value="<?php echo "$comments[comment]"; ?>" >
        </div>	
    </div>
    <?php # /comment ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$comments[order_by]"; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$comments[status]"; ?>" >
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

