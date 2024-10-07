
<form enctype="multipart/form-data" method="post" action="index.php">

    <input type="hidden" name="c" value="gallery">
    <input type="hidden" name="a" value="ok_file_add">    
    <input type="hidden" name="controller" id="controller"  value="<?php echo $c; ?>">
    <input type="hidden" name="doc_id" id="doc_id"  value="<?php echo $id; ?>">
    <input type="hidden" name="redi" value="1">

    <div class="form-group">
        <label for="file"><?php _t("Logo"); ?></label>
        <input type="file" id="file" name="file">

        <p class="help-block"></p>
    </div>  

    <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>

</form>