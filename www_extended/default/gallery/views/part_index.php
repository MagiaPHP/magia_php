
<div class="row">

    <?php
//    vardump(gallery_list());
//vardump(PATH_GALLERY_IMG_SUBDOMAIN); 
//vardump(gallery_list()); 


    foreach (gallery_list() as $key => $pic) {
        ?>

        <div class="col-xs-3 col-md-3">
            <a href="#" class="thumbnail" data-toggle="modal" data-target="#myGalleryDetails_<?php echo $key; ?>">
                <img src="<?php echo PATH_GALLERY_IMG_SUBDOMAIN; ?><?php echo $pic['name'] ?>" alt="...">
                <br>
                <button class="btn btn-primary"><?php _t("Use like logo"); ?></button>
                <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> <?php _t("Delete"); ?></button>
            </a>





            <?php #########################################################    ?>
            <?php #########################################################  ?>
            <?php #########################################################  ?>

            <div class="modal fade" 
                 id="myGalleryDetails_<?php echo $key; ?>" 
                 tabindex="-1" 
                 role="dialog" 
                 aria-labelledby="myGalleryDetailsLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myGalleryDetailsLabel">
                                <?php _t("Details"); ?>
                            </h4>
                        </div>
                        <div class="modal-body">

                            <a href="#" class="thumbnail">
                                <img src="<?php echo PATH_GALLERY_IMG_SUBDOMAIN; ?><?php echo $pic['name'] ?>" alt="...">
                            </a>




                            <a href="index.php?c=gallery&a=ok_use_like_logo&id=<?php echo $pic['id']; ?>&redi=2" type="button" class="btn btn-primary">
                                <span class="glyphicon glyphicon-picture"></span>
                                <?php _t("Use like logo"); ?>
                            </a>

                        </div>


                        <div class="modal-footer">
                            <a href="index.php?c=gallery&a=ok_picture_delete&id=<?php echo $pic['id']; ?>&redi=4" type="button" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                                <?php _t("Delete"); ?>
                            </a>
                        </div>


                    </div>
                </div>
            </div>
            <?php #########################################################    ?>
            <?php #########################################################  ?>
            <?php #########################################################  ?>



        </div>
    <?php }
    ?>

</div>




