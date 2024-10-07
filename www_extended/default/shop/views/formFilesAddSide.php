<form enctype="multipart/form-data" encodig="multipart/form-data" method="post" action="index.php">

    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_FilesAdd">    
    <input type="hidden" name="order_id" id="id"  value="<?php echo $id; ?>">
    <input type="hidden" name="side" value="<?php echo $side; ?>">
    <input type="hidden" name="redi" value="1">
    <input type="hidden" name="notes" value="null">



    <?php
    /* <div class="form-group">
      <label for="side"><?php //_t("Side"); _t($side);  ?></label>

      <select name="side" class="form-control">
      <option value="<?php echo $side; ?>"><?php echo _t($side); ?></option>
      </select>
      </div> */
    ?>


    <div class="form-group">
        <label for="file">File input</label>
        <input type="file" id="file" name="file">

        <p class="help-block"><?php //echo _t("Only these file extensions are accepted");     ?></p>

        <?php
//        $nf = new update_File_Class(); 
//        $extentions = $nf->get_exts();
//        
//        foreach ($extentions as $key => $extention) {
//            $ex = explode("/", $extention); 
//            
//            if($ex[1] == "plain"){ $ex[1] = "txt"; }
//            
//            
//            echo "<span class=\"label label-info\">.$ex[1]</span> ";
//        }
//        
        ?>
    </div>  
    <br>
    <br>
    <br>
    <br>



    <?php
    /*    <div class="form-group">
      <label for="notes"><?php _t("Notes") ; ?></label>
      <textarea class="form-control" name="notes" >File side <?php echo $side ; ?></textarea>
      </div> */
    ?>





    <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>
</form>


