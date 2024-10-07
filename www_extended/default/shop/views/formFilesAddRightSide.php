<form enctype="multipart/form-data" method="post" >

    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_FilesAdd">
    <input type="hidden" name="order_id" id="id"  value="<?php echo $id; ?>">


    <div class="form-group">
        <label for="side"><?php _t("Side (right)"); ?></label>
        <select name="side" class="form-control">                        

            <option value="R"><?php echo _t("Rigth"); ?></option>

        </select>
    </div>

    <div class="form-group">
        <label for="notes"><?php _t("Notes"); ?></label>
        <textarea class="form-control" name="notes" ></textarea>
    </div>

    <div class="form-group">
        <label for="image">File input</label>
        <input type="file" id="image" name="image">
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
        ?>
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
</form>

