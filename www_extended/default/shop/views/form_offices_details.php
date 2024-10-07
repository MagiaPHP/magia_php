<form action="index.php" method="get">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="offices_update">    
    <input type="hidden" name="id" value="<?php echo $contact["id"]; ?>">    



    <div class="form-group">
        <label for="name"><?php _t("Office id"); ?></label>
        <input type="text"  name="name" class="form-control" id="name" value="<?php echo $contact['id']; ?>"disabled="">
    </div>



    <div class="form-group">
        <label for="name"><?php _t("Office name"); ?></label>
        <input type="text"  name="name" class="form-control" id="name" value="<?php echo $contact['name']; ?>"disabled="">
    </div>


    <?php
    /*
      <div class="form-group">
      <label for="lastname"><?php _t("Lastname"); ?></label>
      <input type="text"  name="lastname" class="form-control" id="lastname" value="<?php echo $contact['lastname']; ?>"  disabled="">
      </div>


      <div class="form-group">
      <label for="lastname"><?php _t("Birthdate"); ?></label>
      <input type="text"  name="" class="form-control"  value="<?php echo $contact['birthdate']; ?>" disabled="">
      </div> */
    ?>

    <?php
    if (permissions_has_permission($u_rol, "shop_offices", "update")) {
        ?>
        <button type="submit" class="btn btn-default"><?php _t("Edit"); ?></button>

    <?php }
    ?>
</form>





