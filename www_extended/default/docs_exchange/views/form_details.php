<?php
//vardump($docs_exchange['pdf_base64']);

$pdf_base64 = $docs_exchange['pdf_base64'];

////Get File content from txt file
//$pdf_base64_handler = fopen($pdf_base64,'r');
//
//$pdf_content = fread($pdf_base64_handler,filesize($pdf_base64));
//
//fclose ($pdf_base64_handler);
////Decode pdf content

$pdf_name = "rosa.pdf";

$pdf_decoded = base64_decode($pdf_base64);
$pdf = fopen($pdf_name, 'w');
fwrite($pdf, $pdf_decoded);
fclose($pdf);

//$pdf_doc = "http://test.web.com/pdf.pdf";
$pdf_doc = $pdf_name;

$pdf_doc = "http://0.0.0.0/jiho_40/index.php?c=invoices&a=export_pdf&id=317&lang=&1";
?>




<iframe src="<?php echo $pdf_doc; ?>" style="width:100%; height:1200px;" frameborder="0" ></iframe>
<?php
/**
 * 
  <p>json</p>


  <form class="form-horizontal" action="index.php" method="get" >
  <input type="hidden" name="c" value="docs_exchange">
  <input type="hidden" name="a" value="edit">
  <input type="hidden" name="id" value="<?php echo "$id"; ?>">
  <?php # sender_tva  ?>
  <div class="form-group">
  <label class="control-label col-sm-3" for="sender_tva"><?php _t("Sender_tva"); ?></label>
  <div class="col-sm-8">
  <input type="text" name="sender_tva" class="form-control" id="sender_tva" placeholder="sender_tva" value="<?php echo $docs_exchange['sender_tva']; ?>"  disabled="" >
  </div>
  </div>
  <?php # /sender_tva  ?>

  <?php # reciver_tva  ?>
  <div class="form-group">
  <label class="control-label col-sm-3" for="reciver_tva"><?php _t("Reciver_tva"); ?></label>
  <div class="col-sm-8">
  <input type="text" name="reciver_tva" class="form-control" id="reciver_tva" placeholder="reciver_tva" value="<?php echo $docs_exchange['reciver_tva']; ?>"  disabled="" >
  </div>
  </div>
  <?php # /reciver_tva  ?>

  <?php # doc_type  ?>
  <div class="form-group">
  <label class="control-label col-sm-3" for="doc_type"><?php _t("Doc_type"); ?></label>
  <div class="col-sm-8">
  <input type="text" name="doc_type" class="form-control" id="doc_type" placeholder="doc_type" value="<?php echo $docs_exchange['doc_type']; ?>"  disabled="" >
  </div>
  </div>
  <?php # /doc_type  ?>

  <?php # doc_id  ?>
  <div class="form-group">
  <label class="control-label col-sm-3" for="doc_id"><?php _t("Doc_id"); ?></label>
  <div class="col-sm-8">
  <input type="text" name="doc_id" class="form-control" id="doc_id" placeholder="doc_id" value="<?php echo $docs_exchange['doc_id']; ?>"  disabled="" >
  </div>
  </div>
  <?php # /doc_id  ?>

  <?php # json  ?>
  <div class="form-group">
  <label class="control-label col-sm-3" for="json"><?php _t("Json"); ?></label>
  <div class="col-sm-8">
  <textarea name="json" class="form-control" id="json" placeholder="json - textarea"  disabled="" ><?php echo $docs_exchange['json']; ?></textarea>
  </div>
  </div>
  <?php # /json  ?>

  <?php # pdf_base64  ?>
  <div class="form-group">
  <label class="control-label col-sm-3" for="pdf_base64"><?php _t("Pdf_base64"); ?></label>
  <div class="col-sm-8">
  <textarea
  name="pdf_base64"
  class="form-control"
  id="pdf_base64"
  placeholder="pdf_base64 - textarea"
  disabled="" ><?php echo $docs_exchange['pdf_base64']; ?></textarea>
  </div>
  </div>
  <?php # /pdf_base64  ?>

  <?php # date_send  ?>
  <div class="form-group">
  <label class="control-label col-sm-3" for="date_send"><?php _t("Date_send"); ?></label>
  <div class="col-sm-8">
  <input type="date" name="date_send" class="form-control" id="date_send" placeholder="date_send" value="<?php echo $docs_exchange['date_send']; ?>"  disabled="" >
  </div>
  </div>
  <?php # /date_send  ?>

  <?php # order_by  ?>
  <div class="form-group">
  <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
  <div class="col-sm-8">
  <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $docs_exchange['order_by']; ?>"  disabled="" >
  </div>
  </div>
  <?php # /order_by  ?>

  <?php # status  ?>
  <div class="form-group">
  <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
  <div class="col-sm-8">
  <select name="status" class="form-control" id="status"  disabled="" >
  <option value="1" <?php echo ($docs_exchange["status"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
  <option value="0" <?php echo ($docs_exchange["status"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
  </select>
  </div>
  </div>
  <?php # /status  ?>


  <div class="form-group">
  <label class="control-label col-sm-3" for=""></label>
  <div class="col-sm-8">
  <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
  </div>
  </div>

  </form>


 */
?>