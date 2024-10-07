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
# Fecha de creacion del documento: 2024-09-16 17:09:36 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="veh_vehicles">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t(ucfirst("name")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="name" class="form-control" id="name" placeholder="name"  required=""  value="" >
</div>
    </div>
    <!-- mg_end name -->

    <!-- mg_start marca -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="marca"><?php _t(ucfirst("marca")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="marca" class="form-control" id="marca" placeholder="marca"  value="" >
</div>
    </div>
    <!-- mg_end marca -->

    <!-- mg_start modelo -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="modelo"><?php _t(ucfirst("modelo")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="modelo" class="form-control" id="modelo" placeholder="modelo"  value="" >
</div>
    </div>
    <!-- mg_end modelo -->

    <!-- mg_start serie -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="serie"><?php _t(ucfirst("serie")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="serie" class="form-control" id="serie" placeholder="serie"  value="" >
</div>
    </div>
    <!-- mg_end serie -->

    <!-- mg_start type -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t(ucfirst("type")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="type" class="form-control" id="type" placeholder="type"  value="" >
</div>
    </div>
    <!-- mg_end type -->

    <!-- mg_start pasangers -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="pasangers"><?php _t(ucfirst("pasangers")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="pasangers" class="form-control" id="pasangers" placeholder="pasangers"   required=""  value="" >
</div>
    </div>
    <!-- mg_end pasangers -->

    <!-- mg_start year -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="year"><?php _t(ucfirst("year")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="year" class="form-control" id="year" placeholder="year"  value="" >
</div>
    </div>
    <!-- mg_end year -->

    <!-- mg_start chasis -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="chasis"><?php _t(ucfirst("chasis")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="chasis" class="form-control" id="chasis" placeholder="chasis"  value="" >
</div>
    </div>
    <!-- mg_end chasis -->

    <!-- mg_start color -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="color"><?php _t(ucfirst("color")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="color" class="form-control" id="color" placeholder="color"  value="" >
</div>
    </div>
    <!-- mg_end color -->

    <!-- mg_start alto -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="alto"><?php _t(ucfirst("alto")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="alto" class="form-control" id="alto" placeholder="alto"   value="" >
</div>
    </div>
    <!-- mg_end alto -->

    <!-- mg_start ancho -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="ancho"><?php _t(ucfirst("ancho")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="ancho" class="form-control" id="ancho" placeholder="ancho"   value="" >
</div>
    </div>
    <!-- mg_end ancho -->

    <!-- mg_start largo -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="largo"><?php _t(ucfirst("largo")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="largo" class="form-control" id="largo" placeholder="largo"   value="" >
</div>
    </div>
    <!-- mg_end largo -->

    <!-- mg_start date_buy -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_buy"><?php _t(ucfirst("date_buy")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date_buy" class="form-control" id="date_buy" placeholder="date_buy"  value="" >
</div>
    </div>
    <!-- mg_end date_buy -->

    <!-- mg_start mma -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="mma"><?php _t(ucfirst("mma")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="mma" class="form-control" id="mma" placeholder="mma"   required=""  value="" >
<p class="help-block"><?php echo _tr("masa máxima autorizada"); ?></p></div>
    </div>
    <!-- mg_end mma -->

    <!-- mg_start towing_system -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="towing_system"><?php _t(ucfirst("towing_system")); ?> </label>
        <div class="col-sm-8">            <select name="towing_system" class="form-control" id="towing_system" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end towing_system -->

    <!-- mg_start towing_system_kl -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="towing_system_kl"><?php _t(ucfirst("towing_system_kl")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="towing_system_kl" class="form-control" id="towing_system_kl" placeholder="towing_system_kl"   value="" >
</div>
    </div>
    <!-- mg_end towing_system_kl -->

    <!-- mg_start date_registre -->
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
