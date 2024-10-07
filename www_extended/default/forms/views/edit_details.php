<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="forms">
    <input type="hidden" name="a" value="test">
    <input type="hidden" name="id" value="<?php echo "$form_edit->getId()"; ?>">
    <input type="hidden" name="redi" value="<?php // echo $redi;                     ?>">
    <?php
//    vardump($form_edit);
//    vardump($form_edit->getLines());
//    foreach (forms_lines_search_by_form_id($id) as $key => $m_field) {

    $html = "";

    foreach ($form_edit->getLines() as $key => $f_line) {

        $fel2 = new Forms_lines2();
        $fel2->setForms_lines($f_line['id']);

        $mandatory = ($fel2->getM_mandatory()) ? ' required ' : "";
        $disabled = ($fel2->getM_disabled()) ? ' disabled="" ' : ""; // suado en select
        $readonly = ($fel2->getM_only_read()) ? ' readonly ' : "";

        switch ($fel2->getM_type()) {
            case 'text':
            case 'email':
            case 'date':
                include "part_text.php";
                break;

            case 'hidden':
                include "part_hidden.php";
                break;

            case 'textarea':
                include "part_textarea.php";
                break;

            case 'select': //----------------------------------------------------SELECT
                if ($fel2->getM_options_values()) { // si no hay valores alli,
                    include "part_select.php";
                } else {
                    include "part_select_external_table.php";
                }
                break;

            case 'radio': //----------------------------------------------------RADIO
                if ($fel2->getM_options_values()) { // si no hay valores alli,
                    include "part_radio.php";
                } else {
                    include "part_radio_external_table.php";
                }
                break;

            case 'check': //----------------------------------------------------CHECK
                if ($fel2->getM_options_values()) { // si no hay valores alli,
                    include "part_check.php";
                } else {
                    include "part_check_external_table.php";
                }
                break;

            case 'submit':
                include "part_submit.php";
                break;

            default:
                break;
        }

        if ($fel2->getId() == $line) {
            echo '<div class="alert alert-info" role="alert">' . $html . '</div>';
        } else {
            echo $html;
        }
    }

    vardump($fel2);
    ?>
</form>