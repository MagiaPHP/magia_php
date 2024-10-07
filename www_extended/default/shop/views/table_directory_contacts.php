<h3>
    <?php //echo contacts_field_id("name", $id) ?> <?php _t("Data"); ?>
</h3>

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
            <th><?php _t("Type"); ?></th>
            <th><?php _t("Data"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Type"); ?></th>
            <th><?php _t("Data"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </tfoot>
    <tbody>                
        <?php foreach (directory_list_by_contact_id($id) as $key => $directory_list_by_contact_id) { ?>                                        
            <tr>
                <td><?php echo $directory_list_by_contact_id['name']; ?></td>
                <td><?php echo $directory_list_by_contact_id['data']; ?></td>
                <td><!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_<?php echo "$directory_list_by_contact_id[id]"; ?>">
                        <?php _t("Edit"); ?>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal_<?php echo "$directory_list_by_contact_id[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_<?php echo "$directory_list_by_contact_id[id]"; ?>Label">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModal_<?php echo "$directory_list_by_contact_id[id]"; ?>Label">
                                        <?php _t("Edit data info"); ?>
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <?php //echo "$directory_list_by_contact_id[id]"; ?>
                                    <?php include "form_contacts_directory_edit.php"; ?>
                                </div>                                                                               
                            </div>
                        </div>
                    </div></td>
            </tr>                
        <?php } ?>                                


    </tbody>
</table>   

<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
    <?php _t("Add new"); ?>
</button>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="contacts_directory_add">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="contacts_directory_add"><?php _t("Add new data"); ?></h4>
            </div>
            <div class="modal-body">


                <form action="index.php" method="post">
                    <input type="hidden" name="c" value="shop">
                    <input type="hidden" name="a" value="ok_directory_add">
                    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">


                    <div class="form-group">
                        <label for="name"><?php _t("Name"); ?></label>
                        <select class="form-control" name="name">
                            <?php
                            $i = 0;
                            foreach (directory_names_list() as $key => $value) {
                                if (!in_array($value['name'], array_column(directory_list_by_contact_id($id), 'name'))) {
                                    echo '<option value="' . $value['name'] . '">' . $value['name'] . '</option>';
                                }
                                $i++;
                            }
                            ?>                                                                                                
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="data"><?php _t("Data"); ?></label>
                        <input type="text" name="data" class="form-control" id="data" placeholder="">
                    </div>

                    <button type="submit" class="btn btn-default"><?php _t("Add"); ?></button>
                </form>




            </div>


        </div>
    </div>
</div>