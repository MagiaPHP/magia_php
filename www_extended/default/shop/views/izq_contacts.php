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
                    <?php _t("Change picture"); ?>
                </h4>

            </div>
            <div class="modal-body">


                <form enctype="multipart/form-data" method="post" action="index.php">
                    <input type="hidden" name="c" value="shop">
                    <input type="hidden" name="a" value="ok_pic_user_add">    
                    <input type="hidden" name="contact_id"  value="<?php echo $id; ?>">
                    <input type="hidden" name="redi" value="5">
                    <div class="form-group">
                        <label for="file"><?php _t("Pic"); ?></label>
                        <input type="file" id="file" name="file">

                        <p class="help-block"><?php //echo _t("Only these file extensions are accepted");                               ?></p>

                    </div>  
                    <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>
                </form>

            </div>


        </div>
    </div>
</div>

<?php
/*
  <p class="text-center">
  <img src="www/gallery/img/user.png" alt="..." class="img-rounded img-thumbnail">
  <p> */
?>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <i class="fas fa-user"></i>
        <?php //_t("Contacts"); ?> 
        <?php echo contacts_formated($id); ?>

        <?php
        if (users_field_contact_id('status', $id) == USER_BLOCKED) {
            echo '<span class="glyphicon glyphicon-lock"></span>';
        }
        ?>


    </a>
    <a href="index.php?c=shop&a=contacts_details&id=<?php echo $id; ?>" class="list-group-item <?php echo ($a == "contacts_details") ? " list-group-item-info " : ""; ?>">
        <?php _menu_icon("top", "users") ?>
        <?php _t("Details"); ?> (<?php echo $id; ?>)
    </a>


    <?php if (employees_field_by_contact_id("id", $id)) { ?>
        <a href="index.php?c=shop&a=contacts_orders&id=<?php echo $id; ?>" class="list-group-item <?php echo ($a == "contacts_orders") ? " list-group-item-info " : ""; ?>">
            <span class="glyphicon glyphicon-file"></span>
            <?php _t("Orders create by"); ?>
        </a>
    <?php } ?>


    <?php if (patients_is_patient($id)) { ?>    
        <a href="index.php?c=shop&a=patients_orders&id=<?php echo $id; ?>" class="list-group-item <?php echo ($a == "patients_orders") ? " list-group-item-info " : ""; ?>">
            <span class="glyphicon glyphicon-file"></span>
            <?php _t("Orders create for"); ?>
        </a>
    <?php } ?>



    <?php if (permissions_has_permission($u_rol, "shop_directory", "read")) { ?>
        <a href="index.php?c=shop&a=contacts_directory&id=<?php echo $id; ?>" class="list-group-item <?php echo ($a == "contacts_directory") ? " list-group-item-info " : ""; ?>">
            <?php _menu_icon("top", "directory") ?>
            <?php _t("Directory"); ?>
        </a>
    <?php } ?>



    <?php
    // si el modulo esta activo 
    //
    if (modules_field_module('status', 'earprints')) {
        ?>

        <a href="index.php?c=shop&a=contacts_earprints&id=<?php echo $id; ?>" class="list-group-item <?php echo ($a == "contacts_dropbox") ? " list-group-item-info " : ""; ?>">
            <?php _menu_icon("top", "earprints") ?>
            <?php _t("Earprints"); ?>
        </a>
    <?php } ?>


    <?php if (employees_field_by_contact_id("id", $id)) { ?>
        <?php if (permissions_has_permission($u_rol, "shop_system", "read")) { ?>
            <a href="index.php?c=shop&a=contacts_system&id=<?php echo $id; ?>" class="list-group-item <?php echo ($a == "contacts_system") ? " list-group-item-info " : ""; ?>">
                <?php _menu_icon("top", "system") ?>
                <?php _t("System"); ?>
                <?php
                if (users_field_contact_id('status', $id) == USER_BLOCKED) {
                    echo '<span class="badge"><span class="glyphicon glyphicon-lock"></span></span>';
                }
                ?>
            </a>
        <?php } ?>
    <?php } ?>


    <?php if (employees_field_by_contact_id("id", $id)) { ?>
        <?php if (permissions_has_permission($u_rol, "shosssssp_system", "read")) { ?>
            <a href="index.php?c=shop&a=contacts_permissions&id=<?php echo $id; ?>" class="list-group-item <?php echo ($a == "contacts_permissions") ? " list-group-item-info " : ""; ?>">
                <?php _menu_icon("top", "contacts_permissions") ?>
                <?php _t("Permissions"); ?>

            </a>
        <?php } ?>
    <?php } ?>




    <?php /*
     * <a href="index.php?c=shop&a=contacts_new" class="list-group-item">
      <span class="glyphicon glyphicon-plus-sign"></span>
      <?php _t("New contact"); ?>
      </a> */ ?>


</div>






