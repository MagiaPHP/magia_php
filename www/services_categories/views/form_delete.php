<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="services_categories">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $services_categories->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php # section_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="section_code"><?php _t("Section_code"); ?></label>
        <div class="col-sm-8">
            <select name="section_code" class="form-control selectpicker" id="section_code" data-live-search="true"  disabled="" >
                <?php services_sections_select("code", array("code"), $services_categories->getSection_code(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /section_code ?>

    <?php # category_father ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="category_father"><?php _t("Category_father"); ?></label>
        <div class="col-sm-8">
            <select name="category_father" class="form-control selectpicker" id="category_father" data-live-search="true"  disabled="" >
                <?php services_categories_select("code", array("code"), $services_categories->getCategory_father(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /category_father ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code" value="<?php echo $services_categories->getCode(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # category ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="category"><?php _t("Category"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="category" class="form-control" id="category" placeholder="category" value="<?php echo $services_categories->getCategory(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /category ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $services_categories->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($services_categories->getStatus() == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($services_categories->getStatus() == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
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

