<?php
# MagiaPHP 
# file date creation: 2024-04-22 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="pettycash">
    <input type="hidden" name="a" value="ok_add_in">
    <input type="hidden" name="inout" value="in">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">


    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t("Total"); ?> * </label>
        <div class="col-sm-8">
            <div class="input-group">
                <div class="input-group-addon">+</div>
                <input 
                    type="number" 
                    step="any" 
                    name="total" 
                    class="form-control" 
                    id="total" 
                    placeholder="" 
                    value="" 
                    required=""
                    >

            </div>



        </div>	
    </div>
    <?php # /total ?>



    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?> * </label>
        <div class="col-sm-8">
            <textarea 
                name="description" 
                class="form-control" 
                id="description" 
                placeholder="" 
                required=""
                ></textarea>    

        </div>	
    </div>
    <?php # /description ?>




    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input 
                type="date" 
                name="date" 
                class="form-control" 
                id="date" 
                placeholder="date" 
                value="" 
                required=""
                >
        </div>	
    </div>
    <?php # /date ?>




    <?php # date_registre ?>


    <?php
    /**
     *     <?php # order_by ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
      <div class="col-sm-8">
      <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
      </div>
      </div>
      <?php # /order_by ?>

      <?php # status ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
      <div class="col-sm-8">
      <select name="status" class="form-control" id="status" >
      <option value="1"><?php echo _t("Actived"); ?></option>
      <option value="0"><?php echo _t("Blocked"); ?></option>
      </select>
      </div>
      </div>
      <?php # /status ?>

     */
    ?>

    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-primary"><?php echo icon("plus"); ?> <?php _t("Save"); ?></button>
        </div>      							
    </div>      							

</form>
