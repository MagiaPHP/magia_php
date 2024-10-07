<a name="25"></a>
<h2><?php _t("Category"); ?></h2>



<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_add_25">
    <input type="hidden" name="redi" value="1">


    <?php # total ?>
    <div class="form-group">
        <label class="control-label sr-only" for="title"><?php _t("Category"); ?></label>

        <div class="col-sm-10">
            <select class="form-control" name="category_id">
                <?php
                foreach (expenses_categories_list() as $key => $ecl) {

                    $selected = ($ecl['id'] == $expense->getCategory_id()) ? " selected " : "";

                    echo '<option value="' . $ecl["id"] . '" ' . $selected . '>' . $ecl["category"] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <?php # /total  ?>


    <div class="form-group">
        <label class="control-label sr-only" for=""></label>
        <div class="col-sm-8">    


            <button type="submit" class="btn btn-default">
                <?php _t("Next"); ?>
                <?php echo icon("chevron-right"); ?>
            </button>


        </div>      							
    </div>      							

</form>


<?php
/**
 * 
  <hr>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Nueva Categoro
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">Modal title</h4>
  </div>
  <div class="modal-body">
  <?php
  $redi = 4;
  $expenses_categories["status"] = 1;
  include view('expenses_categories', 'form_add');
  // 3
  // header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
  ?>
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary">Save changes</button>
  </div>
  </div>
  </div>
  </div>


 */
?>