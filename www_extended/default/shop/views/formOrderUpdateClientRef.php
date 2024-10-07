<form action="index.php" method="post">                        
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="orderUpdateClientRefOk">
    <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">        

    <div class="form-group">
        <label for="client_ref"><?php _t("My new reference number"); ?></label>
        <input type="text"  name="client_ref" class="form-control" id="client_ref" placeholder="123" value="<?php echo (isset($order['client_ref'])) ? $order['client_ref'] : ""; ?>">
    </div>
    <button type="submit" class="btn btn-default"><?php _t("Save"); ?></button>
</form>