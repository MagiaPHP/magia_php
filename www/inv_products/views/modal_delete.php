<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:14 
?>

<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#inv_products_delete_<?php echo $inv_products_item['id']?>">
    <?php echo icon("trash"); ?>
    <?php _t("Delete"); ?>
</button>


<div class="modal fade" id="inv_products_delete_<?php echo $inv_products_item['id']?>" tabindex="-1" role="dialog" aria-labelledby="inv_products_edit_Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="inv_products_edit_Label"> <?php _t("Delete"); ?>
        <?php echo $inv_products_item['id']?>    
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
                        $url_redi = "index.php?c=contacts&a=inv_products&id=id=$id";
                        break;

                    case "inv_products":
                        $url_redi = "index.php?c=inv_products&a=delete&id=$inv_products_item[id]&redi[redi]=1&";
                        break;

                    default:
                        $url_redi = "index.php?c=inv_products&a=delete&id=$inv_products_item[id]&redi[redi]=1&";
                        break;
                }
                ?>        
                <a class="btn btn-danger" href="<?php echo $url_redi; ?>"><?php echo icon("trash"); ?> <?php echo _t("Delete"); ?></a>


     </div>
      

    </div>
  </div>
</div>