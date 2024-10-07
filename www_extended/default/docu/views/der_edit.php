<?php
# MagiaPHP 
# file date creation: 2023-09-30 

include "part_der_add_picture.php";

//vardump(PATH_GALLERY_IMG_SUBDOMAIN); 

if (!file_exists(PATH_GALLERY_IMG_SUBDOMAIN)) {
    echo PATH_GALLERY_IMG_SUBDOMAIN . " <b>no existe</b>";
}

//vardump($docu);
//vardump($controllers);
?>

<p>
    <?php _t("Filter images by controller"); ?>
</p>

<form class="form-inline" action="index.php" method="get">
    <input type="hidden" name="c" value="<?php echo $c; ?>"> 
    <input type="hidden" name="a" value="<?php echo $a; ?>"> 
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="form-group">
        <label class="sr-only" for="controllers">
            <?php _t("Controllers"); ?>
        </label>
        <select name="controllers" class="form-control selectpicker" data-live-search="true">
            <option value="all"><?php _t("All"); ?></option>
            <?php
            foreach (controllers_list() as $key => $cl) {
                $cl_selected = ($cl["controller"] == $controllers ) ? " selected " : "";
                echo '<option value="' . $cl["controller"] . '" ' . $cl_selected . '>' . _tr($cl["controller"]) . '</option>';
            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-default">
        <?php _t("Changer"); ?>
    </button>
</form>



<h3>
    <?php _t("Show images of"); ?>: <?php echo _tr($controllers); ?>
</h3>

<?php
/**
 * 
  <div class="row">
  <?php
  $docu_file_path = PATH_GALLERY_IMG_SUBDOMAIN . 'docu/';
  if (!file_exists($docu_file_path)) {
  echo "<p>$docu_file_path Need be create</p>";
  }
  $files = scandir($docu_file_path, SCANDIR_SORT_DESCENDING);
  foreach ($files as $picture) {
  $filePath = $docu_file_path . '/' . $picture;
  if (is_file($filePath)) {
  echo '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
  <div class="thumbnail">
  <img src="' . $filePath . '" alt="' . $filePath . '">
  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteImage">
  Delete
  </button>

  <div class="modal fade" id="deleteImage" tabindex="-1" role="dialog" aria-labelledby="deleteImageLabel">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="deleteImageLabel">' . _tr("Atention") . '</h4>
  </div>
  <div class="modal-body">
  <h2>' . _tr("Delete this image") . '</h2>
  <p>
  <a href="index.php?c=gallery&a=ok_delete&id=' . $dil["id"] . 'xx&redi=4" class="btn btn-danger">' . _tr("Yes, delete now") . '</a>
  </p>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>';
  }
  }
  ?>
  </div>

 */
?>

<div class="row">


    <?php
    if ($controllers == 'all') {
        $pictures = gallery_list();
    } else {
        $pictures = gallery_search_by('controller', $controllers);
    }

    foreach ($pictures as $key => $gsbc) {

        $redi = ($c == 'docu') ? "2" : "3";

        $img = PATH_GALLERY_IMG_SUBDOMAIN . 'docu/' . $gsbc["name"];

        if (file_exists($img)) {

            echo '
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <a href="#" class="thumbnail" data-toggle="modal" data-target="#myModal_' . $gsbc["id"] . '">
                <img src="' . $img . '" alt="imagen">
            </a>
        </div>  
        ';

            echo '<div class="modal fade" id="myModal_' . $gsbc["id"] . '" tabindex="-1" role="dialog" aria-labelledby="myModal_' . $gsbc["id"] . 'Label">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModal_' . $gsbc["id"] . 'Label">' . _tr("Image") . '</h4>
                    </div>
                    <div class="modal-body">
                        <img src="' . $img . '" alt="imagen">
                    </div>
                    <div class="modal-footer">
                        <a href="index.php?c=docu&a=ok_picture_delete&id=' . $gsbc["id"] . '&docu_id=' . $id . '&redi=' . $redi . '" class="btn btn-danger">' . _tr("Delete image") . '</a>


                    </div>
                </div>
            </div>
        </div>';
        } else {
            echo "image: <b>$img</b> no existe";
        }
    }
    ?>

</div>











<?php /**
 * 

  <form class="form-horizontal" action="index.php" method="post" >
  <input type="hidden" name="c" value="docu">
  <input type="hidden" name="a" value="ok_add">
  <input type="hidden" name="redi" value="<?php echo $redi; ?>">

  <?php # controllers ?>
  <div class="form-group">
  <label class=" col-sm-1 col-md-1" for="controllers"><?php _t("Controllers"); ?></label>
  <div class="col-sm-8 col-md-12 col-md-12">
  <select name="controllers" class="form-control selectpicker" id="controllers" data-live-search="true" >
  <?php controllers_select("controller", "controller", "", array()); ?>
  </select>
  </div>
  </div>
  <?php # /controllers ?>

  <?php # father_id ?>
  <div class="form-group">
  <label class=" col-sm-1 col-md-1" for="father_id"><?php _t("Father"); ?></label>
  <div class="col-sm-8 col-md-12 col-md-12">

  <select name="father_id" class="form-control selectpicker" data-live-search="true"  id="father_id">
  <option value="null"><?php _t("Select one"); ?></option>
  <?php
  foreach (docu_list_widthout_father() as $key => $h1) {
  echo '<option value="' . $h1['id'] . '">' . $h1['title'] . '</option>';
  foreach (docu_list_of_children($h1['id']) as $key => $hx) {
  echo '<option value="' . $hx['id'] . '"> >&nbsp;> ' . $hx['title'] . '</option>';
  foreach (docu_list_of_children($hx['id']) as $key => $hx) {
  echo '<option value="' . $hx['id'] . '"> >&nbsp;>&nbsp;> ' . $hx['title'] . '</option>';
  foreach (docu_list_of_children($hx['id']) as $key => $hx) {
  echo '<option value="' . $hx['id'] . '"> >&nbsp;>&nbsp;>&nbsp;> ' . $hx['title'] . '</option>';
  foreach (docu_list_of_children($hx['id']) as $key => $hx) {
  echo '<option value="' . $hx['id'] . '"> >&nbsp;>&nbsp;>&nbsp;>&nbsp;> ' . $hx['title'] . '</option>';
  foreach (docu_list_of_children($hx['id']) as $key => $hx) {
  echo '<option value="' . $hx['id'] . '"> >&nbsp;>&nbsp;>&nbsp;>&nbsp;>&nbsp;> ' . $hx['title'] . '</option>';
  }
  }
  }
  }
  }
  }
  ?>



  </select>


  </div>
  </div>
  <?php # /father_id  ?>


  <?php # order_by  ?>
  <div class="form-group">
  <label class="control-label col-sm-1 col-md-1" for="order_by"><?php _t("Order_by"); ?></label>
  <div class="col-sm-8 col-md-12 col-md-12">
  <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
  </div>
  </div>
  <?php # /order_by ?>

  <?php # status  ?>
  <div class="form-group">
  <label class="control-label col-sm-1 col-md-1" for="status"><?php _t("Status"); ?></label>
  <div class="col-sm-8 col-md-12 col-md-12">
  <select name="status" class="form-control" id="status" >
  <option value="1" <?php echo ($docu["status"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
  <option value="0" <?php echo ($docu["status"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
  </select>
  </div>
  </div>
  <?php # /status  ?>


  <div class="form-group">
  <label class="control-label col-sm-2" for=""></label>
  <div class="col-sm-8 col-md-12 col-md-12">
  <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
  </div>
  </div>

  </form>
 */ ?>
