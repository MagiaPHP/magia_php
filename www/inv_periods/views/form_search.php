<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:12 
?>
<form action="index.php" method="get" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="inv_periods">
    <input type="hidden" name="a" value="search">
    
    <div class="form-group">
        <input type="text" name="txt" class="form-control" placeholder="">
    </div>
    
    <button type="submit" class="btn btn-default"><?php echo icon("search");  ?> <?php _t("Save"); ?></button>
    
</form>