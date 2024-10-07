<form class="form-horizontal" method="post" action="index.php">

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_status_update">
    <input type="hidden" name="contact_id" value="<?php echo $contact['id'] ?>">
    <input type="hidden" name="redi" value="1">

    <div class="form-group">
        <label class="control-label col-sm-2" for="status">
            <?php _t("Status"); ?>
        </label>	
        <div class="col-sm-6">    

            <input 
                disabled="" 
                type="text" 
                class="form-control" 
                name="status" 
                id="status" 
                value="<?php echo _tr(contacts_status($contact['status'])); ?>" 
                placeholder="">                                                                   
        </div>

        <div class="col-sm-2">    

            <?php #########################################################?>
            <?php #########################################################?>
            <?php #########################################################?>
            <?php #########################################################?>
            <?php #########################################################?>
            <?php #########################################################?>
            <?php #########################################################?>
            <?php #########################################################?>
            <?php #########################################################?>
            <?php #########################################################?>
            <?php if (permissions_has_permission($u_rol, "contacts", "update")) { ?>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update_status">
                    <?php _t("Change"); ?>
                </button>
                <div class="modal fade" id="update_status" tabindex="-1" role="dialog" aria-labelledby="update_statusLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="update_statusLabel">
                                    <?php _t("Update status"); ?>
                                </h4>
                            </div>

                            <div class="modal-body">
                                <h2><?php _t("Update status"); ?></h2>



                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
                                    <div class="col-sm-8">            
                                        <select class="form-control" name="status">
                                            <?php
                                            foreach (contacts_status_list() as $status) {
                                                $selected = ($status == $contact['status']) ? " selected " : "";
                                                ?>
                                                <option value="<?php echo ($status); ?>" <?php echo $selected; ?>><?php echo _tr(offices_status($status)); ?></option>                    
                                            <?php } ?>
                                        </select>                                                
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary"><?php _t("Update"); ?></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>                
            <?php } ?>

        </div>
    </div>

    <?php
    //  vardump(($contact['language'])); 
    //  vardump; 
    ?>

    <?php
// COMPANY// COMPANY// COMPANY// COMPANY// COMPANY
    /*
      <div class="form-group">
      <label class="control-label col-sm-2" for="birthdate"><?php _t("Birthdate"); ?></label>
      <div class="col-sm-8">
      <div class="row">


      <div class="col-xs-3">
      <select class="form-control" name="day" disabled="">

      <?php
      for ($i = 1; $i <= 31; $i++) {

      $selected_d = (dates_day_of_date($contact['birthdate']) == $i) ? " selected " : "";

      echo "<option value=\"$i\" $selected_d >$i</option>";
      }
      ?>

      </select>
      </div>


      <div class="col-xs-5">
      <select class="form-control" name="month" disabled="">
      <?php
      for ($i = 1; $i <= 12; $i++) {
      $selected_m = (dates_month_of_date($contact['birthdate']) == $i) ? " selected " : "";
      echo "<option value=\"$i\" $selected_m >$i " . _tr($months[$i]) . "</option>";
      }
      ?>

      </select>
      </div>
      <div class="col-xs-4">
      <select class="form-control" name="year" disabled="">
      <?php
      for ($i = 1900; $i <= date("Y"); $i++) {
      $selected_a = (dates_year_of_date($contact['birthdate']) == $i) ? " selected " : "";
      echo "<option value=\"$i\" $selected_a >$i</option>";
      }
      ?>

      </select>
      </div>
      </div>

      </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-2" for="name"><?php _t("") ; ?></label>
      <div class="col-sm-8">
      <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit") ; ?>">
      </div>
      </div>

     */
    ?>
</form>



<?php
//if (modules_field_module('status', "docu")) {
//    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
//}
?>
