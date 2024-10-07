

<form action="index.php" method="post">

    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_address_delete">        
    <input type="hidden" name="id" value="<?php echo $id; ?>">        
    <input type="hidden" name="address_id" value="<?php echo $address['id']; ?>">        
    <input type="hidden" name="redi" value="1">        

    <button type="submit" class="btn btn-danger"><?php _t("Delete"); ?></button>
</form>