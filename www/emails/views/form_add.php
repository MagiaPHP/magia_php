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
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="emails">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start father_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="father_id"><?php _t(ucfirst("father_id")); ?> </label>
        <div class="col-sm-8">               <select name="father_id" class="form-control selectpicker" id="father_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                emails_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end father_id -->

    <!-- mg_start sender_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="sender_id"><?php _t(ucfirst("sender_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="sender_id" class="form-control selectpicker" id="sender_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                contacts_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end sender_id -->

    <!-- mg_start reciver_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="reciver_id"><?php _t(ucfirst("reciver_id")); ?> </label>
        <div class="col-sm-8">               <select name="reciver_id" class="form-control selectpicker" id="reciver_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                contacts_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end reciver_id -->

    <!-- mg_start folder -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="folder"><?php _t(ucfirst("folder")); ?> </label>
        <div class="col-sm-8">               <select name="folder" class="form-control selectpicker" id="folder" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                emails_folders_select("folder", array("folder"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end folder -->

    <!-- mg_start subjet -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="subjet"><?php _t(ucfirst("subjet")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="subjet" class="form-control" id="subjet" placeholder="subjet"  value="" >
</div>
    </div>
    <!-- mg_end subjet -->

    <!-- mg_start message -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="message"><?php _t(ucfirst("message")); ?> </label>
        <div class="col-sm-8">            <textarea name="message" class="form-control" id="message" placeholder="message - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . message . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end message -->

    <!-- mg_start date_registre -->
    <!-- mg_start date_read -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_read"><?php _t(ucfirst("date_read")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date_read" class="form-control" id="date_read" placeholder="date_read"  value="" >
</div>
    </div>
    <!-- mg_end date_read -->

    <!-- mg_start order_by -->
    <!-- mg_start status -->
  
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus");  ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>   

<p>* <?php _t("Required"); ?></p>

</form>
