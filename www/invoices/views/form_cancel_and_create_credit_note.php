<?php
//vardump(balance_list_by_invoice($id)); 
?>

<form class="form-horizontal" method="post">

    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="ok_cancel_and_create_credit_note">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">


    <div class="form-group">
        <label for="id" class="col-sm-2 control-label"><?php _t("Invoice"); ?></label>
        <div class="col-sm-10">
            <p><?php echo invoices_numberf($id); ?></p>
        </div>
    </div>

    <div class="form-group">
        <label for="description" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
            <p>
                <?php
                message("info", "Credit note will be created");
                ?>
            </p>    
        </div>
    </div>

    <div class="form-group">
        <label for="comments" class="col-sm-2 control-label"><?php _t("Comments"); ?></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="comments" id="comments" placeholder="<?php _t("Reason for the cancellation"); ?>">

            <span id="helpBlock" class="help-block"><?php _t("Add a comment at the bottom of the document"); ?></span>
        </div>
    </div>    


    <?php
    /*
      <?php



      if ( balance_list_by_invoice($id) ) {
      ?>

      <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
      <label>
      <input
      type="checkbox"
      name="create_credit_note"
      checked=""
      disabled=""> <?php _t("Create credit note for") ; ?>:

      <b><?php echo monedaf((invoices_field_id("advance" , $id))) ; ?></b>


      </label>
      </div>
      </div>
      </div>
      <?php } else { ?>
      <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox" >
      <label>
      <input
      type="checkbox"
      name="create_credit_note"
      disabled=""
      > <?php _t("No payments have been registered, NO credit note will be created") ; ?>
      </label>
      </div>
      </div>
      </div>
      <?php } ?>
     */
    ?>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-danger"><?php _t("Ok, cancel"); ?></button>
        </div>
    </div>

</form>