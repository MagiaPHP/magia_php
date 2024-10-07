<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Print"); ?>
        </h3>
    </div>
    <div class="panel-body">


        <form method="get" action="index.php" target="print">
            <input type="hidden" name="c" value="app">
            <input type="hidden" name="a" value="p_i">
            <input type="hidden" name="doc" value="i">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="code" value="<?php echo $code; ?>">
            <input type="hidden" name="passweb" value="<?php echo 20; ?>">
            <input type="hidden" name="way" value="pdf">


            <div class="form-group">
                <label for="lang"><?php _t("Language print"); ?></label>
                <select class="form-control" name="lang">
                    <?php
                    foreach (_languages_list_by_status(1) as $key => $lang) {
                        $selected = ($lang['language'] == contacts_field_id('language', $invoices['client_id'])) ? " selected " : "";
                        echo '<option value="' . $lang['language'] . '" ' . $selected . ' >' . _tr($lang['name'], $lang['language']) . '</option>';
                    }
                    ?>
                </select>
            </div>

            <?php
            /**
              if (_options_option('config_print_multilang')) { ?>
              <div class="form-group">
              <label for="lang"><?php _t("Language print"); ?></label>
              <select class="form-control" name="lang">
              <?php
              foreach (_languages_list_by_status(1) as $key => $lang) {
              $selected = ($lang['language'] == contacts_field_id('language', $invoices['client_id'])) ? " selected " : "";
              echo '<option value="' . $lang['language'] . '" ' . $selected . ' >' . _tr($lang['name']) . '</option>';
              }
              ?>
              </select>
              </div>
              <?php
              } else {

              $lang_contact = contacts_field_id('language', invoices_field_id('client_id', $id));

              $lang = ($lang_contact)? $lang_contact : $config_lang_default;

              ?>
              <input type="hidden" name="lang" value="<?php echo $lang; ?>">
              <?php }
             * 
             */
            ?>






            <button type="submit" class="btn btn-primary">
                <span class="gl glyphicon glyphicon-print"></span>
                <?php _t("Print"); ?>
            </button>
        </form>


    </div>
</div>