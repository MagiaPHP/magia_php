<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_myInfox">

    <div class="form-group">
        <label for="my_name" class="col-sm-3 control-label"><?php _t("My id"); ?></label>
        <div class="col-sm-9">
            <input type="text" name="my_name" class="form-control" placeholder="123" value="<?php echo $contact["id"]; ?>" disabled="">
        </div>
    </div>

    <div class="form-group">
        <label for="my_name" class="col-sm-3 control-label"><?php _t("My name"); ?></label>
        <div class="col-sm-9">
            <input type="text" name="my_name" class="form-control" placeholder="José Luis" value="<?php echo $contact["name"]; ?>" disabled="">
        </div>
    </div>

    <div class="form-group">
        <label for="my_lastname" class="col-sm-3 control-label"><?php _t("My lastname"); ?></label>
        <div class="col-sm-9">
            <input type="text" name="my_lastname" class="form-control" placeholder="Jimenez" value="<?php echo $contact["lastname"]; ?>" disabled="">
        </div>
    </div>



    <div class="form-group">
        <label for="my_lastname" class="col-sm-3 control-label"><?php _t("Work for"); ?></label>
        <div class="col-sm-9">
            <input type="text" name="" class="form-control" placeholder="" value="<?php echo contacts_formated(contacts_work_for($u_id)); ?>" disabled="">
        </div>
    </div>


    <div class="form-group">
        <label for="my_lastname" class="col-sm-3 control-label"><?php _t("Office"); ?></label>
        <div class="col-sm-9">
            <input type="text" name="" class="form-control" placeholder="" value="<?php echo contacts_formated(contacts_work_at($u_id)); ?>" disabled="">
        </div>
    </div>



    <hr>

    <div class="form-group">
        <label for="my_lastname" class="col-sm-3 control-label"><?php _t("My role in the system"); ?></label>
        <div class="col-sm-9">
            <input type="text" name="" class="form-control" placeholder="" value="<?php echo users_field_contact_id('rol', $contact["id"]); ?>" disabled="">
        </div>
    </div>



    <?php if (permissions_has_permission($u_rol, "shop_myinfo", "updsssssssate")) { ?>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
            </div>
        </div>  
    <?php } ?>

</form>







