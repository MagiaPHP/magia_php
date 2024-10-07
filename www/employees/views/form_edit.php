<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-10-03 18:10:04 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="employees">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $employees->getId(); ?>">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # company_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_id"><?php _t("Company_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="company_id" class="form-control" id="company_id" placeholder="company_id"   value="<?php echo $employees->getCompany_id(); ?>" >
        </div>	
    </div>
    <?php # /company_id ?>

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="contact_id" class="form-control" id="contact_id" placeholder="contact_id"   required=""  value="<?php echo $employees->getContact_id(); ?>" >
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # owner_ref ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="owner_ref"><?php _t("Owner_ref"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="owner_ref" class="form-control" id="owner_ref" placeholder="owner_ref"  value="<?php echo $employees->getOwner_ref(); ?>" >
        </div>	
    </div>
    <?php # /owner_ref ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="<?php echo $employees->getDate(); ?>" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # cargo ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="cargo"><?php _t("Cargo"); ?></label>
        <div class="col-sm-8">
               <select name="cargo" class="form-control selectpicker" id="cargo" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                employees_categories_select("category", array("category"), $employees->getCargo() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /cargo ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   value="<?php echo $employees->getOrder_by(); ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($employees->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($employees->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil");  ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>

