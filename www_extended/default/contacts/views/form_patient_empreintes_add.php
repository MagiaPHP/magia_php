<?php
$path_nas = "\\nas\web\\2022\\01-abril\\220401\\AUDIOLABO3D\SOUPLES";
$path_dropbox = "https://www.cloud.web.com/dropbox/Europa/Belgique/2020_COELLO/scan/203020-62-L.STL";
?>

<form>


    <div class="form-group">
        <label for="exampleInputEmail1"><?php _t("NAS"); ?></label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $path_nas; ?>">
    </div>


    <div class="form-group">
        <label for="exampleInputPassword1"><?php _t("Dropbox"); ?></label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="<?php echo $path_dropbox; ?>">
    </div>





    <button type="submit" class="btn btn-default">Submit</button>


</form>