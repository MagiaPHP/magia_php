


<?php /**

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
  <a class="navbar-brand" href="index.php?c=contacts&a=addresses&id=<?php echo $id; ?>">
  <?php _menu_icon("top", "addresses"); ?>
  <?php echo contacts_formated(offices_headoffice_of_office($id)); ?> >
  <?php echo contacts_formated($id); ?> >
  <?php _t("Addresses") ; ?>
  </a>
  </div>


  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

  <?php if ( permissions_has_permission($u_rol , "addresses" , "create") ) { ?>
  <button
  type="button"
  class="btn btn-primary navbar-btn navbar-right"
  data-toggle="modal" data-target="#contacts_address_add"
  >
  <span class="glyphicon glyphicon-plus-sign"></span>
  <?php _t("New") ; ?>
  </button>
  <?php } ?>
  </div>
  </div>
  </nav>






  <div class="modal fade" id="contacts_address_add" tabindex="-1" role="dialog" aria-labelledby="contacts_address_addLabel">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  <h4 class="modal-title" id="contacts_address_addLabel">
  <?php _t("Add new address"); ?>
  </h4>
  </div>
  <div class="modal-body">
  <?php include "form_contacts_address_add.php"; ?>
  </div>
  </div>
  </div>
  </div>
 */ ?>