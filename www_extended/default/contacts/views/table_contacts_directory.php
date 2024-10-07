

<?php
if (modules_field_module('status', "docu")) {
    // nombre del archivo sin el punto ni la extencion 
    // form_search_by_office.php > form_search_by_office
    // en los form, al final
    //
    echo docu_modal_bloc($c, $a, 'table_contacts_directory');
}
?>



<table class="table table-striped table-condensed">
    <tbody>
        <?php foreach (directory_list_by_contact_id($id) as $directory_list_by_contact_id) { ?>
            <tr>                                            
                <td><?php echo "$directory_list_by_contact_id[name]"; ?></td>
                <td><?php echo "$directory_list_by_contact_id[data]"; ?></td>                                                                            
                <td>
                    <?php
                    if (permissions_has_permission($u_rol, "directory", "update")) {
                        include "modal_directory_edit.php";
                    }
                    ?>
                    <?php
                    if (permissions_has_permission($u_rol, "directory", "delete")) {
                        $redi = 2;
                        include "modal_directory_delete.php";
                    }
                    ?>
                </td>  
                <td>
                    <?php
                    if (
                            $directory_list_by_contact_id['name'] == 'Email' &&
                            !is_email($directory_list_by_contact_id['data'])
                    ) {
                        echo _t("Email format error");
                    }
                    ?>
                </td>
            </tr>
        <?php } ?>
    </tbody> 

    <form action="index.php" method="post">

        <input type="hidden" name="c" value="contacts">
        <input type="hidden" name="a" value="ok_directory_add">
        <input type="hidden" name="contact_id" value="<?php echo $id; ?>">

        <input type="hidden" name="redi" value="1">

        <tr>
            <td>
                <select class="form-control" name="name">
                    <?php
                    $i = 0;
                    foreach (directory_names_list() as $key => $value) {

                        if (!in_array($value['name'], array_column(directory_list_by_contact_id($id), 'name'))) {

                            // si es headoffice
                            if (strtolower($value['name']) == 'tva' && !contacts_is_headoffice($id)) {
                                echo '<option value="' . $value['name'] . '" disabled>' . $value['name'] . ' ( ' . _tr('Only headoffice') . ' )</option>';
                            } else {
                                echo '<option value="' . $value['name'] . '">' . $value['name'] . '</option>';
                            }
                        }

                        $i++;
                    }
                    ?>
                </select>
            </td>

            <td>
                <input type="text" name="data" class="form-control" id="data" placeholder="">

            </td>

            <td>
                <button type="submit" class="btn btn-default">
                    <?php echo icon("plus"); ?>
                    <?php // _t("Add"); ?>
                </button>
            </td>

            <td></td>


        </tr>
    </form>

</table>

