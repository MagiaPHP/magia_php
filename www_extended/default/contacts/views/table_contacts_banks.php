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





<table class="table table-striped table-condensed">
    <thead>
        <tr>

            <th><?php _t("Bank"); ?></th>
            <th><?php _t("Account number"); ?></th>
            <th><?php _t("Bic"); ?></th>
            <th><?php _t("IBAN"); ?></th>
            <th><?php _t("Status"); ?></th>
            <th><?php _t("Use"); ?></th>
            <th></th>
        </tr>
    </thead>



    <tbody>
        
        <?php
        
        foreach ($banks as $banks_list_by_contact_id) {

            $by_default = banks_check_is_invoices($banks_list_by_contact_id['account_number']);

            $class = ($by_default) ? " warning " : "";
            
            
            ?>
        
            <tr class="<?php echo $class; ?>">                                            
                <?php /**
                 * <td><?php // echo contacts_formated($banks_list_by_contact_id['contact_id']); ?></td>
                 */
                ?>
                <td><?php echo "$banks_list_by_contact_id[bank]"; ?></td>
                
                
                <td>
                    <?php
                    if (permissions_has_permission($u_rol, "banks", "update")) {
                        include "form_contacts_bank_account_number_update.php";
                    } else {
                        echo "$banks_list_by_contact_id[account_number]";
                    }
                    ?>
                </td>

                <td><?php echo "$banks_list_by_contact_id[bic]"; ?></td>
                <td><?php echo "$banks_list_by_contact_id[iban]"; ?></td>
                <td>

                    <?php
                    if (permissions_has_permission($u_rol, "banks", "update") && !$by_default) {
                        include "modal_banks_changer_status.php";
                    }
                    ?>

                    <?php //echo "$banks_list_by_contact_id[status]";  ?>

                </td>  

                <td>
                    <?php
                    if (
                            contacts_is_headoffice($id) &&
                            permissions_has_permission($u_rol, "banks", "update")) {
                        $invoices = (!$by_default ) ?
                                include "modal_banks_set_for_invoices.php" :
                                include "modal_banks_info_for_invoices.php"
                        ;
                    }
                    ?>
                </td>   

                <td>

                    <?php
                    if (permissions_has_permission($u_rol, "banks", "update")) {
                        include "modal_form_contacts_bank_edit.php";
                    }
                    ?>

                    <?php
                    if (permissions_has_permission($u_rol, "banks", "delete") && !$by_default) {
                        include "modal_contacts_bank_delete.php";
                    }
                    ?>
                </td> 



            </tr>
        <?php } ?>
    </tbody>  

    <form action="index.php" method="post">
        <input type="hidden" name="c" value="banks">
        <input type="hidden" name="a" value="ok_add">
        <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
        <input type="hidden" name="redi[redi]" value="5">
        <input type="hidden" name="redi[c]" value="contacts">
        <input type="hidden" name="redi[a]" value="banks">
        <input type="hidden" name="redi[params]" value="id=<?php echo $id; ?>">
        <tr>

            <td>
                <input 
                    type="text" 
                    name="bank" 
                    class="form-control" 
                    id="bank" 
                    value=""
                    placeholder="<?php echo _t("Bank name") ?>"

                    >
            </td>
            <td>
                <input 
                    type="text" 
                    name="account_number" 
                    class="form-control" 
                    id="account_number" 
                    value=""
                    placeholder="<?php _t("Account number"); ?>"
                    required=""
                    >
            </td>
            <td>
                <input 
                    type="text" 
                    name="bic" 
                    class="form-control" 
                    id="bic" 
                    value=""
                    placeholder="<?php _t("Bic number"); ?>"
                    >
            </td>
            <td>

                <input 
                    type="text" 
                    name="iban" 
                    class="form-control" 
                    id="iban" 
                    value=""
                    placeholder="<?php echo _t("IBAN number"); ?>"
                    >
            </td>



            <td>
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <?php _t("Add"); ?></button>
            </td>
            <td>

            </td>
            <td></td>


        </tr>
    </form>


</table>