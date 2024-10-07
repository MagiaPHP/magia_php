
<form method="POST" action="index.php">
    <input type="hidden" name="c" value="doc_models_lines">
    <input type="hidden" name="a" value="ok_params_update">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="modele" value="<?php echo $modele; ?>">
    <input type="hidden" name="doc" value="<?php echo $doc; ?>">

    <input type="hidden" name="redi[c]" value="doc_models">
    <input type="hidden" name="redi[a]" value="edit_qr">


    <?php
    include "part_form_panel_qr.php";
    include "part_form_panel_section.php";
    ?>
</form>


