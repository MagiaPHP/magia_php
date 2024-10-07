<form class="form-horizontal" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_update_language">

    <?php
    /*    <div class="form-group">
      <label for="" class="col-sm-3 control-label"><?php _t("Actualy i use"); ?></label>
      <div class="col-sm-9">
      <input
      type="text"
      class="form-control"
      id=""
      placeholder="<?php echo users_field_contact_id("language", $u_id); ?>"
      value="<?php echo users_field_contact_id("language", $u_id); ?>"
      disabled=""
      >
      </div>
      </div> */
    ?>

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label"><?php _t("Change for"); ?></label>
        <div class="col-sm-9">
            <select class="form-control" name="language" id="language">
                <?php
                foreach (_languages_list() as $key => $value) {

                    if ($value['status']) {
                        echo "<option value=\"$value[language]\" ";
                        echo (users_field_contact_id("language", $u_id) == $value["language"]) ? " selected " : "";
                        echo " >" . _tr("$value[name]") . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
        </div>
    </div>

</form>


