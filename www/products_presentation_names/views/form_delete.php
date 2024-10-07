<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="products_presentation_names">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $products_presentation_names->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

        <?php # presentation ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="presentation"><?php _t("Presentation"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="presentation" class="form-control" id="presentation" placeholder="presentation" value="<?php echo $products_presentation_names->getPresentation(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /presentation ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $products_presentation_names->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($products_presentation_names->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($products_presentation_names->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

