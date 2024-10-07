<?php
//vardump($blog_comments);
//vardump($blog_comments->getBlog_id());
?>

<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="blog_comments">
    <input type="hidden" name="a" value="ok_edit_short">
    <input type="hidden" name="id" value="<?php echo $blog_comments->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="3">


    <?php
    /**
     *     <?php # blog_id ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="blog_id"><?php _t("Blog_id"); ?></label>
      <div class="col-sm-8">
      <select name="blog_id" class="form-control selectpicker" id="blog_id" data-live-search="true" >
      <?php // blog_select("id", array("id"), $blog_comments->getBlog_id(), array()); ?>

      <?php
      foreach (blog_list() as $key => $blog_items) {
      echo '<option value="' . $blog_items['id'] . '">' . $blog_items['title'] . '</option>';
      }
      ?>
      </select>
      </div>
      </div>
      <?php # /blog_id ?>
     */
    ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="title" class="form-control" id="title" placeholder="title" value="<?php echo $blog_comments->getTitle(); ?>" >
        </div>	
    </div>
    <?php # /title ?>

    <?php # comment ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="comment"><?php _t("Comment"); ?></label>
        <div class="col-sm-8">
            <textarea 
                name="comment" 
                class="form-control" 
                id="comment" 
                placeholder="comment - textarea" 
                rows="5"
                ><?php echo $blog_comments->getComment(); ?></textarea>    

            <script>
                ClassicEditor
                        .create(document.querySelector('#'.comment.''))
                        .catch(error => {
                            console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /comment ?>
    <?php
    /**
     * 
      <?php # author_id ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="author_id"><?php _t("Author_id"); ?></label>
      <div class="col-sm-8">
      <select name="author_id" class="form-control selectpicker" id="author_id" data-live-search="true" >
      <?php //users_select("contact_id", array("contact_id"), $blog_comments->getAuthor_id(), array()); ?>

      <?php
      foreach (users_list() as $key => $ul_items) {
      echo '<option value="' . $ul_items['contact_id'] . '">' . $ul_items['contact_id'] . ' - ' . contacts_formated($ul_items['contact_id']) . '</option>';
      }
      ?>

      </select>
      </div>
      </div>
      <?php # /author_id ?>

      <?php # date ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
      <div class="col-sm-8">
      <input
      type="date"
      name="date"
      class="form-control"
      id="date"
      placeholder="date"
      value="<?php echo magia_dates_formated($blog_comments->getDate()); ?>" >
      </div>

      <?php vardump(magia_dates_formated($blog_comments->getDate())); ?>
      </div>
      <?php # /date ?>

      <?php # order_by ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
      <div class="col-sm-8">
      <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $blog_comments->getOrder_by(); ?>" >
      </div>
      </div>
      <?php # /order_by ?>


      <?php # status ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
      <div class="col-sm-8">
      <select name="status" class="form-control" id="status" >
      <option value="1" <?php echo ($blog_comments->getStatus() == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
      <option value="0" <?php echo ($blog_comments->getStatus() == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
      </select>
      </div>
      </div>
      <?php # /status ?>
     * 
     * 
     */
    ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil"); ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>

