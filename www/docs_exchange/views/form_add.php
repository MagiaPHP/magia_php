<?php 
# MagiaPHP 
# file date creation: 2024-07-31 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="docs_exchange">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">
    
    <?php # reciver_tva ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="reciver_tva"><?php _t("Reciver_tva"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="reciver_tva" class="form-control" id="reciver_tva" placeholder="reciver_tva" value="" >
        </div>	
    </div>
    <?php # /reciver_tva ?>

    <?php # sender_name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="sender_name"><?php _t("Sender_name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="sender_name" class="form-control" id="sender_name" placeholder="sender_name" value="" >
        </div>	
    </div>
    <?php # /sender_name ?>

    <?php # label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="label"><?php _t("Label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="label" class="form-control" id="label" placeholder="label" value="" >
        </div>	
    </div>
    <?php # /label ?>

    <?php # sender_tva ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="sender_tva"><?php _t("Sender_tva"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="sender_tva" class="form-control" id="sender_tva" placeholder="sender_tva" value="" >
        </div>	
    </div>
    <?php # /sender_tva ?>

    <?php # doc_type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="doc_type"><?php _t("Doc_type"); ?></label>
        <div class="col-sm-8">
               <select name="doc_type" class="form-control selectpicker" id="doc_type" data-live-search="true" >
                <?php controllers_select("controller", array("controller"), "" , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /doc_type ?>

    <?php # doc_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="doc_id"><?php _t("Doc_id"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="doc_id" class="form-control" id="doc_id" placeholder="doc_id" value="" >
        </div>	
    </div>
    <?php # /doc_id ?>

    <?php # json ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="json"><?php _t("Json"); ?></label>
        <div class="col-sm-8">
            <textarea name="json" class="form-control" id="json" placeholder="json - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . json . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /json ?>

    <?php # pdf_base64 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="pdf_base64"><?php _t("Pdf_base64"); ?></label>
        <div class="col-sm-8">
            <textarea name="pdf_base64" class="form-control" id="pdf_base64" placeholder="pdf_base64 - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . pdf_base64 . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /pdf_base64 ?>

    <?php # date_send ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_send"><?php _t("Date_send"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_send" class="form-control" id="date_send" placeholder="date_send" value="current_timestamp()" >
        </div>	
    </div>
    <?php # /date_send ?>

    <?php # order_by ?>
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

  
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus");  ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>
