

<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#products_categories_add_<?php echo $products_categories_item["id"]; ?>">
    <?php echo icon("plus"); ?>
    <?php _t("Add new"); ?>
</button>


<div class="modal fade" id="products_categories_add_<?php echo $products_categories_item["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="products_categories_add_<?php echo $products_categories_item["id"]; ?>Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="products_categories_add_<?php echo $products_categories_item["id"]; ?>Label"> <?php _t("Add"); ?></h4>
      </div>
      <div class="modal-body">
        <?php 
        $redi = 1;
        include view("products_categories","form_add"   , $arg = ["redi" => 1]); 
        $redi = "";     
        ?>
      </div>
      

      
    </div>
  </div>
</div>


