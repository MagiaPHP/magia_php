<form method="post" action="index.php">

    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_comments_send">
    <input type="hidden" name="id" id="id"  value="<?php echo $id; ?>">
    <input type="hidden" name="redi" id="redi"  value="<?php echo $redi; ?>">

    <div class="form-group">
        <label for="comment"><?php echo contacts_formated($u_id) ?></label>    
        <input class="form-control" name="comment" placeholder="<?php _t("Something to say?"); ?>">        
    </div>

    <button type="submit" class="btn btn-default"><?php _t("Send"); ?></button>
</form>