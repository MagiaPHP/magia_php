<?php
$mensaje = "Estimado Sr. \n"
        . "Despues de ver la contabilidad, su cuenta sebe ser pagada«n"
        . "\n"
        . "La contabilidad\n"
        . "Empresa ABC";
?>
<form action="index.php" method="post" >
    <input type="hidden" name="c" value="budgets"> 
    <input type="hidden" name="a" value="commentsUpdateOk"> 
    <input type="hidden" name="budget_id" value="<?php echo "$id"; ?>"> 


    <div class="form-group">
        <label for="to"><?php _t("Send to"); ?></label>
        <input type="text" class="form-control" name="to" id="to" placeholder="info@mail.com">
    </div>


    <div class="form-group">
        <label for="cc"><?php _t("Copy to"); ?></label>
        <input type="text" class="form-control" name="cc" id="cc" placeholder="info@mail.com">
    </div>




    <div class="form-group">
        <label for="message"><?php _t("Message"); ?></label>
        <textarea name="message" class="form-control" rows="15"><?php echo $mensaje; ?></textarea>
    </div>


    <div class="form-group">
        <label for="files"><?php _t("Files"); ?></label>
        <p><span class="glyphicon glyphicon-paperclip"></span> <a href="index.php" target="new"><?php _t("Reminder_1.pdf"); ?></a></p>
    </div>


    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
    </div>


    <div class="checkbox">
        <label>
            <input type="checkbox"> <?php _t("Send me a copy"); ?>
        </label>
    </div>


    <button type="submit" class="btn btn-default">Submit</button>
</form>