<?php
/*
  <div class="panel panel-primary">
  <div class="panel-heading"><?php echo _t("Companies list"); ?></div>
  <div class="panel-body">
  <form action="index.php" method="get">
  <input type="hidden" name="c" value="orders">
  <input type="hidden" name="a" value="add">
  <div class="form-group">
  <label for="id"><?php _t("Company name"); ?></label>
  <select name="company_id" class="selectpicker" data-live-search="true" data-width="100%"  >
  <option value=""><?php _t("Select one"); ?></option>
  <?php
  $j=1;
  foreach (offices_list_of_headoffices() as $key => $sede) {
  //   echo "<option value=\"$value[id]\">" . contacts_formated($sede['id']) . "</option>";
  echo '<optgroup label="'. contacts_formated($sede['id']) .' '.$sede['id'].'">';
  //  echo '<option value="'.$office['id'].'">'. contacts_formated($sede['id']) .' (headoffice)</option>';
  $i=1;
  foreach (offices_list_by_headoffice($sede['id']) as $key => $office) {
  $selected = ($company_id == $office['id']) ? " selected ": " ";
  echo '<option value="'.$office['id'].'" '.$selected.'>'. contacts_formated($office['id']) .'</option>';
  $i++;
  }
  echo '</optgroup>';
  $j++;
  }
  ?>
  </select>
  </div>
  <div class="form-group">
  <label for="search"></label>
  <button type="submit" class="btn btn-default"><?php echo _t("Search"); ?></button>
  </div>
  </form>
  </div>
  </div>
 */
?>


<?php
if ($id == 1022) {
    echo '<p class="text-center">';
    logo(null, null, "img-responsive");
    echo '</p>';
    //include "modal_contacts_picture.php";
} else {
    include "modal_contacts_picture.php";
}
?>


<?php
($headoffice_id = offices_headoffice_of_office($id));
?>


<?php
//// si el id es igual al propietrario etonces en una sede
//if ($id == contacts_field_id("owner_id", $id)) {
//    //###############################
//    //SEDE
//    //###############################
//    $pic = (contacts_picture_src($id)) ? contacts_picture_src($id) : "www/gallery/img/company.jpg";
//    echo '<p class="text-center">';
//    //echo contacts_picture($id, 150, 'image img-circle img-responsive img-thumbnail');
//    echo '<img src="' . $pic . '" class="img-thumbnail img-responsive" data-toggle="modal" data-target="#modal_pic_user_add" alt="Headoffice"/><br>';
//    echo '</p>';
//} else {
//
//    #################################
//    #################################
//    # OFFICCE
//    #################################
//    #################################
//
//
//    $pic = (contacts_picture_src($id)) ? contacts_picture_src($id) : "www/gallery/img/office.jpg";
//
//
//    // $pic = 'www/gallery/img/office.jpg';
//    echo '<p class="text-center">';
//    //echo contacts_picture($id, 150, 'image img-circle img-responsive img-thumbnail');
//    echo '<img src="' . $pic . '" class="img-thumbnail img-responsive" data-toggle="modal" data-target="#modal_pic_user_add" alt="Office"/><br>';
//    echo '</p>';
//}
?>





<?php
/*
  <p class="text-center">
  <img
  src="<?php echo contacts_picture_src($headoffice_id); ?>"
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
  <p class="help-block"><?php // echo _t("Only these file extensions are accepted")           ?></p>
  </div>
  <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>
  </form>
  </div>
  </div>
  </div>
  </div>
 */
?>

<?php
/* <div class="panel panel-primary">
  <div class="panel-heading">
  <h3 class="panel-title">

  <?php _t("Headoffice"); ?>:
  </h3>
  </div>
  <div class="panel-body">

  <p>
  <a href="index.php?c=contacts&a=details&id=<?php echo contacts_field_id("owner_id", $id); ?>">
  <?php _menu_icon("top", "contacts"); ?>
  <?php echo contacts_formated(contacts_field_id("owner_id", $id)) ?>
  </a>
  </p>


  </div>
  </div> */
?>



