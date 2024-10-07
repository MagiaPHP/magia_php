<?php
$mensaje = "Estimado Sr. \n"
        . "Reciba ud el presupuesto de nuestra empresa"
        . "\n"
        . "La contabilidad\n"
        . "$config_company_name";

//vardump($budgets['client_id']);
//// lista de personas en la sede 
//// o la persona que se cojio para factura r
//
//vardump(employees_list_by_company(offices_headoffice_of_office($budgets["client_id"])));
//vardump((($budgets["client_id"])));
?>
<form action="index.php" method="post" >
    <input type="hidden" name="c" value="budgets"> 
    <input type="hidden" name="a" value="export_pdf"> 
    <input type="hidden" name="way" value="email"> 
    <input type="hidden" name="id" value="<?php echo "$id"; ?>"> 


    <div class="form-group">
        <label for="reciver_id"><?php _t("Send to"); ?></label>

        <select class="form-control" name="reciver_id" id="reciver_id">            
            <?php
            foreach (employees_list_by_company($budgets["client_id"]) as $key => $employee) {

                $email = directory_search_data_by_contact_id("Email", $employee['contact_id'])[0];
                $contact = contacts_formated($employee['contact_id']);

                echo '<option value="' . $employee['contact_id'] . '">' . $contact . ' (' . $email . ') </option>';
            }
            ?>           
        </select>
    </div>

    <div class="form-group">
        <label for="cc"><?php _t("Send copy to"); ?></label>
        <input type="email" class="form-control" name="cc" id="cc" placeholder="info@mail.com">
    </div>

    <div class="form-group">
        <label for="message"><?php _t("Message"); ?></label>
        <textarea name="message" class="form-control" rows="12"><?php echo $mensaje; ?></textarea>
    </div>

    <?php if (directory_search_data_by_contact_id("Email", $u_id)[0]) { ?>
        <div class="form-group">
            <label for="cc2m"></label>
            <input 
                type="checkbox" 
                name="cc2m" 
                checked=""> 
            <?php _t("Send me a copy"); ?> (<?php echo directory_search_data_by_contact_id("Email", $u_id)[0]; ?>)
        </div>

    <?php } else { ?>
        <p><?php _t("If you want to receive a copy of this email, you must add your email first"); ?></p>
        <a href="index.php?c=contacts&a=directory&id=<?php echo "$u_id"; ?>"><?php _t("Add your email here"); ?></a>
        <p></p>

    <?php }
    ?>




    <div class="form-group">
        <label for="files"><?php _t("Attached files"); ?></label>
        <p>
            <span class="glyphicon glyphicon-paperclip"></span> 
            <a href="index.php?c=budgets&a=export_pdf&way=web&id=<?php echo $id; ?>" target="print">
                <?php _t("budget.pdf"); ?>
            </a>
        </p>
    </div>






    <button type="submit" class="btn btn-default">
        <?php _t("Send"); ?>
    </button>
</form>