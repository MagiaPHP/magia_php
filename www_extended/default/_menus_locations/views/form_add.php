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
# Fecha de creacion del documento: 2024-09-08 03:09:52 
#################################################################################

//vardump($arg); 
?>
<form action="index.php" method="post" >
    <input type="hidden" name="c" value="_menus_locations">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

    <!-- mg_start location -->
    <div class="form-group">
        <label for="location"><?php _t(ucfirst("location")); ?>  * </label>
        <div >            
            <input type="text" name="location" class="form-control" id="location" placeholder="location"  required=""  value="" >
        </div>
    </div>
    <!-- mg_end location -->

    <!-- mg_start order_by -->
    <!-- mg_start status -->

    <div class="form-group">
        <label  for=""></label>
        <div >    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>   

    <p>* <?php _t("Required"); ?></p>

</form>




