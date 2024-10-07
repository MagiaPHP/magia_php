<?php
//$directory = 'www/gallery/img/';
//$scanned_directory = array_diff(scandir($directory), array('..', '.', '.*'));
//foreach ($scanned_directory as $archivo) {
//    if (is_dir("www/$archivo")) {
//        require "www/$archivo/functions.php";
//    }
//}
?>



<div class="row">

    <?php
//    vardump($gallery);
    foreach ($gallery as $key => $pic) {

//          vardump($key);
        ?>

        <div class="col-xs-2 col-md-2">
            <a href="#" class="thumbnail" data-toggle="modal" data-target="#myGalleryDetails_<?php echo $key; ?>">
                <img src="<?php echo PATH_GALLERY; ?><?php echo $pic['name'] ?>" alt="...">
            </a>


            <?php ######################################################### ?>
            <?php ######################################################### ?>
            <?php ######################################################### ?>

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
                                <img src="<?php echo "www/gallery/img/_" . _options_option('config_subdomain') . "/"; ?><?php echo $pic['name'] ?>" alt="...">
                            </a>


                            _<?php echo $key; ?>
                        </div>
                        <div class="modal-footer">
                            <a href="index.php?c=gallery&a=ok_picture_delete&filename=<?php echo $pic['name']; ?>&redi=2" type="button" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                                <?php _t("Delete"); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php ######################################################### ?>
            <?php ######################################################### ?>
            <?php ######################################################### ?>



        </div>
    <?php }
    ?>

</div>







