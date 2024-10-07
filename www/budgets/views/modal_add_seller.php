<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_seller">
    <span class="glyphicon glyphicon-plus-sign"></span> <?php _t("Add seller"); ?>
</button>


<div class="modal fade" id="modal_add_seller" tabindex="-1" role="dialog" aria-labelledby="modal_add_seller">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_add_seller"><?php _t("Add seller"); ?></h4>
            </div>
            <div class="modal-body">

                <h2><?php _t("Add seller"); ?> </h2>

                <p><?php _t("Choose a seller to be added to this budget"); ?></p>




                <form action="index.php" method="post" class="">
                    <input type="hidden" name="c" value="budgets">
                    <input type="hidden" name="a" value="ok_add_seller">
                    <input type="hidden" name="budget_id" value="<?php echo $id; ?>">  
                    <div class="form-group">
                        <label for="seller_id"><?php _t("Seller"); ?></label>

                        <select name="seller_id" class="form-control">
                            <?php
                            foreach (employees_list_by_company(contacts_field_id("owner_id", $u_id)) as $key => $value) {
                                echo "<option value=\"$value[contact_id]\">" . (contacts_formated($value['contact_id'])) . "</option>";
                            }
                            ?>
                        </select>                                                
                    </div>
                    <div class="form-group">                        
                        <button type="submit" class="btn btn-primary"><?php _t("Add"); ?></button>
                    </div>
                </form>




                <p></p>





            </div>


        </div>
    </div>
</div>