<form method="post" action="index.php">
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_import_from_json">
    <input type="hidden" name="redi[redi]" value="1">
    <?php
//    vardump($docs_exchange->getJson());
    ?>

    <div class="form-group">
        <label for="notes"><?php _t("Personal notes"); ?></label>
        <textarea class="form-control" name="json"><?php // echo $docs_exchange['json'];    ?></textarea>
    </div>
    <button type="submit" class="btn btn-default">Aceptar</button>

</form>