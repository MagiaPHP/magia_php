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
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="veh_vehicles">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" id="name" placeholder="name"  required=""  value="" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # marca ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="marca"><?php _t("Marca"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="marca" class="form-control" id="marca" placeholder="marca"  value="" >
        </div>	
    </div>
    <?php # /marca ?>

    <?php # modelo ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="modelo"><?php _t("Modelo"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="modelo" class="form-control" id="modelo" placeholder="modelo"  value="" >
        </div>	
    </div>
    <?php # /modelo ?>

    <?php # serie ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="serie"><?php _t("Serie"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="serie" class="form-control" id="serie" placeholder="serie"  value="" >
        </div>	
    </div>
    <?php # /serie ?>

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="type" class="form-control" id="type" placeholder="type"  value="" >
        </div>	
    </div>
    <?php # /type ?>

    <?php # pasangers ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="pasangers"><?php _t("Pasangers"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="pasangers" class="form-control" id="pasangers" placeholder="pasangers"   required=""  value="" >
        </div>	
    </div>
    <?php # /pasangers ?>

    <?php # year ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="year"><?php _t("Year"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="year" class="form-control" id="year" placeholder="year"  value="" >
        </div>	
    </div>
    <?php # /year ?>

    <?php # chasis ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="chasis"><?php _t("Chasis"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="chasis" class="form-control" id="chasis" placeholder="chasis"  value="" >
        </div>	
    </div>
    <?php # /chasis ?>

    <?php # color ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="color"><?php _t("Color"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="color" class="form-control" id="color" placeholder="color"  value="" >
        </div>	
    </div>
    <?php # /color ?>

    <?php # alto ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="alto"><?php _t("Alto"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="alto" class="form-control" id="alto" placeholder="alto"   value="" >
        </div>	
    </div>
    <?php # /alto ?>

    <?php # ancho ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ancho"><?php _t("Ancho"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="ancho" class="form-control" id="ancho" placeholder="ancho"   value="" >
        </div>	
    </div>
    <?php # /ancho ?>

    <?php # largo ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="largo"><?php _t("Largo"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="largo" class="form-control" id="largo" placeholder="largo"   value="" >
        </div>	
    </div>
    <?php # /largo ?>

    <?php # date_buy ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_buy"><?php _t("Date_buy"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_buy" class="form-control" id="date_buy" placeholder="date_buy"  value="" >
        </div>	
    </div>
    <?php # /date_buy ?>

    <?php # mma ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mma"><?php _t("Mma"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="mma" class="form-control" id="mma" placeholder="mma"   required=""  value="" >
        </div>	
    </div>
    <?php # /mma ?>

    <?php # towing_system ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="towing_system"><?php _t("Towing_system"); ?></label>
        <div class="col-sm-8">
            <select name="towing_system" class="form-control" id="towing_system" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /towing_system ?>

    <?php # towing_system_kl ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="towing_system_kl"><?php _t("Towing_system_kl"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="towing_system_kl" class="form-control" id="towing_system_kl" placeholder="towing_system_kl"   value="" >
        </div>	
    </div>
    <?php # /towing_system_kl ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_registre" class="form-control" id="date_registre" placeholder="date_registre"  required=""  value="" >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
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
