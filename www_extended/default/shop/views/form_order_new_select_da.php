<h1><?php _t("Delivery address"); ?></h1>


<form class="form-horizontal" method="post" action="index.php">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_order_new_delivery_address_add">
    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">

    <?php echo $order_id; ?>



    <?php foreach (types_list() as $key => $type) { ?>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">

                <div class="radio">
                    <label>
                        <input type="radio" name="type_id" id="type_id" value="<?php echo $type['id']; ?>" >
                        <?php echo $type['type']; ?>
                    </label>
                </div>
            </div>
        </div>
    <?php } ?>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">
                <?php _t("Next"); ?>
            </button>
        </div>
    </div>
</form>


<?php
/*

  <div class="row">

  <?php foreach (types_list() as $key => $type) { ?>

  <div class="media">
  <div class="media-left media-middle">
  <a href="#">
  <img class="media-object img img-thumbnail " src="http://localhost/jiho_22/ap1.jpg" alt="..." width="150">
  </a>
  </div>
  <div class="media-body">
  <h4 class="media-heading"><?php _t($type['type']); ?></h4>



  <p>
  <a href="index.php?c=shop&a=ok_order_new_type_add&type_id=<?php echo $type['id']; ?>&order_id=<?php echo $order_id; ?>" class="btn btn-primary" role="button">
  <?php _t("Next"); ?> >>
  </a>
  </p>


  </div>
  </div>

  <?php } ?>






  </div> */
?>