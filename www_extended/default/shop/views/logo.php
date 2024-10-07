<?php include view("home", "header"); ?>
<div class="row">




    <div class="col-md-2">
        <?php include "izq_myOffices.php"; ?>
    </div>

    <div class="col-md-2">
        <?php include "izq_offices.php"; ?>
    </div>


    <div class="col-md-6">    
        <h1><?php _t("Logo"); ?></h1> 


        <?php
// si el id es igual al propietrario etonces en una sede

        $pic = contacts_picture_src($id);

        echo '<p class="text-center">';
//echo contacts_picture($id, 150, 'image img-circle img-responsive img-thumbnail');
        echo '<img src="' . $pic . '" class="img-thumbnail img-responsive" data-toggle="modal" data-target="#modal_pic_user_add" alt="Headoffice"/><br>';
        echo '</p>';
        ?>




        <div class="modal fade" id="modal_pic_user_add" tabindex="-1" role="dialog" aria-labelledby="modal_pic_user_addLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <h4 class="modal-title" id="modal_pic_user_addLabel">
                            <?php _t("Change picture"); ?> <?php echo $id; ?> 
                        </h4>

                    </div>
                    <div class="modal-body">


                        <form enctype="multipart/form-data" method="post" action="index.php">
                            <input type="hidden" name="c" value="shop">
                            <input type="hidden" name="a" value="ok_pic_user_add">    
                            <input type="hidden" name="contact_id"  value="<?php echo $id; ?>">
                            <input type="hidden" name="redi" value="6">
                            <div class="form-group">
                                <label for="file"><?php _t("Pic"); ?></label>
                                <input type="file" id="file" name="file">

                                <p class="help-block"><?php //echo _t("Only these file extensions are accepted");                          ?></p>

                            </div>  
                            <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>
                        </form>

                    </div>


                </div>
            </div>
        </div>

        .




    </div>


    <div class="col-md-3">
        <?php include "der_contacts.php"; ?>
    </div>

</div>

<?php include view("home", "footer"); ?>