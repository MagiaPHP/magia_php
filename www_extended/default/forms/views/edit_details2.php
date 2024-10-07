<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="forms">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">



    <?php
    foreach (forms_search_by_and_table_action('expenses', 'editar') as $key => $m_field) {

        $disabled = ($m_field['m_disabled']) ? ' disabled="" ' : "";

        $html = '    <?php # m_table ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_table">' . $m_field['m_label'] . '</label>
        <div class="col-sm-7">
            <input 
            type="' . $m_field['m_type'] . '" 
            name="m_table" 
            class="form-control" 
            id="m_table" 
            placeholder="' . $m_field['m_placeholder'] . '" 
            ' . $disabled . ' 
                value="' . $m_field['m_value'] . '" >
        </div>	
        <div class="col-sm-1">
            <a href="index.php?c=forms&a=edit&id=' . $m_field["id"] . '">Edit</a>
        </div>
    </div>
    <?php # /m_table ?>';

        if ($m_field['id'] == $id) {
            echo '<div class="alert alert-info" role="alert">' . $html . '</div>';
        } else {
            echo $html;
        }
    }
    ?>




    <input type="text" disabled="">


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

