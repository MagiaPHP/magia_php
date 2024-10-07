

<form action="index.php" method="post">

    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_address_unblock">        
    <input type="hidden" name="id" value="<?php echo $id; ?>">        
    <input type="hidden" name="address_id" value="<?php echo $address['id']; ?>">        
    <input type="hidden" name="redi" value="1">        

    <button type="submit" class="btn btn-primary"><?php _t("Unblock"); ?></button>
</form>