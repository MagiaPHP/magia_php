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
# Fecha de creacion del documento: 2024-09-04 08:09:56 
#################################################################################
?>
<form action="index.php" method="get" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="doc_models">
    <input type="hidden" name="a" value="search">
    
    <div class="form-group">
        <input type="text" name="txt" class="form-control" placeholder="">
    </div>
    
    <button type="submit" class="btn btn-default"><?php echo icon("search");  ?> <?php _t("Search"); ?></button>
    
</form>