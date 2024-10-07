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
# Fecha de creacion del documento: 2024-09-26 17:09:16 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="tasks_contacts">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # task_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="task_id"><?php _t("Task_id"); ?></label>
        <div class="col-sm-8">
               <select name="task_id" class="form-control selectpicker" id="task_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                tasks_select("id", array("id"), $tasks_contacts->getTask_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /task_id ?>

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
               <select name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true" >
                        
                <?php contacts_select("id", array("name", "lastname"), $tasks_contacts->getContact_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # date_registred ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registred"><?php _t("Date_registred"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_registred" class="form-control" id="date_registred" placeholder="date_registred"  required=""  value="" >
        </div>	
    </div>
    <?php # /date_registred ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
               <select name="status" class="form-control selectpicker" id="status" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                tasks_status_select("code", array("code"), $tasks_contacts->getStatus() , array()); ?>                        
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
