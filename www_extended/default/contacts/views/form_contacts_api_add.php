<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="api">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
    <input type="hidden" name="redi" value="5">

    <?php /**
      # contact_id ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
      <div class="col-sm-8">
      <select  name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true">
      <?php contacts_select("id", "id", array(), array()); ?>
      </select>
      </div>
      </div>
      <?php # /contact_id
     * 
     * 
     */ ?>


    <?php # api_key  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="api_key"><?php _t("Api_key"); ?></label>
        <div class="col-sm-8">
            <input 
                type="text"  
                name="api_key" 
                class="form-control" 
                id="api_key" 
                placeholder=""
                value="<?php echo rand() ?>-<?php echo rand() ?>-<?php echo rand() ?>"
                readonly=""
                >
        </div>	
    </div>
    <?php # /api_key  ?>

    <?php # crud  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="crud"><?php _t("Crud"); ?></label>
        <div class="col-sm-8">
            <input 
                type="text"  
                name="crud" 
                class="form-control" 
                id="crud" 
                placeholder=""
                value="CRUD"
                >
        </div>	
    </div>
    <?php # /crud  ?>

    <?php # date_start  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date_start"><?php _t("Date_start"); ?></label>
        <div class="col-sm-8">
            <input 
                type="date"  
                name="date_start" 
                class="form-control" 
                id="date_start" 
                placeholder="yyyy-mm-dd" 
                value="<?php echo date("Y-m-d"); ?>">
        </div>	
    </div>
    <?php # /date_start  ?>

    <?php # date_end  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date_end"><?php _t("Date_end"); ?></label>
        <div class="col-sm-8">
            <input 
                type="date"  
                name="date_end" 
                class="form-control" 
                id="date_end" 
                placeholder="yyyy-mm-dd"
                value="<?php echo date("Y-m-d"); ?>">
        </div>	
    </div>
    <?php # /date_end  ?>

    <?php
    /**
     *     <?php # order_by  ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="order_by" class="form-control" id="order_by" placeholder=" - defecto">
      </div>
      </div>
      <?php # /order_by  ?>

      <?php # status  ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="status" class="form-control" id="status" placeholder=" - defecto">
      </div>
      </div>
      <?php # /status  ?>
     */
    ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
