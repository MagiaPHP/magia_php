<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="doc_sections">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


    <?php # section ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="section"><?php _t("Section"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="section" class="form-control" id="section" placeholder="section" value="" >
        </div>	
    </div>
    <?php # /section ?>

    <?php # open ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="open"><?php _t("Open"); ?></label>
        <div class="col-sm-8">
            <select name="open" class="form-control" id="open" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /open ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Search"); ?>">
        </div>      							
    </div>      							

</form>
