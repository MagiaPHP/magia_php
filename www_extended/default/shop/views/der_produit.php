<?php
include "modal_der_picture_add.php";
?>
<hr>
<?php
foreach (products_pictures_search_by_product_id($id) as $key => $picture) {
    $pic_name = gallery_field_id("name", $picture['picture_id']);
    $pic = "www_extended/default/gallery/img/$pic_name";
    $img = ( file_exists($pic) ) ?
            $pic :
            "www_extended/default/gallery/img/noimage.png"
    ;
    ?>
    <div class="col-sm-12 col-md-12">
        <div class="thumbnail">
            <img src="<?php echo $img; ?>" alt="...">
            <div class="caption">                
                <p>                    
                    <?php
                    //include "modal_details_picture.php";
                    ?>                    
                    <a 
                        href="index.php?c=products&a=ok_picture_delete&id=<?php echo $picture['id']; ?>&product_id=<?php echo $id; ?>" 
                        class="btn btn-default" 
                        role="button"><?php _t("Delete"); ?>
                    </a>                                                            
                    <?php if (!$picture['principal']) { ?>
                        <a 
                            href="index.php?c=products&a=ok_picture_become_principal&id=<?php echo $picture['id']; ?>&product_id=<?php echo $id; ?>" 
                            class="btn btn-default" 
                            role="button"><?php _t("Make principal"); ?>
                        </a>
                    <?php } else { ?>
                        <a 
                            href="#" 
                            class="btn btn-default" 
                            role="button"><?php _t("Is Principal"); ?>
                        </a>
                    <?php } ?>                    
                </p>
            </div>
        </div>
    </div>
<?php } ?>
        




