<?php

/**
 * <div class="panel panel-default">
  <div class="panel-heading">
  <h3 class="panel-title">
  <?php _t("Import"); ?>
  </h3>
  </div>
  <div class="panel-body">

  <form enctype="multipart/form-data" method="post" action="index.php">
  <input type="hidden" name="c" value="banks_lines">
  <input type="hidden" name="a" value="ok_import_check">
  <input type="hidden" name="account_number" value="<?php echo $account_number; ?>">
  <input type="hidden" name="id" value="1">
  <input type="hidden" name="redi[redi]" value="5">



  <div class="form-group">
  <input type="file" id="file" name="file">
  </div>


  <div class="form-group">
  <select class="form-control" name="account_number">
  <?php
  foreach (banks_list_by_contact_id($u_owner_id) as $key => $blbci) {

  $selected = ($blbci['account_number'] == $account_number ) ? " selected " : "";

  echo '<option value="' . $blbci['account_number'] . '" ' . $selected . '>' . $blbci['bank'] . ' ' . $blbci['account_number'] . '</option>';
  }
  ?>

  <?php if (permissions_has_permission($u_rol, 'banks', "create")) { ?>
  <option value="add_new"><?php _t("Add new account"); ?></option>
  <?php } ?>

  </select>
  </div>




  <button type="submit" class="btn btn-default">
  <?php _t("Submit"); ?>
  </button>
  </form>

  </div>
  </div>



 */
?>