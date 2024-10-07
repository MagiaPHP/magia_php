
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#products_search_">
    <?php echo icon("search");  ?>
    <?php _t("Search"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="products_search_" tabindex="-1" role="dialog" aria-labelledby="products_search_Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="products_search_Label"> <?php _t("Add"); ?></h4>
      </div>
      
      <div class="modal-body">
        <?php include view("products","form_search"  , $arg = ["redi" => 1]); ?>
      </div>
           
    </div>
  </div>
</div>