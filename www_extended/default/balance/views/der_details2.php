<form enctype="multipart/form-data" method="post" action="index.php">

    <input type="hidden" name="c" value="gallery">
    <input type="hidden" name="a" value="ok_file_add">    
    <input type="hidden" name="controller" id="controller"  value="<?php echo $c; ?>">
    <input type="hidden" name="doc_id" id="doc_id"  value="<?php echo $id; ?>">
    <input type="hidden" name="redi" value="2">

    <div class="form-group">
        <label for="file"><?php _t("Logo"); ?></label>
        <input type="file" id="file" name="file">

        <p class="help-block"></p>
    </div>  

    <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>

</form>


<h2><?php _t("Documents"); ?></h2>


<table class="table">
    <?php
    foreach (gallery_search_by_controller_doc_id('balance', $id) as $key => $doc_file) {

        $file = PATH_GALLERY . '/' . $doc_file["name"];

        echo ' <tr>';
        echo '<td><span class="glyphicon glyphicon-paperclip"></span> Image</td>';
        echo '<td><a href="index.php?c=gallery&a=ok_picture_delete&filename=' . $doc_file["name"] . '&item_id=' . $id . '&redi=4"><span class="glyphicon glyphicon-trash"></span></a></td>';
        echo '</tr>';
    }
    ?>
</table>


<hr>




<?php /**
  <img
  src="<?php echo PATH_GALLERY; ?>/balance_127_0_0_0202401030627356594f047c0fde9137.jpg"
  alt="Example image"
  style="border: 1px solid black; padding: 10px;"
  width="100%"
  >





  <object data="balance_127_0_0_0202401030615086594ed5c589013741.pdf" type="application/pdf" width="100%" height="500px">

  <p>Unable to display PDF file. <a href="balance_127_0_0_0202401030615086594ed5c589013741.pdf">Download</a> instead.</p>

  </object>



  <object data="pdf.pdf" type="application/pdf" width="100%" height="500px">

  <p>Unable to display PDF file. <a href="pdf.pdf">Download</a> instead.</p>

  </object>
 * 
 */ ?>


