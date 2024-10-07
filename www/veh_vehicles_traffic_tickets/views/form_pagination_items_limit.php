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
# Fecha de creacion del documento: 2024-09-16 17:09:46 
#################################################################################
?>


<form class="form-inline" method="post" action="index.php">

    <input type="hidden" name="c" value="user_options">
    <input type="hidden" name="a" value="ok_push">                                                         
    <input type="hidden" name="option" value="veh_vehicles_traffic_tickets_pagination_items_limit">                                                         
        
    <input type="hidden" name="redi[redi]" value="5">                                                          
    <input type="hidden" name="redi[c]" value="veh_vehicles_traffic_tickets">                                                          
    <input type="hidden" name="redi[a]" value="index">                                                          

    <div class="form-group">
        <label class="sr-only" for="data"><?php _t("Data"); ?></label>
        <div class="input-group">                    
            <input 
                type="text" 
                class="form-control" 
                id="data" 
                name="data" 
                placeholder="" 
                value="<?php echo user_options("veh_vehicles_traffic_tickets_pagination_items_limit", $u_id); ?>"> 

            <div class="input-group-addon"><?php _t("items / page"); ?></div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        <?php _t("Update"); ?>
    </button>
</form>





