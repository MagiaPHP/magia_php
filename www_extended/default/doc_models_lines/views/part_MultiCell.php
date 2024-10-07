
<form method="post" action='index.php'>
    <input type="hidden" name="c" value="doc_models_lines">
    <input type="hidden" name="a" value="ok_params_update">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <input type="hidden" name="redi[c]" value="doc_models">
    <input type="hidden" name="redi[a]" value="doc">


    <?php
    include "part_form_panel_multicell.php";
    include "part_form_panel_section.php";
    include "part_form_panel_fonts.php";
    include "part_form_panel_settextcolor.php";
    include "part_form_panel_setdrawcolor.php";
    include "part_form_panel_setfillcolor.php";
    ?>

</form>



