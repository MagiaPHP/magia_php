
<table class="table table-bordered">
    <?php
    foreach (banks_templates_list() as $key => $btl) {

        $tmp_alredy_add = banks_lines_tmp_search_by_account_number($account_number);

//        vardump(array_key_exists($btl['template'], $tmp_alredy_add)); 

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
            echo '<form class="form-horizontal" action="index.php" method="post" >
                    <input type="hidden" name="c" value="banks_lines_tmp">
                    <input type="hidden" name="a" value="ok_edit_template">
                    <input type="hidden" name="id" value="' . $col['id'] . '">
                    <input type="hidden" name="template" value="' . $btl['template'] . '">             
                    <input type="hidden" name="redi[redi]" value="5">
                    <input type="hidden" name="redi[c]" value="banks_lines">
                    <input type="hidden" name="redi[a]" value="import_check">
                    <input type="hidden" name="redi[params]" value="' . urldecode("file=$file&account_number=$account_number") . '">   
                        


<button type="submit" class="btn btn-default">' . icon("refresh") . ' ' . _tr("Edit") . '</button>
                </form>';
        }


        echo ' </td>
        </tr>';
    }
    ?>

</table>



