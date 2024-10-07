<?php
$mensaje = "Bonjour, \nIci vous avez la facture de notre société $config_company_name qui vous concerne \nCordialement \n" . contacts_formated_name(contacts_field_id('name', $u_id)) . " " . contacts_formated_name(contacts_field_id('lastname', $u_id)) . "   \nDirecteur \n$config_company_name";
?>
<form action="index.php" method="post" >
    <input type="hidden" name="c" value="invoices"> 
    <input type="hidden" name="a" value="export_pdf"> 
    <input type="hidden" name="way" value="email"> 
    <input type="hidden" name="id" value="<?php echo "$id"; ?>"> 


    <div class="form-group">
        <label for="reciver_id"><?php _t("Send to"); ?></label>

        <select class="form-control" name="reciver_id" id="reciver_id">
            <?php
            foreach (employees_list_by_company($invoices["client_id"]) as $key => $employee) {

                $email = directory_search_data_by_contact_id("Email", $employee['contact_id'])[0];

                $contact = contacts_formated($employee['contact_id']);

                echo '<option value="' . $employee['contact_id'] . '">' . $contact . ' (' . $email . ') </option>';
            }
            ?>
        </select>

    </div>

    <?php
    /*    <div class="form-group">
      <label for="cc"><?php _t("Send to"); ?></label>
      <input type="email" class="form-control" name="reciver_id" id="reciver_id" placeholder="info@mail.com" value="<?php echo $email; ?>">
      </div>
     */
    ?>

    <?php
    /*    foreach (employees_list_by_company($invoices["client_id"]) as $key => $employee) {

      $email = directory_search_data_by_contact_id("Email", $employee['contact_id'])[0];

      $contact = contacts_formated($employee['contact_id']);

      vardump($email);


      }
     * 
     */
    ?>




    <div class="form-group">
        <label for="cc"><?php _t("Send copy to"); ?></label>
        <input type="email" class="form-control" name="cc" id="cc" placeholder="info@mail.com">
    </div>




    <div class="form-group">
        <label for="message"><?php _t("Message"); ?></label>
        <textarea name="message" class="form-control" rows="8"><?php echo $mensaje; ?></textarea>
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
        <label for="files"><?php _t("Files"); ?></label>
        <p>
            <span class="glyphicon glyphicon-paperclip"></span> 
            <a href="index.php?c=invoices&a=export_pdf&way=web&id=<?php echo $id; ?>" target="new">
                <?php _t("invoice.pdf"); ?>
            </a>
        </p>
    </div>






    <button type="submit" class="btn btn-default">
        <?php _t("Send"); ?>
    </button>
</form>