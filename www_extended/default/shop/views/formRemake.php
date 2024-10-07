


<div class="form-group">
    <label for="discount"><?php _t("Motifs"); ?></label>
    <div class="col-sm-offset-2 col-sm-10">



        <?php foreach (remake_motifs_list() as $key => $motif) { ?>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remake_motif[]" id="<?php echo $motif['id']; ?>" value="<?php echo $motif['id']; ?>"> 
                    <b><?php echo _t($motif['motif']); ?></b><br>
                    <?php //echo _t($motif['description']);  ?>
                </label>
            </div>      
        <?php } ?>        
    </div>
</div>


<div class="container">
    <div class="container">

    </div>
</div>




<div class="form-group jumbotron">
    <label for="discount"><?php _t("Discount option"); ?></label>
    <select class="form-control" name="discount" id="discount">
        <?php foreach (json_decode(_options_option("orders_discount_options")) as $p => $label) { ?>
            <option value="<?php echo "$p"; ?>">(<?php echo "$p"; ?>%) <?php _t("$label"); ?></option>
        <?php } ?>             
    </select>  

    <span id="helpBlock" class="helpBlock">
        <?php _t("Do you want a discount?"); ?>
    </span>
</div>


<?php
#################################################################################
#################################################################################
#################################################################################
#################################################################################
?>

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

<?php
#################################################################################
#################################################################################
#################################################################################
#################################################################################
?>




<?php
#################################################################################
#################################################################################
#################################################################################
#################################################################################
?>

<hR>
<h3><?php _t("Moldes"); ?></h3>

<div class="row">
    <div class="col-xs-12 ">

        <div class="text-center">

            <img src="moldes.png" alt="alt" class="img-responsive"/>
        </div>

        <h4><?php _t("Do you want to launch the production with the molds that the factory has?"); ?></h4>

        <div class="radio">
            <label>
                <input type="radio" name="moldes" id="moldes" value="old" required="">
                <?php _t("Yes, use the old molds"); ?>
            </label>
        </div>

        <div class="radio">
            <label>
                <input type="radio" name="moldes" id="moldes" value="new" required="">
                <?php _t("Wait, I'm going to send new molds"); ?>
            </label>
        </div>
    </div>
</div>

<?php
#################################################################################
#################################################################################
#################################################################################
#################################################################################
?>

<input type="hidden" name="client_ref" value="">

<?php
/** <div class="form-group">
  <label for="client_ref"><?php _t("My reference for this new order"); ?></label>
  <input type="text"  name="client_ref" class="form-control" id="client_ref" value="" placeholder="<?php _t("My reference number"); ?>">
  </div> */
?>

<h3><?php _t("Comments"); ?></h3>

<div class="form-group">
    <label for="client_ref" class=""><?php // _t("Comments");    ?></label>
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
