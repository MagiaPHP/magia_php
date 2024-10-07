<form action="index.php" method="get">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="patients_update">    
    <input type="hidden" name="id" value="<?php echo $patient["id"]; ?>">    



    <div class="form-group">
        <label for="name"><?php _t("Title"); ?></label>
        <input type="text"  name="name" class="form-control" id="name" value="<?php echo $patient['title']; ?>"disabled="">
    </div>


    <div class="form-group">
        <label for="name"><?php _t("Name"); ?></label>
        <input type="text"  name="name" class="form-control" id="name" value="<?php echo $patient['name']; ?>"disabled="">
    </div>



    <div class="form-group">
        <label for="lastname"><?php _t("Lastname"); ?></label>
        <input type="text"  name="lastname" class="form-control" id="lastname" value="<?php echo $patient['lastname']; ?>"  disabled="">
    </div>


    <div class="form-group">
        <label for="lastname"><?php _t("Birthdate"); ?></label>
        <input type="text"  name="" class="form-control"  value="<?php echo $patient['birthdate']; ?>" disabled="">
    </div>



    <?php
    if (permissions_has_permission($u_rol, "shop_patients", "update")) {
        ?>
        <button type="submit" class="btn btn-default"><?php _t("Edit"); ?></button>
    <?php } else { ?>
        <button type="submit" class="btn btn-default" disabled=""><?php _t("Edit"); ?></button>
    <?php } ?>


</form>

