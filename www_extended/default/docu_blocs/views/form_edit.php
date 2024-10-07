<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="docu_blocs">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $docu_blocs->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php
    vardump($docu_blocs);
    ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="title" class="form-control" id="title" placeholder="title" value="<?php echo $docu_blocs->getTitle(); ?>" >
        </div>	
    </div>
    <?php # /title ?>

    <?php # post ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="post"><?php _t("Post"); ?></label>
        <div class="col-sm-8">
            <textarea name="post" class="form-control" id="post" placeholder="post - textarea" ><?php echo $docu_blocs->getPost(); ?></textarea>
        </div>	
    </div>
    <?php # /post ?>

    <?php /**
     * 
     *
      <?php # h ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="h"><?php _t("H"); ?></label>
      <div class="col-sm-8">
      <select name="h" class="form-control" id="h" >
      <option value="1" <?php echo ($docu_blocs->getH() == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
      <option value="0" <?php echo ($docu_blocs->getH() == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
      </select>
      </div>
      </div>
      <?php # /h ?>

      <?php # order_by ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
      <div class="col-sm-8">
      <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $docu_blocs->getOrder_by(); ?>" >
      </div>
      </div>
      <?php # /order_by ?>

      <?php # status ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
      <div class="col-sm-8">
      <select name="status" class="form-control" id="status" >
      <option value="1" <?php echo ($docu_blocs->getStatus() == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
      <option value="0" <?php echo ($docu_blocs->getStatus() == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
      </select>
      </div>
      </div>
      <?php # /status ?>
     * 
     */
    ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>

