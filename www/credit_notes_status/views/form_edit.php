<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="credit_notes_status">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="code" class="form-control"  id="code" placeholder="code" value="<?php echo "$credit_notes_status[code]"; ?>" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$credit_notes_status[status]"; ?>" >
        </div>	
    </div>
    <?php # /status ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$credit_notes_status[order_by]"; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

