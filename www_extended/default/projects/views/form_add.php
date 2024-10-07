projects

<?php
# MagiaPHP 
# file date creation: 2024-02-01 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="projects">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="<?php echo (isset($arg["redi"])) ? $arg["redi"] : ''; ?>">

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
            <select name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true" >
                <?php contacts_select("id", "id", "", array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" id="name" placeholder="name" value="" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>
        </div>	
    </div>
    <?php # /description ?>

    <?php # address ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="address"><?php _t("Address"); ?></label>
        <div class="col-sm-8">
            <textarea name="address" class="form-control" id="address" placeholder="address - textarea" ></textarea>
        </div>	
    </div>
    <?php # /address ?>

    <?php # date_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t("Date_start"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start" value="" >
        </div>	
    </div>
    <?php # /date_start ?>

    <?php # date_registre ?>
    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
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


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
