
<table class="table">
    <tr>
        <td>value</td>
        <td>Label</td>
        <td>Del</td>
    </tr>

    <?php
    $values = json_decode(forms_lines_field_id('m_options_values', $fle2->getId()), true);

    foreach ($values as $key => $value) {

        $btn_del = '<a href="index.php?c=forms_lines&a=ok_delete_m_options_values&value=' . $value['value'] . '&line_id=' . $line . '"><span class="glyphicon glyphicon-trash"></span></a>';

        echo '<tr>';
        echo '<td>' . $value['value'] . '</td>';
        echo '<td>' . $value['label'] . '</td>';
        echo '<td>' . $btn_del . '</td>';
        echo '</tr>';
    }
    ?>



    <form class="form-inline" method="post" action="index.php">
        <input type="hidden" name="c" value="forms_lines">
        <input type="hidden" name="a" value="ok_push_field">
        <input type="hidden" name="id" value="<?php echo $fle2->getId();
    ?>">
        <input type="hidden" name="field" value="m_options_values">
        <input type="hidden" name="redi" value="2">

        <tr>
            <td><input type="text" class="form-control" name="value"></td>
            <td><input type="text" class="form-control" name="label"></td>
            <td>  
                <button type="submit" class="btn btn-default">
                    <?php _t("Add"); ?>
                </button>
            </td>
        </tr>

    </form>
</table>
