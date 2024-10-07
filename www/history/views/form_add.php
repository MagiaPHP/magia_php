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
# Fecha de creacion del documento: 2024-10-06 08:10:46 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="history">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"] ?? 1; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

    <!-- mg_start details -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="details"><?php _t(ucfirst("details")); ?> </label>
        <div class="col-sm-8">            <textarea name="details" class="form-control" id="details" placeholder="details - textarea" ></textarea>    <script>
            ClassicEditor
                    .create(document.querySelector('#'.details.''))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
        </div>
    </div>
    <!-- mg_end details -->

    <!-- mg_start registre_date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="registre_date"><?php _t(ucfirst("registre_date")); ?>  * </label>
        <div class="col-sm-8">            
            <input 
                type="date" 
                name="registre_date" 
                class="form-control" 
                id="registre_date" 
                placeholder="registre_date"  
                required=""  
                value="current_timestamp()" 
                >
        </div>
    </div>
    <!-- mg_end registre_date -->

    <!-- mg_start order_by -->
    <!-- mg_start status -->

    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>   

    <p>* <?php _t("Required"); ?></p>

</form>
