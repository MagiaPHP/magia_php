<?php
# MagiaPHP 
# file date creation: 2024-05-30 
?>

<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_documents">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="employee_id" value="<?php echo $id; ?>">
    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_documents">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">

    <?php # document ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="document"><?php _t("Document"); ?></label>
        <div class="col-sm-8">
            <select class="form-control" name="document">
                <?php
                // lista de documentos que no tiene aun este contacto 
                foreach (hr_documents_list() as $key => $hrdl) {

                    if (!in_array($hrdl['code'], hr_employee_documents_list_documents_by_emplyee_id($id))) {
                        echo '<option value="' . $hrdl['code'] . '">' . _tr($hrdl['title']) . '</option>';
                    }
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /document  ?>

    <?php # document_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="document_number"><?php _t("Number"); ?></label>
        <div class="col-sm-8">
            <input 
                type="text" 
                name="document_number" 
                class="form-control" 
                id="document_number" 
                placeholder="document_number" 
                value="" 
                required=""
                >
        </div>	
    </div>
    <?php # /document_number  ?>

    <?php # date_delivery ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_delivery"><?php _t("Date delivery"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_delivery" class="form-control" id="date_delivery" placeholder="date_delivery" value=""
                   required="" >
        </div>	
    </div>
    <?php # /date_delivery  ?>

    <?php # date_expiration ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_expiration"><?php _t("Date expiration"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_expiration" class="form-control" id="date_expiration" placeholder="date_expiration" value=""

                   >
        </div>	
    </div>
    <?php # /date_expiration  ?>

    <?php
    /**
     *     <?php # order_by ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
      <div class="col-sm-8">
      <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
      </div>
      </div>
      <?php # /order_by ?>

      <?php # status ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
      <div class="col-sm-8">
      <select name="status" class="form-control" id="status" >
      <option value="1"><?php echo _t("Actived"); ?></option>
      <option value="0"><?php echo _t("Blocked"); ?></option>
      </select>
      </div>
      </div>
      <?php # /status ?>
     */
    ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for="follow"></label>
        <div class="col-sm-8">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="follow" value="1"> <?php _t("Follow up"); ?>
                </label>
            </div>

        </div>	
    </div>





    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>

