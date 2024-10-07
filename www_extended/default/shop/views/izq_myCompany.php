<?php
//// si el id es igual al propietrario etonces en una sede
//
//$work_at_id = contacts_work_for($u_id);
//
//
//
//if ($work_at_id) {
//
//    $pic = contacts_picture_src($work_at_id);
//
//    //vardump($pic);
//
//    echo '<p class="text-center">';
//    //echo contacts_picture($id, 150, 'image img-circle img-responsive img-thumbnail');
//    echo '<img src="' . $pic . '" class="img-thumbnail img-responsive" data-toggle="modal" data-target="#modal_pic_user_add" alt="Headoffice"/><br>';
//    echo '</p>';
//} else {
//    $pic = 'www/gallery/img/office.jpg';
//    echo '<p class="text-center">';
//    //echo contacts_picture($id, 150, 'image img-circle img-responsive img-thumbnail');
//    echo '<img src="' . $pic . '" class="img-thumbnail img-responsive" data-toggle="modal" data-target="#modal_pic_user_add" alt="Office"/><br>';
//    echo '</p>';
//}
?>




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

                    <input type="hidden" name="c" value="shop">
                    <input type="hidden" name="a" value="ok_pic_user_add">    
                    <input type="hidden" name="contact_id"  value="<?php echo $work_at_id; ?>">
                    <input type="hidden" name="redi" value="3">


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





<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _t("My Info"); ?>
    </a>
    <a href="index.php?c=shop&a=myInfo" class="list-group-item"><span class="glyphicon glyphicon-user"></span> <?php _t("My info"); ?></a>
    <a href="index.php?c=shop&a=myCompany" class="list-group-item"><span class="glyphicon glyphicon-home"></span> <?php _t("My company"); ?></a>
    <?php /* <a href="index.php?c=shop&a=address" class="list-group-item"><span class="glyphicon glyphicon-map-marker"></span> <?php _t("My Addresses") ; ?></a> */ ?>
    <a href="index.php?c=shop&a=offices" class="list-group-item"><span class="glyphicon glyphicon-home"></span> <?php _t("My offices"); ?></a>
    <?PHP /* <a href="index.php?c=shop&a=users" class="list-group-item"><span class="glyphicon glyphicon-user"></span> <?php _t("Users") ; ?></a> */ ?>
    <?php /* <a href="index.php?c=shop&a=changePass" class="list-group-item"><span class="glyphicon glyphicon-wrench"></span> <?php _t("Change password") ; ?></a> */ ?>
    <?php /* <a href="index.php?c=shop&a=changeLanguage" class="list-group-item"><span class="glyphicon glyphicon-globe"></span> <?php _t("Change language") ; ?></a>    */ ?>
    <?php /* <a href="index.php?c=shop&a=stats" class="list-group-item"><span class="glyphicon glyphicon-stats"></span> <?php _t("Stats") ; ?></a> */ ?>

</div>





<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _t("My Info"); ?>
    </a>
    <a href="index.php?c=shop&a=myInfo" class="list-group-item"><span class="glyphicon glyphicon-user"></span> <?php _t("Company name"); ?></a>
    <a href="index.php?c=shop&a=myCompany" class="list-group-item"><span class="glyphicon glyphicon-home"></span> <?php _t("Tva"); ?></a>
    <a href="index.php?c=shop&a=myCompany" class="list-group-item"><span class="glyphicon glyphicon-home"></span> <?php _t("Logo"); ?></a>
    <?php /* <a href="index.php?c=shop&a=address" class="list-group-item"><span class="glyphicon glyphicon-map-marker"></span> <?php _t("My Addresses") ; ?></a> */ ?>
    <a href="index.php?c=shop&a=offices" class="list-group-item"><span class="glyphicon glyphicon-home"></span> <?php _t("My offices"); ?></a>
    <?PHP /* <a href="index.php?c=shop&a=users" class="list-group-item"><span class="glyphicon glyphicon-user"></span> <?php _t("Users") ; ?></a> */ ?>
    <?php /* <a href="index.php?c=shop&a=changePass" class="list-group-item"><span class="glyphicon glyphicon-wrench"></span> <?php _t("Change password") ; ?></a> */ ?>
    <?php /* <a href="index.php?c=shop&a=changeLanguage" class="list-group-item"><span class="glyphicon glyphicon-globe"></span> <?php _t("Change language") ; ?></a>    */ ?>
    <?php /* <a href="index.php?c=shop&a=stats" class="list-group-item"><span class="glyphicon glyphicon-stats"></span> <?php _t("Stats") ; ?></a> */ ?>

</div>

