<?php
//$id = 95;
//
//$expenses_categories = new Expenses_categories();
//$expenses_categories->setExpenses_categories($id);

vardump($expenses_categories);
?>



<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses_categories">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi[redi]" value="1">

    <?php
    /**
     * 
      <?php # father_code  ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="father_code"><?php _t("Father_id"); ?></label>
      <div class="col-sm-8">
      <select name="father_code" class="form-control selectpicker" id="father_code" data-live-search="true" >
      <?php expenses_categories_select("id", "category", $expenses_categories->getFather_code(), array()); ?>
      </select>
      </div>
      </div>
      <?php # /father_code  ?>
     */
    ?>

    <?php # category  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="category"><?php _t("Category"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="category" class="form-control" id="category" placeholder="category" value="<?php echo $expenses_categories->getCategory(); ?>" >
        </div>	
    </div>
    <?php # /category  ?>

    <?php # description  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ><?php echo $expenses_categories->getDescription(); ?></textarea>
        </div>	
    </div>
    <?php # /description  ?>

    <?php
    /**
     * 
      <?php # order_by  ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
      <div class="col-sm-8">
      <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $expenses_categories->getOrder_by(); ?>" >
      </div>
      </div>
      <?php # /order_by  ?>

     */
    ?>
    <?php # status  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($expenses_categories->getStatus() == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($expenses_categories->getStatus() == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status  ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

