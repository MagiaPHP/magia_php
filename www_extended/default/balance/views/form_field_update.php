
<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="balance">
    <input type="hidden" name="a" value="ok_field_update">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="field" value="client_id">
    <input type="hidden" name="redi" value="2">

    <div class="form-group">
        <label class="sr-only" for="client_id"><?php _t("Client"); ?></label>
        <input 
            type="text" 
            class="form-control" 
            name="new_value" 
            id="new_value" 
            placeholder="<?php _t("Client"); ?>"
            value="<?php echo $balance['client_id']; ?>"
            >
    </div>

    <button type="submit" class="btn btn-default">
        <?php _t("Update"); ?>
    </button>

</form>



