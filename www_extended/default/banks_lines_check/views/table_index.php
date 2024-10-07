
<?php //Creation date:  2024-05-22 10:05:15                                       
?>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
$colsToShow = json_decode(_options_option("banks_lines_check_index_cols_to_show"), true);
?>





<table class="table table-striped" border>
    <thead>
        <tr class="info">
            <?php banks_lines_check_index_generate_column_headers($colsToShow); ?>
            <td></td>
        </tr>
    </thead>    
    <tfoot>
        <tr class="info">
            <?php banks_lines_check_index_generate_column_headers($colsToShow); ?>               
            <td></td>
        </tr>
    </tfoot>


    <tbody>
        <?php
        $class = '';
        $icon = '';
        $error_field = array();
        $i = 1;
        $error_list = array();
        $ids_error = array();
        $ids_ok = array();

        foreach ($banks_lines_check as $key => $line) {
            echo '<tr>';
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            $j = 20;

            foreach ($colsToShow as $key => $col) {

                $error_field = banks_lines_import_check($col, $line[$col], $account_number);

                $error_list = array_merge($error_list, $error_field);

                if ($error_field) {
                    $class = 'danger';
                    $icon = icon('remove');
                    array_push($ids_error, $line['id']);
                } else {
                    $class = "";
                    $icon = icon('refresh');
                }

                $modal_link = '<a href="#" data-toggle="modal" data-target="#myModal_' . $line['id'] . '_' . $col . '">' . $icon . '</a>';

                include "modal.php";
                echo '<td class="' . $class . '">' . $modal_link . ' ' . $line[$col] . '</td>';
            }
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            if (in_array($line['id'], $ids_error)) {
                //echo '<td>' . $i . ' <input type="checkbox" name="id[' . $line['id'] . ']" value="1" ></td>';
                echo '<td></td>';
            } else {
                echo '<td><input type="checkbox" name="id[' . $line['id'] . ']" value="1" checked></td>';
                array_push($ids_ok, $line['id']);
            }


            ////////////////////////////////////////////////////////////////////
            echo '</tr>';
            $i++;
        }
        ?>	
    </tbody>
</table>

<br>

<?php
foreach ($error_list as $key => $error_in_lines) {
    echo '<p>' . $error_in_lines . '</p>';
}
?>


<form method="post" action="index.php">

    <input type="hidden" name="c" value="banks_lines_check">
    <input type="hidden" name="a" value="ok_copy">
    <input type="hidden" name="redi[redi]" value="1">

    <?php
    foreach ($ids_ok as $key => $id_to_send) {
        echo '<input type="hidden" name="ids[' . $id_to_send . ']" value="1">';
    }
    ?>


    <button type="submit" class="btn btn-default">
        <?php echo icon("ok"); ?> 
        <?php _t("Submit"); ?>
    </button>

</form>


<?php include view("banks_lines_check", "table_index_form_add"); ?>



</table>
<?php
//$pagination->createHtml();
?>