<div class="list-group">
    <h4 class="list-group-item active">
        <span class="glyphicon glyphicon-home"></span> 
        <?php echo contacts_formated($id); ?>
    </h4>

    <?php
    if (
            permissions_has_permission($u_rol, "contacts", "read") &&
            modules_field_module('status', modules_field_module('father', 'contacts'))
    ) {
        ?>
        <a href="index.php?c=contacts&a=details&id=<?php echo $id; ?>" class="list-group-item <?php echo ($a == 'details') ? "list-group-item-info" : ""; ?>">

            <?php _menu_icon("top", "contacts"); ?>
            <?php _t("Details"); ?> <?php echo $id; ?> 

        </a>
    <?php } ?>




    <?php
    if (permissions_has_permission($u_rol, "orders", "read") &&
            modules_field_module('status', 'audio')
    ) {
        ?>
        <a href="index.php?c=contacts&a=orders_by_company&id=<?php echo $id; ?>&office_id=all&address_id=all&status=70" class="list-group-item <?php echo ($a == 'orders_by_company') ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "orders"); ?>
            <?php _t("Orders by company"); ?>
        </a>
    <?php } ?>


    <?php if (permissions_has_permission($u_rol, "orderssssssssssss", "read") && modules_field_module('status', 'audio')) { ?>
        <a href="index.php?c=contacts&a=orders_by_address&id=<?php echo $id; ?>&office_id=all" class="list-group-item <?php echo ($a == 'orders_by_address') ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "orders"); ?>
            <?php _t("Orders by address"); ?>
        </a>
    <?php } ?>


    <?php if (permissions_has_permission($u_rol, "orssssders", "read") && modules_field_module('status', 'audio')) { ?>
        <a href="index.php?c=contacts&a=orders_by_office&id=<?php echo $id; ?>&status=70" class="list-group-item <?php echo ($a == 'orders_by_office') ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "orders"); ?>
            <?php _t("Orders by office"); ?>
        </a>
    <?php } ?>


    <?php if (permissions_has_permission($u_rol, "contacts", "read")) { ?>
        <a href="index.php?c=contacts&a=employees&id=<?php echo "$id"; ?>" class="list-group-item <?php echo ($a == 'employees') ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "contacts"); ?>
            <?php _t("Employees"); ?>
        </a>
    <?php } ?>




    <?php if (permissions_has_permission($u_rol, "contacts", "read") && (contacts_field_id('owner_id', $id) == $id)) { ?>
        <a href="index.php?c=contacts&a=offices&id=<?php echo "$id"; ?>" class="list-group-item <?php echo ($a == 'offices') ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "contacts"); ?>
            <?php _t("Offices"); ?>
        </a>
    <?php } ?>





    <?php /* <a href="index.php?c=contacts&a=patients&id=<?php echo "$id" ; ?>" class="list-group-item"><?php _t("Patients") ; ?></a>
      <a href="index.php?c=contacts&a=employees&id=<?php echo "$id" ; ?>" class="list-group-item"><?php _t("Employees") ; ?></a>
     */ ?>


    <?php
    if (
            permissions_has_permission($u_rol, "directory", "read") &&
            modules_field_module('status', modules_field_module('father', 'directory'))
    ) {
        ?>
        <a href="index.php?c=contacts&a=directory&id=<?php echo "$id"; ?>" class="list-group-item <?php echo ($a == 'directory') ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "directory"); ?>
            <?php _t("Directory"); ?>
        </a>
    <?php } ?>


    <?php
    if (permissions_has_permission($u_rol, "addresses", "read") &&
            modules_field_module('status', modules_field_module('father', 'addresses'))
    ) {
        ?>
        <a href="index.php?c=contacts&a=addresses&id=<?php echo "$id"; ?>" class="list-group-item <?php echo ($a == 'addresses') ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "addresses"); ?>
            <?php _t("Addresses"); ?>
        </a>
    <?php } ?>


    <?php
    if (
            permissions_has_permission($u_rol, "banks", "read") &&
            contacts_is_headoffice($id) &&
            modules_field_module('status', modules_field_module('father', 'banks'))
    ) {
        ?>
        <a href="index.php?c=contacts&a=banks&id=<?php echo "$id"; ?>" class="list-group-item <?php echo ($a == 'banks') ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "banks"); ?>
            <?php _t("Banks"); ?>
        </a>
    <?php } ?>


    <?php if (permissions_has_permission($u_rol, "projects", "read") && modules_field_module('status', 'projects')) { ?>
        <a href="index.php?c=contacts&a=projects&id=<?php echo "$id"; ?>" class="list-group-item <?php echo ($a == 'projects') ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "projects"); ?>
            <?php _t("Projects"); ?>   
        </a>
    <?php } ?>   



    <?php
    if (
            permissions_has_permission($u_rol, "invoices", "read") &&
            contacts_is_headoffice($id) &&
            $id != $u_owner_id &&
            modules_field_module('status', modules_field_module('father', 'invoices'))
    ) {
        ?>
        <a href="index.php?c=contacts&a=invoices&id=<?php echo "$id"; ?>" class="list-group-item <?php echo ($a == 'invoices') ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "invoices"); ?>
            <?php _t("Invoices"); ?>
        </a>
    <?php } ?>   




    <?php
    if (
            permissions_has_permission($u_rol, "budgets", "read") &&
            contacts_is_headoffice($id) &&
            $id != $u_owner_id &&
            modules_field_module('status', modules_field_module('father', 'budgets'))
    ) {
        ?>
        <a href="index.php?c=contacts&a=budgets&id=<?php echo "$id"; ?>" class="list-group-item <?php echo ($a == 'budgets') ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "budgets"); ?>
            <?php
            if (modules_field_module('status', 'audio')) {
                _t("Shipping notes");
            } else {
                _t("Budgets");
            }
            ?>
        </a>
    <?php } ?>   


    <?php
    if (
            permissions_has_permission($u_rol, "credit_notes", "read") &&
            contacts_is_headoffice($id) &&
            $id != $u_owner_id &&
            modules_field_module('status', modules_field_module('father', 'credit_notes'))
    ) {
        ?>
        <a href="index.php?c=contacts&a=credit_notes&id=<?php echo "$id"; ?>" class="list-group-item <?php echo ($a == 'credit_notes') ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "credit_notes"); ?>
            <?php _t("Credit notes"); ?>
        </a>
    <?php } ?>   




    <?php
    if (
            permissions_has_permission($u_rol, "expenses", "read") &&
            contacts_is_headoffice($id) &&
            $id != $u_owner_id &&
            modules_field_module('status', modules_field_module('father', 'expenses')) &&
            modules_field_module('status', 'expenses')
    ) {
        ?>
        <a href="index.php?c=contacts&a=expenses&id=<?php echo "$id"; ?>" class="list-group-item <?php echo ($a == 'expenses') ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "expenses"); ?>
            <?php _t("Expenses"); ?>
        </a>
    <?php } ?>   


    <?php
    if (
            permissions_has_permission($u_rol, "balance", "read") &&
            contacts_is_headoffice($id) &&
            $id != $u_owner_id &&
            modules_field_module('status', modules_field_module('father', 'balance'))
    ) {
        ?>
        <a href="index.php?c=contacts&a=balance&id=<?php echo "$id"; ?>" class="list-group-item <?php echo ($a == 'balance') ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "balance"); ?>
            <?php _t("Balance"); ?>
        </a>
    <?php } ?>   


    <?php if (permissions_has_permission($u_rol, "proddducts", "read") && contacts_is_headoffice($id) && $id != $u_owner_id) { ?>
        <a href="index.php?c=contacts&a=products&id=<?php echo "$id"; ?>" class="list-group-item <?php echo ($a == 'products') ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "products"); ?>
            <?php _t("Products"); ?>
        </a>
    <?php } ?>   

    <?php if (permissions_has_permission($u_rol, "reminders_invoices", "read") && contacts_is_headoffice($id) && $id != $u_owner_id) { ?>

        <?php
        /**
         *         <a href="index.php?c=contacts&a=reminders&id=<?php echo "$id"; ?>" class="list-group-item <?php echo ($a == 'reminders') ? "list-group-item-info" : ""; ?>">
          <?php _menu_icon("top", "reminders_invoices"); ?>
          <?php _t("Reminders"); ?>
          </a>
         */
        ?>


    <?php } ?>   


    <?php // if (modules_field_module('status', 'subdomains') && $u_rol == 'root') {      ?>
    <?php if (modules_field_module('status', 'subdomains')) { ?>
        <a href="index.php?c=contacts&a=subdomain&id=<?php echo "$id"; ?>" class="list-group-item <?php echo ($a == 'subdomain') ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "subdomains"); ?>
            <?php _t("Subdomain"); ?>
        </a>
    <?php } ?>   


    <?php
    /*        <a href="index.php?c=contacts&a=factux&id=<?php echo "$id"; ?>" class="list-group-item">
      <?php _menu_icon("top", "factux"); ?>
      <?php _t("Factux"); ?>
      </a>

     */
    ?>


    <?php if (modules_field_module('status', 'cpanel') && 1 == 2222222222222222222222222222222222222222) { ?>
        <?php if (permissions_has_permission($u_rol, "cpanel", "read") && contacts_is_headoffice($id)) { ?>
            <a href="index.php?c=contacts&a=cpanel&id=<?php echo "$id"; ?>" class="list-group-item <?php echo ($a == 'cpanel') ? "list-group-item-info" : ""; ?>">
                <?php _menu_icon("top", "cpanel"); ?>
                <?php _t("Cpanel"); ?>
            </a>
        <?php } ?>
    <?php } ?>

    <?php if (modules_field_module('status', 'api')) { ?>
        <?php if (permissions_has_permission($u_rol, "api", "read") && contacts_is_headoffice($id)) { ?>
            <a href="index.php?c=contacts&a=api&id=<?php echo "$id"; ?>" class="list-group-item <?php echo ($a == 'api') ? "list-group-item-info" : ""; ?>">
                <?php _menu_icon("top", "api"); ?>
                <?php _t("Api"); ?>
            </a>
        <?php } ?>
    <?php } ?>



</div>





<?php /*
  <div class="list-group">
  <a href="#" class="list-group-item active">
  <span class="glyphicon glyphicon-home"></span>
  <?php _t("Companies list"); ?>
  </a>

  <?php foreach ( contacts_list_by_type(1) as $key => $value ) {
  //  echo '<a href="index.php?c=contacts&a=details&id='.$value['id'].'" class="list-group-item">'.$value['name'].'</a>';
  }?>

  </div>


  <div class="panel panel-default">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-home"></span>
  <?php _t("Owner"); ?>
  </h3>
  </div>
  <div class="panel-body">

  <p><?php _t(""); ?></p>
  <h3><?php echo contacts_formated($contact["owner_id"]) ?></h3>
  <a href="index.php?c=contacts&a=details&id=<?php echo $contact['owner_id']; ?>" class="btn btn-primary"><?php _t('Details'); ?></a>

  </div>
  </div>


 */ ?>






