
<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("References"); ?>
    </div>
    <div class="panel-body">

        <table class="table">

            <thead>
                <tr>
                    <th><?php _t("Reference name"); ?></th>
                    <th><?php _t("Description"); ?></th>
                </tr>
            </thead>

            <tbody>

                <?php
                foreach (expenses_references_search_by('expense_id', $expense->getId()) as $key => $ersb) {
                    echo '<tr>
                            <td>' . $ersb['name'] . '</td>
                            <td>' . $ersb['description'] . '</td>
                            <td><a href="index.php?c=expenses_references&a=ok_delete&id=' . $ersb['id'] . '&redi[redi]=3&redi[expense_id]=' . $expense->getId() . '">' . icon("trash") . '</a></td>
                         </tr>';
                }
                ?>

            </tbody>




            <form class="form-horizontal" action="index.php" method="post" >
                <input type="hidden" name="c" value="expenses_references">
                <input type="hidden" name="a" value="ok_add">
                <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">
                <input type="hidden" name="order_by" value="1">
                <input type="hidden" name="status" value="1">
                <input type="hidden" name="redi[redi]" value="4">

                <tr>

                    <td>
                        <input type="text" name="name" class="form-control" id="name" placeholder="" value="" required="">
                    </td>

                    <td>
                        <input type="text" name="description" class="form-control" id="description" placeholder="" value="" required="">
                    </td>

                    <td>

                        <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?><?php _t("Add"); ?></button>


                    </td>

                </tr>
            </form>

        </table>




        <?php
        /**
         *         <?php
          # MagiaPHP
          # file date creation: 2024-01-02
          ?>
          <form class="form-horizontal" action="index.php" method="post" >
          <input type="hidden" name="c" value="expenses_references">
          <input type="hidden" name="a" value="ok_add">
          <input type="hidden" name="redi" value="<?php echo $redi; ?>">

          <?php # expense_id ?>
          <div class="form-group">
          <label class="control-label col-sm-3" for="expense_id"><?php _t("Expense_id"); ?></label>
          <div class="col-sm-8">
          <select name="expense_id" class="form-control selectpicker" id="expense_id" data-live-search="true" >
          <?php expenses_select("id", "id", "", array()); ?>
          </select>
          </div>
          </div>
          <?php # /expense_id ?>

          <?php # name ?>
          <div class="form-group">
          <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
          <div class="col-sm-8">
          <input type="text" name="name" class="form-control" id="name" placeholder="name" value="" >
          </div>
          </div>
          <?php # /name ?>

          <?php # description ?>
          <div class="form-group">
          <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
          <div class="col-sm-8">
          <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>
          </div>
          </div>
          <?php # /description ?>

          <?php # order_by ?>
          <div class="form-group">
          <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
          <div class="col-sm-8">
          <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="" >
          </div>
          </div>
          <?php # /order_by ?>

          <?php # status ?>
          <div class="form-group">
          <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
          <div class="col-sm-8">
          <select name="status" class="form-control" id="status" >
          <option value="1" <?php echo ($expenses_references["status"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
          <option value="0" <?php echo ($expenses_references["status"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
          </select>
          </div>
          </div>
          <?php # /status ?>


          <div class="form-group">
          <label class="control-label col-sm-2" for=""></label>
          <div class="col-sm-8">
          <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
          </div>
          </div>

          </form>


         */
        ?>

    </div>
</div>
