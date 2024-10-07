<form class="form-inline" method="get" action="index.php">
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="tva" value="<?php echo $txt; ?>">

    <button type="submit" class="btn btn-danger">
        <?php _t("Next"); ?>
        <span class="glyphicon glyphicon-chevron-right"></span>
    </button>

</form>