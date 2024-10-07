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
# Fecha de creacion del documento: 2024-09-04 08:09:26 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="emails">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $emails->getId(); ?>">
        <?php # father_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="father_id"><?php _t("Emails"); ?></label>
        <div class="col-sm-8">
               <select name="father_id" class="form-control selectpicker" id="father_id" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                emails_select("id", array("id"), $emails->getFather_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /father_id ?>

    <?php # sender_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="sender_id"><?php _t("Emails"); ?></label>
        <div class="col-sm-8">
               <select name="sender_id" class="form-control selectpicker" id="sender_id" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                contacts_select("id", array("id"), $emails->getSender_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /sender_id ?>

    <?php # reciver_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="reciver_id"><?php _t("Emails"); ?></label>
        <div class="col-sm-8">
               <select name="reciver_id" class="form-control selectpicker" id="reciver_id" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                contacts_select("id", array("id"), $emails->getReciver_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /reciver_id ?>

    <?php # folder ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="folder"><?php _t("Emails"); ?></label>
        <div class="col-sm-8">
               <select name="folder" class="form-control selectpicker" id="folder" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                emails_folders_select("folder", array("folder"), $emails->getFolder() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /folder ?>

    <?php # subjet ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="subjet"><?php _t("Emails"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="subjet" class="form-control" id="subjet" placeholder="subjet"  value="<?php echo $emails->getSubjet(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /subjet ?>

    <?php # message ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="message"><?php _t("Emails"); ?></label>
        <div class="col-sm-8">
            <textarea name="message" class="form-control" id="message" placeholder="message - textarea"  disabled="" ><?php echo $emails->getMessage(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . message . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /message ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registre"><?php _t("Emails"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_registre" class="form-control" id="date_registre" placeholder="date_registre"  required=""  value="<?php echo $emails->getDate_registre(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # date_read ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_read"><?php _t("Emails"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_read" class="form-control" id="date_read" placeholder="date_read"  value="<?php echo $emails->getDate_read(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_read ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Emails"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $emails->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Emails"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($emails->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($emails->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

