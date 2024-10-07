<?php
$path_nas = "\\nas\web\\2022\\01-abril\\220401\\AUDIOLABO3D\SOUPLES";
$path_dropbox = "https://www.cloud.web.com/dropbox/Europa/Belgique/2020_COELLO/scan/203020-62-L.STL";
?>

<form>





    <div class="form-group">
        <label for="exampleInputPassword1"><?php _t("Patient"); ?></label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="<?php echo "COELLO-robinson"; ?>">
    </div>


    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
    </div>



    <div class="checkbox">
        <label>
            <input type="checkbox"> Check me out
        </label>
    </div>


    <button type="submit" class="btn btn-default">Submit</button>


</form>