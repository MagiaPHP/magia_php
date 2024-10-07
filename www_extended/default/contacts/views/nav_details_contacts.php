


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

  <a class="navbar-brand" href="index.php?c=contacts&a=contacts&id=<?php echo $id; ?>">
  <?php _menu_icon("top", "contacts"); ?>
  <?php _t("Details"); ?>
  </a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

  <?php if (permissions_has_permission($u_rol, "contacts", "update")) { ?>
  <button
  type="button"
  class="btn btn-primary navbar-btn navbar-right"
  data-toggle="modal" data-target="#contacts_directory_add"
  >
  <span class="glyphicon glyphicon-pencil"></span>
  <?php _t("Edit"); ?>
  </button>
  <?php } ?>

  <div class="modal fade" id="contacts_directory_add" tabindex="-1" role="dialog" aria-labelledby="contacts_directory_add">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="contacts_directory_add"><?php _t("Edit"); ?></h4>
  </div>
  <div class="modal-body">
  <?php include "form_contact_edit.php"; ?>
  </div>
  </div>
  </div>
  </div>




  <form class="navbar-form navbar-right">
  <input type="hidden" name="c" value="orders">
  <input type="hidden" name="a" value="ok_order_new_chosse_contact">
  <input type="hidden" name="contact_id" value="<?php echo $id ?>">

  <button type="submit" class="btn btn-default">
  <?php _menu_icon('top', 'orders');  ?>
  <?php _t("New order"); ?>
  </button>
  </form>

  </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>

 */ ?>