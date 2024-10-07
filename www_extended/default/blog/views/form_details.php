


<?php

/**
 * 
  <form class="form-horizontal" action="index.php" method="post" >
  <input type="hidden" name="c" value="blog">
  <input type="hidden" name="a" value="ok_edit">
  <input type="hidden" name="id" value="<?php echo $blog->getId(); ?>">
  <input type="hidden" name="redi[redi]" value="3">

  <?php # title ?>
  <div class="form-group">
  <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>
  <div class="col-sm-8">
  <input type="text" name="title" class="form-control" id="title" placeholder="title" value="<?php echo $blog->getTitle(); ?>" >
  </div>
  </div>
  <?php # /title ?>

  <?php # description ?>
  <div class="form-group">
  <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
  <div class="col-sm-8">
  <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ><?php echo $blog->getDescription(); ?></textarea>
  </div>
  </div>
  <script>
  ClassicEditor
  .create(document.querySelector('#description'))
  .catch(error => {
  console.error(error);
  });
  </script>

  <?php # /description ?>

  <div class="form-group">
  <label class="control-label col-sm-3" for=""></label>
  <div class="col-sm-8">
  <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
  </div>
  </div>

  </form>


 */
?>