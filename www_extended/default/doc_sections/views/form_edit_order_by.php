<form class="form-inline" action="index.php" method="post" >
    <input type="hidden" name="c" value="doc_sections">
    <input type="hidden" name="a" value="ok_edit_order_by">
    <input type="hidden" name="id" value="<?php echo $doc_sections->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="2">



    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label sr-only" for="order_by"><?php _t("Order_by"); ?></label>
        <input type="number" 
               name="order_by" 
               class="form-control" 
               id="order_by" 
               placeholder="order_by" 
               value="<?php echo $doc_sections->getOrder_by(); ?>" >
    </div>
    <?php # /order_by ?>

    <div class="form-group">                
        <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
    </div>      							

</form>

