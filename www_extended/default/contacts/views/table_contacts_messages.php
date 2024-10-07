<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;

    }
</style>



<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
}
?>




<table class="table table-striped table-condensed table-bordered">
    <thead>
        <tr class="info">
            <th><?php _t("date"); ?></th>
            <th><?php _t("Price"); ?></th>
            <th><?php _t("Status"); ?></th>
        </tr>
    </thead>
    <tbody>


        <?php
        foreach (comments_list_by_contact_id($id) as $value) {
            echo " <tr>                                            
                      <td>$value[date]</td>
                      <td>$value[comment]</td>
                      
                  </tr>";
        }
        ?>


    </tbody>  
</table>