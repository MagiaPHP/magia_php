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
# Fecha de creacion del documento: 2024-09-18 06:09:39 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="cv_skills">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $cv_skills->getId(); ?>">
        <?php # cv_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="cv_id"><?php _t("Cv id"); ?></label>
        <div class="col-sm-8">
               <select name="cv_id" class="form-control selectpicker" id="cv_id" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                cv_select("id", array("id"), $cv_skills->getCv_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /cv_id ?>

    <?php # skill_name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="skill_name"><?php _t("Skill name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="skill_name" class="form-control" id="skill_name" placeholder="skill_name"  value="<?php echo $cv_skills->getSkill_name(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /skill_name ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   value="<?php echo $cv_skills->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($cv_skills->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($cv_skills->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

