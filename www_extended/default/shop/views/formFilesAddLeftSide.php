<form id="subirImg" name="subirImg" enctype="multipart/form-data" method="post" action="index.php">

    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_FilesAdd">    
    <input type="hidden" name="order_id" id="id"  value="<?php echo $id; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />

    <div class="form-group">
        <label for="side"><?php _t("Side (left)"); ?></label>
        <select name="side" class="form-control">                        

            <option value="L"><?php echo _t("Left"); ?></option>

        </select>
    </div>

    <div class="form-group">
        <label for="notes"><?php _t("Notes"); ?></label>
        <textarea class="form-control" name="notes" ></textarea>
    </div>

    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="image" name="image">
        <p class="help-block"><?php echo _t("Only these file extensions are accepted"); ?></p>

        <?php
        $nf = new update_File_Class();
        $extentions = $nf->get_exts();

        foreach ($extentions as $key => $extention) {
            $ex = explode("/", $extention);

            if ($ex[1] == "plain") {
                $ex[1] = "txt";
            }


            echo "<span class=\"label label-info\">.$ex[1]</span> ";
        }
        ?>
    </div>        

    <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>***
</form>


