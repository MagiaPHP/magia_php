<h3><?php _t("Side"); ?></h3>

<div class="row">

    <?php if ($order['side'] == "R" || $order['side'] == "S") { ?>
        <div class="col-xs-6">
            <img src="r.jpg" alt="alt"/>
            <h4><?php _t("Right side"); ?></h4>
            <select class="form-control" name="quantity_side_r">
                <?php
                for ($i = 0; $i <= 5; $i++) {
                    $selected = ($i == 1) ? " selected " : "";
                    echo '<option value="' . $i . '" ' . $selected . '>' . $i . ' ' . _tr('Units') . '</option>';
                }
                ?>
            </select>
        </div>
    <?php } else { ?>
        <div class="col-xs-6">

        </div>
    <?php } ?>


    <?php if ($order['side'] == "L" || $order['side'] == "S") { ?>
        <div class="col-xs-6">
            <img src="l.jpg" alt="alt"/>
            <h4><?php _t("Left side"); ?></h4>
            <select class="form-control" name="quantity_side_l">
                <?php
                for ($i = 0; $i <= 5; $i++) {
                    $selected = ($i == 1) ? " selected " : "";
                    echo '<option value="' . $i . '" ' . $selected . '>' . $i . ' ' . _tr('Units') . '</option>';
                }
                ?>
            </select>
        </div>
    <?php } else { ?>
        <div class="col-xs-6">

        </div>
    <?php } ?>


</div>






<input type="hidden" name="client_ref" value="">

<?php
/** <div class="form-group">
  <label for="client_ref"><?php _t("My reference for this new order"); ?></label>
  <input type="text"  name="client_ref" class="form-control" id="client_ref" value="" placeholder="<?php _t("My reference number"); ?>">
  </div> */
?>

<h3><?php _t("Comments"); ?></h3>

<div class="form-group">
    <label for="client_ref"><?php _t("Comments"); ?></label>
    <textarea class="form-control" name="comments" placeholder="<?php _t("Something to say? say it here"); ?>"></textarea>
</div>

<?php
/*
  <div class="checkbox">
  <label>
  <input type="checkbox" name="express" value="1"> <?php _t("Check here if this order is Express"); ?>
  </label>
  </div>
  <button type="submit" class="btn btn-primary"><?php echo _t("Send"); ?></button>
  </form>
 *      */
?>
