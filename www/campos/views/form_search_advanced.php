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
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="campos">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # base_datos ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="base_datos"><?php _t("Base_datos"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="base_datos" class="form-control" id="base_datos" placeholder="base_datos"  required=""  value="" >
        </div>	
    </div>
    <?php # /base_datos ?>

    <?php # tabla ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="tabla"><?php _t("Tabla"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="tabla" class="form-control" id="tabla" placeholder="tabla"  required=""  value="" >
        </div>	
    </div>
    <?php # /tabla ?>

    <?php # campo ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="campo"><?php _t("Campo"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="campo" class="form-control" id="campo" placeholder="campo"  required=""  value="" >
        </div>	
    </div>
    <?php # /campo ?>

    <?php # accion ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="accion"><?php _t("Accion"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="accion" class="form-control" id="accion" placeholder="accion"  required=""  value="" >
        </div>	
    </div>
    <?php # /accion ?>

    <?php # label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="label"><?php _t("Label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="label" class="form-control" id="label" placeholder="label"  required=""  value="" >
        </div>	
    </div>
    <?php # /label ?>

    <?php # tipo ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="tipo"><?php _t("Tipo"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="tipo" class="form-control" id="tipo" placeholder="tipo"  required=""  value="" >
        </div>	
    </div>
    <?php # /tipo ?>

    <?php # clase ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="clase"><?php _t("Clase"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="clase" class="form-control" id="clase" placeholder="clase"  required=""  value="" >
        </div>	
    </div>
    <?php # /clase ?>

    <?php # nombre ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="nombre"><?php _t("Nombre"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre"  required=""  value="" >
        </div>	
    </div>
    <?php # /nombre ?>

    <?php # identificador ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="identificador"><?php _t("Identificador"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="identificador" class="form-control" id="identificador" placeholder="identificador"  required=""  value="" >
        </div>	
    </div>
    <?php # /identificador ?>

    <?php # marca_agua ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="marca_agua"><?php _t("Marca_agua"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="marca_agua" class="form-control" id="marca_agua" placeholder="marca_agua"  required=""  value="" >
        </div>	
    </div>
    <?php # /marca_agua ?>

    <?php # valor ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="valor"><?php _t("Valor"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="valor" class="form-control" id="valor" placeholder="valor"  required=""  value="" >
        </div>	
    </div>
    <?php # /valor ?>

    <?php # solo_lectura ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="solo_lectura"><?php _t("Solo_lectura"); ?></label>
        <div class="col-sm-8">
            <select name="solo_lectura" class="form-control" id="solo_lectura" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /solo_lectura ?>

    <?php # obligatorio ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="obligatorio"><?php _t("Obligatorio"); ?></label>
        <div class="col-sm-8">
            <select name="obligatorio" class="form-control" id="obligatorio" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /obligatorio ?>

    <?php # seleccionado ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="seleccionado"><?php _t("Seleccionado"); ?></label>
        <div class="col-sm-8">
            <select name="seleccionado" class="form-control" id="seleccionado" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /seleccionado ?>

    <?php # desactivado ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="desactivado"><?php _t("Desactivado"); ?></label>
        <div class="col-sm-8">
            <select name="desactivado" class="form-control" id="desactivado" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /desactivado ?>

    <?php # orden ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="orden"><?php _t("Orden"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="orden" class="form-control" id="orden" placeholder="orden"   value="" >
        </div>	
    </div>
    <?php # /orden ?>

    <?php # estatus ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="estatus"><?php _t("Estatus"); ?></label>
        <div class="col-sm-8">
            <select name="estatus" class="form-control" id="estatus" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /estatus ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil");  ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>
