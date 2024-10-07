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
# Fecha de creacion del documento: 2024-09-16 19:09:41 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="campos">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start base_datos -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="base_datos"><?php _t(ucfirst("base_datos")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="base_datos" class="form-control" id="base_datos" placeholder="base_datos"  required=""  value="" >
</div>
    </div>
    <!-- mg_end base_datos -->

    <!-- mg_start tabla -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="tabla"><?php _t(ucfirst("tabla")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="tabla" class="form-control" id="tabla" placeholder="tabla"  required=""  value="" >
</div>
    </div>
    <!-- mg_end tabla -->

    <!-- mg_start campo -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="campo"><?php _t(ucfirst("campo")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="campo" class="form-control" id="campo" placeholder="campo"  required=""  value="" >
</div>
    </div>
    <!-- mg_end campo -->

    <!-- mg_start accion -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="accion"><?php _t(ucfirst("accion")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="accion" class="form-control" id="accion" placeholder="accion"  required=""  value="" >
</div>
    </div>
    <!-- mg_end accion -->

    <!-- mg_start label -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="label"><?php _t(ucfirst("label")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="label" class="form-control" id="label" placeholder="label"  required=""  value="" >
</div>
    </div>
    <!-- mg_end label -->

    <!-- mg_start tipo -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="tipo"><?php _t(ucfirst("tipo")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="tipo" class="form-control" id="tipo" placeholder="tipo"  required=""  value="" >
</div>
    </div>
    <!-- mg_end tipo -->

    <!-- mg_start clase -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="clase"><?php _t(ucfirst("clase")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="clase" class="form-control" id="clase" placeholder="clase"  required=""  value="form-control" >
</div>
    </div>
    <!-- mg_end clase -->

    <!-- mg_start nombre -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="nombre"><?php _t(ucfirst("nombre")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre"  required=""  value="" >
</div>
    </div>
    <!-- mg_end nombre -->

    <!-- mg_start identificador -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="identificador"><?php _t(ucfirst("identificador")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="identificador" class="form-control" id="identificador" placeholder="identificador"  required=""  value="" >
</div>
    </div>
    <!-- mg_end identificador -->

    <!-- mg_start marca_agua -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="marca_agua"><?php _t(ucfirst("marca_agua")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="marca_agua" class="form-control" id="marca_agua" placeholder="marca_agua"  required=""  value="" >
</div>
    </div>
    <!-- mg_end marca_agua -->

    <!-- mg_start valor -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="valor"><?php _t(ucfirst("valor")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="valor" class="form-control" id="valor" placeholder="valor"  required=""  value="" >
</div>
    </div>
    <!-- mg_end valor -->

    <!-- mg_start solo_lectura -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="solo_lectura"><?php _t(ucfirst("solo_lectura")); ?> </label>
        <div class="col-sm-8">            <select name="solo_lectura" class="form-control" id="solo_lectura" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end solo_lectura -->

    <!-- mg_start obligatorio -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="obligatorio"><?php _t(ucfirst("obligatorio")); ?> </label>
        <div class="col-sm-8">            <select name="obligatorio" class="form-control" id="obligatorio" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end obligatorio -->

    <!-- mg_start seleccionado -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="seleccionado"><?php _t(ucfirst("seleccionado")); ?> </label>
        <div class="col-sm-8">            <select name="seleccionado" class="form-control" id="seleccionado" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end seleccionado -->

    <!-- mg_start desactivado -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="desactivado"><?php _t(ucfirst("desactivado")); ?> </label>
        <div class="col-sm-8">            <select name="desactivado" class="form-control" id="desactivado" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end desactivado -->

    <!-- mg_start orden -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="orden"><?php _t(ucfirst("orden")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="orden" class="form-control" id="orden" placeholder="orden"   value="" >
</div>
    </div>
    <!-- mg_end orden -->

    <!-- mg_start estatus -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="estatus"><?php _t(ucfirst("estatus")); ?> </label>
        <div class="col-sm-8">            <select name="estatus" class="form-control" id="estatus" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end estatus -->

  
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus");  ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>   

<p>* <?php _t("Required"); ?></p>

</form>
