<form method="post" action="index.php">
    <input type="hidden" name="c" value="doc_models_lines">
    <input type="hidden" name="a" value="ok_delete">

    <input type="hidden" name="redi[redi]" value="4">
    <input type="hidden" name="redi[c]" value="doc_models">
    <input type="hidden" name="redi[a]" value="search">
    <input type="hidden" name="redi[modele]" value="<?php echo $modele; ?>">
    <input type="hidden" name="redi[doc]" value="<?php echo $doc; ?>">


    <div class="row">

        <div class="col-xs-2">
            <input type="text" class="form-control" placeholder=".col-xs-3">
        </div>

        <div class="col-xs-3">
            <input type="text" class="form-control" placeholder=".col-xs-3">
        </div>

        <div class="col-xs-4">
            <input type="text" class="form-control" placeholder=".col-xs-4">
        </div>

    </div>


    <?php
    // index.php?
    // c=doc_models_lines&
    // a=ok_delete&
    // id=4539&
    // redi[redi]=4&
    // redi[c]=doc_models&
    // redi[a]=search&
    // redi[modele]=K&
    // redi[doc]=invoices



    foreach (doc_models_lines_search_modele_doc_section($modele, $doc, $doc_sections["section"]) as $key => $dmlsbds) {



        echo '<div class="checkbox">
        <label>
            <input type="checkbox" name="ids[]" value="' . $dmlsbds['id'] . '"> ' . $dmlsbds['order_by'] . ' : ' . $dmlsbds['name'] . '
        </label>
    </div>';
    }
    ?>

    <br>
    <br>
    <br>
    <br>
    <br>
    <button type="submit" class="btn btn-danger">
        <?php echo icon("trash"); ?>
        <?php _t("Delete"); ?>
    </button>


</form>