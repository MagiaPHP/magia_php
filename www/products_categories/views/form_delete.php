<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="products_categories">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $products_categories->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

        <?php # group_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="group_code"><?php _t("Group_code"); ?></label>
        <div class="col-sm-8">
               <select name="group_code" class="form-control selectpicker" id="group_code" data-live-search="true"  disabled="" >
                <?php products_groups_select("father_code", array("father_code"), $products_categories->getGroup_code() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /group_code ?>

    <?php # father_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="father_code"><?php _t("Father_code"); ?></label>
        <div class="col-sm-8">
               <select name="father_code" class="form-control selectpicker" id="father_code" data-live-search="true"  disabled="" >
                <?php products_categories_select("code", array("code"), $products_categories->getFather_code() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /father_code ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code" value="<?php echo $products_categories->getCode(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" id="name" placeholder="name" value="<?php echo $products_categories->getName(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $products_categories->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($products_categories->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($products_categories->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

