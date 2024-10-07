
<table class="table table-bordered">
    <?php
    foreach (banks_templates_list() as $key => $btl) {

        $tmp_alredy_add = banks_lines_tmp_search_by_account_number($account_number);

        echo ' <tr>
            <td>
                <p>
                    <b>' . $btl['template'] . '</b>
                    <br>
                    ' . $btl['description'] . '
                    
                </p>
            </td>
            <td>   ';

        if (!banks_lines_tmp_search_template_in_array($btl['template'], $tmp_alredy_add)) {
            echo ' <form class="form-horizontal" action="index.php" method="post" >
                    <input type="hidden" name="c" value="banks_lines_tmp">
                    <input type="hidden" name="a" value="ok_add">
                    <input type="hidden" name="account_number" value="' . $account_number . '">
                    <input type="hidden" name="template" value="' . $btl['template'] . '">             
                    <input type="hidden" name="status" value="1">                                 
                    <input type="hidden" name="redi[redi]" value="6">
                    <input type="hidden" name="redi[c]" value="banks_lines">
                    <input type="hidden" name="redi[a]" value="import_check">
                    <input type="hidden" name="redi[file]" value="' . $file . '">                   
                <button type="submit" class="btn btn-default">' . icon("plus") . ' ' . _tr("Add") . '</button>
                </form>
            </td>
        </tr>';
        }
    }
    ?>

</table>



