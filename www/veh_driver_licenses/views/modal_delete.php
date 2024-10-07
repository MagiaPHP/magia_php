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
# Fecha de creacion del documento: 2024-09-16 17:09:51 
#################################################################################
?>

<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#veh_driver_licenses_delete_<?php echo $veh_driver_licenses_item['id']?>">
    <?php echo icon("trash"); ?>
    <?php _t("Delete"); ?>
</button>


<div class="modal fade" id="veh_driver_licenses_delete_<?php echo $veh_driver_licenses_item['id']?>" tabindex="-1" role="dialog" aria-labelledby="veh_driver_licenses_delete_<?php echo $veh_driver_licenses_item['id']?>Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="veh_driver_licenses_delete_<?php echo $veh_driver_licenses_item['id']?>Label"> <?php _t("Delete"); ?>
        <?php echo $veh_driver_licenses_item['id']?>    
        </h4>
      </div>
      
      <div class="modal-body">      
        <p>
            <?php _t("Are you sure you want to delete"); ?>?
        </p>      
      </div>
      
    <div class="modal-footer"> 
    
    
                <?php
                switch ($c) {
                    case "contacts":
                        $url_redi = "index.php?c=contacts&a=veh_driver_licenses&id=id=$id";
                        break;

                    case "veh_driver_licenses":
                        $url_redi = "index.php?c=veh_driver_licenses&a=ok_delete&id=$veh_driver_licenses_item[id]&redi[redi]=1&";
                        break;

                    default:
                        $url_redi = "index.php?c=veh_driver_licenses&a=delete&id=$veh_driver_licenses_item[id]&redi[redi]=1&";
                        break;
                }
                ?>        
                <a class="btn btn-danger" href="<?php echo $url_redi; ?>"><?php echo icon("trash"); ?> <?php echo _t("Delete"); ?></a>


     </div>
      

    </div>
  </div>
</div>