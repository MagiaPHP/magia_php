
<form action="index.php" method="post">


    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_user_new">  
    <input type="hidden" name="redi" value="1">  


    <input type="hidden" name="office_id" value="<?php echo $office['id']; ?>" >
    <input type="hidden" name="id" value="<?php echo $office['id']; ?>" >




    <div class="form-group">
        <label for="name"><?php _t("Office name"); ?></label>
        <input type="text" class="form-control" id="name" name="name" placeholder="">
    </div>


    <button type="submit" class="btn btn-danger"><?php _t("Delete"); ?></button>
</form>