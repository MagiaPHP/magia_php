<?php
//echo vardump($tmp);
?>

<form method="post" action="index.php">
    <input type="hidden" name="c" value="emails_tmp">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="2">


    <div class="form-group">
        <label for="signature">
            <?php _t("Tmp name"); ?>
        </label>

        <input 
            class="form-control" 
            type="text" 
            name="tmp" 
            id="tmp" 
            value="<?php echo $emails_tmp->getTmp(); ?>"

            >

    </div>

    <div class="form-group">
        <label for="body">
            <?php _t("Body"); ?>
        </label>


        <script src="includes/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
        <script>
            tinymce.init({
                selector: 'textarea#body',
                width: '100%',
                height: 500,
            });
        </script>


        <textarea 
            class="form-control" 
            rows="8" 
            id="body"
            name="signature"><?php echo $emails_tmp->getBody(); ?></textarea>
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox" > Activar
        </label>
    </div>


    <button type="submit" class="btn btn-default">
        <?php _t("Save"); ?>
    </button>
</form>
