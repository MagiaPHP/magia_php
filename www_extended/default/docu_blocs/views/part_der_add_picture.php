<?php
//vardump($docu);
//vardump($docu->getControllers());
//vardump(PATH_GALLERY_IMG_SUBDOMAIN); 

echo '<p class="text-center">';
echo '<img src="' . PATH_GALLERY_IMG . 'picture.png" '
 . 'class="img-thumbnail img-responsive" '
 . 'data-toggle="modal" width="100" data-target="#part_der_add_picture" alt="add image"/><br>';
echo '</p>';
?>


<div class="modal fade" id="part_der_add_picture" tabindex="-1" role="dialog" aria-labelledby="part_der_add_pictureLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="part_der_add_pictureLabel">
                    <?php _t("Add picture"); ?>
                </h4>

            </div>
            <div class="modal-body">

                <form enctype="multipart/form-data" method="post" action="index.php">

                    <input type="hidden" name="c" value="docu_images">
                    <input type="hidden" name="a" value="ok_add_docu_blocs">    
                    <input type="hidden" name="controller" value="<?php echo $docu->getControllers(); ?>">
                    <input type="hidden" name="bloc_id" value="<?php echo $id; ?>">
                    <input type="hidden" name="redi" value="3">


                    <div class="form-group">
                        <label for="file"><?php _t("Pic"); ?></label>
                        <input type="file" id="file" name="file">
                        <p class="help-block"><?php echo _t("Add picture here"); ?></p>
                    </div>  

                    <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>


                </form>

            </div>
        </div>
    </div>
</div>