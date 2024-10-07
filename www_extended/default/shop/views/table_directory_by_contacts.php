<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>


<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
            <th><?php _t("Contact"); ?></th>
            <th><?php _t("Type"); ?></th>
            <th><?php _t("Data"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Contact"); ?></th>
            <th><?php _t("Type"); ?></th>
            <th><?php _t("Data"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </tfoot>
    <tbody>                
        <?php
        foreach ($directory as $key => $directory_list_by_contact_id) {
            ?>                                        
            <tr>
                <td><?php echo contacts_formated($directory_list_by_contact_id['contact_id']); ?></td>
                <td><?php echo $directory_list_by_contact_id['name']; ?></td>
                <td><?php echo $directory_list_by_contact_id['data']; ?></td>
                <td>
                    <?php
                    if (permissions_has_permission($u_rol, "shop_directory", "update")) {
                        include "modal_directory_edit.php";
                    }
                    if (permissions_has_permission($u_rol, "shop_directory", "delete")) {
                        include "modal_directory_delete.php";
                    }
                    ?>
                </td>
            </tr>                
        <?php } ?>                                
    </tbody>
    <?php
    if (permissions_has_permission($u_rol, "shop_directory", "create")) {

        if (count(directory_names_list()) != count(directory_list_by_contact_id($id))) {
            ?>

            <form action="index.php" method="post">
                <input type="hidden" name="c" value="shop">
                <input type="hidden" name="a" value="ok_directory_add">
                <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
                <?php
                /**
                 *                 <input type="hidden" name="directory_id" value="<?php echo $directory_list_by_contact_id['id']; ?>">
                 */
                ?>
                <tr>
                    <td></td>
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
                        <input 
                            type="text" 
                            name="data" 
                            class="form-control" 
                            id="data" 
                            value=""
                            placeholder=""
                            autofocus=""
                            required=""
                            >
                    </td>
                    <td>
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                            <?php _t("Add"); ?>
                        </button>
                    </td>
                </tr>
            </form>

        <?php } ?>
    <?php } ?>
</table>   




