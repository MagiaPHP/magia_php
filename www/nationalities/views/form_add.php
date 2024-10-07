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
# Fecha de creacion del documento: 2024-09-27 12:09:58 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="nationalities">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"] ?? 1 ; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start num_code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="num_code"><?php _t(ucfirst("num_code")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="num_code" class="form-control" id="num_code" placeholder="num_code"  required=""  value="0" >
</div>
    </div>
    <!-- mg_end num_code -->

    <!-- mg_start alpha_2_code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="alpha_2_code"><?php _t(ucfirst("alpha_2_code")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="alpha_2_code" class="form-control" id="alpha_2_code" placeholder="alpha_2_code"  value="" >
</div>
    </div>
    <!-- mg_end alpha_2_code -->

    <!-- mg_start alpha_3_code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="alpha_3_code"><?php _t(ucfirst("alpha_3_code")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="alpha_3_code" class="form-control" id="alpha_3_code" placeholder="alpha_3_code"  value="" >
</div>
    </div>
    <!-- mg_end alpha_3_code -->

    <!-- mg_start en_short_name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="en_short_name"><?php _t(ucfirst("en_short_name")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="en_short_name" class="form-control" id="en_short_name" placeholder="en_short_name"  value="" >
</div>
    </div>
    <!-- mg_end en_short_name -->

    <!-- mg_start nationality -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="nationality"><?php _t(ucfirst("nationality")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="nationality" class="form-control" id="nationality" placeholder="nationality"  value="" >
</div>
    </div>
    <!-- mg_end nationality -->

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
