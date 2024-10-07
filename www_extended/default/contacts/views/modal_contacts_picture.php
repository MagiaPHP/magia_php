<p class="text-center">
    <img
        src="<?php echo contacts_picture_src($id); ?>"
        class="img img-responsive"
        data-toggle="modal" data-target="#modal_pic_user_add"
        >
</p>


<div class="modal fade" id="modal_pic_user_add" tabindex="-1" role="dialog" aria-labelledby="modal_pic_user_addLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="modal_pic_user_addLabel">
                    <?php _t("Change picture"); ?>
                </h4>

            </div>
            <div class="modal-body">


                <form enctype="multipart/form-data" method="post" action="index.php">

                    <input type="hidden" name="c" value="gallery">
                    <input type="hidden" name="a" value="ok_pic_user_add">
                    <input type="hidden" name="contact_id"  value="<?php echo $id; ?>">
                    <input type="hidden" name="redi" value="2">


                    <div class="form-group">
                        <label for="file"><?php _t("Pic"); ?></label>
                        <input type="file" id="file" name="file">

                        <p class="help-block"><?php // echo _t("Only these file extensions are accepted")        ?></p>

                    </div>

                    <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>
                </form>

            </div>


        </div>
    </div>
</div>