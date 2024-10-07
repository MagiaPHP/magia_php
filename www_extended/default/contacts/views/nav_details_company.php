<div class="page-header">
    <h1><?php echo $company->getName(); ?> <small><?php echo $company->getTva(); ?></small></h1>
</div>

<?php
//if (modules_field_module('status', "docu")) {
//    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
//}
?>


<?php
/**
 * 
  <nav class="navbar navbar-default">
  <div class="container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="index.php?c=contacts&a=contacts&id=<?php echo $id; ?>">
  <?php //_menu_icon("top" , "contacts") ; ?>
  <span class="glyphicon glyphicon-home"></span>
  <?php echo contacts_formated(offices_headoffice_of_office($id)); ?> >
  <?php echo contacts_formated($id); ?> >
  <?php _t("Details"); ?>
  </a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

  <?php if (permissions_has_permission($u_rol, "contacts", "update888888")) { ?>
  <button
  type="button"
  class="btn btn-primary navbar-btn navbar-right"
  data-toggle="modal" data-target="#myModal"
  >
  <span class="glyphicon glyphicon-pencil"></span>
  <?php _t("Edit"); ?>
  </button>
  <?php } ?>


  </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>




  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="contacts_directory_add">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="contacts_directory_add"><?php _t("Edit"); ?></h4>
  </div>
  <div class="modal-body">



  <?php //include "form_edit_company.php" ; ?>
  </div>


  </div>
  </div>
  </div>

 */
?>