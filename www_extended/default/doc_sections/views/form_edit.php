<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="doc_sections">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">

    <?php # section ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="section"><?php _t("Section"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="section" class="form-control" id="section" placeholder="section" value="<?php echo $doc_sections['section']; ?>" >
        </div>	
    </div>
    <?php # /section ?>

    <?php # open ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="open"><?php _t("Open"); ?></label>
        <div class="col-sm-8">
            <select name="open" class="form-control" id="open" >                
                <option value="1" <?php echo ($doc_sections["open"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($doc_sections["open"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /open ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $doc_sections['order_by']; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($doc_sections["status"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($doc_sections["status"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

