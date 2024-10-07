<form class="form-horizontal" target="_new" action="index.php" method="get">
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="export_providers">


    <div class="form-group">
        <label for="year" class="col-sm-2 control-label">
            <?php _t("Contacts"); ?>
        </label>
        <div class="col-sm-10">
            <select class="form-control" name="only">   
                <option value="all"><?php _t("All"); ?></option>
                <?php
                /**
                 *                         <option value="1"><?php _t("Only companies"); ?></option>                        
                  <option value="0"><?php _t("Only individual"); ?></option>
                 */
                ?>
            </select>
        </div>
    </div>

    <?php
    /**
     *             <div class="form-group">
      <label for="order_by" class="col-sm-2 control-label">
      <?php _t("Order by"); ?>
      </label>
      <div class="col-sm-10">
      <select class="form-control" name="only">
      <option value="name"><?php _t("Name"); ?></option>
      <option value="id"><?php _t("Client number"); ?></option>
      </select>
      </div>
      </div>
     */
    ?>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">
                <?php _t("Export"); ?>
            </button>
        </div>
    </div>
</form>
