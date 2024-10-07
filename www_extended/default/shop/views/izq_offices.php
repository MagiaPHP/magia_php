<?php
/* <?php
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
  <input type="hidden" name="redi" value="4">
  <div class="form-group">
  <label for="file"><?php _t("Pic"); ?></label>
  <input type="file" id="file" name="file">

  <p class="help-block"><?php //echo _t("Only these file extensions are accepted");                   ?></p>

  </div>
  <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>
  </form>

  </div>


  </div>
  </div>
  </div>
 */
?>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <i class="fas fa-home"></i>
        <?php echo contacts_formated($id); ?>
    </a>


    <a href="index.php?c=shop&a=offices_details&id=<?php echo $id; ?>" class="list-group-item <?php echo ($a == "offices_details") ? " list-group-item-info " : ""; ?>">
        <span class="glyphicon glyphicon-home"></span>
        <?php _t("Details"); ?> (<?php echo $id; ?>)
    </a>


    <?php
    /*
      <a href="index.php?c=shop&a=contacts_orders&id=<?php echo $id; ?>" class="list-group-item">
      <span class="glyphicon glyphicon-file"></span>
      <?php _t("Last orders"); ?>
      </a>
     */
    ?>


    <?php if (permissions_has_permission($u_rol, "shop_addssssssresses", "read")) { ?>
        <a href="index.php?c=shop&a=logo&id=<?php echo $id; ?>" class="list-group-item <?php echo ($a == "logo") ? " list-group-item-info " : ""; ?>">
            <span class="glyphicon glyphicon-picture"></span>
            <?php _t("Logo"); ?>
        </a>
    <?php } ?>

    <?php if (permissions_has_permission($u_rol, "shop_addresses", "read")) { ?>
        <a href="index.php?c=shop&a=adresses_by_office&id=<?php echo $id; ?>" class="list-group-item <?php echo ($a == "adresses_by_office") ? " list-group-item-info " : ""; ?>">
            <?php _menu_icon("top", "addresses"); ?>
            <?php _t("Adresses"); ?>
        </a>
    <?php } ?>


    <?php if (permissions_has_permission($u_rol, "shop_directory", "read")) { ?>
        <a href="index.php?c=shop&a=directory_by_office&id=<?php echo $id; ?>" class="list-group-item <?php echo ($a == "directory_by_office") ? " list-group-item-info " : ""; ?>">
            <?php _menu_icon("top", "directory"); ?>
            <?php _t("Directory"); ?>
        </a>
    <?php } ?>


    <?php if (permissions_has_permission($u_rol, "shop_users", "read")) { ?>
        <a href="index.php?c=shop&a=users_by_office&id=<?php echo $id; ?>" class="list-group-item <?php echo ($a == "users_by_office") ? " list-group-item-info " : ""; ?>">
            <?php _menu_icon("top", "users"); ?>
            <?php _t("Users"); ?>
        </a>
    <?php } ?>

    <?php if (permissions_has_permission($u_rol, "shop_ordersssssssss", "read")) { ?>
        <a href="index.php?c=shop&a=orders_by_office&id=<?php echo $id; ?>" class="list-group-item <?php echo ($a == "orders_by_office") ? " list-group-item-info " : ""; ?>">
            <?php _menu_icon("top", "orders"); ?>
            <?php _t("Orders"); ?>
        </a>
    <?php } ?>

    <?php if (permissions_has_permission($u_rol, "shop_usssssers", "read")) { ?>
        <a href="index.php?c=shop&a=logo_by_office&id=<?php echo $id; ?>" class="list-group-item <?php echo ($a == "logo_by_office") ? " list-group-item-info " : ""; ?>">
            <span class="glyphicon glyphicon-picture"></span>
            <?php _t("Logo"); ?>
        </a>
    <?php } ?>


    <?php
    /*    <a href="index.php?c=shop&a=employees_by_office&id=<?php echo $id ; ?>" class="list-group-item">
      <span class="glyphicon glyphicon-user"></span>
      <?php _t("Employees") ; ?>
      </a>
     */
    ?>



</div>






